<?php
$this->load->view('layout/head');
$this->load->view('layout/header');
$this->load->view('layout/nav');
?>
	
	<section>
		<div class="container">
			<div class="row">
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

<?php
$this->load->view('layout/footer');
?>