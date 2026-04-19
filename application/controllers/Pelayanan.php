<?php
class Pelayanan extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_tulisan');
        $this->load->model('m_menu');
        $this->load->model('m_profil');
        $this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
    }

    function details($slug) {
        // Mapping URL slug to database category name
        $mapping = [
            'baptisan-sidi' => 'Baptisan & Sidi',
            'pernikahan-kudus' => 'Pernikahan Kudus',
            'konseling-pastoral' => 'Konseling Pastoral',
            'pelayanan-kedukaan' => 'Pelayanan Kedukaan',
            'pelayanan-kesehatan' => 'Pelayanan Kesehatan'
        ];

        // Safely handle unknown slugs
        if (!isset($mapping[$slug])) {
            redirect(base_url());
        }

        $kategori_nama = $mapping[$slug];
        
        // Fetch posts for this category
        $x['data'] = $this->m_tulisan->get_tulisan_by_kategori_nama($kategori_nama);
        $x['category'] = $kategori_nama;
        $x['slug'] = $slug;
        
        // Common Metadata for layout/main
        $x['menu'] = $this->m_menu->get_all_menu();
        $x['alamat'] = $this->m_profil->get_alamat();
        $x['tlp'] = $this->m_profil->get_tlp();
        $x['email'] = $this->m_profil->get_email();
        $x['identitas'] = $this->m_profil->get_identitas();
        
        $x['content'] = 'pelayanan/detail';
        $this->load->view('layout/main', $x);
    }
}
