<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<center><h1 class="h3 mb-4 text-gray-800"><b>Kontak</b></h1></center>

    <div class = "row">
		 	<div class = "col-lg-8">
			 <?= $this->session->flashdata('message'); ?>

				 <?= form_open_multipart('adminweb/kontak_simpan/'); ?>
				 
				<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Telephone</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone;?>">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				</div>

				<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">email</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				</div>

				<div class="form-group row">
					<input type="hidden" name='id_kontak' value="<?php echo $id_kontak;?>"> 
		 			<label for="description" class="col-sm-2 col-form-label">Alamat</label>
		 			<div class="col-sm-7">
		 				<textarea class="form-control" rows="7" id="alamat" name="alamat" value="<?php echo $alamat;?>"><?php echo $alamat;?></textarea>
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				 
				
			
		 	</div>
		</div>	
		<br />
		<div class="form-group row">
			<div class="col-sm-5">
				<button type="submit" class="btn btn-primary">Update</button>
					<?php echo form_close(); ?>
				<a href="<?php echo base_url();?>adminweb/home/"><button class="btn btn-secondary">Kembali</button></a>	 				
		 	</div>
		</div>


         	</div>
		</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      