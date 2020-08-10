<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Tambah Member</h1>

        <div class = "row">
		 	<div class = "col-lg-8">

				 <?= form_open_multipart('adminweb/member_simpan/'); ?>
				<input type="hidden" name='id_user' value=""> 
				<!--<div class="form-group row">
					<label for="akses" class="col-sm-2 col-form-label">Akses</label>
					<div class="col-sm-4">
				 		<select name="akses" id="akses" class="form-control">
					<option value="">Pilih Akses</option>	
					<option value="admin">Admin</option>
					<option value="member">Member</option>
				</select>
					</div>
				</div>-->

		 		<div class="form-group row">
		 			<label for="kode_member" class="col-sm-3 col-form-label">Kode Member</label>
		 			<div class="col-sm-4">
		 				<input type="text" class="form-control" id="kode_member" name="kode_member" placeholder="Kode Member" value="<?php echo $kode_member;?>" readonly="true" />
		 			</div>
		 		</div>

				<div class="form-group row">
		 			<label for="nama_member" class="col-sm-3 col-form-label">Nama Member</label>
		 			<div class="col-sm-4">
		 				<input type="text" class="form-control" id="nama_member" name="nama_member" placeholder="Nama Member..">
		 			</div>
		 		</div>

		 		<div class="form-group row">
		 			<label for="email" class="col-sm-3 col-form-label">Username</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="username" name="username" placeholder="Username..">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				 
				 <div class="form-group row">
		 			<label for="email" class="col-sm-3 col-form-label">Password</label>
		 			<div class="col-sm-5">
		 					<input type="password" class="form-control" id="password" name="password" placeholder="Password..">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				 
				 <div class="form-group row">
		 			<label for="email" class="col-sm-3 col-form-label">Email</label>
		 			<div class="col-sm-5">
		 				<input type="email" class="form-control" id="email" name="email" placeholder="Email..">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				 
				 <div class="form-group row">
		 			<label for="email" class="col-sm-3 col-form-label">Phone</label>
		 			<div class="col-sm-4">
		 					<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone..">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>

				 <div class="form-group row">
		 			<label for="email" class="col-sm-3 col-form-label">Alamat</label>
		 			<div class="col-sm-7">
		 					<textarea type="text" rows="7" class="form-control" id="alamat" name="alamat" placeholder="Alamat.."></textarea>
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
		 	</div>
		</div>	
		
		<div class="form-group row">
			<div class="col-sm-5">
				<button type="submit" class="btn btn-primary">Tambah</button>
				 <?php echo form_close(); ?>
				 <a href="<?php echo base_url();?>adminweb/member/">
				<button class="btn btn-secondary">Kembali</button></a>		
		 	</div>
		</div>


         	</div>
		</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      