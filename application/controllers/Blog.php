<?php
class Blog extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_menu');
		$this->load->model('m_profil');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		$x['menu'] = $this->m_menu->get_all_menu();
		$x['alamat'] = $this->m_profil->get_alamat();
		$x['tlp'] = $this->m_profil->get_tlp();
		$x['email'] = $this->m_profil->get_email();
		$x['identitas'] = $this->m_profil->get_identitas();
		$jum = $this->m_tulisan->berita();
		$page = $this->uri->segment(3);
		if (!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;
		$limit = 2;
		$config['base_url'] = base_url() . 'blog/index/';
		$config['total_rows'] = $jum->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		//Tambahan untuk styling Tailwind
		$config['full_tag_open']    = '<div class="w-full flex justify-center mt-4"><nav><ul class="flex items-center gap-2">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = '<li><span class="flex h-10 w-10 items-center justify-center bg-secondary text-sm font-bold text-white shadow-soft">';
		$config['cur_tag_close']    = '</span></li>';
		$config['next_tag_open']    = '<li>';
		$config['next_tagl_close']  = '</li>';
		$config['prev_tag_open']    = '<li>';
		$config['prev_tagl_close']  = '</li>';
		$config['first_tag_open']   = '<li>';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open']    = '<li>';
		$config['last_tagl_close']  = '</li>';
		$config['attributes']       = array('class' => 'flex h-10 px-4 items-center justify-center border border-primary/20 bg-white text-sm font-bold text-primary transition hover:bg-secondary hover:text-white hover:border-transparent');
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next >>';
		$config['prev_link'] = '<< Prev';
		$this->pagination->initialize($config);
		$x['page'] = $this->pagination->create_links();
		$x['data'] = $this->m_tulisan->berita_perpage($offset, $limit);
		// $x['category']=$this->db->get('tbl_kategori');
		// $x['category']=$this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status=1");
		$x['category'] = $this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status_tampil=1");
		$x['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
		$x['content'] = 'depan/v_blog';
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
			$x['content'] = 'depan/v_blog_detail';
			$this->load->view('layout/main', $x);
		} else {
			redirect('artikel');
		}
	}

	function kategori()
	{
		$x['menu'] = $this->m_menu->get_all_menu();
		$x['alamat'] = $this->m_profil->get_alamat();
		$x['tlp'] = $this->m_profil->get_tlp();
		$x['email'] = $this->m_profil->get_email();
		$x['identitas'] = $this->m_profil->get_identitas();
		$kategori = str_replace("-", " ", $this->uri->segment(3));
		$query = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_kategori_nama LIKE '%$kategori%' ORDER BY tulisan_views DESC LIMIT 5");
		if ($query->num_rows() > 0) {
			$x['data'] = $query;
			//  $x['category']=$this->db->get('tbl_kategori');
			// $x['category']=$this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status=1");
			$x['category'] = $this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status_tampil=1");
			$x['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
			$x['content'] = 'depan/v_blog';
			$this->load->view('layout/main', $x);
		} else {
			//  echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak Ada artikel untuk kategori <b>'.$kategori.'</b></div>');
			//  redirect('blog');
			$x['pesan'] = 'Tidak Ada artikel untuk kategori <b>' . $kategori . '</b>';
			// $x['nama_kategori']=$kategori;
			$x['data'] = $query;
			// $x['category']=$this->db->get('tbl_kategori');
			$x['category'] = $this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status_tampil=1");
			$x['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
			$x['content'] = 'depan/v_oops';
			$this->load->view('layout/main', $x);
		}
	}

	function search()
	{
		$x['menu'] = $this->m_menu->get_all_menu();
		$x['alamat'] = $this->m_profil->get_alamat();
		$x['tlp'] = $this->m_profil->get_tlp();
		$x['email'] = $this->m_profil->get_email();
		$x['identitas'] = $this->m_profil->get_identitas();
		$keyword = str_replace("'", "", htmlspecialchars($this->input->get('keyword', TRUE), ENT_QUOTES));
		$query = $this->m_tulisan->cari_berita($keyword);
		if ($query->num_rows() > 0) {
			$x['data'] = $query;
			$x['category'] = $this->db->get('tbl_kategori');
			$x['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
			$x['content'] = 'depan/v_blog';
			$this->load->view('layout/main', $x);
		} else {
			//  echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak dapat menemukan artikel dengan kata kunci <b>'.$keyword.'</b></div>');
			//  redirect('blog');
			$x['pesan'] = 'Tidak dapat menemukan artikel dengan kata kunci <b>' . $keyword . '</b>';
			// $x['nama_kategori']=$kategori;
			$x['data'] = $query;
			// $x['category']=$this->db->get('tbl_kategori');
			// $x['category']=$this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status=1");
			$x['category'] = $this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status_tampil=1");
			$x['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
			$x['content'] = 'depan/v_oops';
			$this->load->view('layout/main', $x);
		}
	}

	function komentar()
	{
		$kode = htmlspecialchars($this->input->post('id', TRUE), ENT_QUOTES);
		$data = $this->m_tulisan->get_berita_by_kode($kode);
		$row = $data->row_array();
		$slug = $row['tulisan_slug'];
		$nama = htmlspecialchars($this->input->post('nama', TRUE), ENT_QUOTES);
		$email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
		$komentar = nl2br(htmlspecialchars($this->input->post('komentar', TRUE), ENT_QUOTES));
		if (empty($nama) || empty($email)) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Masukkan input dengan benar.</div>');
			redirect('artikel/' . $slug);
		} else {
			$data = array(
				'komentar_nama' 			=> $nama,
				'komentar_email' 			=> $email,
				'komentar_isi' 				=> $komentar,
				'komentar_status' 		=> 0,
				'komentar_tulisan_id' => $kode
			);

			$this->db->insert('tbl_komentar', $data);
			$this->session->set_flashdata('msg', '<div class="alert alert-info">Komentar Anda akan tampil setelah moderasi.</div>');
			redirect('artikel/' . $slug);
		}
	}
}
