<?php
class M_renungan extends CI_Model{

	function get_all_renungan(){
		$hsl=$this->db->query("SELECT renungan_id,renungan_judul,renungan_deskripsi,DATE_FORMAT(renungan_tanggal,'%d/%m/%Y') AS tanggal,renungan_author FROM tbl_renungan ORDER BY renungan_id DESC");
		return $hsl;
	}
	function simpan_renungan($judul,$deskripsi){
		$author=$this->session->userdata('nama');
		$hsl=$this->db->query("INSERT INTO tbl_renungan(renungan_judul,renungan_deskripsi,renungan_author,renungan_tanggal) VALUES ('$judul','$deskripsi','$author',NOW())");
		return $hsl;
	}
	function update_renungan($kode,$judul,$deskripsi){
		$author=$this->session->userdata('nama');
		$hsl=$this->db->query("UPDATE tbl_renungan SET renungan_judul='$judul',renungan_deskripsi='$deskripsi',renungan_author='$author' where renungan_id='$kode'");
		return $hsl;
	}
	function hapus_renungan($kode){
		$hsl=$this->db->query("DELETE FROM tbl_renungan WHERE renungan_id='$kode'");
		return $hsl;
	}

	//Front-end
	function get_renungan_home(){
		$hsl=$this->db->query("SELECT renungan_id,renungan_judul,renungan_deskripsi,DATE_FORMAT(renungan_tanggal,'%d/%m/%Y') AS tanggal,renungan_author FROM tbl_renungan ORDER BY renungan_id DESC limit 3");
		return $hsl;
	}

	function renungan(){
		$hsl=$this->db->query("SELECT renungan_id,renungan_judul,renungan_deskripsi,DATE_FORMAT(renungan_tanggal,'%d/%m/%Y') AS tanggal,renungan_author FROM tbl_renungan ORDER BY renungan_id DESC");
		return $hsl;
	}
	function renungan_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT renungan_id,renungan_judul,renungan_deskripsi,renungan_tanggal,DATE_FORMAT(renungan_tanggal,'%d/%m/%Y') AS tanggal,renungan_author FROM tbl_renungan ORDER BY renungan_id DESC limit $offset,$limit");
		return $hsl;
	}

	function get_all_renungan_admin(){
		$hsl=$this->db->query("SELECT tbl_renungan.*,DATE_FORMAT(renungan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_renungan ORDER BY renungan_id DESC");
		return $hsl;
	}

	function get_renungan_by_kode($kode)
	{
		$hsl = $this->db->query("SELECT tbl_renungan.*,DATE_FORMAT(renungan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_renungan where renungan_id='$kode'");
		return $hsl;
	}


}
