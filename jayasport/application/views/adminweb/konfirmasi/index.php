

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <center><h1 class="h3 mb-4 text-gray-800"><b>Data Konfirmasi Pembayaran</b></h1>

          


          <div class="row">
          		<div class="col-lg-12">

          		<?= form_error('menu','<div class="alert alert-danger" role="alert">', '</div>'); ?>
							<?= $this->session->flashdata('message'); ?>



<table class="table table-striped">
  <thead>
    <tr>
			<th scope="col"><center>No</center></th>
			<th scope="col"><center>Kode Transaksi</center></th>
			<th scope="col"><center>Total Bayar</center></th>
			<th scope="col"><center>Nama Member</center></th>
			<th scope="col"><center>Pembayaran</center></th>
			<th scope="col"><center>Jumlah Bayar</center></th>
			<th scope="col"><center>No. Rekening</center></th>
			<th scope="col"><center>Atas Nama</center></th>
			<th scope="col"><center>Nama Bank</center></th>
			<th scope="col"><center>Pesan</center></th>
    </tr>
  </thead>
	<tbody>
										<?php
										$no=1;
										if ($data_konfirmasi->num_rows()>0) {
											foreach ($data_konfirmasi->result_array() as $tampil) { ?>
										<tr >
											<th scope="row"><center><?php echo $no;?></th>
											<td><center><?php echo $tampil['kode_transaksi'];?></td>
											<td><center>Rp.<?php echo $tampil['total_bayar'];?>,-</td>
											<td><center><?php echo $tampil['nama_member'];?></td>
											<td><center><?php echo $tampil['nama_bank'];?></td>
											<td><center>Rp.<?php echo $tampil['jumlah_bayar'];?>,-</td>
											<td><center><?php echo $tampil['no_rekening'];?></td>
											<td><center><?php echo $tampil['atas_nama'];?></td>
											<td><center><?php echo $tampil['nama_bank'];?></td>
											<td><center><?php echo $tampil['pesan'];?></td>
											
											<!--<td><center>
											<a class="badge badge-primary" href="<?php echo base_url();?>adminweb/transaksi_konfirmasi/<?php echo $tampil['id_konfirmasi'];?>"> Konfirmasi</a>
											<a class="badge badge-success" href="<?php echo base_url();?>adminweb/transaksi_detail/<?php echo $tampil['id_konfirmasi'];?>"> Detail</a>
											<a class="badge badge-danger" href="<?php echo base_url();?>adminweb/lapangan_delete/<?php echo $tampil['id_lapangan'];?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_lapangan'];?>?')"> Delete</a>
											</td>-->
	
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