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
							<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo/<?php echo $logo;?>" alt="myfutsal" /></a>
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
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->