<?php

class adminweb extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index() {
		/*$data['logo'] = $this->admin_model->GetLogo();*/
		$this->load->view('adminweb/login');
	}

	public function login() {

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run()==FALSE) {

		/*$data['logo'] = $this->admin_model->GetLogo();*/
		$this->load->view('adminweb/login');

		}
		else {

			$username= $this->input->post('username');
			$password = md5($this->input->post('password'));

			$this->admin_model->CekAdminLogin($username,$password);

		}
	}

	public function registration() {
		$data['kode_admin'] = $this->admin_model->GetMaxKodeAdmin();
		$this->load->view('adminweb/registration',$data);
	}

	public function registration_simpan() {

			$this->form_validation->set_rules('kode_admin', 'Kode Admin', 'required');
			$this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			
			

			if ($this->form_validation->run() == FALSE)
			{
				$data['data_admin'] = $this->admin_model->Getadmin();
				$this->template->load('adminweb/registration', $data);
			}
			else {

						$in_data['kode_admin'] 		= $this->input->post('kode_admin');
						$in_data['nama_admin'] 		= $this->input->post('nama_admin');
						$in_data['username'] 		= $this->input->post('username');
						$in_data['password'] 		= md5($this->input->post('password'));
						$in_data['email'] 			= $this->input->post('email');
						$in_data['phone'] 			= $this->input->post('phone');
						$in_data['alamat'] 			= $this->input->post('alamat');
						$this->db->insert("tbl_admin",$in_data);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin Baru Berhasil Terdaftar, Silahkan Masuk</div>');
					redirect('adminweb/login/');
				
			}

	}

	public function profile() {
		if($this->session->userdata("logged_in")!=="") {

			
			$username = $this->session->userdata("username");
			/*$password = $this->session->userdata("password");*/
			$data['data_admin'] = $this->admin_model->GetAdmins($username);
				
			$this->load->view('adminweb/admin/profile',$data);

		}
		else {
			redirect('web/index');
		}
	}

	public function profile_update() {
		$id['id_admin'] = $this->input->post("id_admin");

		if ($this->input->post('password')!=="") {

			$in_data['nama_admin'] = $this->input->post('nama_admin');
			$in_data['username'] = $this->input->post('username');
			$in_data['password'] = $this->input->post('password');
			$in_data['email'] = $this->input->post('email');
			$in_data['phone'] = $this->input->post('phone');
			$in_data['alamat'] = $this->input->post('alamat');

		}
		else {
			$in_data['nama_admin'] = $this->input->post('nama_admin');
			$in_data['username'] = $this->input->post('username');
			$in_data['email'] = $this->input->post('email');
			$in_data['phone'] = $this->input->post('phone');
			$in_data['alamat'] = $this->input->post('alamat');
		}
								
		$this->db->update("tbl_admin",$in_data,$id);
				
		$this->session->set_flashdata('update','<div class="alert alert-success" role="alert">Profile berhasil diupdate</div>');
		redirect('adminweb/home');
		
	}

	public function pass() {
		if($this->session->userdata("logged_in")!=="") {

			
			$username = $this->session->userdata("username");
			/*$password = $this->session->userdata("password");*/
			$data['data_admin'] = $this->admin_model->GetAdmins($username);
				
			$this->load->view('adminweb/admin/pass',$data);

		}
		else {
			redirect('web/index');
		}
	}

	public function ubahpass(){

		if ($this->session->userdata("logged_in")!=="") {

			if ($_SERVER['REQUEST_METHOD']=="POST") {

				$this->form_validation->set_rules('password_lama','Password Lama','trim|required');
				$this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required');
				$this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'trim|required');

				if ($this->form_validation->run()==FALSE) {

					$username = $this->session->userdata("username");
					$data['data_admin'] = $this->admin_model->GetAdmins($username);
				
					$this->load->view('adminweb/admin/pass',$data);

				}
				else {

					$id['id_admin'] = $this->input->post("id_admin");
					$id['username'] = $this->input->post("username");


				
				$password_lama = md5($this->input->post("password_lama"));
				$password_baru = md5($this->input->post("password_baru"));
				$ulangi_password = md5($this->input->post("ulangi_password"));
				
				
				$cek['username'] 	= $id['username'];
				$cek['password'] 	= $password_lama;
				$ceklogin = $this->db->get_where('tbl_admin', $cek);
				if(count($ceklogin->result())>0)
				{
					if($password_baru!=$ulangi_password)
					{
						$this->session->set_flashdata('simpan_akun', '<div class="alert alert-danger" role="alert">Password baru tidak sama</div>');
						redirect("adminweb/pass");
					}
					else
					{
						
						$up['password'] = $password_baru;
						$this->db->update("tbl_admin",$up,$id);
						
						$this->session->set_flashdata('simpan_akun', '<div class="alert alert-success" role="alert">Password berhasil diperbarui</div>');
						redirect("adminweb/logout");
					}
				}
				else
				{
					$this->session->set_flashdata('simpan_akun', '<div class="alert alert-danger" role="alert">Password lama tidak cocok</div>');
					redirect("adminweb/pass");
				}

				}

			}
			else {

			$username = $this->session->userdata("username");
			/*$password = $this->session->userdata("password");*/
			$data['data_admin'] = $this->admin_model->GetAdmins($username);
				
			$this->load->view('adminweb/admin/pass',$data);
		}

		}
		else {
			redirect('adminweb/home');
		}		
	}

	public function home() {

		if($this->session->userdata("logged_in")!=="") {
			$this->template->load('template','adminweb/home');
		}
		else{
			redirect('adminweb');

		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect("adminweb");
	} 

	//Awal Seo
	public function seo() {
		if ($this->session->userdata("logged_in")!=="") {

			$query = $this->admin_model->GetSeo();
			foreach ($query->result_array() as $tampil) {
				$data['id_seo']=$tampil['id_seo'];
				$data['tittle']=$tampil['tittle'];
				$data['keyword']=$tampil['keyword'];
				$data['description']=$tampil['description'];
			}

			$this->template->load('template','adminweb/seo/index',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function seo_simpan() {
		$id_seo = $this->input->post('id_seo');
		$tittle = $this->input->post('tittle');
		$keyword = $this->input->post('keyword');
		$description = $this->input->post('description');

		$this->admin_model->UpdateSeo($id_seo,$tittle,$keyword,$description);
	}
	//Akhir Seo

	//Awal Galeri
	public function galeri() {

		$data['data_galeri'] = $this->admin_model->GetGaleri();
		$this->template->load('template','adminweb/galeri/index',$data);

	}

	public function galeri_tambah() {
		$data['data_kategorigaleri'] = $this->admin_model->Getkategorigaleri();
		$this->template->load('template','adminweb/galeri/add',$data);
	}

	public function galeri_simpan() {

			
			$this->form_validation->set_rules('kategorigaleri_id', 'Album', 'required');
			$this->form_validation->set_rules('nama_galeri', 'Nama Gallery', 'required');
			
		
			

			if ($this->form_validation->run() == FALSE)
			{
				$data['data_kategorigaleri']= $this->admin_model->Getkategorigaleri();
				$this->template->load('template','adminweb/galeri/add',$data);
			}
			else {

				if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['nama_galeri'] = $this->input->post('nama_galeri');
						$in_data['kategorigaleri_id'] = $this->input->post('kategorigaleri');
						$this->db->insert("tbl_galeri",$in_data);

					$this->session->set_flashdata('berhasil','Gallery Berhasil Disimpan');
					redirect("adminweb/galeri");
				}
				else
				{
					$config['upload_path'] = './images/galeri/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/galeri/".$data['file_name'] ;
						$destination_thumb	= "./images/galeri/thumb/" ;
						$destination_medium	= "./images/galeri/medium/" ;
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 270 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
			 			// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['nama_galeri'] = $this->input->post('nama_galeri');
						$in_data['gambar'] = $data['file_name'];
						$in_data['kategorigaleri_id'] = $this->input->post('kategorigaleri_id');
						
						
						$this->db->insert("tbl_galeri",$in_data);

				
						
						$this->session->set_flashdata('berhasil','Gallery Berhasil Disimpan');
						redirect("adminweb/galeri");
						
					}
					else 
					{
						$this->template->load('template','adminweb/galeri/error');
					}
				}
				
			}

	}

	public function galeri_delete() {
		$id_galeri = $this->uri->segment(3);
		$this->admin_model->DeleteGaleri($id_galeri);

		$this->session->set_flashdata('message','Gallery Berhasil Dihapus');
		redirect('adminweb/galeri');

	}

	public function galeri_edit() {
		$id_galeri = $this->uri->segment(3);
		$query = $this->admin_model->GetGaleriEdit($id_galeri);
		foreach ($query->result_array() as $tampil) {
			$data['id_galeri'] = $tampil['id_galeri'];
			$data['nama_galeri'] = $tampil['nama_galeri'];
			$data['gambar'] = $tampil['gambar'];
			$data['kategorigaleri_id'] = $tampil['kategorigaleri_id'];
		}
		$data['data_kategorigaleri'] = $this->admin_model->Getkategorigaleri();
		$this->template->load('template','adminweb/galeri/edit',$data);
	}

	public function galeri_update() {
		$id['id_galeri'] = $this->input->post("id_galeri");

		if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['nama_galeri'] = $this->input->post('nama_galeri');
						$in_data['kategorigaleri_id'] = $this->input->post('kategorigaleri_id');
						
						$this->db->update("tbl_galeri",$in_data,$id);

					$this->session->set_flashdata('update','Gallery Berhasil Diupdate');
					redirect("adminweb/galeri");
				}
				else
				{
					$config['upload_path'] = './images/galeri/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/galeri/".$data['file_name'] ;
						$destination_thumb	= "./images/galeri/thumb/" ;
						$destination_medium	= "./images/galeri/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 270 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['nama_galeri'] = $this->input->post('nama_galeri');
						$in_data['gambar'] = $data['file_name'];
						$in_data['kategorigaleri_id'] = $this->input->post('kategorigaleri');
						
						$this->db->update("tbl_galeri",$in_data,$id);
				
						
						$this->session->set_flashdata('update','Gallery Berhasil Diupdate');
						redirect("adminweb/galeri");
						
					}
					else 
					{
						$this->template->load('template','adminweb/galeri/error');
					}
				}

	}
	//Akhir Galeri

	//Awal Logo
	public function logo () {
		$query = $this->admin_model->GetLogo();
		foreach ($query->result_array() as $tampil) {
			$data['id_logo']=$tampil['id_logo'];
			$data['gambar']=$tampil['gambar'];
		}
		$this->template->load('template','adminweb/logo/index', $data);

	}

	 public function logo_simpan()
   {
		if($this->session->userdata("logged_in")!=="") {
			$id['id_logo'] = $this->input->post("id_logo");
			$id_logo = $this->input->post("id_logo");
			

				if(empty($_FILES['userfile']['name']))
				{
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logo Berhasil di Update</div>');
					redirect("adminweb/logo");
				}
				else
				{
					$config['upload_path'] = './images/logo/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '500';
					$config['max_height']  	= '250';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/logo/".$data['file_name'] ;
						$destination_thumb	= "./images/logo/thumb/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_thumb    = 640 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['gambar'] = $data['file_name'];
						$this->db->update("tbl_logo",$in_data,$id);
				
						
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logo Berhasil di Update</div>');
						redirect("adminweb/logo");
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			
		}
		else
		{
			redirect("adminweb");
		}
   }
	//Akhir Logo

   //Awal kontak
	public function kontak() {
		if($this->session->userdata("logged_in")!=="") {

			$query=$this->admin_model->Getkontak();
			foreach ($query->result_array() as $tampil) {
				$data["id_kontak"]=$tampil["id_kontak"];
				$data["alamat"]=$tampil["alamat"];
				$data["phone"]=$tampil["phone"];
				$data["email"]=$tampil["email"];
			}

			$this->template->load('template','adminweb/kontak/index',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function kontak_simpan() {
		$id_kontak =$this->input->post("id_kontak");
		$alamat =$this->input->post("alamat");
		$phone =$this->input->post("phone");
		$email =$this->input->post("email");

		$this->admin_model->Simpankontak($id_kontak,$alamat,$phone,$email);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kontak Berhasil di Update</div>');
						redirect("adminweb/kontak");
	}
	//Akhir kontak

	//Awal Sosial Media 
   public function sosial_media() {
   	if($this->session->userdata("logged_in")!=="") {
		   	$query = $this->admin_model->GetSosialMedia();
		   	foreach ($query->result_array() as $tampil) {
		   		$data['id_sosial_media'] = $tampil['id_sosial_media'];
		   		$data['tw'] = $tampil['tw'];
		   		$data['fb'] = $tampil['fb'];
		   		$data['gp'] = $tampil['gp'];
		   	}
   		$this->template->load('template','adminweb/sosial_media/index',$data);
	}
	else {
		redirect("adminweb");
	}
   }

   public function sosial_media_simpan() {
		$id_sosial_media =$this->input->post("id_sosial_media");
		$tw =$this->input->post("tw");
		$fb =$this->input->post("fb");
		$gp =$this->input->post("gp");
		

		$this->admin_model->SimpanSosialMedia($id_sosial_media,$tw,$fb,$gp);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sosial Media Berhasil di Update</div>');
		redirect('adminweb/sosial_media');
	}
   //Akhir Sosial Media

	//Awal Kategori
	public function kategori() {

		$data['data_kategori']= $this->admin_model->GetKategori();
		$this->template->load('template','adminweb/kategori/index',$data);
	}

	public function kategori_simpan() {
		$nama_kategori = $this->input->post("nama_kategori");
		$cek = $this->admin_model->KategoriSama($nama_kategori);

		if ($cek->num_rows()>0) {
			$success = "1";
		}
		else {
			$this->session->set_flashdata('berhasil','Kategori Berhasil Disimpan');
			$this->admin_model->KategoriSimpan($nama_kategori);
			$success="0";
		}

		echo $success;
	}

	public function kategori_edit() {
		$id_kategori = $this->uri->segment(3);
		$query = $this->admin_model->GetEditKategori($id_kategori);
		foreach ($query->result_array() as $tampil) {
			$data['id_kategori'] = $tampil['id_kategori'];
			$data['nama_kategori'] = $tampil['nama_kategori'];
		}

		$this->template->load('template','adminweb/kategori/edit',$data);
	}

	public function kategori_delete() {
		$id_kategori = $this->uri->segment(3);
		$this->admin_model->DeleteKategori($id_kategori);

		$this->session->set_flashdata('message','Kategori Berhasil Dihapus');
		redirect("adminweb/kategori");
	}

	public function kategori_update() {
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');

		$cek = $this->admin_model->KategoriSama($nama_kategori);

		if ($cek->num_rows()>0) {
			$success = "1";
		}
		else {
			$this->session->set_flashdata('berhasil','Kategori Berhasil Disimpan');
			$this->admin_model->KategoriUpdate($id_kategori,$nama_kategori);
			$success="0";
		}

		echo $success;
	}
	//Akhir kategori

	//Awal Brand
	public function brand() {

		$data['data_brand']= $this->admin_model->GetBrand();
		$this->template->load('template','adminweb/brand/index',$data);
	}

	public function brand_simpan() {
		$nama_brand = $this->input->post("nama_brand");
		$cek = $this->admin_model->BrandSama($nama_brand);

		if ($cek->num_rows()>0) {
			$success = "1";
		}
		else {
			$this->session->set_flashdata('berhasil','Brand Berhasil Disimpan');
			$this->admin_model->BrandSimpan($nama_brand);
			$success="0";
		}

		echo $success;
	}

	public function brand_edit() {
		$id_brand = $this->uri->segment(3);
		$query = $this->admin_model->GetEditBrand($id_brand);
		foreach ($query->result_array() as $tampil) {
			$data['id_brand'] = $tampil['id_brand'];
			$data['nama_brand'] = $tampil['nama_brand'];
		}

		$this->template->load('template','adminweb/brand/edit',$data);
	}

	public function brand_delete() {
		$id_brand = $this->uri->segment(3);
		$this->admin_model->DeleteBrand($id_brand);

		$this->session->set_flashdata('message','Brand Berhasil Dihapus');
		redirect("adminweb/brand");
	}

	public function brand_update() {
		$id_brand = $this->input->post('id_brand');
		$nama_brand = $this->input->post('nama_brand');

		$cek = $this->admin_model->BrandSama($nama_brand);

		if ($cek->num_rows()>0) {
			$success = "1";
		}
		else {
			$this->session->set_flashdata('berhasil','Brand Berhasil Disimpan');
			$this->admin_model->BrandUpdate($id_brand,$nama_brand);
			$success="0";
		}

		echo $success;
	}
	//Akhir kategori

	//Awal Kota
	public function kota() {

		$data['data_kota']= $this->admin_model->GetKota();
		$this->template->load('template','adminweb/kota/index',$data);
	}

	public function kota_simpan() {
		$nama_kota = $this->input->post("nama_kota");
		$cek = $this->admin_model->KotaSama($nama_kota);

		if ($cek->num_rows()>0) {
			$success = "1";
		}
		else {
			$this->session->set_flashdata('berhasil','Kota Berhasil Disimpan');
			$this->admin_model->KotaSimpan($nama_kota);
			$success="0";
		}

		echo $success;
	}

	public function kota_edit() {
		$id_kota = $this->uri->segment(3);
		$query = $this->admin_model->GetEditKota($id_kota);
		foreach ($query->result_array() as $tampil) {
			$data['id_kota'] = $tampil['id_kota'];
			$data['nama_kota'] = $tampil['nama_kota'];
		}

		$this->template->load('template','adminweb/kota/edit',$data);
	}

	public function kota_delete() {
		$id_kota = $this->uri->segment(3);
		$this->admin_model->DeleteKota($id_kota);

		$this->session->set_flashdata('message','Kota Berhasil Dihapus');
		redirect("adminweb/kota");
	}

	public function kota_update() {
		$id_kota = $this->input->post('id_kota');
		$nama_kota = $this->input->post('nama_kota');

		$cek = $this->admin_model->KotaSama($nama_kota);

		if ($cek->num_rows()>0) {
			$success = "1";
		}
		else {
			$this->session->set_flashdata('berhasil','Kota Berhasil Disimpan');
			$this->admin_model->KotaUpdate($id_kota,$nama_kota);
			$success="0";
		}

		echo $success;
	}
	//Akhir Kota

	//Awal Jam
	public function jam() {

		$data['data_jam'] = $this->admin_model->GetJam();
		$this->template->load('template','adminweb/jam/index',$data);

	}

	public function jam_tambah() {
		
		$this->template->load('template','adminweb/jam/add');
	}

	public function jam_simpan() {
			$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
			$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');	

			if ($this->form_validation->run() == FALSE)
			{
				$data['data_jam'] = $this->admin_model->GetJam();
				$this->template->load('template','adminweb/jam/index',$data);
			}
			else {

						$data['jam_mulai'] 		= $this->input->post('jam_mulai');
						$data['jam_selesai'] 		= $this->input->post('jam_selesai');
						$this->db->insert("tbl_jam",$data);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jam Baru Berhasil di Tambah</div>');
					redirect('adminweb/jam/');
				
			}
	}

	public function jam_delete() {
		$id_jam = $this->uri->segment(3);
		$this->admin_model->DeleteJam($id_jam);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jam Berhasil di Hapus</div>');
		redirect('adminweb/jam');

	}

	public function jam_edit() {
		$id_jam = $this->uri->segment(3);
		$query = $this->admin_model->GetJamEdit($id_jam);
		foreach ($query->result_array() as $tampil) {
			$data['id_jam'] = $tampil['id_jam'];
			$data['jam_mulai'] = $tampil['jam_mulai'];
			$data['jam_selesai'] = $tampil['jam_selesai'];
		}
		$this->template->load('template','adminweb/jam/edit',$data);
	}

	public function jam_update() {
		$id['id_jam'] = $this->input->post("id_jam");

			$in_data['jam_mulai'] = $this->input->post('jam_mulai');
			$in_data['jam_selesai'] = $this->input->post('jam_selesai');
								
		$this->db->update("tbl_jam",$in_data,$id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jam Berhasil di Update</div>');
		redirect("adminweb/jam");
		
	}

	//Akhir Jam

	//Awal Bank
	public function bank() {

		$data['data_bank'] = $this->admin_model->GetBank();
		$this->template->load('template','adminweb/bank/index',$data);

	}

	public function bank_tambah() {
		
		$this->template->load('template','adminweb/bank/add');
	}

	public function bank_simpan() {

			
			$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
			$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
			$this->form_validation->set_rules('no_rekening', 'No Rekening', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				
				$this->template->load('template','adminweb/bank/add');
			}
			else {

				if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['nama_bank'] = $this->input->post('nama_bank');
						$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
						$in_data['no_rekening'] = $this->input->post('no_rekening');
						$this->db->insert("tbl_bank",$in_data);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bank Berhasil di Simpan</div>');
					redirect("adminweb/bank");
				}
				else
				{
					$config['upload_path'] = './images/bank/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/bank/".$data['file_name'] ;
						$destination_thumb	= "./images/bank/thumb/" ;
						$destination_medium	= "./images/bank/medium/" ;
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 270 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
			 			// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['nama_bank'] = $this->input->post('nama_bank');
						$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
						$in_data['no_rekening'] = $this->input->post('no_rekening');
						$in_data['gambar'] = $data['file_name'];
						
						
						$this->db->insert("tbl_bank",$in_data);

				
						
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bank Berhasil di Simpan</div>');
						redirect("adminweb/bank");
						
					}
					else 
					{
						$this->template->load('template','adminweb/bank/error');
					}
				}
				
			}

	}

	public function bank_delete() {
		$id_bank = $this->uri->segment(3);
		$this->admin_model->DeleteBank($id_bank);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bank Berhasil di Hapus</div>');
		redirect('adminweb/bank');

	}

	public function bank_edit() {
		$id_bank = $this->uri->segment(3);
		$query = $this->admin_model->GetBankEdit($id_bank);
		foreach ($query->result_array() as $tampil) {
			$data['id_bank'] = $tampil['id_bank'];
			$data['nama_bank'] = $tampil['nama_bank'];
			$data['nama_pemilik'] = $tampil['nama_pemilik'];
			$data['no_rekening'] = $tampil['no_rekening'];
			$data['gambar'] = $tampil['gambar'];
		}
		$this->template->load('template','adminweb/bank/edit',$data);
	}

	public function bank_update() {
		$id['id_bank'] = $this->input->post("id_bank");

		if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['nama_bank'] = $this->input->post('nama_bank');
						$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
						$in_data['no_rekening'] = $this->input->post('no_rekening');
						
						$this->db->update("tbl_bank",$in_data,$id);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bank Berhasil di Update</div>');
					redirect("adminweb/bank");
				}
				else
				{
					$config['upload_path'] = './images/bank/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '260';
					$config['max_height']  	= '100';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/bank/".$data['file_name'] ;
						$destination_thumb	= "./images/bank/thumb/" ;
						$destination_medium	= "./images/bank/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 90 ;
						$limit_thumb    = 60 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['nama_bank'] = $this->input->post('nama_bank');
						$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
						$in_data['no_rekening'] = $this->input->post('no_rekening');
						$in_data['gambar'] = $data['file_name'];
						
						$this->db->update("tbl_bank",$in_data,$id);
				
						
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bank Berhasil di Update</div>');
						redirect("adminweb/bank");
						
					}
					else 
					{
						$this->template->load('template','adminweb/bank/error');
					}
				}

	}
	//Akhir Bank

	//Awal Tentang Kami
	public function tentangkami() {
		if ($this->session->userdata("logged_in")!=="") {

			$query = $this->admin_model->GetTentangkami();
			foreach ($query->result_array() as $tampil) {
				$data['id_tentangkami']=$tampil['id_tentangkami'];
				$data['judul']=$tampil['judul'];
				$data['deskripsi']=$tampil['deskripsi'];
			}

			$this->template->load('template','adminweb/tentangkami/index',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function tentangkami_simpan() {
		$id_tentangkami = $this->input->post('id_tentangkami');
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');

		$this->admin_model->UpdateTentangkami($id_tentangkami,$judul,$deskripsi);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tentang Kami Berhasil di Update</div>');
		redirect('adminweb/tentangkami');
	}
	//Akhir Tentang Kami

	//Awal Cara Booking
	public function cara_booking() {
		if ($this->session->userdata("logged_in")!=="") {

			$query = $this->admin_model->GetCarabooking();
			foreach ($query->result_array() as $tampil) {
				$data['id_carabooking']=$tampil['id_carabooking'];
				$data['judul']=$tampil['judul'];
				$data['deskripsi']=$tampil['deskripsi'];
			}

			$this->template->load('template','adminweb/cara_booking/index',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function carabooking_simpan() {
		$id_carabooking = $this->input->post('id_carabooking');
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');

		$this->admin_model->UpdateCarabooking($id_carabooking,$judul,$deskripsi);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cara Booking Berhasil di Update</div>');
		redirect('adminweb/cara_booking');
	}
	//Akhir Cara Booking

	//Awal Sambutan
	public function sambutan() {
		if ($this->session->userdata("logged_in")!=="") {

			$query = $this->admin_model->GetSambutan();
			foreach ($query->result_array() as $tampil) {
				$data['id_sambutan']=$tampil['id_sambutan'];
				$data['judul']=$tampil['judul'];
				$data['deskripsi']=$tampil['deskripsi'];
			}

			$this->template->load('template','adminweb/sambutan/index',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function sambutan_simpan() {
		$id_sambutan = $this->input->post('id_sambutan');
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');

		$this->admin_model->UpdateSambutan($id_sambutan,$judul,$deskripsi);
	}
	//Akhir Sambutan

	//Awal Admin
	public function admin() {
		if($this->session->userdata("logged_in")!=="") {

			$data['data_admin'] = $this->admin_model->Getadmin();
			$this->template->load('template','adminweb/admin/index', $data);
		}
		else {
			redirect("adminweb");
		}
	} 

	public function admin_delete() {
		$id = $this->uri->segment(3);
		$this->admin_model->Deleteadmin($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin Berhasil di Hapus</div>');
		redirect('adminweb/admin');
	}

	public function admin_tambah() {
		$data['kode_admin'] = $this->admin_model->GetMaxKodeAdmin();
		$this->template->load('template','adminweb/admin/add',$data);
	}

	public function admin_simpan() {

			$this->form_validation->set_rules('kode_admin', 'Kode Admin', 'required');
			$this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			
			

			if ($this->form_validation->run() == FALSE)
			{
				$data['data_admin'] = $this->admin_model->Getadmin();
				$this->template->load('template','adminweb/admin/index', $data);
			}
			else {

						$in_data['kode_admin'] 		= $this->input->post('kode_admin');
						$in_data['nama_admin'] 		= $this->input->post('nama_admin');
						$in_data['username'] 		= $this->input->post('username');
						$in_data['password'] 		= md5($this->input->post('password'));
						$in_data['email'] 			= $this->input->post('email');
						$in_data['phone'] 			= $this->input->post('phone');
						$in_data['alamat'] 			= $this->input->post('alamat');
						$this->db->insert("tbl_admin",$in_data);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin Baru Berhasil di Tambah</div>');
					redirect('adminweb/admin/');
				
			}

	}

	public function admin_edit() {
		$kode = $this->uri->segment(3);
		$query = $this->admin_model->GetadminEdit($kode);
		foreach ($query->result_array() as $tampil) {
			$data['kode_admin'] = $tampil['kode_admin'];
			$data['nama_admin'] = $tampil['nama_admin'];
			$data['username'] = $tampil['username'];
			$data['password'] = $tampil['password'];
			$data['email'] = $tampil['email'];
			$data['phone'] = $tampil['phone'];
			$data['alamat'] = $tampil['alamat'];
			
		}
		$this->template->load('template','adminweb/admin/edit',$data);
	}

	public function admin_update() {
		$id['id_admin'] = $this->input->post("id_admin");

		if ($this->input->post('password')!=="") {

			$in_data['kode_admin'] = $this->input->post('kode_admin');
			$in_data['nama_admin'] = $this->input->post('nama_admin');
			$in_data['username'] = $this->input->post('username');
			$in_data['password'] = md5($this->input->post('password'));
			$in_data['email'] = $this->input->post('email');
			$in_data['phone'] = $this->input->post('phone');
			$in_data['alamat'] = $this->input->post('alamat');

		}
		else {
			$in_data['kode_admin'] = $this->input->post('kode_admin');
			$in_data['nama_admin'] = $this->input->post('nama_admin');
			$in_data['username'] = $this->input->post('username');
			$in_data['email'] = $this->input->post('email');
			$in_data['phone'] = $this->input->post('phone');
			$in_data['alamat'] = $this->input->post('alamat');
		}
								
		$this->db->update("tbl_admin",$in_data,$id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin Berhasil di Update</div>');
		redirect("adminweb/admin");
		
	}
	//Akhir Admin

	//Awal Member
	public function member() {
		if($this->session->userdata("logged_in")!=="") {

			$data['data_member'] = $this->admin_model->Getmember();
			$this->template->load('template','adminweb/member/index', $data);
		}
		else {
			redirect("adminweb");
		}
	} 

	public function member_delete() {
		$id = $this->uri->segment(3);
		$this->admin_model->Deletemember($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Member Berhasil di Hapus</div>');
		redirect('adminweb/member');
	}

	public function member_tambah() {
		$data['kode_member'] = $this->admin_model->GetMaxKodeMember();
		$this->template->load('template','adminweb/member/add',$data);
	}

	public function member_simpan() {

			$this->form_validation->set_rules('kode_member', 'Kode Member', 'required');
			$this->form_validation->set_rules('nama_member', 'Nama Member', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			
			

			if ($this->form_validation->run() == FALSE)
			{
				$data['data_member'] = $this->admin_model->Getmember();
				$this->template->load('template','adminweb/member/index', $data);
			}
			else {

						$in_data['kode_member'] 		= $this->input->post('kode_member');
						$in_data['nama_member'] 	= $this->input->post('nama_member');
						$in_data['username'] 		= $this->input->post('username');
						$in_data['password'] 		= md5($this->input->post('password'));
						$in_data['email'] 			= $this->input->post('email');
						$in_data['phone'] 			= $this->input->post('phone');
						$in_data['alamat'] 			= $this->input->post('alamat');
						$this->db->insert("tbl_member",$in_data);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Member Baru Berhasil di Tambah</div>');
					redirect('adminweb/member/');
				
			}

	}

	public function member_edit() {
		$id = $this->uri->segment(3);
		$query = $this->admin_model->GetmemberEdit($id);
		foreach ($query->result_array() as $tampil) {
			$data['id_member'] = $tampil['id_member'];
			$data['kode_member'] = $tampil['kode_member'];
			$data['nama_member'] = $tampil['nama_member'];
			$data['username'] = $tampil['username'];
			$data['password'] = $tampil['password'];
			$data['email'] = $tampil['email'];
			$data['phone'] = $tampil['phone'];
			$data['alamat'] = $tampil['alamat'];
			
		}
		$this->template->load('template','adminweb/member/edit',$data);
	}

	public function member_update() {
		$id['id_member'] = $this->input->post("id_member");

		if ($this->input->post('password')!=="") {

			$in_data['kode_member'] = $this->input->post('kode_member');
			$in_data['nama_member'] = $this->input->post('nama_member');
			$in_data['username'] = $this->input->post('username');
			$in_data['password'] = md5($this->input->post('password'));
			$in_data['email'] = $this->input->post('email');
			$in_data['phone'] = $this->input->post('phone');
			$in_data['alamat'] = $this->input->post('alamat');

		}
		else {
			$in_data['kode_member'] = $this->input->post('kode_member');
			$in_data['nama_member'] = $this->input->post('nama_member');
			$in_data['username'] = $this->input->post('username');
			$in_data['email'] = $this->input->post('email');
			$in_data['phone'] = $this->input->post('phone');
			$in_data['alamat'] = $this->input->post('alamat');
		}
								
		$this->db->update("tbl_member",$in_data,$id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Member Berhasil di Update</div>');
		redirect("adminweb/member");
		
	}
	//Akhir Member

	//Awal Jasa Pengirman
	public function jasapengiriman() {

		$data['data_jasapengiriman'] = $this->admin_model->GetJasapengiriman();
		$this->template->load('template','adminweb/jasapengiriman/index',$data);

	}

	public function jasapengiriman_tambah() {
		$this->template->load('template','adminweb/jasapengiriman/add');
	}

	public function jasapengiriman_simpan() {

			$this->form_validation->set_rules('nama', 'Nama Jasa Pengiriman', 'required');
			
		
			

			if ($this->form_validation->run() == FALSE)
			{
			
				$this->template->load('template','adminweb/jasapengiriman/add');
			}
			else {

				if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['nama'] = $this->input->post('nama');
						$this->db->insert("tbl_jasapengiriman",$in_data);

					$this->session->set_flashdata('berhasil','Jasa Pengiriman Berhasil Disimpan');
					redirect("adminweb/jasapengiriman");
				}
				else
				{
					$config['upload_path'] = './images/jasapengiriman/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '150';
					$config['max_height']  	= '60';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/jasapengiriman/".$data['file_name'] ;
						$destination_thumb	= "./images/jasapengiriman/thumb/" ;
						$destination_medium	= "./images/jasapengiriman/medium/" ;
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 150 ;
						$limit_thumb    = 60 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
			 			// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['nama'] = $this->input->post('nama');
						$in_data['gambar'] = $data['file_name'];
						
						
						
						$this->db->insert("tbl_jasapengiriman",$in_data);

				
						
						$this->session->set_flashdata('berhasil','Jasa Pengiriman Berhasil Disimpan');
						redirect("adminweb/jasapengiriman");
						
					}
					else 
					{
						$this->template->load('template','adminweb/jasapengiriman/error');
					}
				}
				
			}

	}

	public function jasapengiriman_delete() {
		$id_jasapengiriman = $this->uri->segment(3);
		$this->admin_model->DeleteJasapengiriman($id_jasapengiriman);

		$this->session->set_flashdata('message','Jasa Pengiriman Berhasil Dihapus');
		redirect('adminweb/jasapengiriman');

	}

	public function jasapengiriman_edit() {
		$id_jasapengiriman = $this->uri->segment(3);
		$query = $this->admin_model->GetJasapengirimanEdit($id_jasapengiriman);
		foreach ($query->result_array() as $tampil) {
			$data['id_jasapengiriman'] = $tampil['id_jasapengiriman'];
			$data['nama'] = $tampil['nama'];
			$data['gambar'] = $tampil['gambar'];
		}
		$this->template->load('template','adminweb/jasapengiriman/edit',$data);
	}

	public function jasapengiriman_update() {
		$id['id_jasapengiriman'] = $this->input->post("id_jasapengiriman");

		if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['nama'] = $this->input->post('nama');
					
						$this->db->update("tbl_jasapengiriman",$in_data,$id);

					$this->session->set_flashdata('update','Jasa Pengiriman Berhasil Diupdate');
					redirect("adminweb/jasapengiriman");
				}
				else
				{
					$config['upload_path'] = './images/jasapengiriman/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '150';
					$config['max_height']  	= '60';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/jasapengiriman/".$data['file_name'] ;
						$destination_thumb	= "./images/jasapengiriman/thumb/" ;
						$destination_medium	= "./images/jasapengiriman/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 270 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['nama'] = $this->input->post('nama');
						$in_data['gambar'] = $data['file_name'];
						
						$this->db->update("tbl_jasapengiriman",$in_data,$id);
				
						
						$this->session->set_flashdata('update','Jasa Pengiriman Berhasil Diupdate');
						redirect("adminweb/jasapengiriman");
						
					}
					else 
					{
						$this->template->load('template','adminweb/jasapengiriman/error');
					}
				}

	}
	//Akhir Jasa Pengiriman

	//Awal Produk 
	public function produk () {

		$data['data_produk'] = $this->admin_model->GetProduk();
		$this->template->load('template','adminweb/produk/index',$data);
	}

	public function produk_tambah(){
		$data['kode_produk'] = $this->admin_model->GetMaxKodeProduk();
		$data['data_brand'] = $this->admin_model->GetBrand();
		$data['data_kategori'] = $this->admin_model->GetKategori();
		$this->template->load('template','adminweb/produk/add',$data);
	}

	public function produk_simpan() {
		$this->form_validation->set_rules('nama_produk','Nama Produk','required');
		$this->form_validation->set_rules('brand_id','Brand','required');
		$this->form_validation->set_rules('kategori_id','Kategori','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('stok','Stok','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');

		if ($this->form_validation->run()==FALSE) {

			$data['kode_produk'] = $this->admin_model->GetMaxKodeProduk();
			$data['data_brand'] = $this->admin_model->GetBrand();
			$data['data_kategori'] = $this->admin_model->GetKategori();
			$this->template->load('template','adminweb/produk/add',$data);

		}
		else {

			if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['kode_produk'] = $this->input->post('kode_produk');
						$in_data['nama_produk'] = $this->input->post('nama_produk');
						$in_data['harga'] = $this->input->post('harga');
						$in_data['stok'] = $this->input->post('stok');
						$in_data['deskripsi'] = $this->input->post('deskripsi');
						$in_data['kategori_id'] = $this->input->post('kategori_id');
						$in_data['brand_id'] = $this->input->post('brand_id');
						$this->db->insert("tbl_produk",$in_data);

					$this->session->set_flashdata('berhasil','Produk Berhasil Disimpan');
					redirect("adminweb/produk");
				}
				else
				{
					$config['upload_path'] = './images/produk/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '268';
					$config['max_height']  	= '249';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/produk/".$data['file_name'] ;
						$destination_thumb	= "./images/produk/thumb/" ;
						$destination_medium	= "./images/produk/medium/" ;
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 268 ;
						$limit_thumb    = 249 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
			 			// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['kode_produk'] = $this->input->post('kode_produk');
						$in_data['nama_produk'] = $this->input->post('nama_produk');
						$in_data['harga'] = $this->input->post('harga');
						$in_data['stok'] = $this->input->post('stok');
						$in_data['deskripsi'] = $this->input->post('deskripsi');
						$in_data['kategori_id'] = $this->input->post('kategori_id');
						$in_data['brand_id'] = $this->input->post('brand_id');
						$in_data['gambar'] = $data['file_name'];
						
						
						
						$this->db->insert("tbl_produk",$in_data);

						

				
						
						$this->session->set_flashdata('berhasil','Produk Berhasil Disimpan');
						redirect("adminweb/produk");
						
					}
					else 
					{
						$this->template->load('template','adminweb/produk/error');
					}
				}

		}
	}

	public function produk_delete() {
		$id_produk = $this->uri->segment(3);
		$this->admin_model->DeleteProduk($id_produk);

		$this->session->set_flashdata('message','Produk Berhasil Dihapus');
		redirect('adminweb/produk');

	}

	public function produk_edit() {
		$id_produk = $this->uri->segment(3);
		$query = $this->admin_model->EditProduk($id_produk);
		foreach ($query->result_array() as $tampil) {

			$data['id_produk']= $tampil['id_produk'];
			$data['kode_produk']= $tampil['kode_produk'];
			$data['nama_produk']= $tampil['nama_produk'];
			$data['harga']= $tampil['harga'];
			$data['stok']= $tampil['stok'];
			$data['deskripsi']= $tampil['deskripsi'];
			$data['kategori_id']= $tampil['kategori_id'];
			$data['brand_id']= $tampil['brand_id'];
			
		}
		$data['data_kategori'] = $this->admin_model->GetKategori();
		$data['data_brand']  = $this->admin_model->GetBrand();
		$this->template->load('template','adminweb/produk/edit',$data);
	}

	public function produk_update() {
		$id['id_produk'] = $this->input->post("id_produk");

		if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['kode_produk'] = $this->input->post('kode_produk');
						$in_data['nama_produk'] = $this->input->post('nama_produk');
						$in_data['harga'] = $this->input->post('harga');
						$in_data['stok'] = $this->input->post('stok');
						$in_data['deskripsi'] = $this->input->post('deskripsi');
						$in_data['kategori_id'] = $this->input->post('kategori_id');
						$in_data['brand_id'] = $this->input->post('brand_id');
					
						$this->db->update("tbl_produk",$in_data,$id);

					$this->session->set_flashdata('update','Produk Berhasil Diupdate');
					redirect("adminweb/produk");
				}
				else
				{
					$config['upload_path'] = './images/produk/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '268';
					$config['max_height']  	= '249';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/produk/".$data['file_name'] ;
						$destination_thumb	= "./images/produk/thumb/" ;
						$destination_medium	= "./images/produk/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 268 ;
						$limit_thumb    = 249 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['kode_produk'] = $this->input->post('kode_produk');
						$in_data['nama_produk'] = $this->input->post('nama_produk');
						$in_data['harga'] = $this->input->post('harga');
						$in_data['stok'] = $this->input->post('stok');
						$in_data['deskripsi'] = $this->input->post('deskripsi');
						$in_data['kategori_id'] = $this->input->post('kategori_id');
						$in_data['brand_id'] = $this->input->post('brand_id');
						$in_data['gambar'] = $data['file_name'];
						
						$this->db->update("tbl_produk",$in_data,$id);
				
						
						$this->session->set_flashdata('update','Produk Berhasil Diupdate');
						redirect("adminweb/produk");
						
					}
					else 
					{
						$this->template->load('template','adminweb/produk/error');
					}
				}

	}

	//Akhir Produk

	//Awal Lapangan
	public function lapangan () {

		$data['data_lapangan'] = $this->admin_model->GetLapangan();
		$this->template->load('template','adminweb/lapangan/index',$data);
	}
	

	public function lapangan_tambah(){
		$data['kode_lapangan'] = $this->admin_model->GetMaxKodeLapangan();
		$this->template->load('template','adminweb/lapangan/add',$data);
	}

	public function lapangan_simpan() {
		$this->form_validation->set_rules('kode_lapangan','Kode Lapangan','required');
		$this->form_validation->set_rules('nama_lapangan','Nama Lapangan','required');
		$this->form_validation->set_rules('harga','Harga','required');

		if ($this->form_validation->run()==FALSE) {

			$this->template->load('template','adminweb/lapangan/add');

		}
		else {

			if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['kode_lapangan'] = $this->input->post('kode_lapangan');
						$in_data['nama_lapangan'] = $this->input->post('nama_lapangan');
						$in_data['harga'] = $this->input->post('harga');
						$this->db->insert("tbl_lapangan",$in_data);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lapangan Berhasil di Simpan</div>');
					redirect("adminweb/lapangan");
				}
				else
				{
					$config['upload_path'] = './images/lapangan/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					/*$config['max_width']  	= '484';
					$config['max_height']  	= '441';*/
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/slider/".$data['file_name'] ;
						$destination_thumb	= "./images/slider/thumb/" ;
						$destination_medium	= "./images/slider/medium/" ;
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 481 ;
						$limit_thumb    = 441 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
			 			// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['kode_lapangan'] = $this->input->post('kode_lapangan');
						$in_data['nama_lapangan'] = $this->input->post('nama_lapangan');
						$in_data['harga'] = $this->input->post('harga');
						$in_data['gambar'] = $data['file_name'];
						
						
						
						$this->db->insert("tbl_lapangan",$in_data);

						

				
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lapangan Berhasil di Simpan</div>');
						redirect("adminweb/lapangan");
						
					}
					else 
					{
						$this->template->load('template','adminweb/lapangan/error');
					}
				}

		}
	}

	public function lapangan_delete() {
		$id_lapangan = $this->uri->segment(3);
		$this->admin_model->DeleteLapangan($id_lapangan);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lapangan Berhasil di Hapus</div>');
		redirect('adminweb/lapangan');

	}

	public function lapangan_edit() {
		$id_lapangan = $this->uri->segment(3);
		$query = $this->admin_model->EditLapangan($id_lapangan);
		foreach ($query->result_array() as $tampil) {

			$data['id_lapangan']= $tampil['id_lapangan'];
			$data['kode_lapangan']= $tampil['kode_lapangan'];
			$data['nama_lapangan']= $tampil['nama_lapangan'];
			$data['harga']= $tampil['harga'];
			
			
		}
		
		$this->template->load('template','adminweb/lapangan/edit',$data);
	}

	public function lapangan_update() {
		$id['id_lapangan'] = $this->input->post("id_lapangan");

		if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['kode_lapangan'] = $this->input->post('kode_lapangan');
						$in_data['nama_lapangan'] = $this->input->post('nama_lapangan');
						$in_data['harga'] = $this->input->post('harga');
						
					
						$this->db->update("tbl_lapangan",$in_data,$id);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lapangan Berhasil di Update</div>');
					redirect("adminweb/lapangan");
				}
				else
				{
					$config['upload_path'] = './images/lapangan/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '481';
					$config['max_height']  	= '441';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/lapangan/".$data['file_name'] ;
						$destination_thumb	= "./images/lapangan/thumb/" ;
						$destination_medium	= "./images/lapangan/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 481 ;
						$limit_thumb    = 441 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['kode_lapangan'] = $this->input->post('kode_lapangan');
						$in_data['nama_lapangan'] = $this->input->post('nama_lapangan');
						$in_data['harga'] = $this->input->post('harga');
						$in_data['gambar'] = $data['file_name'];
						
						$this->db->update("tbl_lapangan",$in_data,$id);
				
						
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lapangan Berhasil di Update</div>');
						redirect("adminweb/lapangan");
						
					}
					else 
					{
						$this->template->load('template','adminweb/lapangan/error');
					}
				}

	}

	//Akhir Lapangan

	//Awal Slider 
	public function slider () {

		$data['data_slider'] = $this->admin_model->GetSlider();
		$this->template->load('template','adminweb/slider/index',$data);
	}
	

	public function slider_tambah(){
		
		$this->template->load('template','adminweb/slider/add');
	}

public function slider_simpan() {
		$this->form_validation->set_rules('tittle','Tittle','required');
		$this->form_validation->set_rules('description','Description','required');

		if ($this->form_validation->run()==FALSE) {

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data salah atau tidak lengkap</div>');
			redirect("adminweb/slider_tambah");

		}
		else {

			if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['tittle'] = $this->input->post('tittle');
						$in_data['description'] = $this->input->post('description');
						$in_data['status'] = $this->input->post('status');
						$this->db->insert("tbl_slider",$in_data);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Slider Berhasil di Simpan</div>');
					redirect("adminweb/slider");
				}
				else
				{
					$config['upload_path'] = './images/slider/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '484';
					$config['max_height']  	= '441';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/slider/".$data['file_name'] ;
						$destination_thumb	= "./images/slider/thumb/" ;
						$destination_medium	= "./images/slider/medium/" ;
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 481 ;
						$limit_thumb    = 441 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;

						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
			 			// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['tittle'] = $this->input->post('tittle');
						$in_data['description'] = $this->input->post('description');
						$in_data['status'] = $this->input->post('status');
						$in_data['gambar'] = $data['file_name'];
						
						
						
						$this->db->insert("tbl_slider",$in_data);

						

				
						
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Slider Berhasil di Simpan</div>');
						redirect("adminweb/slider");
						
					}
					else 
					{
						$this->template->load('template','adminweb/slider/error');
					}
				}

		}
	}

	public function slider_delete() {
		$id_slider = $this->uri->segment(3);
		$this->admin_model->DeleteSlider($id_slider);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Slider Berhasil di Hapus</div>');
		redirect('adminweb/slider');

	}

	public function slider_edit() {
		$id_slider = $this->uri->segment(3);
		$query = $this->admin_model->EditSlider($id_slider);
		foreach ($query->result_array() as $tampil) {

			$data['id_slider']= $tampil['id_slider'];
			$data['tittle']= $tampil['tittle'];
			$data['description']= $tampil['description'];
			$data['status']= $tampil['status'];
			
			
		}
		
		$this->template->load('template','adminweb/slider/edit',$data);
	}

	public function slider_update() {
		$id['id_slider'] = $this->input->post("id_slider");

		if(empty($_FILES['userfile']['name']))
				{
					
						$in_data['tittle'] = $this->input->post('tittle');
						$in_data['description'] = $this->input->post('description');
						$in_data['status'] = $this->input->post('status');
						
					
						$this->db->update("tbl_slider",$in_data,$id);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Slider Berhasil di Update</div>');
					redirect("adminweb/slider");
				}
				else
				{
					$config['upload_path'] = './images/slider/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '481';
					$config['max_height']  	= '441';
					
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/slider/".$data['file_name'] ;
						$destination_thumb	= "./images/slider/thumb/" ;
						$destination_medium	= "./images/slider/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 481 ;
						$limit_thumb    = 441 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['tittle'] = $this->input->post('tittle');
						$in_data['description'] = $this->input->post('description');
						$in_data['status'] = $this->input->post('status');
						$in_data['gambar'] = $data['file_name'];
						
						$this->db->update("tbl_slider",$in_data,$id);
				
						
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Slider Berhasil di Update</div>');
						redirect("adminweb/slider");
						
					}
					else 
					{
						$this->template->load('template','adminweb/slider/error');
					}
				}

	}

	//Akhir Slider

	//Awal Buku Tamu
	public function buku_tamu() {

		if($this->session->userdata("logged_in")!=="") {

			$data['data_buku_tamu'] = $this->admin_model->GetBukuTamu();

			$this->template->load('template','adminweb/buku_tamu/index',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function buku_tamu_hapus() {

		$id = $this->uri->segment(3);
		$this->admin_model->DeleteBukuTamu($id);
		
		$this->session->set_flashdata('hapus', '<div class="alert alert-success" role="alert">Pesan Berhasil di Hapus</div>');
		redirect("adminweb/buku_tamu");
	}

	public function buku_tamu_detail() {

		$id = $this->uri->segment(3);
		$status ="1";
		$query = $this->admin_model->DetailBukuTamu($id);
		foreach ($query->result_array() as $tampil) {
			$data['id_hubungikami'] = $tampil['id_hubungikami'];
			$data['nama'] = $tampil['nama'];
			$data['email'] = $tampil['email'];
			$data['hp'] = $tampil['hp'];
			$data['alamat'] = $tampil['alamat'];
			$data['pesan'] = $tampil['pesan'];
			$data['tanggal'] = $tampil['tanggal'];
		}

		$this->admin_model->UpdateStatusBukuTamu($status,$id);
		
		$this->template->load('template','adminweb/buku_tamu/detail',$data);
	}

	public function buku_tamu_balas() {
		if($this->session->userdata("logged_in")!=="") {

			$id = $this->uri->segment(3);
			$query = $this->admin_model->DetailBukuTamu($id);
			foreach ($query->result_array() as $tampil) {
				$data['id_hubungikami'] = $tampil['id_hubungikami'];
				$data['nama'] = $tampil['nama'];
				$data['email'] = $tampil['email'];
				$data['hp'] = $tampil['hp'];
				$data['alamat'] = $tampil['alamat'];
				$data['pesan'] = $tampil['pesan'];
				$data['tanggal'] = $tampil['tanggal'];
			}

			$this->template->load('template','adminweb/buku_tamu/balas',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function buku_tamu_balas_simpan() {
		$email = $this->input->post("email");
		$judul = $this->input->post("judul");
		$isi_hubungi_kami_kirim = $this->input->post("isi_hubungi_kami_kirim");

		$this->admin_model->SimpanBukuTamuAdd($email,$judul,$isi_hubungi_kami_kirim);

		$this->load->library('email');
		$this->email->from('info@adriano.com', 'Adriano MX Online Shop');
		$this->email->to($email); 	
		$this->email->subject($judul);
		$this->email->message($isi_hubungi_kami_kirim);	
		$this->email->send();
	}


	public function buku_tamu_add() {
		if($this->session->userdata("logged_in")!=="") {

			$this->template->load('template','adminweb/buku_tamu/add');
		}
		else {
			redirect("adminweb");
		}
	}

	public function buku_tamu_add_simpan() {
		$email = $this->input->post("email");
		$judul = $this->input->post("judul");
		$isi_hubungi_kami_kirim = $this->input->post("isi_hubungi_kami_kirim");

		$this->admin_model->SimpanBukuTamuAdd($email,$judul,$isi_hubungi_kami_kirim);

		$this->load->library('email');
		$this->email->from('info@adriano.com', 'Adriano MX Online Shop');
		$this->email->to($email); 	
		$this->email->subject($judul);
		$this->email->message($isi_hubungi_kami_kirim);	
		$this->email->send();
	}

	public function buku_tamu_kirim() {

		if($this->session->userdata("logged_in")!=="") {

			$data['data_buku_tamu_kirim'] = $this->admin_model->GetBukuTamuKirim();

			$this->template->load('template','adminweb/buku_tamu/kirim',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function buku_tamu_kirim_hapus() {

		$id = $this->uri->segment(3);
		$this->admin_model->DeleteBukuTamuKirim($id);
		
		$this->session->set_flashdata('terkirim', '<div class="alert alert-success" role="alert">Pesan Berhasil di Hapus</div>');
		redirect("adminweb/buku_tamu_kirim");
	}

	public function buku_tamu_kirim_detail() {

		$id = $this->uri->segment(3);
		$query = $this->admin_model->DetailBukuTamuKirim($id);
		foreach ($query->result_array() as $tampil) {
			$data['id_hubungi_kami_kirim'] = $tampil['id_hubungi_kami_kirim'];
			$data['kepada'] = $tampil['kepada'];
			$data['judul'] = $tampil['judul'];
			$data['isi_hubungi_kami_kirim'] = $tampil['isi_hubungi_kami_kirim'];
			
		}

		
		$this->template->load('template','adminweb/buku_tamu/detail_kirim',$data);
	}
	//Akhir Buku Tamu

	// Awal Transaksi
	public function transaksi() {


		if($this->session->userdata("logged_in")!=="") {

			$data['data_transaksi'] = $this->admin_model->GetTransaksi();

			$this->template->load('template','adminweb/transaksi/index',$data);
		}
		else {
			redirect("adminweb");
		}

	}

	public function transaksi_konfirmasi () {

		if($this->session->userdata("logged_in")!=="") {

			$id_transaksi  = $this->uri->segment(3);

			$this->admin_model->UpdateTransaksi($id_transaksi);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Konfirmasi</div>');
			redirect("adminweb/transaksi_sudah");

		}
		else {
			redirect("adminweb");
		}

	}

	public function transaksi_detail () {

		if($this->session->userdata("logged_in")!=="") {

			$id_transaksi  = $this->uri->segment(3);
			$data['data_detail']	= $this->admin_model->DetailTransaksi($id_transaksi);

			$this->template->load('template','adminweb/transaksi/detail',$data);

		}
		else {
			redirect("adminweb");
		}

	}

	public function transaksi_sudah() {


		if($this->session->userdata("logged_in")!=="") {

			$data['data_transaksi_sudah'] = $this->admin_model->GetTransaksiSudah();

			$this->template->load('template','adminweb/transaksi_sudah/index',$data);
		}
		else {
			redirect("adminweb");
		}

	}

	public function transaksi_sudah_detail () {

		if($this->session->userdata("logged_in")!=="") {

			$id_transaksi  = $this->uri->segment(3);
			$kode_transaksi = $this->uri->segment(4);
			$data['data_detail_sudah']	= $this->admin_model->DetailTransaksiSudah($id_transaksi);

			$this->template->load('template','adminweb/transaksi_sudah/detail',$data);

		}
		else {
			redirect("adminweb");
		}

	}

	public function transaksi_sudah_delete() {
		$id_transaksi = $this->uri->segment(3);
		$this->admin_model->DeleteTransaksiSudah($id_transaksi);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus</div>');
		redirect('adminweb/transaksi_sudah');

	}

	// Akhir Transaksi

	// Awal Konfirmasi

	public function konfirmasi() {


		if($this->session->userdata("logged_in")!=="") {

			$data['data_konfirmasi'] = $this->admin_model->GetKonfirmasi();

			$this->template->load('template','adminweb/konfirmasi/index',$data);
		}
		else {
			redirect("adminweb");
		}

	}

	// Akhir Konfirmasi


	public function semua_transaksi () {

		if($this->session->userdata("logged_in")!=="") {

			$data['data_transaksi'] = $this->admin_model->GetTransaksiSudah();

			$this->template->load('template','adminweb/transaksi/sudah',$data);


		}
		else {
			redirect("adminweb");
		}

	}

	public function semua_transaksi_detail () {

		if($this->session->userdata("logged_in")!=="") {

			$id  			= $this->uri->segment(3);
			$kode_transaksi = $this->uri->segment(4);

			$data['data_header'] 	= $this->admin_model->GetTransaksiheader($id);  
			$data['data_detail']	= $this->admin_model->GetDetailTransaksi($kode_transaksi);
			$data['data_total']		= $this->admin_model->GetDetailTotal($kode_transaksi);

			$this->template->load('template','adminweb/transaksi/detail_semua',$data);

		}
		else {
			redirect("adminweb");
		}

	}

	//Awal Cetak

	function cetak_laporan_member(){
        $data['member'] = $this->admin_model->GetMember();
		
		$this->load->view('adminweb/laporan/laporan_print_member', $data);
		}

	function cetak_laporan_lapangan(){
        $data['lapangan'] = $this->admin_model->GetLapangan();
		
		$this->load->view('adminweb/laporan/laporan_print_lapangan', $data);
		}
	
	function cetak_laporan_transaksi(){
          $data['transaksi'] = $this->admin_model->GetAllTransaksi();
          $this->load->view('adminweb/laporan/laporan_print_transaksi', $data);
		}
		
	//Akhir Cetak





}