<?php
class M_profil extends CI_Model{

	function get_alamat(){
		$hsl=$this->db->query("SELECT * FROM tbl_alamat_gereja");
		return $hsl;
	}

	function get_tlp(){
		$hsl=$this->db->query("SELECT * FROM tbl_tlp_gereja");
		return $hsl;
	}

	function get_email(){
		$hsl=$this->db->query("SELECT * FROM tbl_email_gereja");
		return $hsl;
	}

	function get_identitas(){
		$hsl=$this->db->query("SELECT * FROM tbl_identitas_gereja");
		return $hsl;
	}

	// function get_facebook(){
	// 	$hsl=$this->db->query("SELECT * FROM tbl_sosial_media WHERE sosial_media_name='facebook'");
	// 	return $hsl;
	// }

	// function get_instagram(){
	// 	$hsl=$this->db->query("SELECT * FROM tbl_sosial_media WHERE sosial_media_name='instagram'");
	// 	return $hsl;
	// }

	// function get_youtube(){
	// 	$hsl=$this->db->query("SELECT * FROM tbl_sosial_media WHERE sosial_media_name='youtube'");
	// 	return $hsl;
	// }

	function get_sosial_media(){
		$hsl=$this->db->query("SELECT * FROM tbl_sosial_media WHERE sosial_media_status='1' ORDER BY id_sosial_media ASC");
		return $hsl;
	}

}