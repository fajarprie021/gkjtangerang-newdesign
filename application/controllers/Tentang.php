<?php
class Tentang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tentang');
		$this->load->model('m_pengunjung');
		$this->load->model('m_menu');
		$this->load->model('m_profil');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		redirect('tentang/halaman/sejarah');
	}

	function halaman($name_page){
		$current_url = explode("/", $_SERVER['REQUEST_URI']);
        $resultReplace_NamePage = preg_replace("/[^a-zA-Z0-9]/", " ", $name_page);
		if($name_page == "sejarah"){
			$x['menu']=$this->m_menu->get_all_menu();
			$x['alamat']=$this->m_profil->get_alamat();
			$x['tlp']=$this->m_profil->get_tlp();
			$x['email']=$this->m_profil->get_email();
			$x['identitas']=$this->m_profil->get_identitas();
            $kategori=str_replace("-"," ",$this->uri->segment(3));
			$query = $this->db->get_where('tbl_sejarah', array('tulisan_slug' => $name_page));
            if($query->num_rows() > 0){
                $b=$query->row_array();
                $kode=$b['tulisan_id'];
                $this->db->query("UPDATE tbl_sejarah SET tulisan_views=tulisan_views+1 WHERE tulisan_id='$kode'");
                $data=$this->m_tentang->get_sejarah_by_kode($kode);
                $row=$data->row_array();
                $x['id']=$row['tulisan_id'];
                // $x['title']=$row['tulisan_judul'];
                $x['title']=ucwords($resultReplace_NamePage);
                $x['image']=$row['tulisan_gambar'];
                $x['blog'] =$row['tulisan_isi'];
                $x['tanggal']=$row['tanggal'];
                $x['author']=$row['tulisan_author'];
                $x['kategori']=$row['tulisan_kategori_nama'];
                $x['slug']=$row['tulisan_slug'];
                $x['show_komentar']=$this->m_tentang->show_komentar_by_tulisan_id($kode);
                // $x['category']=$this->db->get('tbl_kategori');
                $x['category']=$this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status=1");
                $x['populer']=$this->db->query("SELECT * FROM tbl_sejarah ORDER BY tulisan_views DESC LIMIT 5");
                $x['content'] = 'depan/v_tentang';
                $this->load->view('layout/main', $x);
            }else{
                $x['pesan']='Tidak Ada artikel untuk kategori <b>'.$kategori.'</b>';
                $x['content'] = 'depan/v_oops';
                $this->load->view('layout/main', $x);
            }
		}elseif($name_page == "struktur-majelis"){
			$x['menu']=$this->m_menu->get_all_menu();
			$x['alamat']=$this->m_profil->get_alamat();
			$x['tlp']=$this->m_profil->get_tlp();
			$x['email']=$this->m_profil->get_email();
			$x['identitas']=$this->m_profil->get_identitas();
            $kategori=str_replace("-"," ",$this->uri->segment(3));
			$query = $this->db->get_where('tbl_struktur_majelis', array('tulisan_slug' => $name_page));
            if($query->num_rows() > 0){
                $b=$query->row_array();
                $kode=$b['tulisan_id'];
                $this->db->query("UPDATE tbl_struktur_majelis SET tulisan_views=tulisan_views+1 WHERE tulisan_id='$kode'");
                $data=$this->m_tentang->get_struktur_majelis_by_kode($kode);
                $row=$data->row_array();
                $x['id']=$row['tulisan_id'];
                // $x['title']=$row['tulisan_judul'];
                $x['title']=ucwords($resultReplace_NamePage);
                $x['image']=$row['tulisan_gambar'];
                $x['blog'] =$row['tulisan_isi'];
                $x['tanggal']=$row['tanggal'];
                $x['author']=$row['tulisan_author'];
                $x['kategori']=$row['tulisan_kategori_nama'];
                $x['slug']=$row['tulisan_slug'];
                $x['show_komentar']=$this->m_tentang->show_komentar_by_tulisan_id($kode);
                // $x['category']=$this->db->get('tbl_kategori');
                $x['category']=$this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status=1");
                $x['populer']=$this->db->query("SELECT * FROM tbl_struktur_majelis ORDER BY tulisan_views DESC LIMIT 5");
                $x['content'] = 'depan/v_tentang';
                $this->load->view('layout/main', $x);
            }else{
                $x['pesan']='Tidak Ada artikel untuk kategori <b>'.$kategori.'</b>';
                $x['content'] = 'depan/v_oops_tentang';
                $this->load->view('layout/main', $x);
            }
		}else{
			$x['menu']=$this->m_menu->get_all_menu();
			$x['alamat']=$this->m_profil->get_alamat();
			$x['tlp']=$this->m_profil->get_tlp();
			$x['email']=$this->m_profil->get_email();
			$x['identitas']=$this->m_profil->get_identitas();
            $kategori=str_replace("-"," ",$this->uri->segment(3));
			$query = $this->db->get_where('tbl_visi_misi', array('tulisan_slug' => $name_page));
            if($query->num_rows() > 0){
                $b=$query->row_array();
                $kode=$b['tulisan_id'];
                $this->db->query("UPDATE tbl_visi_misi SET tulisan_views=tulisan_views+1 WHERE tulisan_id='$kode'");
                $data=$this->m_tentang->get_visi_misi_by_kode($kode);
                $row=$data->row_array();
                $x['id']=$row['tulisan_id'];
                // $x['title']=$row['tulisan_judul'];
                $x['title']=ucwords($resultReplace_NamePage);
                $x['image']=$row['tulisan_gambar'];
                $x['blog'] =$row['tulisan_isi'];
                $x['tanggal']=$row['tanggal'];
                $x['author']=$row['tulisan_author'];
                $x['kategori']=$row['tulisan_kategori_nama'];
                $x['slug']=$row['tulisan_slug'];
                $x['show_komentar']=$this->m_tentang->show_komentar_by_tulisan_id($kode);
                // $x['category']=$this->db->get('tbl_kategori');
                $x['category']=$this->db->query("SELECT * FROM tbl_kategori WHERE kategori_status=1");
                $x['populer']=$this->db->query("SELECT * FROM tbl_visi_misi ORDER BY tulisan_views DESC LIMIT 5");
                $x['content'] = 'depan/v_tentang';
                $this->load->view('layout/main', $x);
            }else{
                $x['pesan']='Tidak Ada artikel untuk kategori <b>'.$kategori.'</b>';
                $x['content'] = 'depan/v_oops_tentang';
                $this->load->view('layout/main', $x);
            }
		}
	}

}
