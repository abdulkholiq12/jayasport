

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <center><h1 class="h3 mb-4 text-gray-800"><b>Data Lapangan</b></h1></center>

          


          <div class="row">
          		<div class="col-lg-12">

          		<?= form_error('menu','<div class="alert alert-danger" role="alert">', '</div>'); ?>
          		
          		<a href="<?php echo base_url();?>adminweb/lapangan_tambah" class="btn btn-primary mb-3" >Tambah Lapangan Baru</a>
							<br />

          		<?= $this->session->flashdata('message'); ?>



<table class="table table-striped">
  <thead>
    <tr>
			<th scope="col"><center>No</center></th>
			<th scope="col"><center>Kode Lapangan</center></th>
			<th scope="col"><center>Nama Lapangan</center></th>
			<th scope="col"><center>Harga</center></th>
			<th scope="col"><center>Gambar</center></th>
			<th scope="col"><center>Action</center></th>
    </tr>
  </thead>
	<tbody>
										<?php
										$no=1;
										if ($data_lapangan->num_rows()>0) {
											foreach ($data_lapangan->result_array() as $tampil) { ?>
										<tr >
											<th scope="row"><center><?php echo $no;?></center></th>
											<td><center><?php echo $tampil['kode_lapangan'];?></center></td>
											<td><center><?php echo $tampil['nama_lapangan'];?></center></td>
											<td><center><?php echo $tampil['harga'];?></center></td>
											<td><center><?php echo $tampil['gambar'];?></center></td>
											
											<td><center>
											<a class="badge badge-success" href="<?php echo base_url();?>adminweb/lapangan_edit/<?php echo $tampil['id_lapangan'];?>"><i class="fas fa-fw fa-edit"></i> Edit</a>
											<a class="badge badge-danger" href="<?php echo base_url();?>adminweb/lapangan_delete/<?php echo $tampil['id_lapangan'];?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_lapangan'];?>?')"><i class="fas fa-fw fa-eraser"></i> Delete</a>
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

<!-- Modal 
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" 
aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Tambah User Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

			<?php if(validation_errors()) { ?>
								<div class="alert alert-success" role="alert">
								  <button type="button" class="close" data-dismiss="alert">×</button>
									<?php echo validation_errors(); ?>
								</div>
								<?php 
								} 
								?>

      <form action="<?php echo base_url();?>adminweb/admin_simpan/" method="post">

      <div class="modal-body">
				<div class="form-group">
				<select name="akses" id="akses" class="form-control">
					<option value="">Pilih Akses</option>	
					<option value="admin">Admin</option>
					<option value="member">Member</option>
				</select>
			
  		</div>

      <div class="form-group">
				<input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Nama">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="username" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<input type="email" class="form-control" id="email" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
			</div>
			

      
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>   