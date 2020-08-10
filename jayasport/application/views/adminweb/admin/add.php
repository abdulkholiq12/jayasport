<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Tambah Admin</h1>

        <div class = "row">
		 	<div class = "col-lg-8">

				 <?= form_open_multipart('adminweb/admin_simpan/'); ?>
				<div class="form-group row">
		 			<label for="kode_admin" class="col-sm-2 col-form-label">Kode Admin</label>
		 			<div class="col-sm-4">
		 				<input type="text" class="form-control" id="kode_admin" name="kode_admin" placeholder="Kode Admin" value="<?php echo $kode_admin;?>" readonly="true" />
		 			</div>
		 		</div>

		 		<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Nama Admin</label>
		 			<div class="col-sm-4">
		 				<input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Nama Admin..">
		 			</div>
		 		</div>

		 		<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Username</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="username" name="username" placeholder="Username..">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				 
				 <div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Password</label>
		 			<div class="col-sm-5">
		 					<input type="password" class="form-control" id="password" name="password" placeholder="Password..">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				 
				 <div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Email</label>
		 			<div class="col-sm-5">
		 				<input type="email" class="form-control" id="email" name="email" placeholder="Email..">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				 
				 <div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Phone</label>
		 			<div class="col-sm-4">
		 					<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone..">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>

				 <div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Alamat</label>
		 			<div class="col-sm-7">
		 					<textarea type="text" rows="7" class="form-control" id="alamat" name="alamat" placeholder="Alamat.."></textarea>
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
		 	</div>
		</div>	
		
		<div class="form-group row">
			<div class="col-sm-6">			 				
			 	<button type="submit" class="btn btn-primary">Tambah</button>	
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

      