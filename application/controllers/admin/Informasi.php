<?php
class Informasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_informasi');
		$this->load->model('m_pengunjung');
		$this->load->model('m_menu');
		$this->load->model('m_profil');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['menu']=$this->m_menu->get_all_menu();
		$x['alamat']=$this->m_profil->get_alamat();
		$x['tlp']=$this->m_profil->get_tlp();
		$x['email']=$this->m_profil->get_email();
		$x['identitas']=$this->m_profil->get_identitas();
		$jum=$this->m_renungan->renungan();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=7;
        $config['base_url'] = base_url() . 'informasi/index/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
						//Tambahan untuk styling
	          $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	          $config['full_tag_close']   = '</ul></nav></div>';
	          $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	          $config['num_tag_close']    = '</span></li>';
	          $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
	          $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	          $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	          $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['prev_tagl_close']  = '</span>Next</li>';
	          $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	          $config['first_tagl_close'] = '</span></li>';
	          $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['last_tagl_close']  = '</span></li>';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Next >>';
            $config['prev_link'] = '<< Prev';
            $this->pagination->initialize($config);
            $x['page'] =$this->pagination->create_links();
						$x['data']=$this->m_renungan->renungan_perpage($offset,$limit);
						$x['title']='Informasi';
						$this->load->view('depan/v_menu',$x);
						$this->load->view('depan/v_informasi',$x);
						$this->load->view('depan/v_footer',$x);
	}

	function halaman($name_page){
		$current_url = explode("/", $_SERVER['REQUEST_URI']);
		if($name_page == "agenda"){
			$x['menu']=$this->m_menu->get_all_menu();
			$x['alamat']=$this->m_profil->get_alamat();
			$x['tlp']=$this->m_profil->get_tlp();
			$x['email']=$this->m_profil->get_email();
			$x['identitas']=$this->m_profil->get_identitas();
			$jum=$this->m_informasi->agenda();
			$page=$this->uri->segment(4);
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$limit=7;
			$config['base_url'] = base_url() . 'informasi/halaman/index/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
						//Tambahan untuk styling
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Next >>';
            $config['prev_link'] = '<< Prev';
            $this->pagination->initialize($config);
			$x['page'] =$this->pagination->create_links();
			$x['data']=$this->m_informasi->agenda_perpage($offset,$limit);
			// $x['title']=ucfirst($current_url[4]);
			$x['title']=ucfirst($name_page);
			$this->load->view('depan/v_menu',$x);
			$this->load->view('depan/v_informasi',$x);
			$this->load->view('depan/v_footer',$x);
		}else{
			$x['data']=$this->m_informasi->get_all_renungan_admin();
            $x['menu']=$this->m_menu->get_all_menu_admin();
            $x['content']='admin/v_informasi';
            $this->load->view('admin/layout/main',$x);
		}
	}

}
