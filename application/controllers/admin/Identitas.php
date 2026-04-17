<?php
class Identitas extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_profil');
		$this->load->model('m_menu');
	}

	function index(){
		$x['menu']=$this->m_menu->get_all_menu_admin();
		
		// Load data profil
		$x['identitas']=$this->m_profil->get_identitas();
		$x['alamat']=$this->m_profil->get_alamat();
		$x['tlp']=$this->m_profil->get_tlp();
		$x['email']=$this->m_profil->get_email();
		$x['sosmed']=$this->m_profil->get_sosial_media();
		
		$x['content'] = 'admin/v_identitas';
		$this->load->view('admin/layout/main',$x);
	}

	function simpan(){
		// Identitas Umum
		$id_identitas = $this->input->post('id_identitas');
		$nama_identitas = strip_tags($this->input->post('nama_identitas'));
		$website_identitas = strip_tags($this->input->post('website_identitas'));
		$this->m_profil->update_identitas($id_identitas, $nama_identitas, $website_identitas);

		// Alamat
		$id_alamat = $this->input->post('id_alamat');
		$nama_gereja = strip_tags($this->input->post('nama_gereja'));
		$alamat_gereja = strip_tags($this->input->post('alamat_gereja'));
		$this->m_profil->update_alamat($id_alamat, $nama_gereja, $alamat_gereja);

		// Telepon
		$id_tlp = $this->input->post('id_tlp');
		$no_tlp = strip_tags($this->input->post('no_tlp'));
		$this->m_profil->update_tlp($id_tlp, $no_tlp);

		// Email
		$id_email = $this->input->post('id_email');
		$alamat_email = strip_tags($this->input->post('alamat_email'));
		$this->m_profil->update_email($id_email, $alamat_email);

		// Sosial Media Array Input
		$id_sosial_media_arr = $this->input->post('id_sosial_media');
		$sosial_media_href_arr = $this->input->post('sosial_media_href');

		if(!empty($id_sosial_media_arr) && is_array($id_sosial_media_arr)){
			foreach($id_sosial_media_arr as $index => $id_sosmed){
				$href = strip_tags($sosial_media_href_arr[$index]);
				$this->m_profil->update_sosmed($id_sosmed, $href);
			}
		}

		echo $this->session->set_flashdata('msg','success');
		redirect('admin/identitas');
	}
}
