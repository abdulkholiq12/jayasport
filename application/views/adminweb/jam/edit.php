<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<center><h1 class="h3 mb-4 text-gray-800"><b>Edit Jam</b></h1></center>

        <div class = "row">
		 	<div class = "col-lg-8">

				 <?= form_open_multipart('adminweb/jam_update/'); ?>
				<input type="hidden" name='id_jam' value="<?php echo $id_jam;?>"> 

		 		<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Jam Mulai</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="jam_mulai" name="jam_mulai" value="<?php echo $jam_mulai;?>">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				</div>

				<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Jam Selesai</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="jam_selesai" name="jam_selesai" value="<?php echo $jam_selesai;?>">
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
				 <a href="<?php echo base_url();?>adminweb/jam/">
				<button class="btn btn-secondary">Kembali</button></a>		
		 	</div>
		</div>


         	</div>
		</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      