<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<center><h1 class="h3 mb-4 text-gray-800"><b>Sosial Media</b></h1></center>

    <div class = "row">
		 	<div class = "col-lg-8">
			 <?= $this->session->flashdata('message'); ?>

				<?= form_open_multipart('adminweb/sosial_media_simpan/'); ?>
				<input type="hidden" name='id_sosial_media' value="<?php echo $id_sosial_media;?>">
				<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Twitter</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="tw" name="tw" value="<?php echo $tw;?>">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				</div>

				<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Facebook</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="fb" name="fb" value="<?php echo $fb;?>">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				</div>

				<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Google Plus</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="gp" name="gp" value="<?php echo $gp;?>">
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

      