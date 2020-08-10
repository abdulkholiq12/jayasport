<?php
$this->load->view('layout/head');
$this->load->view('layout/header');
?>

<body>	
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<?php
							foreach ($logo->result_array() as $value) {
								$logo = $value['gambar'];
							}

							?>
							<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo/<?php echo $logo;?>" alt="JayaSport" /></a>
						<p><?= $this->session->flashdata('update'); ?></p>
						<p><?= $this->session->flashdata('simpan_akun'); ?>
						<p><?= $this->session->flashdata('message'); ?></p>
						</div>
						<div class="btn-group pull-right">
							
							
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php if($this->session->userdata("logged_in")==""){ ?>
					
						<?php echo form_open('home/user_login');?>
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><input type="text" name="username" id="username" class="form-control" required="required" placeholder="Username.."></li>
      							<li><input type="password" name="password" id="password" class="form-control" required="required" placeholder="Password.."></li>
      							<button type="submit" name="submit" class="btn btn-secondary"  >Masuk</button>
								<a href="<?php echo base_url();?>home/daftar" class="btn btn-small">Daftar</a>
							</ul>
						</div>
						<?php echo form_close();?>
					
						<?php } else { 
      						if($this->session->userdata("logged_in")!="") { ?>
					
						<div class ="shop-menu pull-right">
							<li class="dropdown">
								<button class="btn btn-primary" type="button" data-toggle="dropdown"> 
									<?php echo 
									$this->session->userdata('nama_member');
									?> <span class='caret'></span>
								</button>
								
								<ul class="dropdown-menu">
									<li class="dropdown"><a href="<?php echo base_url();?>home/profile"><i class='fa fa-fw fa-user'></i><b>Profile</b></a></li>
									<li class="dropdown"><a href="<?php echo base_url();?>home/gantipass"><i class='fa fa-fw fa-key'></i><b>Ganti Password</b></a></li>
									<li class="dropdown"><a href="<?php echo base_url();?>home/laporan_booking"><i class='fa fa-fw fa-book'></i><b>Laporan Booking</b></a></li>
									<li class="dropdown"><a href="<?php echo base_url();?>home/logout"><i class='fa fa-fw fa-sign-out'></i><b>Keluar</b></a></li>
								</ul>
							</li>
						</div>
      					<?php 
    					}
    					?>
    					<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url();?>" class="active"><i class='fa fa-fw fa-home'></i>Home</a></li>
								<li><a href="<?php echo base_url();?>home/jadwal"><i class='fa fa-fw fa-calendar'></i>Jadwal</a></li>
								<li><a href="<?php echo base_url();?>home/lapangan"><i class='fa fa-fw fa-circle'></i>Lapangan</a></li>
								<li><a href="<?php echo base_url();?>home/cara_booking"><i class='fa fa-fw fa-bars'></i>Cara Booking</a></li>
								<li><a href="<?php echo base_url();?>home/tentang_kami"><i class='fa fa-fw fa-group'></i>Tentang Kami</a></li>
								<li><a href="<?php echo base_url();?>home/hubungi_kami"><i class='fa fa-fw fa-phone'></i>Hubungi Kami</a></li>

								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							
							<?php
							$terakhir = $this->db->query("select max(id_slider) as terakhir from tbl_slider where status='1' ");
								foreach ($terakhir->result_array() as $value) {
									$t = $value['terakhir'];
								}
							?>
							<?php
							foreach ($slider->result_array() as $value) { 

								if ($value['id_slider']==$t) { ?>
								<div class="item active">
									<div class="col-sm-6">
										<h1><span>For Your</span>-Information</h1>
										<h2><?php echo $value['tittle'];?></h2>
										<p><?php echo strip_tags(substr($value['description'],0,200));?></p>
										<!--<a href="<?php echo base_url();?>home/detail_slider/<?php echo $value['id_slider'];?>" class="btn btn-default get"> Read More</a>
										-->
									</div>
									<div class="col-sm-6">
										<img src="<?php echo base_url();?>images/slider/<?php echo $value['gambar'];?>" class="girl img-responsive" alt="<?php echo $value['tittle'];?>" />
										
									</div>
								</div>

								<?php
								}
								else { ?>
								<div class="item">
									<div class="col-sm-6">
										<h1><span>For Your</span>-Information</h1>
										<h2><?php echo $value['tittle'];?></h2>
										<p><?php echo strip_tags(substr($value['description'],0,200));?></p>
										<!--<a href="<?php echo base_url();?>home/detail_slider/<?php echo $value['id_slider'];?>" class="btn btn-default get"> Read More</a>-->
									</div>
									<div class="col-sm-6">
										<img src="<?php echo base_url();?>images/slider/<?php echo $value['gambar'];?>" class="girl img-responsive" alt="<?php echo $value['tittle'];?>" />
										
									</div>
								</div>
								<?php
								}

							?>
							
							<?php
							}
							?>
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
						<h2 class="title text-center">Lapangan JayaSport</h2>
						
						<?php
						foreach ($lapangan->result_array() as $value) { ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<?php if($this->session->userdata("logged_in")==""){ ?>
													<img src="<?php echo base_url();?>images/lapangan/<?php echo $value['gambar'];?>" alt="" />
													<h2>Rp.<?php echo $value['harga'];?></h2>
													<!--<p><?php echo $value['kode_lapangan'];?></p>-->
													<a href="<?php echo base_url();?>home/booking/<?php echo $value['id_lapangan'];?>"><p> <?php echo $value['nama_lapangan'];?></p></a>
													
											<?php } else { 
      											if($this->session->userdata("logged_in")!="") { ?>
													<img src="<?php echo base_url();?>images/lapangan/<?php echo $value['gambar'];?>" alt="" />
													<h2>Rp.<?php echo $value['harga'];?></h2>
													<p><?php echo $value['kode_lapangan'];?></p>
													<a href="<?php echo base_url();?>home/lapangan/<?php echo $value['id_lapangan'];?>"><p> <?php echo $value['nama_lapangan'];?></p></a>
													<a href="<?php echo base_url();?>home/booking/<?php echo $value['id_lapangan'];?>" class="btn btn-primary">Booking</a>
											<?php 
											}
											?>
											<?php } ?>
										</div>
								</div>
							</div>
						</div>
						<?php
						}
						?>
				</div>
			</div>
		</div>
	</section>
	
	
	<footer id="footer"><!--Footer-->
		<!--<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<Center><h2><span>JayaSport </span> </h2></center>
							<center><p><i class="fa fa-fw fa-dollar"></i><b>PAYMENT SUPPORT</b></p></center>
						</div>
					</div>
					<div class="col-sm-10">
						<?php
						foreach ($bank->result_array() as $value) {?>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								
									<div class="">
										<img src="<?php echo base_url();?>/images/bank/<?php echo $value['gambar'];?>" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								
								<p><?php echo $value['nama_pemilik'];?></p>
								<h2><?php echo $value['no_rekening'];?></h2>
							</div>
						</div>
							
						<?php
						}
						?>
						
					</div>
					<div class="col-sm-3">
						<div class="address">
							
						</div>
					</div>
				</div>
			</div>
		</div>-->
		
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 <b>JayaSport</b>. All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="<?php echo base_url();?>asset/js/jquery.js"></script>
	<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>asset/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url();?>asset/js/price-range.js"></script>
    <script src="<?php echo base_url();?>asset/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>asset/js/main.js"></script>
</body>
</html>