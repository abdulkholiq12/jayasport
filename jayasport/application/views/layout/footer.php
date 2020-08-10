	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<!--<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<Center><h2><span>my </span>futsal</h2></center>
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
				</div>-->
			</div>
		</div>
		
		
		
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

	<script src="<?php echo base_url();?>asset/js/jquery.js"></script>
	<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>asset/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url();?>asset/js/price-range.js"></script>
    <script src="<?php echo base_url();?>asset/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>asset/js/main.js"></script>
	
	<script src="<?php echo base_url();?>asset/date_picker_bootstrap/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	<script type="text/javascript">

	$('.form_date').datetimepicker({

			language:  'id',

			weekStart: 1,

			todayBtn:  1,

	autoclose: 1,

	todayHighlight: 1,

	startView: 2,

	minView: 2,

	forceParse: 0

		});

	</script>
</body>
</html>