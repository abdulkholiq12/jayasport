<?php
$this->load->view('layout/head');
$this->load->view('layout/header');
$this->load->view('layout/nav');
?>
<section id="cart_items">
    <div class="container">
        <div class="col-sm-12">
        <h2 class="title text-center">RINCIAN BOOKING</h2>
        
<form action="<?php echo base_url('home/booking_jadi') ?>"  method="post">
            
            <div class="col-sm-6">
                <div class="register-req">
                	<!--<p><b><center><h4><u>RINCIAN SEWA</u></h4></center></b></p>-->
                    
                    <?php $where=['id_lapangan'=>$id];
                        $lapangan=$this->db->get_where('tbl_lapangan',$where)->row();
                    ?>
                        <div class="table-responsive cart_info">
                        <div class="form-group">
                            <label for="tgl_transaksi">Tanggal Booking<span class="text-danger"></span></label>
                                <input type="date" name="tgl_booking" data-parsley-trigger="change" required placeholder="" class="form-control" value="<?php echo date('Y-m-d')?>" readonly value="<?php echo ("$tgl_booking")?>">
                        </div>
                        <div class="form-group">
                            <label for="jam_transaksi">Waktu Booking<span class="text-danger"></span></label>
        	                    <input type="time" name="jam_booking" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('H:i')?>" readonly value="<?php echo ("$jam_booking")?>">
                        </div>
							<table class="table table-condensed">
								<tr class="cart_menu">
                                    <td>ID</td>
                                    <td>Kode Lapangan</td>
									<td>Nama Lapangan</td>
									<td>Harga Booking / Jam</td>
								</tr>
								<tr>
                                    <td><b><?php echo $lapangan->id_lapangan;$id_lapangan=$lapangan->id_lapangan?></td>
                                    <td><b><?php echo $lapangan->kode_lapangan;$kode_lapangan=$lapangan->kode_lapangan?></td>
                                    <td><b><?php echo $lapangan->nama_lapangan;$nama_lapangan=$lapangan->nama_lapangan?></td>
                                    <td><b>Rp.<?php echo $lapangan->harga;$harga_booking=$lapangan->harga?></td>
								</tr>
							</table>
                            <div class="form-group">
                            <!--<label for="tgl_transaksi">Kode Lapangan<span class="text-danger"></span></label>-->
                                <input type="hidden" name="lapangan_id" data-parsley-trigger="change" required placeholder="" class="form-control" value="<?php echo $id_lapangan ?>">
                            </div>
                            <div class="form-group">
                            <!--<label for="tgl_transaksi">Kode Lapangan<span class="text-danger"></span></label>-->
                                <input type="hidden" name="lapangan_kode" data-parsley-trigger="change" required placeholder="" class="form-control" value="<?php echo $kode_lapangan ?>">
                            </div>
                            <div class="form-group">
                                <!--<label for="jam_transaksi">Nama Lapangan<span class="text-danger"></span></label>-->
                                    <input type="hidden" name="nama_lapangan" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php echo $nama_lapangan ?>">
                            </div>
                            <div class="form-group">
                                <!--<label for="jam_transaksi">Harga<span class="text-danger"></span></label>-->
                                    <input type="hidden" name="harga" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php echo $harga_booking ?>">
                            </div>
                            </div>
				</div>    
            </div>
			<div class="col-sm-6">
                <div class="register-req">
                	<!--<p><b><center><h4><u>TRANSAKSI</u></h4></center></b></p>-->
                    <form action="<?php echo base_url('home/bayar_kirim') ?>"  method="post">
                    <?php $where=['id_member'=>$id_member];
                    $member=$this->db->get_where('tbl_member',$where)->row();
                    ?>
                    
						<input type="hidden" value="<?php echo $member->id_member;$id_member=$member->id_member?>" name="member_id">
                        <input type="hidden" value="<?php echo $member->kode_member;$kode_member=$member->kode_member?>" name="member_kode">
                            <table class="table table-condensed">
								<tr class="cart_menu">
									<td>Tanggal Main </td>
									<td>Durasi</td>
									<td>Total Harga</td>
								</tr>
								<tr>
                                    <td><b><?php echo ("$tgl_main")?></td>
                                    <?php 
                                        $durasi=$jam_selesai-$jam_mulai;
                                    ?>
                                    <td><b><?php echo ("$durasi")?> Jam</td>
                                    <?php 
                                        $total=$durasi*$harga_booking;
                                    ?>
                                    <td><b>Rp.<?php echo $total?>,-</td>
								</tr>
							</table>

							<div class="form-group">
							<!--<label for="tgl_sewai">Tanggal Main<span class="text-danger"></span></label>-->
								<input type="hidden" name="tgl_main" class="form-control" value="<?php echo ("$tgl_main")?>" readonly>
							</div>
							
							<div class="form-group">
							<!--<label for="jam_mulai">Jam Mulai<span class="text-danger"></span></label>-->
							    <input type="hidden" name="jam_mulai" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php echo ("$jam_mulai")?>" readonly >
							</div>

							<div class="form-group">
							<!--<label for="jam_selesai">Jam Selesai<span class="text-danger"></span></label>-->
							    <input type="hidden" name="jam_selesai" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php echo ("$jam_selesai")?>" readonly >
							</div>

                            <div class="form-group">
							<!--<label for="jam_selesai">Lama Sewa =<span class="text-danger"></span></label>-->
						        <input type="hidden" name="durasi" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php echo $durasi ?>" readonly>
                            </div>

                            <div class="form-group">
							<!--<label for="total_harga">Total Harga<span class="text-danger"></span></label>-->
						        <input type="hidden" name="total" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php echo $total ?>" readonly>
							</div>
                             <br />
                            <p><b><center><h4>Metode Pembayaran</h4></center></b></p>
                                <select name="id_bank" class="form-control">
                                    <?php
                                        foreach ($bank->result_array() as $value) { ?>
                                    <option value="<?php echo $value['id_bank'];?>"><?php echo $value['nama_bank'];?>- <?php echo $value['no_rekening'];?></option>
                                    <?php
                                        }
                                        ?>
                                </select>
                            <br />
							<button type="submit" class="btn btn-success mr-2">Selesai</button>
                            <a href="<?php echo base_url ('home')?>" class="btn btn-secondary m-l-5">Batal</a>
					
				</div>
            </div>
        </form>
		</div>
	</div>						
				</div>
			</div>
		
		</div>

		
		
	</section> <!--/#cart_items-->
	<?php
	$this->load->view('layout/footer');
	?>