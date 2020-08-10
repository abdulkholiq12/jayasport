<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<center><h1 class="h3 mb-4 text-gray-800"><b>Tentang Kami</b></h1></center>

<?= $this->session->flashdata('message'); ?>

    <div class = "row">
		 	<div class = "col-lg-8">

				 <?= form_open_multipart('adminweb/tentangkami_simpan/'); ?>
				<input type="hidden" name='id_tentangkami' value="<?php echo $id_tentangkami;?>"> 

		 		<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Judul</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul;?>">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				</div>
				 
				 <div class="form-group row">
		 			<label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
		 			<div class="col-sm-8">
		 				<textarea class="form-control" rows="7" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi;?>"><?php echo $deskripsi;?></textarea>
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

      