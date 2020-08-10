<?php

class home_model extends CI_Model {

//Awal Login //
	function cekMemberLogin($username,$password) {

			$ceklogin = $this->db->query("select * from tbl_member where username='$username' and password='$password'");

		if (count($ceklogin->result())>0) {
			
			foreach ($ceklogin->result() as $value) {
				$sess_data['logged_in'] 	= 'OkeUser';
				$sess_data['id_member']  	= $value->id_member;
				$sess_data['nama_member']  	= $value->nama_member;
				$sess_data['username']  	= $value->username;
				$sess_data['password']  	= $value->password;
				$sess_data['email']  		= $value->email;
				$sess_data['phone']  		= $value->phone;
				$sess_data['alamat']  		= $value->alamat;
				$array = array(
                'id' => $id,
                'nama'=>$nama,
                'pelanggan'=>'1'
              );
				

				$this->session->set_userdata($sess_data,$array);

			}
			redirect("home/index");
		}
		else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password Salah!</div>');
			redirect('home/index');
		}

	}

	function InsertDaftar($nama,$username,$password,$email,$phone,$alamat) {
		return $this->db->query("insert into tbl_member values('$nama','$username','$password','$email','$phone','$alamat')");
	}

	function GetMemberss ($id) {

		return $this->db->query("select * from tbl_member where id_member='$id' ");
	}

	function GetMembers ($username) {

		return $this->db->query("select * from tbl_member where username='$username' ");
	}

	function GetLaporanBooking ($kode_member) {

		return $this->db->query("select * from tbl_transaksi where kode_member='$kode_member' ");
	}

	function GetMaxKodeMember() {

		$query = $this->db->query("select MAX(RIGHT(kode_member,3)) as kode_member from tbl_member");
		$kode ="";
		if($query->num_rows()>0) {
			foreach ($query->result() as $tampil) {
				$kd = ((int)$tampil->kode_member)+1;
				$kode = sprintf("%03s",$kd);
			}
		}
		else {
			$kode="001";
		}
		return "MBR".$kode;
	}


//Akhir Member //



	//Awal Member //
	function GetMember() {
		return $this->db->query("select * from tbl_member");
	}
	function GetMemberEdit($id) {
		return $this->db->query("select * from tbl_member where id_member='$id' ");
	}
	// Akhir Member //

	function GetLogo() {
		return $this->db->query("select * from tbl_logo");
	}

	function GetKontak() {
		return $this->db->query("select * from tbl_kontak");
	}

	function GetSosialMedia() {
		return $this->db->query("select * from tbl_sosial_media");
	}

	function GetSeo() {
		return $this->db->query("select * from tbl_seo");
	}

	function GetBank() {
		return $this->db->query("select * from tbl_bank order by id_bank desc");
	}

	function GetJam() {
		return $this->db->query("select * from tbl_jam order by id_jam asc");
	}

	function GetBrand() {
		return $this->db->query("select * from tbl_brand order by id_brand desc");
	}

	function GetSlider(){
		return $this->db->query("select * from tbl_slider where status='1' order by id_slider desc");
	}

	function GetKategori() {
		return $this->db->query("select * from tbl_kategori order by id_kategori desc");
	}

	function GetProduk() {
		return $this->db->query("select a.*,b.*,c.* from tbl_produk a join tbl_brand b on a.brand_id=b.id_brand join tbl_kategori c on a.kategori_id=c.id_kategori order by id_produk desc limit 0,6 ");
	}

	function GetRandomProduk() {
		return $this->db->query("select a.*,b.*,c.* from tbl_produk a join tbl_brand b on a.brand_id=b.id_brand join tbl_kategori c on a.kategori_id=c.id_kategori order by RAND('id_produk') asc limit 0,3 ");
	}

	function GetRandomActiveProduk() {
		return $this->db->query("select a.*,b.*,c.* from tbl_produk a join tbl_brand b on a.brand_id=b.id_brand join tbl_kategori c on a.kategori_id=c.id_kategori order by RAND('id_produk') desc limit 0,3 ");
	}

	function GetRandomActiveLapangan() {
		return $this->db->query("select * from tbl_lapangan order by RAND('id_lapangan') asc limit 0,3 ");
	}

	function GetTentangKami(){
		return $this->db->query("select * from tbl_tentangkami");
	}

	function GetCaraBooking() {
		return $this->db->query("select * from tbl_carabooking");
	}

	function InsertHubungiKami($nama,$email,$hp,$alamat,$pesan,$tanggal) {
		return $this->db->query("insert into tbl_hubungikami values('','$nama','$email','$hp','$alamat','$pesan','$tanggal','')");
	}

	function GetJasaPengiriman() {
		return $this->db->query("select * from tbl_jasapengiriman order by id_jasapengiriman desc");
	}

	function GetProdukKategori($id_kategori) {
		return $this->db->query("select a.*,b.* from tbl_produk a join tbl_kategori b on a.kategori_id=b.id_kategori  where a.kategori_id='$id_kategori' order by a.id_produk desc");
	}

	function GetNamaKategoriId($id_kategori) {
		return $this->db->query("select * from tbl_kategori where id_kategori='$id_kategori'");
	}

	function GetProdukBrand($id_brand) {
		return $this->db->query("select a.*,b.* from tbl_produk a join tbl_brand b on a.brand_id=b.id_brand  where a.brand_id='$id_brand' order by a.id_produk desc");
	}

	function GetNamaBrandId($id_brand) {
		return $this->db->query("select * from tbl_brand where id_brand='$id_brand'");
	}


	function GetProdukCari($cari) {
		return $this->db->query("select a.*,b.*,c.* from tbl_produk a join tbl_kategori b on a.kategori_id=b.id_kategori join tbl_brand c on a.brand_id=c.id_brand where a.nama_produk like '%".$cari."%' or b.nama_kategori like '%".$cari."%' or c.nama_brand like '%".$cari."%' order by a.id_produk desc"); 
	} 

	function GetProdukId($id_produk) {
		return $this->db->query("select a.*,b.*,c.* from tbl_produk a join tbl_kategori b on a.kategori_id=b.id_kategori join tbl_brand c on a.brand_id=c.id_brand where a.id_produk='$id_produk'");
	}

	function cek_kode($tgl)
	{
		$query=$this->db->query("select MAX(kode_transaksi) as kd from tbl_transaksi where kode_transaksi like '%$tgl%'");
		return $query;
	}

	function GetLapanganId($id_lapangan) {
		return $this->db->query("select * from tbl_lapangan where id_lapangan='$id_lapangan'");
	}

	function GetLapanganKode($kode_lapangan) {
		return $this->db->query("select * from tbl_lapangan where kode_lapangan='$kode_lapangan'");
	}

	function GetLapangan() {
		return $this->db->query("select * from tbl_lapangan");
	}

	function GetJadwal() {
		return $this->db->query("select * from tbl_transaksi");
	}

	function GetDetailJadwal($id_transaksi){
		return $this->db->query("select a.*,b.*,c.*,d.* from tbl_transaksi a
		join tbl_member b on a.member_id=b.id_member
		join tbl_lapangan c on a.lapangan_id=c.id_lapangan 
		join tbl_bank d on a.bank_id=d.id_bank where id_transaksi='$id_transaksi'");
	}

	function GetCetakDetail($id_transaksi){
		return $this->db->query("select a.*,b.*,c.*,d.* from tbl_transaksi a
		join tbl_member b on a.member_id=b.id_member
		join tbl_lapangan c on a.lapangan_id=c.id_lapangan 
		join tbl_bank d on a.bank_id=d.id_bank where id_transaksi='$id_transaksi'");
	}

	function GetRandomLapangan() {
		return $this->db->query("select * from tbl_lapangan");
	}

	function GetTransaksi($id_member){
		return $this->db->query("select a.*,b.*,c.*,d.* from tbl_transaksi a
		join tbl_member b on a.member_id=b.id_member
		join tbl_lapangan c on a.lapangan_id=c.id_lapangan 
		join tbl_bank d on a.bank_id=d.id_bank where id_member='$id_member'");
	}

	function GetDetailTransaksi($id_transaksi){
		return $this->db->query("select a.*,b.*,c.*,d.* from tbl_transaksi a
		join tbl_member b on a.member_id=b.id_member
		join tbl_lapangan c on a.lapangan_id=c.id_lapangan 
		join tbl_bank d on a.bank_id=d.id_bank where id_transaksi='$id_transaksi'");
	}

	function HapusTransaksi($id) {
		return $this->db->query("delete from tbl_transaksi where id_transaksi='$id'");
	}

	function GetKonfirmasi($id_transaksi){
		return $this->db->query("select a.*,b.*,c.*,d.* from tbl_transaksi a
		join tbl_member b on a.member_id=b.id_member
		join tbl_lapangan c on a.lapangan_id=c.id_lapangan 
		join tbl_bank d on a.bank_id=d.id_bank where id_transaksi='$id_transaksi'");
	}

	function GetTransaksiheader($id) {
		return $this->db->query("select a.*,b.*,c.* from tbl_transaksi_header a
		join tbl_bank b on a.bank_id=b.id_bank
		join  tbl_jasapengiriman c on a.jasapengiriman_id=c.id_jasapengiriman
		where a.id_transaksi_header='$id' ");
	}

	public function kode_transaksi(){
        $this->db->select('right(kode_transaksi,3) as kode', false);
        $this->db->order_by('kode_transaksi','desc');
        $this->db->limit(1);
        $query=$this->db->get('tbl_transaksi');
        if($query->num_rows()<>0){
            $data=$query->row();
            $kode=intval($data->kode)+1;
        }else{
            $kode=1;
        }

        $kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
        $kodejadi='TR'.$kodemax;

        return $kodejadi;
	}
	
	function GetMaxKodeTransaksi() {

		$query = $this->db->query("select MAX(RIGHT(kode_transaksi,3)) as kode_transaksi from tbl_transaksi");
		$kode ="";
		if($query->num_rows()>0) {
			foreach ($query->result() as $tampil) {
				$kd = ((int)$tampil->kode_transaksi)+1;
				$kode = sprintf("%03s",$kd);
			}
		}
		else {
			$kode="001";
		}
		return "TRS".$kode;
	}


	function update_dibeli($kd,$bl)
	{
		$query=$this->db->query("update tbl_produk set stok='$bl' where kode_produk='$kd'");
	}

	function simpan_pesanan($datainput)
	{
		$q = $this->db->query($datainput);
	}


	function InsertTransaksi($kode_trans,$nama,$email,$phone,$alamat,$bank_id) {
		return $this->db->query("insert into tbl_transaksi values('','$kode_trans','$nama','$email','$phone','$alamat','$bank_id','')");
	}
}