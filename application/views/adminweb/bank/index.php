

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <center><h1 class="h3 mb-4 text-gray-800"><b>Rekening Bank</b></h1></center>

          


          <div class="row">
          		<div class="col-lg-12">

          		<?= form_error('menu','<div class="alert alert-danger" role="alert">', '</div>'); ?>
          		
          		<a href="<?php echo base_url();?>adminweb/bank_tambah" class="btn btn-primary mb-3" >Tambah Rekening Baru</a>
							<br />

          		<?= $this->session->flashdata('message'); ?>



<table class="table table-striped">
  <thead>
    <tr>
			<th scope="col"><center>No</center></th>
			<th scope="col"><center>Nama Bank</center></th>
			<th scope="col"><center>Nama Pemilik</center></th>
			<th scope="col"><center>No Rekening</center></th>
			<th scope="col"><center>Action</center></th>
    </tr>
  </thead>
	<tbody>
										<?php
										$no=1;
										if ($data_bank->num_rows()>0) {
											foreach ($data_bank->result_array() as $tampil) { ?>
										<tr >
											<th scope="row"><center><?php echo $no;?></center></th>
											<td><center><?php echo $tampil['nama_bank'];?></center></td>
											<td><center><?php echo $tampil['nama_pemilik'];?></center></td>
											<td><center><?php echo $tampil['no_rekening'];?></center></td>
											
											<td><center>
											<a class="badge badge-success" href="<?php echo base_url();?>adminweb/bank_edit/<?php echo $tampil['id_bank'];?>"> Edit</a>
											<a class="badge badge-danger" href="<?php echo base_url();?>adminweb/bank_delete/<?php echo $tampil['id_bank'];?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_pemilik'];?>?')"> Delete</a>
											</center>
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