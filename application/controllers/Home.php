<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_galeri');
		// $this->load->model('m_pengumuman');
		$this->load->model('m_informasi');
		$this->load->model('m_agenda');
		$this->load->model('m_files');
		$this->load->model('m_pengunjung');
		$this->load->model('m_tentang');
		$this->load->model('m_menu');
		$this->load->model('m_profil');
		$this->load->model('m_galeri');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
			$x['berita']=$this->m_tulisan->get_berita_home();
			// $x['pengumuman']=$this->m_pengumuman->get_pengumuman_home();
			$x['renungan']=$this->m_informasi->get_renungan_home();
			$x['agenda']=$this->m_agenda->get_agenda_home();
			$x['tot_guru']=$this->db->get('tbl_guru')->num_rows();
			$x['tot_siswa']=$this->db->get('tbl_siswa')->num_rows();
			$x['tot_files']=$this->db->get('tbl_files')->num_rows();
			$x['tot_agenda']=$this->db->get('tbl_agenda')->num_rows();
			// $x['tot_pengumuman']=$this->db->get('tbl_pengumuman')->num_rows();
			$x['tot_renungan']=$this->db->get('tbl_renungan')->num_rows();
			$x['menu']=$this->m_menu->get_all_menu();
			$x['alamat']=$this->m_profil->get_alamat();
			$x['tlp']=$this->m_profil->get_tlp();
			$x['email']=$this->m_profil->get_email();
			$x['identitas']=$this->m_profil->get_identitas();
			// $this->load->view('depan/v_home',$x);

			$jum=$this->m_galeri->get_all_galeri();
	        $page=$this->uri->segment(3);
	        if(!$page):
	            $offset = 0;
	        else:
	            $offset = $page;
	        endif;
	        $limit=3;
	        $config['base_url'] = base_url() . 'galeri/index/';
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
	            $x['all_galeri']=$this->m_galeri->galeri_perpage($offset,$limit);
	            // $x['slider']=$this->m_galeri->get('slider')->result;
            	// $x['berita'] = $this->m_galeri->beritaGetAll();
            	$x['images'] = array(
		            // 'theme/images/slider.jpg',
		            // 'theme/images/slider-2.jpg',
		            // 'theme/images/slider-3.jpg'
		            // 'assets/images/tangerang-tangerang01.jpg',
		            // 'assets/images/tangerang-tangerang02.jpg',
		            // 'assets/images/tangerang-serpong02.jpg'
		            'assets/images/header/image-slide-1.jpg',
		            'assets/images/header/image-slide-2.jpg',
		            'assets/images/header/image-slide-3.jpg'
		        );
		        // $x['slide_galeri']=$this->m_galeri->beritaGetAll();
		        $x['slide_galeri']=$this->m_galeri->beritaGetAll2();
		        $x['isiGaleriHeader']=$this->m_galeri->headerGetAll();
		        // Membuat array kosong untuk menyimpan nilai
		        $x['gambar'] = $x['isiGaleriHeader'];
				$x['sejarah']=$this->m_tentang->get_sejarah_to_homepage();
				$x['jadwal_ibadah']=$this->db->query("SELECT * FROM tbl_jadwal_ibadah WHERE jadwal_ibadah_status=1");
		        $galeriHeaderArray = array();
		        foreach ($x['isiGaleriHeader']->result() as $row) {
			        $galeriHeaderArray[] = $row->gambar;
			    }
			    if (empty($galeriHeaderArray)) {
			        $galeriHeaderArray = array('image-slide-1.jpg', 'image-slide-2.jpg', 'image-slide-3.jpg', 'image-slide-4.jpg');
			    }
    			$x['galeriHeaderArray'] = $galeriHeaderArray;
		        // $gambar=$this->m_galeri->beritaGetAll2();
		        // $x['images2'] = array(
		        //     'theme/images/'.$gambar
		        // );
				$x['content'] = 'depan/v_home_tailwind';
				$this->load->view('layout/main', $x);
	}

}
