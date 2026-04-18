<?php
class Slide extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_menu');
		// $this->load->model('m_kategori');
		$this->load->model('m_album');
		$this->load->model('m_slideheader');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->library('image_lib'); // Library untuk proses resize gambar
	}


	function index(){
		
		$x['data']=$this->m_slideheader->get_all_galeri();
		$x['alb']=$this->m_album->get_all_album();
		$x['menu']=$this->m_menu->get_all_menu_admin();
		$x['content']='admin/v_slideheader';
		$this->load->view('admin/layout/main',$x);
	}

	function add_slideheader(){
		// $x['kat']=$this->m_kategori->get_all_kategori();
		$x['alb']=$this->m_album->get_all_album();
		$x['menu']=$this->m_menu->get_all_menu_admin();
		$x['content']='admin/v_add_slideheader';
		$this->load->view('admin/layout/main',$x);
	}
	
	// Proses upload menggunakan metode chunk
    public function uploadtoserver() {
		$judul = $this->input->post('judul');
    	// $kategori = $this->input->post('kategori');
		$kode=$this->session->userdata('idadmin');
		$user=$this->m_pengguna->get_pengguna_login($kode);
		$p=$user->row_array();
		$user_id=$p['pengguna_id'];
		$user_nama=$p['pengguna_nama'];
        @set_time_limit(5 * 60); // Maksimal 5 menit untuk eksekusi

        $targetDir = FCPATH . "/assets/images/header/";
        if (!file_exists($targetDir)) {
            @mkdir($targetDir, 0755, true);
        }

        // Dapatkan nama file dan ekstensi
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileExt = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            // $customName = "foto_galeri_" . uniqid();
            $customName = "image-slide-" . uniqid();
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
            $config['width'] = 2000;
            $config['height'] = 783;
            $this->image_lib->initialize($config);

            // Cek apakah proses resize berhasil
            if (!$this->image_lib->resize()) {
                // Jika resize gagal, kirim error
                log_message('error', 'Resize Gambar Gagal: ' . $this->image_lib->display_errors());
                die(json_encode(['status' => 'error', 'message' => 'Resize gambar gagal.']));
            } else {
                // Simpan informasi gambar ke database
                $data = array(
                    'judul_header' => $judul,
                    // 'galeri_album_id' => $kategori,
                    'gambar' => $fileName,
                    'tgl_posting' => date('Y-m-d H:i:s'),
					// 'galeri_pengguna_id' => $user_id,
					// 'galeri_author' => $user_nama
                    'status' => '0'
                );

                $this->db->insert('tbl_header', $data);
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Data berhasil disimpan</div>');
                echo json_encode(['status' => 'success', 'message' => 'Upload dan resize berhasil!']);
            }
        }
    }

    // Fungsi untuk update galeri
    function update_galeri() {
        // Update data galeri di sini
        $galeri_id = $this->input->post('kode');
        $judul = $this->input->post('xjudul');   // Judul header
        $status = $this->input->post('status') ? 1 : 0; // Status 1 atau 0 berdasarkan switch
        // $data = array(
        //     // 'galeri_judul' => $this->input->post('xjudul'),
        //     // 'judul_header' => $this->input->post('galeri_judul'),
        //     // 'galeri_album_id' => $this->input->post('galeri_album_id')
        //     'status' => $status // Simpan status ke database
        // );
        
        // if (!empty($_FILES['file']['name'])) {
        //     $config['upload_path'] = './assets/images/header/';
        //     $config['allowed_types'] = 'jpg|jpeg|png';
        //     $config['encrypt_name'] = TRUE;

        //     $this->upload->initialize($config);
        //     if ($this->upload->do_upload('file')) {
        //         $imgData = $this->upload->data();
        //         $data['galeri_gambar'] = $imgData['file_name'];

        //         // Resize gambar baru
        //         $resize_config['image_library'] = 'gd2';
        //         $resize_config['source_image'] = $imgData['full_path'];
        //         $resize_config['maintain_ratio'] = TRUE;
        //         $resize_config['width'] = 2000;
        //         $resize_config['height'] = 783;
                
        //         $this->image_lib->initialize($resize_config);
        //         $this->image_lib->resize();
        //     }
        // }

        // $this->m_slideheader->update_galeri($galeri_id, $data);
        // $this->m_slideheader->update_galeri($galeri_id, $judul, $status);
        $this->m_slideheader->update_galeri($galeri_id, $judul, $status);
        redirect('admin/slide');
    }

	function hapus_slideheader(){
		$kode=$this->input->post('kode');
		// $album=$this->input->post('album');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/header/'.$gambar;
		unlink($path);
		// $this->m_slideheader->hapus_galeri($kode,$album);
        $this->m_slideheader->hapus_galeri($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/slide');
	}

}