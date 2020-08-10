<?php
$this->load->view('layout/head');
?>
		
<section id="cart_items">
    <div class="container">
        <div class="col-sm-12">
			<h2 class="title text-center"> KONFIRMASI PEMBAYARAN </h2>
			<?php
            $no=1;
            if ($konfirmasi->num_rows()>0) {
            foreach ($konfirmasi->result_array() as $tampil) { ?>
        <form action="<?php echo base_url('home/konfirmasi_kirim') ?>"  method="post">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<div class="col-sm-12">
						<p><b><center><h4><u>KONFIRMASI</u></h4></center></b></p>
							
							<div class="form-group col-md-3" align="center">
								<p>Kode Transaksi</p>
									<input type="text" name="kode_transaksi" id="kode_transaksi" class="form-control" value="<?php echo $tampil['kode_transaksi']?>" readonly>
							</div>
							<div class="form-group col-md-3" align="center">
								<p>Total Bayar</p>
									<input type="text" name="total_bayar" id="total" class="form-control"value="<?php echo $tampil['total'];?>" readonly>
							</div>								<div class="form-group col-md-3" align="center">
								<p>Nama Member</p>
									<input type="text" name="nama_member" id="nama_member" class="form-control" value="<?php echo $tampil['nama_member']?>" readonly>
							</div>
							<div class="form-group col-md-3" align="center">
								<p>Metode Pembayaran</p>
									<input type="hidden" name="bank_id" id="bank_id" class="form-control" value="<?php echo $tampil['id_bank']?>" readonly>
							
									<input type="text" name="nama_bank" id="nama_bank" class="form-control" value="<?php echo $tampil['nama_bank']?> - <?php echo $tampil['no_rekening']?>" readonly>
							</div>	
					</div>
					
					<div class="col-sm-12">
						<div class="form-group col-md-6">
							<p><b><center><h4>Jumlah Bayar</h4></center></b></p>
							<input type="text" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="">
						</div>
						<div class="form-group col-md-6">
							<p><b><center><h4>No.Rekening</h4></center></b></p>
							<input type="text" name="no_rekening" id="no_rekening" class="form-control" value="">
						</div>
						<div class="form-group col-md-6">
							<p><b><center><h4>Atas Nama</h4></center></b></p>
							<input type="text" name="atas_nama" id="atas_nama" class="form-control" value="">
						</div>
						<div class="form-group col-md-6">
							<p><b><center><h4>Nama Bank</h4></center></b></p>
							<input type="text" name="nama_bank" id="nama_bank" class="form-control" value="">
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group col-md-12">
							<p><b><center><h4>Pesan</h4></center></b></p>
							<textarea name="pesan" id="message" rows="5" class="form-control" placeholder="*contoh : saya sudah transfer"></textarea>
						</div>
							<center>
								<button type="submit" class="btn btn-success mr-2">Submit</button>
								<button class="btn btn-secondary m-l-5"> <a href="<?php echo base_url ('home')?>">Batal</a></button>
							</center>
					</div>
				</table>
			</div>
		</div>
	</form>
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