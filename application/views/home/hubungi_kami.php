<?php
$this->load->view('layout/head');
$this->load->view('layout/header');
$this->load->view('layout/nav');
?>
	
	
	<div id="contact-page" class="container">
    	<div class="bg">
	    	  	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Hubungi Kami</h2>
	    				<?php 
									
							if ($this->session->flashdata('sukses')){
								echo "<div class='alert alert-block alert-success show'>
									  	<button type='button' class='close' data-dismiss='alert'>×</button>
										<span>Pesan Berhasil Dikirim</span>
									</div>";
							}
												
							?>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url();?>home/hubungi_kami_kirim">
				            <div class="form-group col-md-6">
				                <input type="text" name="nama" class="form-control" required="required" placeholder="Nama">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="hp" class="form-control" required="required" placeholder="Hp">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="alamat" class="form-control" required="required" placeholder="Alamat">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="pesan" id="message" required="required" class="form-control" rows="8" placeholder="Ketikkan Pesan Anda Disini"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
					<?php 
						foreach ($kontak->result_array() as $value) {
							$alamat = $value['alamat'];
							$phone = $value['phone'];
							$email = $value['email'];
					}
					?>
	    				<h2 class="title text-center">Kontak Kami</h2>
	    				<address>
	    					<p><i class='fa fa-fw fa-user'></i><b> JayaSport</b></p>
							<p><i class='fa fa-fw fa-map-marker'></i> <?php echo $alamat;?></p>
							<p><i class='fa fa-fw fa-phone'></i> +(62) <?php echo $phone;?></p>
							<p><i class='fa fa-fw fa-envelope'></i> <?php echo $email;?></p>
	    				</address>
	    				<div class="social-networks">
						<?php 
							foreach ($sosial_media->result_array() as $value) {
								$tw = $value['tw'];
								$fb = $value['fb'];
								$gp = $value['gp'];
						}
						?>
	    					<h2 class="title text-center">Sosial Media</h2>
							<ul>
								<li>
									<a href="<?php echo $fb;?>"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="<?php echo $tw;?>"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="<?php echo $gp;?>"><i class="fa fa-google-plus"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
	
<?php
$this->load->view('layout/footer');
?>