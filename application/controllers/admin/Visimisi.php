<?php
class Visimisi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_kategori');
		// $this->load->model('m_tulisan');
        $this->load->model('m_tentang');
		$this->load->model('m_pengguna');
		$this->load->model('m_menu');
		$this->load->library('upload');
	}


	function index(){
		// $current_path = basename($_SERVER['REQUEST_URI']);
		// $resultReplace_NamePage = preg_replace("/[^a-zA-Z0-9]/", " ", $current_path);
		// $x['title']=ucwords($resultReplace_NamePage);
		// $x['data']=$this->m_tulisan->get_all_tulisan();
        $x['data']=$this->m_tentang->get_all_visi_misi();
		$x['datatentang']=$this->m_tentang->get_all_data_visi_misi();
		$x['kat']=$this->m_kategori->get_all_kategori();
		$x['kat2']=$this->m_kategori->get_all_kategori2();
		$x['menu']=$this->m_menu->get_all_menu_admin();
		// Setel ID kategori yang dipilih
		$selected_category_id = null;
		if (!empty($x['datatentang']) && is_object($x['datatentang'])) {
			$selected_category_id = $x['datatentang']->tulisan_kategori_id;
		}
		$x['selected_category_id'] = $selected_category_id;
		
		$x['content'] = 'admin/v_visi-misi';
		$this->load->view('admin/layout/main',$x);
	}
	function add_sejarah(){
		$x['kat']=$this->m_kategori->get_all_kategori();
		$x['menu']=$this->m_menu->get_all_menu_admin();
		$x['content']='admin/v_add_sejarah';
		$this->load->view('admin/layout/main',$x);
	}
	/* get_edit handled by common update logic or disabled */
	function simpan_visimisi(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 710;
	                        $config['height']= 460;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
													$judul=strip_tags($this->input->post('xjudul'));
													$isi=$this->input->post('xisi');
													$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
													$trim     = trim($string);
													$slug     = strtolower(str_replace(" ", "-", $trim));
													$kategori_id=strip_tags($this->input->post('xkategori'));
													$data=$this->m_kategori->get_kategori_byid($kategori_id);
													$q=$data->row_array();
													$kategori_nama=$q['kategori_nama'];
													//$imgslider=$this->input->post('ximgslider');
													$imgslider='0';
													$kode=$this->session->userdata('idadmin');
													$user=$this->m_pengguna->get_pengguna_login($kode);
													$p=$user->row_array();
													$user_id=$p['pengguna_id'];
													$user_nama=$p['pengguna_nama'];
													$this->m_tulisan->simpan_tulisan($judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug);
													echo $this->session->set_flashdata('msg','success');
													redirect('admin/visimisi');
											}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/visimisi');
	                }

	            }else{
					// redirect('admin/visimisi');
					$gbr = $this->upload->data();
	                //Compress Image
	                $config['image_library']='gd2';
	                $config['source_image']='./assets/images/'.$gbr['file_name'];
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= FALSE;
	                $config['quality']= '60%';
	                $config['width']= 710;
	                $config['height']= 460;
	                $config['new_image']= './assets/images/'.$gbr['file_name'];
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();

	                $gambar=$gbr['file_name'];
					$judul=strip_tags($this->input->post('xjudul'));
					$isi=$this->input->post('xisi');
					$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
					$trim     = trim($string);
					$slug     = strtolower(str_replace(" ", "-", $trim));
					$kategori_id=strip_tags($this->input->post('xkategori'));
					$data=$this->m_kategori->get_kategori_byid($kategori_id);
					$q=$data->row_array();
					$kategori_nama=$q['kategori_nama'];
					//$imgslider=$this->input->post('ximgslider');
					$imgslider='0';
					$kode=$this->session->userdata('idadmin');
					$user=$this->m_pengguna->get_pengguna_login($kode);
					$p=$user->row_array();
					$user_id=$p['pengguna_id'];
					$user_nama=$p['pengguna_nama'];
					// $this->m_tulisan->simpan_tulisan($judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug);
					$this->m_tentang->simpan_visi_misi($judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/visimisi');
				}

	}

	function update_visimisi(){

	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 710;
	                        $config['height']= 460;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $tulisan_id=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
													$isi=$this->input->post('xisi');
													$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
													$trim     = trim($string);
													// $slug     = strtolower(str_replace(" ", "-", $trim));
													$slug     = 'visi-misi';
													$kategori_id=strip_tags($this->input->post('xkategori'));
													$data=$this->m_kategori->get_kategori_byid($kategori_id);
													$q=$data->row_array();
													$kategori_nama=$q['kategori_nama'];
													//$imgslider=$this->input->post('ximgslider');
													$imgslider='0';
													$kode=$this->session->userdata('idadmin');
													$user=$this->m_pengguna->get_pengguna_login($kode);
													$p=$user->row_array();
													$user_id=$p['pengguna_id'];
													$xauthor=strip_tags($this->input->post('xauthor'));
													$user_nama=!empty($xauthor) ? $xauthor : $p['pengguna_nama'];
													// $this->m_tulisan->update_tulisan($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug);
													$this->m_tentang->update_visi_misi($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$gambar,$slug);
													echo $this->session->set_flashdata('msg','info');
													redirect('admin/visimisi');

	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/pengguna');
	                }

	            }else{
									$tulisan_id=$this->input->post('kode');
									$judul=strip_tags($this->input->post('xjudul'));
									$isi=$this->input->post('xisi');
									$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
									$trim     = trim($string);
									// $slug     = strtolower(str_replace(" ", "-", $trim));
									$slug     = 'visi-misi';
									$kategori_id=strip_tags($this->input->post('xkategori'));
									$data=$this->m_kategori->get_kategori_byid($kategori_id);
									$q=$data->row_array();
									$kategori_nama=$q['kategori_nama'];
									//$imgslider=$this->input->post('ximgslider');
									$imgslider='0';
									$kode=$this->session->userdata('idadmin');
									$user=$this->m_pengguna->get_pengguna_login($kode);
									$p=$user->row_array();
									$user_id=$p['pengguna_id'];
									$xauthor=strip_tags($this->input->post('xauthor'));
									$user_nama=!empty($xauthor) ? $xauthor : $p['pengguna_nama'];
									// $this->m_tulisan->update_tulisan_tanpa_img($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$slug);
									$this->m_tentang->update_visi_misi_tanpa_img($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$user_id,$user_nama,$slug);
									echo $this->session->set_flashdata('msg','info');
									redirect('admin/visimisi');
	            }

	}

	/* LEGACY AJAX CODE DISABLED
	function get_category_name() {
		$category_id = $this->input->post('category_id');
		$category_name = $this->m_tentang->get_category_name_by_id($category_id);
		echo $category_name;
	}

	function update() {
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$category_id = $this->input->post('category_id');
		// $category_name = $this->input->post('category_name');
		// $new_category_id = $this->input->post('new_category_id');
    	// $new_category_name = $this->input->post('new_category_name');
		$new_category_name = $this->m_tentang->get_category_name_by_id($category_id);

		// // Check if new category name is provided
		// if (!empty($category_name)) {
		// 	// Insert new category and get the new category ID
		// 	$new_category_id = $this->m_tentang->insert_category($category_name);
		// } else {
		// 	$new_category_id = $category_id; // Use the existing category ID
		// }

		// // Check if new category name is provided
		// if (!empty($new_category_name)) {
		// 	// Insert new category and get the new category ID
		// 	$new_category_id = $this->m_tentang->insert_category($new_category_name);
		// }

		// // Jika new_category_id tidak kosong, gunakan new_category_id
		// // Jika tidak, gunakan category_id yang ada
		// $category_id_to_use = !empty($new_category_id) ? $new_category_id : $category_id;

		// // Jika pengguna memasukkan nama kategori baru, tambahkan kategori baru ke dalam tabel kategori
		// if (!empty($new_category_name)) {
		// 	$new_category_id = $this->m_tentang->insert_category($new_category_name);
		// 	$category_id_to_use = $new_category_id;
		// } else {
		// 	$category_id_to_use = $category_id; // Gunakan ID kategori yang dipilih dari dropdown
		// }
	
		$data = array(
			'tulisan_judul' => $title,
			'tulisan_isi' => $description,
			'tulisan_kategori_id' => $category_id,
			// 'tulisan_kategori_id' => $new_category_id
			// 'tulisan_kategori_id' => $category_id_to_use,
			'tulisan_kategori_nama' => $new_category_name
		);
	
		$this->m_tentang->update_data_visi_misi($id, $data);
	
		echo json_encode(array("status" => TRUE));
	}
	*/

	function hapus_visimisi(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_tentang->hapus_visi_misi($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/visimisi');
	}

}
