

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <center><h1 class="h3 mb-4 text-gray-800"><b>Data Admin</b></h1></center>

          


          <div class="row">
          		<div class="col-lg-12">

          		<?= form_error('menu','<div class="alert alert-danger" role="alert">', '</div>'); ?>
          		
          		<!--<a href="<?php echo base_url();?>adminweb/admin_tambah" class="btn btn-primary mb-3" >Tambah Admin Baru</a>-->

          		<?= $this->session->flashdata('message'); ?>



<table class="table table-striped">
  <thead>
    <tr>
			<th scope="col"><center>No</center></th>
			<th scope="col"><center>Kode Admin</center></th>
			<th scope="col"><center>Nama Admin</center></th>
			<th scope="col"><center>Username</center></th>
			<th scope="col"><center>Password</center></th>
			<th scope="col"><center>Email</center></th>
			<th scope="col"><center>Phone</center></th>
			<th scope="col"><center>Alamat</center></th>
			<th scope="col"><center>Action</center></th>
    </tr>
  </thead>
	<tbody>
										<?php
										$no=1;
										if ($data_admin->num_rows()>0) {
											foreach ($data_admin->result_array() as $tampil) { ?>
										<tr >
											<th scope="row"><center><?php echo $no;?></center></th>
											<td><center><?php echo $tampil['kode_admin'];?></center></td>
											<td><center><?php echo $tampil['nama_admin'];?></center></td>
											<td><center><?php echo $tampil['username'];?></center></td>
											<td><center><b>**********</b></center></td>
											<td><center><?php echo $tampil['email'];?></center></td>
											<td><center>+(62) <?php echo $tampil['phone'];?></center></td>
											<td><center><?php echo $tampil['alamat'];?></center></td>	
											
											<td><center>
											<!--<a class="badge badge-success" href="<?php echo base_url();?>adminweb/admin_edit/<?php echo $tampil['kode_admin'];?>"> Edit</a>-->
											<a class="badge badge-danger" href="<?php echo base_url();?>adminweb/admin_delete/<?php echo $tampil['kode_admin'];?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_admin'];?>?')"> Delete</a>
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