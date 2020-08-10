<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<center><h1 class="h3 mb-4 text-gray-800"><b>Tambah Slider</b></h1></center>
<?= $this->session->flashdata('message'); ?>

        <div class = "row">
		 	<div class = "col-lg-8">

				 <?= form_open_multipart('adminweb/slider_simpan/'); ?>
				<input type="hidden" name='id_slider' value=""> 
		 		<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Aktif</label>
					 <div class="col-sm-2">
		 				<div class="form-grup">
              				<select name="status" id="status" class="form-control">

								<?php
									if ($status=="1") { ?>
									<option value="1" selected="selected">Y</option>
									<option value="0">N</option>
								<?php
									}
									else if ($status=="0"){?>
									<option value="1">Y</option>
									<option value="0" selected="selected">N</option>
								<?php
									}
									else { ?>
									<option value="1">Y</option>
									<option value="0">N</option>
								<?php
									}
								?>
            
              				</select>
						</div>
					</div>
		 		</div>

		 		<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Judul</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="tittle" name="tittle" value="" placeholder="Judul..">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				</div>
				 
				 <div class="form-group row">
		 			<label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
		 			<div class="col-sm-7">
		 				<textarea class="form-control" rows="7" id="description" name="description" value="" placeholder="Deskripsi.."></textarea>
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				
				<div class="form-group row">
				<label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
					<div class="controls">
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input">
									<i class="icon-file fileupload-exists"></i> 
									<span class="fileupload-preview"></span>
								</div>
									<span class="btn btn-file">
										<input type="file" name="userfile" class="default" />
									</span>
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
				 <a href="<?php echo base_url();?>adminweb/slider/">
				<button class="btn btn-secondary">Kembali</button></a>		
		 	</div>
		</div>


         	</div>
		</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      