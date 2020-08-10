<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<center><h1 class="h3 mb-4 text-gray-800"><b>Tambah Lapangan</b></h1></center>

        <div class = "row">
		 	<div class = "col-lg-8">

				 <?= form_open_multipart('adminweb/lapangan_simpan/'); ?>
				<input type="hidden" name='id_lapangan' value=""> 


		 		<div class="form-group row">
		 			<label for="email" class="col-sm-3 col-form-label">Kode Lapangan</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="kode_lapangan" name="kode_lapangan" value="<?php echo $kode_lapangan;?>" readonly="true" />
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				</div>
				 
				 <div class="form-group row">
		 			<label for="description" class="col-sm-3 col-form-label">Nama Lapangan</label>
		 			<div class="col-sm-7">
		 				<input type="text" class="form-control" id="nama_lapangan" name="nama_lapangan" value="" placeholder="Nama Lapangan..">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>

				 <div class="form-group row">
		 			<label for="description" class="col-sm-3 col-form-label">Harga</label>
		 			<div class="col-sm-7">
		 				<input type="text" class="form-control" id="harga" name="harga" value="" placeholder="Harga.."></textarea>
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				
				<div class="form-group row">
				<label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
					<div class="controls">
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input">
									<i class="icon-file fileupload-exists"></i> 
									<span class="fileupload-preview"></span>
								</div>
									<span class="btn btn-file">
										<!--<span class="fileupload-new">Select file</span>-->
										<!--<span class="fileupload-exists">Change</span>-->
										<input type="file" name="userfile" class="default" />
									</span>
									<!--<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>-->
							</div>
						</div>
					</div>
				</div>
		 	</div>
		</div>	
		<br />
		<div class="form-group row">
			<div class="col-sm-5">
				<button type="submit" class="btn btn-primary">Tambah</button>
				 <?php echo form_close(); ?>
				 <a href="<?php echo base_url();?>adminweb/lapangan/">
				<button class="btn btn-secondary">Kembali</button></a>		
		 	</div>
		</div>


         	</div>
		</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      