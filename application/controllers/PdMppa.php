<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdMppa extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_menu');
        $this->load->model('m_profil');
        $this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
    }

    public function index() {
        $x['menu'] = $this->m_menu->get_all_menu();
        $x['alamat'] = $this->m_profil->get_alamat();
        $x['tlp'] = $this->m_profil->get_tlp();
        $x['email'] = $this->m_profil->get_email();
        $x['identitas'] = $this->m_profil->get_identitas();

        $x['page_title'] = 'PD MPPA';
        $x['content'] = 'projects/pd_mppa';

        $this->load->view('layout/main', $x);
    }
}
