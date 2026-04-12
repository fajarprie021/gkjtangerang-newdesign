<?php
class Contact extends CI_Controller{
  function __construct(){
		parent::__construct();
      $this->load->model('m_kontak');
      $this->load->model('m_pengunjung');
      $this->load->model('m_menu');
      $this->load->model('m_profil');
  		$this->m_pengunjung->count_visitor();
	}
	function index(){
      $x['menu']=$this->m_menu->get_all_menu();
      $x['alamat']=$this->m_profil->get_alamat();
      $x['tlp']=$this->m_profil->get_tlp();
      $x['email']=$this->m_profil->get_email();
      $x['identitas']=$this->m_profil->get_identitas();
      // $x['facebook']=$this->m_profil->get_facebook();
      // $x['instagram']=$this->m_profil->get_instagram();
      // $x['youtube']=$this->m_profil->get_youtube();
      $x['sosialmedia']=$this->m_profil->get_sosial_media();
		  // $this->load->view('depan/v_contact');
      $this->load->view('depan/v_menu',$x);
      $this->load->view('depan/v_contact',$x);
      $this->load->view('depan/v_footer',$x);
	}

  function kirim_pesan(){
      $nama=htmlspecialchars($this->input->post('xnama',TRUE),ENT_QUOTES);
      $email=htmlspecialchars($this->input->post('xemail',TRUE),ENT_QUOTES);
      $kontak=htmlspecialchars($this->input->post('xphone',TRUE),ENT_QUOTES);
      $pesan=htmlspecialchars($this->input->post('xmessage',TRUE),ENT_QUOTES);
      $this->m_kontak->kirim_pesan($nama,$email,$kontak,$pesan);
      echo $this->session->set_flashdata('msg','<p><strong> NB: </strong> Terima Kasih Telah Menghubungi Kami.</p>');
      redirect('contact');
  }
}
