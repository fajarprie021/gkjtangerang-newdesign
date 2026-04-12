<?php
class M_menu extends CI_Model{

	function get_all_menu(){
		$hsl=$this->db->query("SELECT * FROM tbl_menu WHERE menu_status='1' ORDER BY id_menu ASC");
		return $hsl;
	}

	// function get_submenus($id_menu) {
    //     return $this->db->get_where('tbl_sub_menu', array('id_menu' => $id_menu))->result_array();
    // }

    function get_submenus($id_menu) {
        return $this->db->get_where('tbl_sub_menu', array('id_menu' => $id_menu))->result();
    }

    // function get_submenus($id_menu) {
    //     $hsl=$this->db->query("SELECT * FROM tbl_sub_menu WHERE id_menu = $id_menu AND sub_menu_status='1' ORDER BY id_menu ASC");
	// 	return $hsl;
    // }

    function get_all_menu_admin(){
		$hsl=$this->db->query("SELECT * FROM tbl_menu_admin WHERE menu_status='1' ORDER BY id_menu ASC");
		return $hsl;
	}

    function get_submenus_admin($id_menu) {
        return $this->db->get_where('tbl_sub_menu_admin', array('id_menu' => $id_menu))->result();
    }

}