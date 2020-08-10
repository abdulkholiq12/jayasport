<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Admin</h1>

        <div class = "row">
		 	<div class = "col-lg-8">

				 <?= form_open_multipart('adminweb/admin_update/'); ?>
				<div class="form-group row">
		 			<label for="text" class="col-sm-2 col-form-label">Kode Admin</label>
		 			<div class="col-sm-4">
		 				<input type="text" class="form-control" id="kode_admin" name="kode_admin" placeholder="Kode Admin.." value="<?php echo $kode_admin;?>" readonly="true" />
		 			</div>
		 		</div>

		 		<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Nama Admin</label>
		 			<div class="col-sm-4">
		 				<input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Nama Admin.." value="<?php echo $nama_admin;?>">
		 			</div>
		 		</div>

		 		<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Username</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="username" name="username" value="<?php echo $username;?>">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				 
				 <div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Password</label>
		 			<div class="col-sm-5">
		 				<input type="password" class="form-control" id="password" name="password" value="">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				 
				 <div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Email</label>
		 			<div class="col-sm-5">
		 				<input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				 
				 <div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Phone</label>
		 			<div class="col-sm-4">
		 				<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone;?>">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>

				 <div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Alamat</label>
		 			<div class="col-sm-7">
		 				<textarea type="text" rows="7"class="form-control" id="alamat" name="alamat" value="<?php echo $alamat;?>"><?php echo $alamat;?></textarea>
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				<br />
				 <span class="label label-important">NOTE!</span>
											<span>
											Jika Password tidak dirubah maka cukup dikosongkan saja
											</span>
		 	</div>
		</div>	
		<br />
		<div class="form-group row">
			<div class="col-sm-5">				
			 	<button type="submit" class="btn btn-primary">Update</button>
				 <?php echo form_close(); ?>
				 <a href="<?php echo base_url();?>adminweb/admin/">
				<button class="btn btn-secondary">Kembali</button></a>		
		 	</div>
		</div>
		


         	</div>
		</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      