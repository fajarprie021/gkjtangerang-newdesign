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

	function update_identitas($id, $nama, $website){
		$this->db->query("UPDATE tbl_identitas_gereja SET nama_identitas='$nama', website_identitas='$website' WHERE id_identitas='$id'");
	}

	function update_alamat($id, $nama, $alamat){
		$this->db->query("UPDATE tbl_alamat_gereja SET nama_gereja='$nama', alamat_gereja='$alamat' WHERE id_alamat='$id'");
	}

	function update_tlp($id, $tlp){
		$this->db->query("UPDATE tbl_tlp_gereja SET no_tlp='$tlp' WHERE id_tlp='$id'");
	}

	function update_email($id, $email){
		$this->db->query("UPDATE tbl_email_gereja SET alamat_email='$email' WHERE id_email='$id'");
	}

	function update_sosmed($id, $href){
		$this->db->query("UPDATE tbl_sosial_media SET sosial_media_href='$href' WHERE id_sosial_media='$id'");
	}

}