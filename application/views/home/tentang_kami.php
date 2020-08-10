<?php
$this->load->view('layout/head');
$this->load->view('layout/header');
$this->load->view('layout/nav');
?>
	
	
	
<section>
	<div class="container">
		<div class="row"><div class="col-sm-2"></div>	
			<div class="col-sm-8">
				<div class="blog-post-area">
					<h2 class="title text-center">Tentang Kami</h2>
						<div class="register-req">
	    					<?php
								foreach ($tentangkami->result_array() as $value) {
									$judul 		= $value['judul'];	
									$deskripsi 	= $value['deskripsi'];	
							}
							?>
	    					<div class="status alert alert-success" style="display: none"></div>
							<h3><?php echo $judul;?></h3>
							<?php echo $deskripsi;?>
						</div>
	    		</div> 			
	    	</div>  
    	</div>	
    </div>
<section>
	
<?php
$this->load->view('layout/footer');
?>