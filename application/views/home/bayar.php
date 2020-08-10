<?php
$this->load->view('layout/head');
$this->load->view('layout/header');
$this->load->view('layout/nav');
?>
<section id="cart_items">
    <div class="container">
        <div class="col-sm-12">
        
<form action="<?php echo base_url('home/bayar_kirim') ?>"  method="post">
            
            <div class="col-sm-6">
                <div class="register-req">
                	<p><b><center><h4><u>RINCIAN SEWA</u></h4></center></b></p>
                    
                    <?php $where=['id_lapangan'=>$id];
                        $lapangan=$this->db->get_where('tbl_lapangan',$where)->row();
                    ?>
                     
                        <div class="table-responsive cart_info">
                        <div class="form-group">
                            <label for="tgl_transaksi">Tanggal Sewa<span class="text-danger"></span></label>
                                <input type="date" name="tgl_sewa" data-parsley-trigger="change" required placeholder="" class="form-control" value="<?php echo date('Y-m-d')?>" readonly value="<?php echo ("$tgl_sewa")?>">
                        </div>
                        <div class="form-group">
                            <label for="jam_transaksi">Waktu<span class="text-danger"></span></label>
        	                    <input type="time" name="jam_sewa" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('H:i')?>" readonly value="<?php echo ("$jam_sewa")?>">
                        </div>
							<table class="table table-condensed">
								<tr class="cart_menu">
									<td>Kode Lapangan </td>
									<td>Nama Lapangan</td>
									<td>Harga Sewa / Jam</td>
								</tr>
								<tr>
                                    <td><b><?php echo $value['kode_transaksi'];?></td>
                                    <td><b><?php echo $lapangan->nama_lapangan;$nama_lapangan=$lapangan->nama_lapangan?></td>
                                    <td><b>Rp.<?php echo $lapangan->harga;$harga_sewa=$lapangan->harga?></td>
								</tr>
							</table>
                            <div class="form-group">
                            <!--<label for="tgl_transaksi">Kode Lapangan<span class="text-danger"></span></label>-->
                                <input type="hidden" name="kode_lapangan" data-parsley-trigger="change" required placeholder="" class="form-control" value="<?php echo $kode_lapangan ?>">
                            </div>
                            <div class="form-group">
                                <!--<label for="jam_transaksi">Nama Lapangan<span class="text-danger"></span></label>-->
                                    <input type="hidden" name="nama_lapangan" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php echo $nama_lapangan ?>">
                            </div>
                            <div class="form-group">
                                <!--<label for="jam_transaksi">Harga<span class="text-danger"></span></label>-->
                                    <input type="hidden" name="harga" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php echo $harga_sewa ?>">
                            </div>
                            </div>

                    <!--<p><b><center><h4><u>RINCIAN MEMBER</u></h4></center></b></p>
                    
                        <div class="table-responsive cart_info">
							<table class="table table-condensed">
								<tr class="cart_menu">
									<td>Kode Lapangan </td>
									<td>Nama Lapangan</td>
									<td>Harga Sewa / Jam</td>
								</tr>
								<tr>
                                    <td><b><?php echo $member->kode_member?></td>
                                    <td><b><?php echo $member->nama_member?></td>
                                    <td><b><?php echo $member->email?></td>
								</tr>
							</table>
						</div>-->
				</div>    
            </div>
			<div class="col-sm-6">
                <div class="register-req">
                	<p><b><center><h4><u>TRANSAKSI</u></h4></center></b></p>
                    <form action="<?php echo base_url('home/bayar_kirim') ?>"  method="post">
                    <?php $where=['id_member'=>$id_member];
                        $member=$this->db->get_where('tbl_member',$where)->row();
                    ?> 
                    
						<input type="hidden" value="<?php echo $member->kode_member;$kode_member=$member->kode_member?>" name="kode_member">
                            <!--<div class="form-group">
                                <label for="nama_member">Nama Member<span class="text-danger"></span></label>
                                <input type="text" name="nama_member" data-parsley-trigger="change" required placeholder="" class="form-control" value="<?php echo $nama_member ?>">
                            </div>
							<div class="form-group">
                                <label for="phone">No. Telp<span class="text-danger"></span></label>
        	                    <input type="text" name="phone" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php echo $this->session->userdata("phone"); ?>">
                            </div>-->
                            <table class="table table-condensed">
								<tr class="cart_menu">
									<td>Tanggal Main </td>
									<td>Lama Sewa</td>
									<td>Total Harga</td>
								</tr>
								<tr>
                                    <td><b><?php echo ("$tgl_sewa")?></td>
                                    <?php 
                                        $lama_sewa=$jam_selesai-$jam_mulai;
                                    ?>
                                    <td><b><?php echo ("$lama_sewa")?> Jam</td>
                                    <?php 
                                        $total=$lama_sewa*$harga_sewa;
                                    ?>
                                    <td><b>Rp.<?php echo $total?>,-</td>
								</tr>
							</table>

							<div class="form-group">
							<!--<label for="tgl_sewai">Tanggal Main<span class="text-danger"></span></label>-->
								<input type="hidden" name="tgl_main" class="form-control" value="<?php echo ("$tgl_sewa")?>" readonly>
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
						        <input type="hidden" name="lama_sewa" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php echo $lama_sewa ?>" readonly>
                            </div>

                            <div class="form-group">
							<!--<label for="total_harga">Total Harga<span class="text-danger"></span></label>-->
						        <input type="hidden" name="total" data-parsley-trigger="change" required placeholder=" " class="form-control" value="<?php echo $total ?>" readonly>
							</div>
                             <br />
                            <!--<p><b><center><h4>Metode Pembayaran</h4></center></b></p>
                                <select name="bank_id" class="form-control">
                                    <?php
                                        foreach ($bank->result_array() as $value) { ?>
                                    <option value="<?php echo $value['id_bank'];?>"><?php echo $value['nama_bank'];?>- <?php echo $value['no_rekening'];?></option>
                                    <?php
                                        }
                                        ?>
                                </select>
                            <br />-->
							<button type="submit" class="btn btn-success mr-2">Sewa</button>
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