<?php
class Galeri extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_menu');
		$this->load->model('m_album');
		$this->load->model('m_galeri');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		
		$x['data']=$this->m_galeri->get_all_galeri();
		$x['alb']=$this->m_album->get_all_album();
		$x['menu']=$this->m_menu->get_all_menu_admin();
		$this->load->view('admin/v_menu_admin',$x);
		$this->load->view('admin/v_galeri',$x);
	}
	
	function simpan_galeri_asli_modif(){
				// Set memory limit agar tetap dalam batas 128M
				ini_set('memory_limit', '128M');
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
				$config['max_size']             = 20480; // Dalam kilobytes (20MB)

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        // $config['maintain_ratio']= FALSE;
							$config['maintain_ratio'] = TRUE; // Mengatur agar rasio gambar tetap terjaga
	                        // $config['quality']= '60%';
							$config['quality'] = '50%'; // Mengurangi kualitas untuk menghemat memori
	                        // $config['width']= 500;
							$config['width'] = 1200; // Lebar baru gambar (kurangi dimensi untuk mempercepat proses)
	                        // $config['height']= 400;
							$config['height'] = 800; // Tinggi baru gambar (kurangi dimensi untuk mempercepat proses)
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $judul=strip_tags($this->input->post('xjudul'));
							$album=strip_tags($this->input->post('xalbum'));
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_pengguna->get_pengguna_login($kode);
							$p=$user->row_array();
							$user_id=$p['pengguna_id'];
							$user_nama=$p['pengguna_nama'];
							$this->m_galeri->simpan_galeri($judul,$album,$user_id,$user_nama,$gambar);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/galeri');
					}else{
	                    // echo $this->session->set_flashdata('msg','warning');
						// Tampilkan pesan error jika file melebihi batas 2MB atau format tidak sesuai
						echo $this->session->set_flashdata('msg', 'warning: file exceeds size limit or format error');
	                    redirect('admin/galeri');
	                }
	                 
	            }else{
					redirect('admin/galeri');
				}
				
	}

	function simpan_galeri()
{
    $this->load->library('upload');
    $this->load->library('image_lib');

    $config['upload_path'] = './assets/images/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '20480'; // 20MB - adjust based on your requirement
    $config['max_width'] = '2000';
    $config['max_height'] = '2000';

    $this->upload->initialize($config);

    if (!$this->upload->do_upload('galeri_gambar')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('msg', '<div class="alert alert-danger">' . $error['error'] . '</div>');
        redirect('admin/galeri');
    } else {
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];

        // Process resized image
        $resized_image_data = $this->input->post('galeri_gambar_resized');
        if ($resized_image_data) {
            $image_data = explode(',', $resized_image_data)[1];
            $file_path = './assets/images/' . $file_name;
            file_put_contents($file_path, base64_decode($image_data));
        }

        $data = array(
            'galeri_judul' => $this->input->post('galeri_judul'),
            'galeri_album_id' => $this->input->post('galeri_album_id'),
            'galeri_gambar' => $file_name,
            'tanggal' => date('Y-m-d H:i:s')
        );

        $this->db->insert('tbl_galeri', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Data berhasil disimpan</div>');
        redirect('admin/galeri');
    }
}

	
	function update_galeri(){
				
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 500;
	                        $config['height']= 400;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $galeri_id=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
							$album=strip_tags($this->input->post('xalbum'));
							$images=$this->input->post('gambar');
							$path='./assets/images/'.$images;
							unlink($path);
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_pengguna->get_pengguna_login($kode);
							$p=$user->row_array();
							$user_id=$p['pengguna_id'];
							$user_nama=$p['pengguna_nama'];
							$this->m_galeri->update_galeri($galeri_id,$judul,$album,$user_id,$user_nama,$gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/galeri');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/galeri');
	                }
	                
	            }else{
							$galeri_id=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
							$album=strip_tags($this->input->post('xalbum'));
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_pengguna->get_pengguna_login($kode);
							$p=$user->row_array();
							$user_id=$p['pengguna_id'];
							$user_nama=$p['pengguna_nama'];
							$this->m_galeri->update_galeri_tanpa_img($galeri_id,$judul,$album,$user_id,$user_nama);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/galeri');
	            } 

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