<?php
$this->load->view('layout/head');
$this->load->view('layout/header');
$this->load->view('layout/nav');
?>
<section id="cart_items">
    <div class="container">
        <div class="col-sm-12">
		<h2 class="title text-center">DETAIL BOOKING</h2>
            <div class="col-sm-6">
                <div class="register-req">
                	<p><b><center><h4><u>LAPANGAN</u></h4></center></b></p>
                            <center><img src="<?php echo base_url();?>images/lapangan/<?=$gambar?> " width="105" height="105"></center><br />                  
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
										<td><b>Rp.<?=$harga?>,-</td>
										
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

							<!--<div class="form-group">
							<label for="tgl_sewa">Tanggal Main<span class="text-danger"></span></label>
								<input type="date" name="tgl_main" class="form-control">
							</div>-->
							<label for="tgl_main">Tanggal Main<span class="text-danger"></span></label>

						<div class="input-group date form_date col-md-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd"> 	   
							
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>

							<input class="form-control"  type="text" name="tgl_main" placeholder="tanggal main" autocomplete="off">
						</div><br />
							
							<div class="form-group">
							<label for="jam_mulai">Jam Mulai<span class="text-danger"></span></label>
							<select type="text" name="jam_mulai" class="form-control">
                                <?php
                        	        foreach ($jam->result_array() as $value) { ?>
                                <option value="<?php echo $value['jam_mulai'];?>"><?php echo $value['jam_mulai'];?></option>
                                <?php } ?>
                            </select>
							</div>

							<div class="form-group">
							<label for="jam_selesai">Jam Selesai<span class="text-danger"></span></label>
							<select type="text" name="jam_selesai" class="form-control">
                                <?php
                        	        foreach ($jam->result_array() as $value) { ?>
                                <option value="<?php echo $value['jam_selesai'];?>"><?php echo $value['jam_selesai'];?></option>
                                <?php } ?>
                            </select>
							</div>
							<button type="submit" class="btn btn-success mr-2">Submit</button>
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