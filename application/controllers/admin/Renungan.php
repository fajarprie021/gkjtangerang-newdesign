<?php
class Renungan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_informasi');
		$this->load->model('m_renungan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_menu');
		$this->load->model('m_profil');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['data']=$this->m_renungan->get_all_renungan_admin();
        $x['menu']=$this->m_menu->get_all_menu_admin();
        $this->load->view('admin/v_menu_admin',$x);
        $this->load->view('admin/v_renungan',$x);
	}

    function simpan_renungan(){
		$renungan_judul=strip_tags($this->input->post('xrenungan_judul'));
		$deskripsi=$this->input->post('xdeskripsi');
        $user_nama=$p['pengguna_nama'];
        $this->m_renungan->simpan_renungan($renungan_judul,$deskripsi,$user_nama);
		echo $this->session->set_flashdata('msg','success');
		redirect('admin/renungan');
	}

    function update_renungan(){
		$kode=strip_tags($this->input->post('kode'));
		$renungan_judul=strip_tags($this->input->post('xrenungan_judul'));
		$deskripsi=$this->input->post('xdeskripsi');
        $user_nama=$p['pengguna_nama'];
		$this->m_renungan->update_renungan($kode,$renungan_judul,$deskripsi,$user_nama);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/renungan');
	}

	function hapus_renungan(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_renungan->hapus_renungan($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/renungan');
	}

}
