<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<center><h1 class="h3 mb-4 text-gray-800"><b>Detail Sudah Konfirmasi</b></h1></center>

          


  	<div class="row">
      <div class="col-lg-12">
				<?= form_error('menu','<div class="alert alert-danger" role="alert">', '</div>'); ?>
				<?= $this->session->flashdata('message'); ?>


<h4 class="h4 mb-4 text-gray-800">Detail Identitas</h4>
<table class="table table-striped">
  <thead>
    <tr>
			<th scope="col"><center>No</center></th>
			<th scope="col"><center>Kode Transaksi</center></th>
			<th scope="col"><center>Nama Member</center></th>
			<th scope="col"><center>Email</center></th>
			<th scope="col"><center>Alamat</center></th>
			<th scope="col"><center>No.Telp</center></th>
    </tr>
  </thead>
	
	<tbody>
		<?php
			$no=1;
			if ($data_detail_sudah->num_rows()>0) {
			foreach ($data_detail_sudah->result_array() as $tampil) 
		{ ?>
			<tr>
				<th scope="row"><center><?php echo $no;?></th>
						<td><center><?php echo $tampil['kode_transaksi'];?></td>
						<td><center><?php echo $tampil['nama_member'];?></td>
						<td><center><?php echo $tampil['email'];?></td>
						<td><center><?php echo $tampil['alamat'];?></td>
						<td><center>+(62) <?php echo $tampil['phone'];?></td>
			</tr>
		<?php
			$no++;
			}
			}
			else 
		{ ?>
			<tr>
				<td colspan="10">No Result Data</td>
			</tr>
		<?php
		} ?>
  </tbody>
</table>

<br />

<h4 class="h4 mb-4 text-gray-800">Detail Transaksi</h4>
		<?php
			$no=1;
			if ($data_detail_sudah->num_rows()>0) {
			foreach ($data_detail_sudah->result_array() as $tampil) 
		{ ?>

<center> <b>( Tanggal Booking : <?php echo $tampil['tgl_booking'];?> ) ===== ( Jam Booking :  <?php echo $tampil['jam_booking'];?> )</b> </center> 
<table class="table table-striped">
  <thead>
    <tr>
			<th scope="col"><center>No</center></th>
			<th scope="col"><center>Kode Transaksi</center></th>
			<th scope="col"><center>Kode Lapangan</center></th>
			<th scope="col"><center>Nama Lapangan</center></th>
			<th scope="col"><center>Tanggal Main</center></th>
			<th scope="col"><center>Jam Mulai</center></th>
			<th scope="col"><center>Durasi</center></th>
			<th scope="col"><center>Pembayaran</center></th>
    </tr>
  </thead>

	<tbody>
			<tr>
				<th scope="row"><center><?php echo $no;?></th>
						<td><center><?php echo $tampil['kode_transaksi'];?></td>
						<td><center><?php echo $tampil['kode_lapangan'];?></td>
						<td><center><?php echo $tampil['nama_lapangan'];?></td>
						<td><center><?php echo $tampil['tgl_main'];?></td>
						<td><center><?php echo $tampil['jam_mulai'];?> s/d <?php echo $tampil['jam_selesai'];?></td>
						<td><center><?php echo $tampil['durasi'];?> Jam</td>
						<td><center><?php echo $tampil['nama_bank'];?></td>
			</tr>
		<?php
			$no++;
			}
			}
			else 
		{ ?>
			<tr>
				<td colspan="10">No Result Data</td>
			</tr>
		<?php
		} ?>
  </tbody>
</table>
<b>( Total : Rp.<?php echo $tampil['total'];?>,- ) (<?php echo $tampil['status'];?>)</b>
<br />
<p>
<div class="btn-group">
  <a href="<?php echo base_url();?>adminweb/transaksi_sudah/"> <button class="btn btn-secondary"> Kembali</button></a>
</div>
          

      </div>
    </div>
</div>  