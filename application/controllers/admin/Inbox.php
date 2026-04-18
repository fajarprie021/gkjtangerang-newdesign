<?php
class Inbox extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_kontak');
		$this->load->model('m_menu');
	}

	function index(){
		$this->m_kontak->update_status_kontak();
		$x['data']=$this->m_kontak->get_all_inbox();
		$x['menu']=$this->m_menu->get_all_menu_admin();
		$x['content']='admin/v_inbox';
		$this->load->view('admin/layout/main',$x);
	}

	function hapus_inbox(){
		$kode=$this->input->post('kode');
		$this->m_kontak->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/inbox');
	}
}