

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <center><h1 class="h3 mb-4 text-gray-800"><b>Data Belum Konfirmasi</b></h1>

          


          <div class="row">
          		<div class="col-lg-12">

          		<?= form_error('menu','<div class="alert alert-danger" role="alert">', '</div>'); ?>
							<?= $this->session->flashdata('message'); ?>



<table class="table table-striped">
  <thead>
    <tr>
			<th scope="col"><center>No</center></th>
			<th scope="col"><center>Kode Transaksi</center></th>
			<th scope="col"><center>Nama Member</center></th>
			<th scope="col"><center>Nama Lapangan</center></th>
			<th scope="col"><center>Tanggal Main</center></th>
			<th scope="col"><center>Lama Sewa</center></th>
			<th scope="col"><center>Pembayaran</center></th>
			<th scope="col"><center>Status</center></th>
			<th scope="col"><center>Aksi</center></th>
    </tr>
  </thead>
	<tbody>
										<?php
										$no=1;
										if ($data_transaksi->num_rows()>0) {
											foreach ($data_transaksi->result_array() as $tampil) { ?>
										<tr >
											<th scope="row"><center><?php echo $no;?></th>
											<td><center><?php echo $tampil['kode_transaksi'];?></td>
											<td><center><?php echo $tampil['nama_member'];?></td>
											<td><center><?php echo $tampil['nama_lapangan'];?></td>
											<td><center><?php echo $tampil['tgl_main'];?></td>
											<td><center><?php echo $tampil['durasi'];?> Jam</td>
											<td><center><?php echo $tampil['nama_bank'];?></td>
											<td><center><?php echo $tampil['status'];?></td>
											
											<td><center>
											<a class="badge badge-primary" href="<?php echo base_url();?>adminweb/transaksi_konfirmasi/<?php echo $tampil['id_transaksi'];?>"><i class="fas fa-fw fa-check-circle"></i> Konfirmasi</a>
											<a class="badge badge-success" href="<?php echo base_url();?>adminweb/transaksi_detail/<?php echo $tampil['id_transaksi'];?>"><i class="fas fa-fw fa-search"></i> Detail</a>
											<!--<a class="badge badge-danger" href="<?php echo base_url();?>adminweb/lapangan_delete/<?php echo $tampil['id_lapangan'];?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_lapangan'];?>?')"> Delete</a>-->
											</td>
	
										</tr>
										<?php
										$no++;
										}
										}
										
										else { ?>
										<tr>
											<td colspan="10">No Result Data</td>
										</tr>
										<?php

										}
										?>
  </tbody>
</table>
          
        </div>
      </div>
    </div>
</div>  