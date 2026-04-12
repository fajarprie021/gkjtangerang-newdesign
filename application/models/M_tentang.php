<?php
class M_tentang extends CI_Model{

	// function get_all_tulisan(){
	// 	$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC");
	// 	return $hsl;
	// }
	// function simpan_tulisan($judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug){
	// 	$hsl=$this->db->query("insert into tbl_tulisan(tulisan_judul,tulisan_isi,tulisan_kategori_id,tulisan_kategori_nama,tulisan_img_slider,tulisan_pengguna_id,tulisan_author,tulisan_gambar,tulisan_slug) values ('$judul','$isi','$kategori_id','$kategori_nama','$imgslider','$user_id','$user_nama','$gambar','$slug')");
	// 	return $hsl;
	// }
	// function get_tulisan_by_kode($kode){
	// 	$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_id='$kode'");
	// 	return $hsl;
	// }
	// function update_tulisan($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug){
	// 	$hsl=$this->db->query("update tbl_tulisan set tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_img_slider='$imgslider',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_gambar='$gambar',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
	// 	return $hsl;
	// }
	// function update_tulisan_tanpa_img($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$slug){
	// 	$hsl=$this->db->query("update tbl_tulisan set tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_img_slider='$imgslider',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
	// 	return $hsl;
	// }
	// function hapus_tulisan($kode){
	// 	$hsl=$this->db->query("delete from tbl_tulisan where tulisan_id='$kode'");
	// 	return $hsl;
	// }

	//Front-End
	// function get_berita_slider(){
	// 	$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_img_slider='1' ORDER BY tulisan_id DESC");
	// 	return $hsl;
	// }
	// function get_berita_home(){
	// 	$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC limit 4");
	// 	return $hsl;
	// }

	// function berita_perpage($offset,$limit){
	// 	$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC limit $offset,$limit");
	// 	return $hsl;
	// }

	// function berita(){
	// 	$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC");
	// 	return $hsl;
	// }
	// function get_berita_by_kode($kode){
	// 	$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_id='$kode'");
	// 	return $hsl;
	// }

	// function cari_berita($keyword){
	// 	$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_judul LIKE '%$keyword%' LIMIT 5");
	// 	return $hsl;
	// }

	//Sejarah
	function get_all_sejarah(){
		$hsl=$this->db->query("SELECT tbl_sejarah.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sejarah ORDER BY tulisan_id DESC");
		return $hsl;
	}

	function get_all_data_sejarah() {
		$this->db->select('tulisan_id,tulisan_judul,tulisan_isi,DATE_FORMAT(tulisan_tanggal,"%d/%m/%Y") AS tanggal,tulisan_author,tulisan_gambar,tulisan_views,tulisan_kategori_id,tulisan_kategori_nama');
		$this->db->order_by('tulisan_id', 'DESC');
        $query = $this->db->get('tbl_sejarah');
        return $query->result();
    }

	function update_data_sejarah($id, $data) {
		$this->db->where('tulisan_id', $id);
		$this->db->update('tbl_sejarah', $data);
	}

	function simpan_sejarah($judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug){
		$hsl=$this->db->query("insert into tbl_sejarah(tulisan_judul,tulisan_isi,tulisan_kategori_id,tulisan_kategori_nama,tulisan_img_slider,tulisan_pengguna_id,tulisan_author,tulisan_gambar,tulisan_slug) values ('$judul','$isi','$kategori_id','$kategori_nama','$imgslider','$user_id','$user_nama','$gambar','$slug')");
		return $hsl;
	}

	function update_sejarah($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug){
		$hsl=$this->db->query("update tbl_sejarah set tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_img_slider='$imgslider',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_gambar='$gambar',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
		return $hsl;
	}
	function update_sejarah_tanpa_img($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$slug){
		$hsl=$this->db->query("update tbl_sejarah set tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_img_slider='$imgslider',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
		return $hsl;
	}

	function hapus_sejarah($kode){
		$hsl=$this->db->query("delete from tbl_sejarah where tulisan_id='$kode'");
		return $hsl;
	}

	function get_sejarah_to_homepage(){
		$hsl=$this->db->query("SELECT tbl_sejarah.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sejarah ORDER BY tulisan_id DESC");
		return $hsl;
	}

	function get_sejarah_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_sejarah.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_sejarah where tulisan_id='$kode'");
		return $hsl;
	}


	// Struktur Majelis
	function get_all_struktur_majelis(){
		$hsl=$this->db->query("SELECT tbl_struktur_majelis.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_struktur_majelis ORDER BY tulisan_id DESC");
		return $hsl;
	}

	function get_all_data_struktur_majelis() {
		$this->db->select('tulisan_id,tulisan_judul,tulisan_isi,DATE_FORMAT(tulisan_tanggal,"%d/%m/%Y") AS tanggal,tulisan_author,tulisan_gambar,tulisan_views,tulisan_kategori_id,tulisan_kategori_nama');
		$this->db->order_by('tulisan_id', 'DESC');
        $query = $this->db->get('tbl_struktur_majelis');
        return $query->result();
    }

	function update_data_struktur_majelis($id, $data) {
		$this->db->where('tulisan_id', $id);
		$this->db->update('tbl_struktur_majelis', $data);
	}

	function get_category_name_by_id($category_id) {
		$this->db->select('kategori_nama');
		$this->db->where('kategori_id', $category_id);
		$query = $this->db->get('tbl_kategori');
		$result = $query->row();
		return $result->kategori_nama;
	}

	function insert_category($name) {
		$data = array('tulisan_kategori_nama' => $name);
		$this->db->insert('tbl_struktur_majelis', $data);
		return $this->db->insert_id();
	}

	function simpan_struktur_majelis($judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug){
		$hsl=$this->db->query("insert into tbl_struktur_majelis(tulisan_judul,tulisan_isi,tulisan_kategori_id,tulisan_kategori_nama,tulisan_img_slider,tulisan_pengguna_id,tulisan_author,tulisan_gambar,tulisan_slug) values ('$judul','$isi','$kategori_id','$kategori_nama','$imgslider','$user_id','$user_nama','$gambar','$slug')");
		return $hsl;
	}

	function update_struktur_majelis($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug){
		$hsl=$this->db->query("update tbl_struktur_majelis set tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_img_slider='$imgslider',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_gambar='$gambar',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
		return $hsl;
	}
	function update_struktur_majelis_tanpa_img($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$slug){
		$hsl=$this->db->query("update tbl_struktur_majelis set tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_img_slider='$imgslider',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
		return $hsl;
	}

	function hapus_struktur_majelis($kode){
		$hsl=$this->db->query("delete from tbl_struktur_majelis where tulisan_id='$kode'");
		return $hsl;
	}

	function get_struktur_majelis_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_struktur_majelis.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_struktur_majelis where tulisan_id='$kode'");
		return $hsl;
	}


	//Visi & Misi
	function get_all_visi_misi(){
		$hsl=$this->db->query("SELECT tbl_visi_misi.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_visi_misi ORDER BY tulisan_id DESC");
		return $hsl;
	}

	function get_visi_misi_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_visi_misi.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_visi_misi where tulisan_id='$kode'");
		return $hsl;
	}

	function get_all_data_visi_misi() {
		$this->db->select('tulisan_id,tulisan_judul,tulisan_isi,DATE_FORMAT(tulisan_tanggal,"%d/%m/%Y") AS tanggal,tulisan_author,tulisan_gambar,tulisan_views,tulisan_kategori_id,tulisan_kategori_nama');
		$this->db->order_by('tulisan_id', 'DESC');
        $query = $this->db->get('tbl_visi_misi');
        return $query->result();
    }

	function update_data_visi_misi($id, $data) {
		$this->db->where('tulisan_id', $id);
		$this->db->update('tbl_visi_misi', $data);
	}

	function show_komentar_by_tulisan_id($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_tulisan_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}

	function simpan_visi_misi($judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug){
		$hsl=$this->db->query("insert into tbl_visi_misi(tulisan_judul,tulisan_isi,tulisan_kategori_id,tulisan_kategori_nama,tulisan_img_slider,tulisan_pengguna_id,tulisan_author,tulisan_gambar,tulisan_slug) values ('$judul','$isi','$kategori_id','$kategori_nama','$imgslider','$user_id','$user_nama','$gambar','$slug')");
		return $hsl;
	}

	function update_visi_misi($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug){
		$hsl=$this->db->query("update tbl_visi_misi set tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_img_slider='$imgslider',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_gambar='$gambar',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
		return $hsl;
	}

	function update_visi_misi_tanpa_img($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$slug){
		$hsl=$this->db->query("update tbl_visi_misi set tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_img_slider='$imgslider',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
		return $hsl;
	}

	function hapus_visi_misi($kode){
		$hsl=$this->db->query("delete from tbl_visi_misi where tulisan_id='$kode'");
		return $hsl;
	}

}
