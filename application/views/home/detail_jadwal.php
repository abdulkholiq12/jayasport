<?php
$this->load->view('layout/head');
?>
		
<section id="cart_items">
    <div class="container">
        <div class="col-sm-12">
		<h2 class="title text-center"> DETAIL JADWAL </h2>
		<?php
            $no=1;
            if ($detail_jadwal->num_rows()>0) {
            foreach ($detail_jadwal->result_array() as $tampil) { ?>
            <!--<div class="col-sm-6">	
                	<p><b><center><h4><u>IDENTITAS PEMESAN</u></h4></center></b></p>
                
						<div class="form-group col-md-6">
							<p>Nama</p>
								<input type="text" name="nama_member" id="nama_member" class="form-control" value="<?php echo $tampil['nama_member']?>" readonly>
				            </div>
							<div class="form-group col-md-6">
							<p>Email</p>
								<input type="text" name="email" id="email" class="form-control"value="<?php echo $tampil['email']?>" readonly>
				        </div>
                        <div class="form-group col-md-6">
							<p>No.Telp</p>
								<input type="text" name="phone" id="phone" class="form-control" value="+(62) <?php echo $tampil['phone']?>" readonly>
				            </div>
							<div class="form-group col-md-6">
							<p>Alamat</p>
								<input type="text" name="alamat" id="alamat" class="form-control"value="<?php echo $tampil['alamat']?>" readonly>
				        </div>
            </div>-->
            

                <!--<div class="col-sm-6">
                	   <p><b><center><h4><u>DETAIL BOOKING</u></h4></center></b></p>
                        
                        <div class="form-group col-md-6">
							<p>Kode Transaksi</p>
								<input type="text" name="kode_transaksi" id="kode_transaksi" class="form-control" value="<?php echo $tampil['kode_transaksi']?>" readonly>
				            </div>
							<div class="form-group col-md-6">
							<p>Tanggal Booking</p>
								<input type="text" name="tgl_booking" id="tgl_booking" class="form-control"value="<?php echo $tampil['tgl_booking']?>" readonly>
				        </div>
                        <div class="form-group col-md-6">
							<p>Waktu Booking</p>
								<input type="text" name="jam_booking" id="jam_booking" class="form-control" value="<?php echo $tampil['jam_booking']?>" readonly>
				            </div>
							<div class="form-group col-md-6">
							<p>Metode Pembayaran</p>
								<input type="text" name="nama_bank" id="nama_bank" class="form-control"value="<?php echo $tampil['nama_bank']?>" readonly>
				        </div>
                </div>-->	

                        <div class="table-responsive cart_info">
                        <p><b><center><h4><u>JADWAL LAPANGAN</u></h4></center></b></p>
							<table class="table table-condensed">
								<tr class="cart_menu">
									<td><center>Kode Lapangan</center></td>
									<td><center>Nama Lapangan</center></td>
									<td><center>Tanggal Main</center></td>
                                    <td><center>Jam Mulai</center></td>
                                    <td><center>Durasi</center></td>
									<td><center>Harga Lapangan / Jam</center></td>
									<td><center>Status</center></td>
								</tr>
								<tr>
									<td><b><center><?php echo $tampil['kode_lapangan'];?></center></td>
									<td><b><center><?php echo $tampil['nama_lapangan'];?></center></td>
									<td><b><center><?php echo $tampil['tgl_main'];?></center></td>
									<td><b><center><?php echo $tampil['jam_mulai'];?> s/d <?php echo $tampil['jam_selesai'];?></center></td>
                                    <td><b><center><?php echo $tampil['durasi'];?> Jam</center></td>
                                    <td><b><center>Rp.<?php echo $tampil['total'];?>,-</center></td>
									<td><b><center><?php echo $tampil['status'];?></center></td>									
								</tr>
							</table>
                            <!--<center>
                            <a type="submit" class="btn btn-success mr-2" href="<?php echo base_url() . 'home/konfirmasi/' . $tampil['id_transaksi'];?>">Konfirmasi Pembayaran</a>
                            </center>-->
						</div>
				    </div>
        <?php
			$no++;
			}
			}							
		else { ?>
        <tr>
		    <td colspan="10">No Result Data</td>
		</tr>
        <?php } ?>        
                                
		</div>
	</div>
</div>
</div>
</div>
</section>
	
		

  
    <script src="<?php echo base_url();?>asset/js/jquery.js"></script>
	<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>asset/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url();?>asset/js/price-range.js"></script>
    <script src="<?php echo base_url();?>asset/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>asset/js/main.js"></script>
</section>
</body>
</html>