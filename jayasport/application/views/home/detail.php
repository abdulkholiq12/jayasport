<?php
$this->load->view('layout/head');
$this->load->view('layout/header');
?>
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
							<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo/<?php echo $logo;?>" alt="Adriano MX Online Shop" /></a>
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
								<li><input type="text" name="username" class="form-control" required="required" placeholder="Username.."></li>
      							<li><input type="password" name="password" class="form-control" required="required" placeholder="Password.."></li>
      							<button type="submit" name="submit" class="btn btn-small"  >Masuk</button>
								<a href="#" class="btn btn-small">Daftar</a>
							</ul>
						</div>
						<?php echo form_close();?>
					
						<?php } else { 
      						if($this->session->userdata("logged_in")!="") { ?>
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="<?php echo base_url();?>home/profile"> <b> <?php echo $this->session->userdata("nama_member"); ?> </b> </a></li>
								<li><a href="<?php echo base_url();?>home/profile">Profile</a></li>
								<li><a href="<?php echo base_url();?>home/gantipass">Ganti Password</a></li>
								<li><a href="<?php echo base_url();?>home/logout">Keluar</a></li>
							</ul>
        				</div>
					</div>
      					<?php } ?>
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
								<li><a href="<?php echo base_url('home/lapangan');?>" class="active">Kembali</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
<section id="cart_items">
    <div class="container">
        <div class="col-sm-12">

            <div class="col-sm-6">
                <div class="register-req">
                	<p><b><center><h4><u>LAPANGAN</u></h4></center></b></p>
                            <center><img src="<?php echo base_url();?>images/lapangan/<?=$gambar?> " width="250" height="250"></center><br />                  
                            <div class="table-responsive cart_info">
								<table class="table table-condensed">
									<tr class="cart_menu">
										<td>Kode Lapangan </td>
										<td>Nama Lapangan</td>
										<td>Harga Sewa / Jam</td>
									</tr>
									<tr>
										<td><b><?=$kode_lapangan?></td>
										<td><b><?=$nama_lapangan?></td>
										<td><b>Rp.<?=$harga?></td>
										
									</tr>
								</table>
							</div>
				</div>
            </div>
			<div class="col-sm-6">
                <div class="register-req">
                	<p><b><center><h4><u>TANGGAL DAN WAKTU</u></h4></center></b></p>
                    <form action="<?php echo base_url('home/booking_kirim') ?>"  method="post">
						<input type="hidden" value="<?php echo $id?>" name="id">

							<div class="form-group">
							<label for="tgl_sewa">Tanggal Main<span class="text-danger"></span></label>
								<input type="date" name="tgl_sewa" class="form-control">
							</div>
							
							<div class="form-group">
							<label for="jam_mulai">Jam Mulai<span class="text-danger"></span></label>

							<select type="time" name="jam_mulai" class="form-control">
                                <?php
                        	        foreach ($jam->result_array() as $value) { ?>
                                <option value="<?php echo $value['id_jam'];?>"><?php echo $value['jam_mulai'];?></option>
                                <?php } ?>
                            </select>
							</div>

							<div class="form-group">
							<label for="jam_selesai">Jam Selesai<span class="text-danger"></span></label>

							<select type="time" name="jam_selesai" class="form-control">
                                <?php
                        	        foreach ($jam->result_array() as $value) { ?>
                                <option value="<?php echo $value['id_jam'];?>"><?php echo $value['jam_selesai'];?></option>
                                <?php } ?>
                            </select>
							</div>
							<button type="submit" class="btn btn-warning mr-2">Sewa</button>
							<a href="<?php echo base_url ('home')?>" class="btn btn-secondary m-l-5">Batal</a>
					</form>
				</div>
            </div>
	
		</div>
	</div>	
								
				</div>
			</div>
		
		</div>

		
		
	</section>
	<?php
	$this->load->view('layout/footer');
	?>