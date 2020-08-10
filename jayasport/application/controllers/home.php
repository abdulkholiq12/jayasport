<?php

class home extends CI_controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('home_model');

	}

	public function index() {
		$data['logo'] 			= $this->home_model->GetLogo();
		$data['kontak'] 		= $this->home_model->GetKontak();
		$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
		$data['tentangkami'] 	= $this->home_model->GetTentangKami();
		$data['seo'] 			= $this->home_model->GetSeo(); 
		$data['slider']			= $this->home_model->GetSlider();
		$data['bank'] 			= $this->home_model->GetBank();
		$data['carabooking'] 	= $this->home_model->GetCaraBooking();
		$data['lapangan']		= $this->home_model->GetLapangan();
		$data['member']			= $this->home_model->GetMember(); 
		$data['random_active']	= $this->home_model->GetRandomActiveLapangan();

		$this->load->view('home/index',$data);
	}

	public function user_login() {
		if($this->session->userdata("logged_in")=="") {

			$username	=	$this->input->post("username");
			$password 	=   md5($this->input->post('password'));
	
			$this->home_model->cekMemberLogin($username,$password);

		}
	}

	public function daftar(){
			$data['logo'] 			= $this->home_model->GetLogo();
			$data['member'] 		= $this->home_model->GetMember();
			$data['kontak'] 		= $this->home_model->GetKontak();
			$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
			$data['seo'] 			= $this->home_model->GetSeo(); 
			$data['bank'] 			= $this->home_model->GetBank();  
			$data['tentangkami'] 	= $this->home_model->GetTentangKami();
			$data['kode_member'] 	= $this->home_model->GetMaxKodeMember();

		$this->load->view('home/member/daftar',$data);
	}

	public function daftar_kirim() {

			$this->form_validation->set_rules('kode_member', 'Kode Member', 'required');
			$this->form_validation->set_rules('nama_member', 'Nama Member', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');

						$in_data['kode_member'] 	= $this->input->post('kode_member');		
						$in_data['nama_member'] 	= $this->input->post('nama_member');
						$in_data['username'] 		= $this->input->post('username');
						$in_data['password'] 		= md5($this->input->post('password'));
						$in_data['email'] 			= $this->input->post('email');
						$in_data['phone'] 			= $this->input->post('phone');
						$in_data['alamat'] 			= $this->input->post('alamat');
						$this->db->insert("tbl_member",$in_data);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Sukses</div>');
					redirect('home');
				
			

	}
	
	public function logout () {

		$this->session->sess_destroy();
		
		$this->session->set_flashdata('simpan_akun', '<div class="alert alert-success" role="alert">Password berhasil diperbarui</div>');
		redirect("home/index");
	}

	// Awal Profile //
	public function profile(){
		

		if($this->session->userdata("logged_in")!=="") {
			
			$data['logo'] 			= $this->home_model->GetLogo();
			$data['member'] 		= $this->home_model->GetMember();
			$data['kontak'] 		= $this->home_model->GetKontak();
			$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
			$data['seo'] 			= $this->home_model->GetSeo(); 
			$data['bank'] 			= $this->home_model->GetBank(); 
			$data['tentangkami'] 	= $this->home_model->GetTentangKami();

			$username = $this->session->userdata("username");
			/*$password = $this->session->userdata("password");*/
			$data['data_member'] = $this->home_model->GetMembers($username);
				
			$this->load->view('home/member/profile',$data);

		}
		else {
			redirect('home/index');
		}
	}

	public function profile_update() {
		$id['id_member'] = $this->input->post("id_member");

		if ($this->input->post('password')!=="") {

			$in_data['nama_member'] = $this->input->post('nama_member');
			$in_data['username'] = $this->input->post('username');
			$in_data['password'] = $this->input->post('password');
			$in_data['email'] = $this->input->post('email');
			$in_data['phone'] = $this->input->post('phone');
			$in_data['alamat'] = $this->input->post('alamat');

		}
		else {
			$in_data['nama_member'] = $this->input->post('nama_member');
			$in_data['username'] = $this->input->post('username');
			$in_data['email'] = $this->input->post('email');
			$in_data['phone'] = $this->input->post('phone');
			$in_data['alamat'] = $this->input->post('alamat');
		}
								
		$this->db->update("tbl_member",$in_data,$id);
				
		$this->session->set_flashdata('update','<div class="alert alert-success" role="alert">Profile berhasil diupdate</div>');
		redirect('home/index');
		
	}
	// Akhir Profile //

	// Awal Ganti Password //
	public function gantipass(){
		$data['logo'] 			= $this->home_model->GetLogo();
		$data['member'] 		= $this->home_model->GetMember();
		$data['kontak'] 		= $this->home_model->GetKontak();
		$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
		$data['seo'] 			= $this->home_model->GetSeo(); 
		$data['bank'] 			= $this->home_model->GetBank(); 
		$data['tentangkami'] 	= $this->home_model->GetTentangKami();

		if ($this->session->userdata("logged_in")!=="") {

			if ($_SERVER['REQUEST_METHOD']=="POST") {

				$this->form_validation->set_rules('password_lama','Password Lama','trim|required');
				$this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required');
				$this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'trim|required');

				if ($this->form_validation->run()==FALSE) {

					$username = $this->session->userdata("username");
					$data['data_member'] = $this->home_model->GetMembers($username);
				
					$this->load->view('home/member/gantipass',$data);

				}
				else {

					$id['id_member'] = $this->input->post("id_member");
					$id['username'] = $this->input->post("username");


				
				$password_lama = md5($this->input->post("password_lama"));
				$password_baru = md5($this->input->post("password_baru"));
				$ulangi_password = md5($this->input->post("ulangi_password"));
				
				
				$cek['username'] 	= $id['username'];
				$cek['password'] 	= $password_lama;
				$ceklogin = $this->db->get_where('tbl_member', $cek);
				if(count($ceklogin->result())>0)
				{
					if($password_baru!=$ulangi_password)
					{
						$this->session->set_flashdata('simpan_akun', '<div class="alert alert-danger" role="alert">Password baru tidak sama</div>');
						redirect("home/gantipass");
					}
					else
					{
						
						$up['password'] = $password_baru;
						$this->db->update("tbl_member",$up,$id);
						
						$this->session->set_flashdata('simpan_akun', '<div class="alert alert-success" role="alert">Password berhasil diperbarui</div>');
						redirect("home/logout");
					}
				}
				else
				{
					$this->session->set_flashdata('simpan_akun', '<div class="alert alert-danger" role="alert">Password lama tidak cocok</div>');
					redirect("home/gantipass");
				}

				}

			}
			else {

			$username = $this->session->userdata("username");
			/*$password = $this->session->userdata("password");*/
			$data['data_member'] = $this->home_model->Getmembers($username);
				
			$this->load->view('home/member/gantipass',$data);
		}

		}
		else {
			redirect('home/index');
		}		
	}

	public function gantipass_update() {
		
		
	}
	// Akhir Ganti Password //

	public function jadwal() {

	if($this->session->userdata("logged_in")!=="") {

		$data=array(
      	'isi'=>'home/jadwal',
		);
		$data['logo'] 			= $this->home_model->GetLogo();
		$data['jadwal'] 		= $this->home_model->GetJadwal();
		$data['kontak'] 		= $this->home_model->GetKontak();
		$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
		$data['seo'] 			= $this->home_model->GetSeo(); 
		$data['bank'] 			= $this->home_model->GetBank();  
		$data['carabooking'] 	= $this->home_model->GetCaraBooking();

		
		$this->load->view('layout/wrapper',$data,FALSE);
	}
	
	else {
			redirect('home/index');
		 }

	}

	public function detail_jadwal(){
    if($this->session->userdata("logged_in")!=="") {

	$id_transaksi  	= $this->uri->segment(3);
	$kode_transaksi = $this->uri->segment(4);
    $data=array(
	  'detail_jadwal' => $this->home_model->GetDetailJadwal($id_transaksi),
      'isi'=>'home/detail_jadwal' 
	);
			$data['logo'] 			= $this->home_model->GetLogo();
			$data['member'] 		= $this->home_model->GetMember();
			$data['kontak'] 		= $this->home_model->GetKontak();
			$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
			$data['seo'] 			= $this->home_model->GetSeo(); 
			$data['bank'] 			= $this->home_model->GetBank(); 
			$data['tentangkami'] 	= $this->home_model->GetTentangKami();

	$this->load->view('layout/wrapper',$data,FALSE);
	
	}
	
	else {
			redirect('home/index');
		 }

	}


	public function lapangan() {
		$data['logo'] 			= $this->home_model->GetLogo();
		$data['lapangan'] 		= $this->home_model->GetLapangan();
		$data['kontak'] 		= $this->home_model->GetKontak();
		$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
		$data['seo'] 			= $this->home_model->GetSeo(); 
		$data['bank'] 			= $this->home_model->GetBank();  
		$data['carabooking'] 	= $this->home_model->GetCaraBooking();

		
		
		$this->load->view('home/lapangan',$data);
	}

	public function tentang_kami () {
		$data['logo'] 			= $this->home_model->GetLogo();
		$data['kontak'] 		= $this->home_model->GetKontak();
		$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
		$data['seo'] 			= $this->home_model->GetSeo(); 
		$data['bank'] 			= $this->home_model->GetBank();  
		$data['tentangkami'] 	= $this->home_model->GetTentangKami();

		$this->load->view('home/tentang_kami',$data);
	}

	public function cara_booking() {
		$data['logo'] 			= $this->home_model->GetLogo();
		$data['kontak'] 		= $this->home_model->GetKontak();
		$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
		$data['seo'] 			= $this->home_model->GetSeo(); 
		$data['bank'] 			= $this->home_model->GetBank(); 
		$data['carabooking'] 	= $this->home_model->GetCaraBooking();

		
		
		$this->load->view('home/cara_booking',$data);
	}

	public function hubungi_kami () {
		$data['logo'] 			= $this->home_model->GetLogo();
		$data['kontak'] 		= $this->home_model->GetKontak();
		$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
		$data['seo'] 			= $this->home_model->GetSeo(); 
		$data['bank'] 			= $this->home_model->GetBank();  
		
		$this->load->view('home/hubungi_kami',$data);
	}

	public function hubungi_kami_kirim() {
		$tanggal 	= date('Y-m-d');
		$nama 		= $this->input->post('nama');
		$email 		= $this->input->post('email');
		$hp 		= $this->input->post('hp');
		$alamat 		= $this->input->post('alamat');
		$pesan 		= $this->input->post('pesan');

		$this->home_model->InsertHubungiKami($nama,$email,$hp,$alamat,$pesan,$tanggal);

		$this->session->set_flashdata('sukses','Data Berhasil Dikirim');
		redirect("home/hubungi_kami");
	}

	public function cari () {
		$cari = $this->input->post('cari');

		if ($cari=="") {

		}
		else {

			$data['logo'] 			= $this->home_model->GetLogo();
			$data['kontak'] 		= $this->home_model->GetKontak();
			$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
			$data['seo'] 			= $this->home_model->GetSeo(); 
			$data['bank'] 			= $this->home_model->GetBank(); 
			$data['produk_cari']	= $this->home_model->GetProdukCari($cari);

			$this->load->view('home/cari',$data);

		}
	}

	public function booking()
    {
      $id = $this->uri->segment(3);
      $data['lapangan'] = $this->db->query("select * from tbl_lapangan where id_lapangan='$id'")->result();
      foreach ($data['lapangan'] as $field) {
		$data['id']=$id;
		$data['gambar'] = $field->gambar;
        $data['kode_lapangan'] = $field->kode_lapangan;
        $data['nama_lapangan'] = $field->nama_lapangan;
        $data['harga'] = $field->harga;
      }

        $data = array(
          'isi' => 'home/detail',
          'gambar' =>$data['gambar'],
          'kode_lapangan' =>$data['kode_lapangan'],
          'nama_lapangan'=>$data['nama_lapangan'],
          'harga' =>$data['harga'],
          'id'=>$id
		);

		$data['logo'] 			= $this->home_model->GetLogo();
		$data['kontak'] 		= $this->home_model->GetKontak();
		$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
		$data['seo'] 			= $this->home_model->GetSeo(); 
		$data['bank'] 			= $this->home_model->GetBank(); 
		$data['carabooking'] 	= $this->home_model->GetCaraBooking();
		$data['jam']			= $this->home_model->GetJam();
        $this->load->view('home/booking',$data);
	}

	public function booking_kirim(){
		
		$id=$this->input->post('id');
        $tgl_booking=$this->input->post('tgl_booking');
		$jam_booking=$this->input->post('jam_booking');
		$tgl_main=$this->input->post('tgl_main');
        $jam_mulai=$this->input->post('jam_mulai');
		$jam_selesai=$this->input->post('jam_selesai');
		$id_member=$this->session->userdata('id_member');
        
        $data = array(
            'id' =>$id,
            'tgl_booking'=> $tgl_booking,
			'jam_booking'=> $jam_booking,
			'tgl_main'=> $tgl_main,
            'jam_mulai'=> $jam_mulai,
            'jam_selesai'=> $jam_selesai,
			'id_member' => $id_member,
			
            
	 );
		
	 	$data['logo'] 			= $this->home_model->GetLogo();
		$data['kontak'] 		= $this->home_model->GetKontak();
		$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
		$data['seo'] 			= $this->home_model->GetSeo(); 
		$data['slider']			= $this->home_model->GetSlider();
		$data['member'] 		= $this->home_model->GetMember();
		$data['bank'] 			= $this->home_model->GetBank(); 
		$data['lapangan']		= $this->home_model->GetLapangan();
		
		$this->load->view('home/transaksi',$data);
	}	

	public function booking_jadi(){
        $id=$this->input->post('id');
		$id_lapangan=$this->input->post('lapangan_id');
		$kode_lapangan=$this->input->post('lapangan_kode');
        $nama_lapangan=$this->input->post('nama_lapangan');
		$harga=$this->input->post('harga');
		
		$id_member=$this->input->post('member_id');
		$kode_member=$this->input->post('member_kode');
		$nama_member=$this->input->post('nama_member');
		
        $tgl_booking=$this->input->post('tgl_booking');
		$jam_booking=$this->input->post('jam_booking');
		
        $tgl_main=$this->input->post('tgl_main');
		$jam_mulai=$this->input->post('jam_mulai');
		$jam_selesai=$this->input->post('jam_selesai');

        $durasi=$this->input->post('durasi');
		$total=$this->input->post('total');

		$id_bank=$this->input->post('id_bank');
		
		$this->home_model->GetMaxKodeTransaksi();

        $simpan=array(
            'kode_transaksi' =>$this->home_model->GetMaxKodeTransaksi(),
			'member_id' =>$id_member,
			'lapangan_id' =>$id_lapangan,
            'tgl_booking' =>$tgl_booking,
            'jam_booking' =>$jam_booking,
            'tgl_main' =>$tgl_main,
			'jam_mulai' =>$jam_mulai,
			'jam_selesai' =>$jam_selesai,
            'durasi' =>$durasi,
			'total' =>$total,
			'bank_id' =>$id_bank,
        );
        $this->db->insert('tbl_transaksi',$simpan);
        

        
        $data = array(
            'id' =>$this->home_model->GetMaxKodeTransaksi(),
            'kode_lapangan' =>$kode_lapangan,
			'nama_lapangan' =>$nama_lapangan,
			'harga' =>$harga,
			
            'kode_member' =>$kode_member,

			
            'tgl_booking' =>$tgl_booking,
			'jam_booking' =>$jam_booking,
			
            'tgl_main' =>$tgl_main,
			'jam_mulai' =>$jam_mulai,
			'jam_selesai' =>$jam_selesai,

            'durasi' =>$durasi,
            'total' =>$total,

        );
		redirect('home/laporan_booking',$data);
	}

	public function laporan_booking(){
	if($this->session->userdata("logged_in")!=="") {

	$id_member = $this->session->userdata("id_member");
    $data=array(
	  'laporan_booking' => $this->home_model->GetTransaksi($id_member),
      'isi'=>'home/laporan_booking' 
	);
			$data['logo'] 			= $this->home_model->GetLogo();
			$data['member'] 		= $this->home_model->GetMember();
			$data['kontak'] 		= $this->home_model->GetKontak();
			$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
			$data['seo'] 			= $this->home_model->GetSeo(); 
			$data['bank'] 			= $this->home_model->GetBank(); 
			$data['tentangkami'] 	= $this->home_model->GetTentangKami();

	$this->load->view('layout/wrapper',$data,FALSE);
	
	}
	
	else {
			redirect('home/index');
		 }

	}
	  
	public function detail_laporan(){
    if($this->session->userdata("logged_in")!=="") {

	$id_transaksi  	= $this->uri->segment(3);
	$kode_transaksi = $this->uri->segment(4);
    $data=array(
	  'detail_laporan' => $this->home_model->GetDetailTransaksi($id_transaksi),
      'isi'=>'home/detail_laporan' 
	);
			$data['logo'] 			= $this->home_model->GetLogo();
			$data['member'] 		= $this->home_model->GetMember();
			$data['kontak'] 		= $this->home_model->GetKontak();
			$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
			$data['seo'] 			= $this->home_model->GetSeo(); 
			$data['bank'] 			= $this->home_model->GetBank(); 
			$data['tentangkami'] 	= $this->home_model->GetTentangKami();

	$this->load->view('layout/wrapper',$data,FALSE);
	
	}
	
	else {
			redirect('home/index');
		 }

	}

	public function konfirmasi(){
    if($this->session->userdata("logged_in")!=="") {

	$id_transaksi  	= $this->uri->segment(3);
	$kode_transaksi = $this->uri->segment(4);
    $data=array(
	  'konfirmasi' => $this->home_model->GetKonfirmasi($id_transaksi),
      'isi'=>'home/konfirmasi' 
	);
			$data['logo'] 			= $this->home_model->GetLogo();
			$data['member'] 		= $this->home_model->GetMember();
			$data['kontak'] 		= $this->home_model->GetKontak();
			$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
			$data['seo'] 			= $this->home_model->GetSeo(); 
			$data['bank'] 			= $this->home_model->GetBank(); 
			$data['tentangkami'] 	= $this->home_model->GetTentangKami();

	$this->load->view('layout/wrapper',$data,FALSE);
	
	}
	
	else {
			redirect('home/index');
		 }

	}

	public function konfirmasi_kirim(){
        $id=$this->input->post('id');
		$kode_transaksi=$this->input->post('kode_transaksi');
		$total_bayar=$this->input->post('total_bayar');
		$nama_member=$this->input->post('nama_member');

		$bank_id=$this->input->post('bank_id');		
        $jumlah_bayar=$this->input->post('jumlah_bayar');
		$no_rekening=$this->input->post('no_rekening');		
        $atas_nama=$this->input->post('atas_nama');
		$nama_bank=$this->input->post('nama_bank');
		$pesan=$this->input->post('pesan');

        $simpan=array(
			'kode_transaksi' =>$kode_transaksi,
			'total_bayar' =>$total_bayar,
			'nama_member' =>$nama_member,
            'bank_id' =>$bank_id,
            'jumlah_bayar' =>$jumlah_bayar,
            'no_rekening' =>$no_rekening,
			'atas_nama' =>$atas_nama,
			'nama_bank' =>$nama_bank,
			'pesan' =>$pesan,
        );
        $this->db->insert('tbl_konfirmasi',$simpan);
        
		redirect('home/laporan_booking');
	}

	function cetak_detail_booking(){
		$id_transaksi  	= $this->uri->segment(3);
    	$data['cetak_detail_booking'] = $this->home_model->GetCetakDetail($id_transaksi);
		
		$this->load->view('home/laporan_print_booking', $data);
		}
	
	function batal_booking() {
			$id_transaksi = $this->uri->segment(3);
			$this->home_model->HapusTransaksi($id_transaksi);
			
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi Berhasil di Hapus</div>');
			redirect('home/laporan_booking');
				
		}
  

	public function sewa_hapus($kode) {

		$data = array(
			'rowid' => $kode,
			'qty'   => 0);
			$this->cart->update($data);
		redirect('home/sewa');

	}

	public function sewa_update() {
		$total = $this->cart->total_items();
		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		for($i=0;$i < $total;$i++)
		{
			$data = array(
			'rowid' => $item[$i],
			'qty'   => $qty[$i]);
			$this->cart->update($data);
		}
		redirect('home/sewa');
	}

	public function checkout () {

		$data['logo'] 			= $this->home_model->GetLogo();
		$data['kontak'] 		= $this->home_model->GetKontak();
		$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
		$data['seo'] 			= $this->home_model->GetSeo(); 
		$data['bank'] 			= $this->home_model->GetBank(); 
		$data['kategori'] 		= $this->home_model->GetKategori(); 

		$this->load->view('home/checkout',$data);

	}

	public function checkout_hapus($kode) {

		$data = array(
			'rowid' => $kode,
			'qty'   => 0);
			$this->cart->update($data);
		redirect('home/checkout');

	}

	public function checkout_update() {
		$total = $this->cart->total_items();
		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		for($i=0;$i < $total;$i++)
		{
			$data = array(
			'rowid' => $item[$i],
			'qty'   => $qty[$i]);
			$this->cart->update($data);
		}
		redirect('home/sewa');
	}

	public function checkout_invoice () {

		$this->form_validation->set_rules('nama','Nama Member','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('phone','Phone','required');
		$this->form_validation->set_rules('bank_id','Bank','required');

		if ($this->form_validation->run()==FALSE) {

				$data['logo'] 			= $this->home_model->GetLogo();
				$data['member'] 		= $this->home_model->GetMember();
				$data['kontak'] 		= $this->home_model->GetKontak();
				$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
				$data['seo'] 			= $this->home_model->GetSeo(); 
				$data['bank'] 			= $this->home_model->GetBank();
				$data['jam'] 			= $this->home_model->GetJam();

			$this->load->view('home/checkout',$data);

		}
		else {

			$tgl_skr = date('Ymd');
			$cek_kode = $this->home_model->cek_kode($tgl_skr);
			$kode_trans = "";
			foreach($cek_kode->result() as $ck)
			{
				if($ck->kd==NULL)
				{
					$kode_trans = $tgl_skr.'001';
				}
				else
				{
					$kd_lama = $ck->kd;
					$kode_trans = $kd_lama+1;
				}
			}

			$nama 		= $this->input->post("nama");
			$email 		= $this->input->post("email");
			$alamat 	= $this->input->post("alamat");
			$phone		= $this->input->post("phone");
			$bank_id 	= $this->input->post("bank_id");

			$isi_psn ='<table style="border:1px solid #000;" border="1" cellpadding=0>';
					$isi_psn ='<tr><td>Kode Produk</td><td>Nama Produk</td><td>Harga</td><td>Jumlah</td><td>Subtotal</td></tr>';
					foreach($this->cart->contents() as $items)
					{
					$isi_psn = '<tr><td>'.
					$items["id"].'</td><td>'.
					$items["name"].'</td><td>Rp.'.
					$this->cart->format_number($items["price"]).
					'</td><td>'.$items["qty"].'</td><td>Rp.'.
					$this->cart->format_number($items["subtotal"]).'</td></tr>
';
					}
					$isi_psn = '<tr><td>Total Belanja (belum biaya kirim): </td><td colspan=4>Rp.'.$this->cart->format_number($this->cart->total()).'</td></tr>
';
					$isi_psn ='</table><br>';
					$isi_psn ='Kami akan mengirimkan total yang harus anda bayar ke email anda dalam jangka waktu 1x24 jam.<br>';
					$isi_psn ='Salam, Jayasport';


					$this->load->library('email');
					$this->email->set_mailtype('html');
					$this->email->from("jayasport487@gmail.com", "Admin Jayasport");
					$this->email->to($email);
					$this->email->subject('Detail Booking Lapangan Jayasport');
					$this->email->message($isi_psn);
					$this->email->send();

			$this->home_model->InsertTransaksi($kode_trans,$nama,$email,$alamat,$phone,$bank_id);
			foreach($this->cart->contents() as $items)
						{
							$this->home_model->simpan_pesanan
							("insert into tbl_transaksi_detail (kode_transaksi,kode_lapangan,nama_lapangan,harga,lama_sewa) 
							values('".$kode_trans."','".$items['id']."','".$items['name']."','".$items['price']."','".$items['qty']."')");
							// $this->home_model->update_dibeli($items['id'],$items['qty']);
						}
						$this->cart->destroy();
						?>
						<script type="text/javascript">
						alert("Booking berhasil, kami akan segera memprosesnya dalam waktu 1x24 jam. Silahkan cek email anda beberapa saat lagi untuk melihat rincian detail pembayaran.\n Terima Kasih");			
						</script>
						<?php
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."home/'>";

		}
	}
}