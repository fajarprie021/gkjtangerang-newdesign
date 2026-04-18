<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_menu');
		$this->load->model('m_pengunjung');
	}
	function index(){
		if($this->session->userdata('akses')=='1'){
			$x['menu']=$this->m_menu->get_all_menu_admin();
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
			$x['content']='admin/v_dashboard';
			$this->load->view('admin/layout/main',$x);
		}else{
			redirect('administrator');
		}
	
	}
	
}