<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<center><h1 class="h3 mb-4 text-gray-800"><b>Edit Rekening Bank</b></h1></center>

        <div class = "row">
		 	<div class = "col-lg-8">

				 <?= form_open_multipart('adminweb/bank_update/'); ?>
				<input type="hidden" name='id_bank' value="<?php echo $id_bank;?>"> 
				

		 		<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Nama Bank</label>
		 			<div class="col-sm-4">
		 				<input type="text" class="form-control" id="nama_bank" name="nama_bank" value="<?php echo $nama_bank;?>">
		 			</div>
		 		</div>

		 		<div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">Nama Pemilik</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="<?php echo $nama_pemilik;?>">
		 				<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
		 			</div>
				 </div>
				 
				 <div class="form-group row">
		 			<label for="email" class="col-sm-2 col-form-label">No. Rekening</label>
		 			<div class="col-sm-5">
		 				<input type="text" class="form-control" id="no_rekening" name="no_rekening" value="<?php echo $no_rekening;?>">
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
										<!--<span class="fileupload-new">Select file</span>-->
										<!--<span class="fileupload-exists">Change</span>-->
										<input type="file" name="userfile" class="default" />
									</span>
									<!--<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>-->
							</div>
						</div>
					</div>
				</div>

		 		<!--<div class="form-group row">
		 			<div class="col-sm-2">Picture</div>
		 				<div class="col-sm-10">
		 					<div class="row">
		 						<div class="col-sm-3">
		 							<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
		 						</div>
		 						<div class="col-sm-9">
		 							<div class="custom-file">
		 								<input type="file" class="custom-file-input" id="image" name="image">
		 								<label class="custom-file-label" for="image">Choose file</label>
		 							</div>
		 						</div>
		 					</div>
		 				</div>
		 			</div>
		 		</div>-->
		 	</div>
		</div>	
		<br />
		<div class="form-group row">
			<div class="col-sm-5">
				<button type="submit" class="btn btn-primary">Update</button>
					<?php echo form_close(); ?>
				<a href="<?php echo base_url();?>adminweb/bank/"><button class="btn btn-secondary">Kembali</button></a>	 				
		 	</div>
		</div>


         	</div>
		</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      