<?php
class Renungan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_renungan');
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
        $config['base_url'] = base_url() . 'renungan/index/';
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
						$x['content'] = 'depan/v_renungan';
						$this->load->view('layout/main', $x);
	}

	function detail($slugs)
	{
		$x['menu'] = $this->m_menu->get_all_menu();
		$x['alamat'] = $this->m_profil->get_alamat();
		$x['tlp'] = $this->m_profil->get_tlp();
		$x['email'] = $this->m_profil->get_email();
		$x['identitas'] = $this->m_profil->get_identitas();
		$slug = htmlspecialchars($slugs, ENT_QUOTES);
		$query = $this->db->get_where('tbl_tulisan', array('tulisan_slug' => $slug));
		if ($query->num_rows() > 0) {
			$b = $query->row_array();
			$kode = $b['tulisan_id'];
			$this->db->query("UPDATE tbl_tulisan SET tulisan_views=tulisan_views+1 WHERE tulisan_id='$kode'");
			$data = $this->m_tulisan->get_berita_by_kode($kode);
			$row = $data->row_array();
			$x['id'] = $row['tulisan_id'];
			$x['title'] = $row['tulisan_judul'];
			$x['image'] = $row['tulisan_gambar'];
			$x['blog'] = $row['tulisan_isi'];
			$x['tanggal'] = $row['tanggal'];
			$x['author'] = $row['tulisan_author'];
			$x['kategori'] = $row['tulisan_kategori_nama'];
			$x['slug'] = $row['tulisan_slug'];
			$x['show_komentar'] = $this->m_tulisan->show_komentar_by_tulisan_id($kode);
			// $x['category']=$this->db->get('tbl_kategori');
			// $x['category']=$this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status=1");
			$x['category'] = $this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status_tampil=1");
			$x['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
			$this->load->view('depan/v_menu', $x);
			$this->load->view('depan/v_renungan_detail', $x);
			$this->load->view('depan/v_footer', $x);
		} else {
			redirect('informasi/halaman/renungan');
		}
	}

	function halaman($slugs){
		// echo "Slug - ".$slugs;
		$x['menu'] = $this->m_menu->get_all_menu();
		$x['alamat'] = $this->m_profil->get_alamat();
		$x['tlp'] = $this->m_profil->get_tlp();
		$x['email'] = $this->m_profil->get_email();
		$x['identitas'] = $this->m_profil->get_identitas();
		$slug = htmlspecialchars($slugs, ENT_QUOTES);
		$query = $this->db->get_where('tbl_renungan', array('renungan_slug' => $slug));
		// echo "ISI - ".$query;
		// echo "<br>";
		// echo "CHECK - ".$this->db->get_compiled_select();
		// echo "<br>";
		// echo "Num Rows - ".$query->num_rows();
		// $this->db->from('tbl_renungan');
        // // Menambahkan kondisi where untuk slug
        // $this->db->where('renungan_slug', $slug);
		// // Menampilkan query yang dihasilkan
		// echo "<br>";
        // echo "CHECK - 1 - ".$this->db->get_compiled_select();  // Ini hanya untuk debugging
		// // Setelah melihat query, Anda dapat menjalankan query untuk mendapatkan hasilnya
        // $query = $this->db->get();  // Eksekusi query
		// // Menampilkan jumlah baris hasil query
		// echo "<br>";
        // echo "Num Rows: " . $query->num_rows();
		if ($query->num_rows() > 0) {
			$b = $query->row_array();
			$kode = $b['renungan_id'];
			// $this->db->query("UPDATE tbl_renungan SET renungan_views=renungan_views+1 WHERE renungan_id='$kode'");
			$data = $this->m_renungan->get_renungan_by_kode($kode);
			$row = $data->row_array();
			$x['id'] = $row['renungan_id'];
			$x['title'] = $row['renungan_judul'];
			// $x['image'] = $row['renungan_gambar'];
			$x['blog'] = $row['renungan_deskripsi'];
			$x['tanggal'] = $row['tanggal'];
			$x['author'] = $row['renungan_author'];
			// $x['kategori'] = $row['renungan_kategori_nama'];
			$x['slug'] = $row['renungan_slug'];
			// $x['show_komentar'] = $this->m_tulisan->show_komentar_by_tulisan_id($kode);
			// $x['category']=$this->db->get('tbl_kategori');
			// $x['category']=$this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status=1");
			// $x['category'] = $this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status_tampil=1");
			// $x['populer'] = $this->db->query("SELECT * FROM tbl_renungan ORDER BY renungan_views DESC LIMIT 5");
			$this->load->view('depan/v_menu', $x);
			$this->load->view('depan/v_renungan_detail', $x);
			$this->load->view('depan/v_footer', $x);
		} else {
			redirect('informasi/halaman/renungan');
		}
	}

}
