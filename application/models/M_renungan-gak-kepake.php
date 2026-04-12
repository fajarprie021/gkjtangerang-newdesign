<?php
class M_renungan extends CI_Model{

	function get_all_renungan(){
		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author FROM tbl_pengumuman ORDER BY pengumuman_id DESC");
		return $hsl;
	}
	function simpan_renungan($judul,$deskripsi){
		$author=$this->session->userdata('nama');
		$hsl=$this->db->query("INSERT INTO tbl_pengumuman(pengumuman_judul,pengumuman_deskripsi,pengumuman_author) VALUES ('$judul','$deskripsi','$author')");
		return $hsl;
	}
	function update_renungan($kode,$judul,$deskripsi){
		$author=$this->session->userdata('nama');
		$hsl=$this->db->query("UPDATE tbl_pengumuman SET pengumuman_judul='$judul',pengumuman_deskripsi='$deskripsi',pengumuman_author='$author' where pengumuman_id='$kode'");
		return $hsl;
	}
	function hapus_renungan($kode){
		$hsl=$this->db->query("DELETE FROM tbl_pengumuman WHERE pengumuman_id='$kode'");
		return $hsl;
	}

	//Front-end
	function get_renungan_home(){
		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author FROM tbl_pengumuman ORDER BY pengumuman_id DESC limit 3");
		return $hsl;
	}

	function renungan(){
		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author FROM tbl_pengumuman ORDER BY pengumuman_id DESC");
		return $hsl;
	}
	function renungan_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,pengumuman_tanggal,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author FROM tbl_pengumuman ORDER BY pengumuman_id DESC limit $offset,$limit");
		return $hsl;
	}


}
