<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<center><h1 class="h3 mb-4 text-gray-800"><b>Logo</b></h1></center>

    <div class = "row">
		 	<div class = "col-lg-8">
			 <?= $this->session->flashdata('message'); ?>

				 <?= form_open_multipart('adminweb/logo_simpan/'); ?>
				 
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
										<!--<span class="fileupload-new">Select file</span>-->
										<!--<span class="fileupload-exists">Change</span>-->
										<input type="file" name="userfile" class="default" />
										<input type="hidden" name="id_logo" value="<?php echo $id_logo;?>">
									</span>
									<!--<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>-->
							</div>
						</div>
					</div>
				</div>
		 	</div>
		</div>	
		<br />
		<span class="label label-important">NOTE!</span>
						<p>
						File yang diperbolehkan hanya dalam format gif, jpg, png, jpeg resolusi file gambar 373PX x 100PX dan ukuran maksimal file sebesar 3 MB
						</p>
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

      