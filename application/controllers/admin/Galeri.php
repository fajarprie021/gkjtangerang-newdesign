<?php
class Galeri extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_menu');
		// $this->load->model('m_kategori');
		$this->load->model('m_album');
		$this->load->model('m_galeri');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->library('image_lib'); // Library untuk proses resize gambar
	}


	function index(){
		
		$x['data']=$this->m_galeri->get_all_galeri();
		$x['alb']=$this->m_album->get_all_album();
		$x['menu']=$this->m_menu->get_all_menu_admin();
		$this->load->view('admin/v_menu_admin',$x);
		$this->load->view('admin/v_galeri',$x);
	}

	function add_galeri(){
		// $x['kat']=$this->m_kategori->get_all_kategori();
		$x['alb']=$this->m_album->get_all_album();
		$x['menu']=$this->m_menu->get_all_menu_admin();
		$this->load->view('admin/v_menu_admin',$x);
		$this->load->view('admin/v_add_galeri',$x);
	}
	
	// Proses upload menggunakan metode chunk
    public function uploadtoserver() {
		$judul = $this->input->post('judul');
    	$kategori = $this->input->post('kategori');
		$kode=$this->session->userdata('idadmin');
		$user=$this->m_pengguna->get_pengguna_login($kode);
		$p=$user->row_array();
		$user_id=$p['pengguna_id'];
		$user_nama=$p['pengguna_nama'];
        @set_time_limit(5 * 60); // Maksimal 5 menit untuk eksekusi

        $targetDir = FCPATH . "/assets/images/galeri/";
        if (!file_exists($targetDir)) {
            @mkdir($targetDir, 0755, true);
        }

        // Dapatkan nama file dan ekstensi
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileExt = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            $customName = "foto_galeri_" . uniqid();
            $fileName = $customName . '.' . $fileExt;
        } else {
            $fileName = uniqid("file_") . '.jpg'; // Default ke .jpg
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

        // Chunk upload
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;

        // Simpan chunk ke file sementara
        if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Gagal membuka output file."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Gagal membuka input file."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Gagal membuka input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        // Jika upload selesai
        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath); // Gabungkan file

            // Proses resize gambar setelah upload selesai
            $config['image_library'] = 'gd2';
            $config['source_image'] = $filePath;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 800;
            $config['height'] = 600;
            $this->image_lib->initialize($config);

            // Cek apakah proses resize berhasil
            if (!$this->image_lib->resize()) {
                // Jika resize gagal, kirim error
                log_message('error', 'Resize Gambar Gagal: ' . $this->image_lib->display_errors());
                die(json_encode(['status' => 'error', 'message' => 'Resize gambar gagal.']));
            } else {
                // Simpan informasi gambar ke database
                $data = array(
                    'galeri_judul' => $judul,
                    'galeri_album_id' => $kategori,
                    'galeri_gambar' => $fileName,
                    'galeri_tanggal' => date('Y-m-d H:i:s'),
					'galeri_pengguna_id' => $user_id,
					'galeri_author' => $user_nama
                );

                $this->db->insert('tbl_galeri', $data);
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Data berhasil disimpan</div>');
                echo json_encode(['status' => 'success', 'message' => 'Upload dan resize berhasil!']);
            }
        }
    }

    // Fungsi untuk update galeri
    function update_galeri() {
        // Update data galeri di sini
        $galeri_id = $this->input->post('galeri_id');
        $data = array(
            'galeri_judul' => $this->input->post('galeri_judul'),
            'galeri_album_id' => $this->input->post('galeri_album_id')
        );
        
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = './assets/images/galeri/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $imgData = $this->upload->data();
                $data['galeri_gambar'] = $imgData['file_name'];

                // Resize gambar baru
                $resize_config['image_library'] = 'gd2';
                $resize_config['source_image'] = $imgData['full_path'];
                $resize_config['maintain_ratio'] = TRUE;
                $resize_config['width'] = 800;
                $resize_config['height'] = 600;
                
                $this->image_lib->initialize($resize_config);
                $this->image_lib->resize();
            }
        }

        $this->m_galeri->update_galeri($galeri_id, $data);
        redirect('admin/galeri');
    }

	function hapus_galeri(){
		$kode=$this->input->post('kode');
		$album=$this->input->post('album');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_galeri->hapus_galeri($kode,$album);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/galeri');
	}

}