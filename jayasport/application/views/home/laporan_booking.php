<?php
$this->load->view('layout/head');
?>
            <div class="blog-post-area">
                <h2 class="title text-center">Laporan Booking</h2>
            </div>
		</div><!--/header-bottom-->
	</header><!--/header-->

        <section id="cart_items">
            <div class="container">
				<div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td><center>No</center></td>
								<td><center>Jam</center></td>
                                <td><center>Durasi</center></td>
								<td><center>Harga</center></td>
                                <td><center>Tanggal Main</center></td>
                                <td><center>Status</center></td>
                                <td><center>Aksi</center></td>
                            </tr>
                        </thead>
									<tbody>
                                    <?php
										$no=1;
										if ($laporan_booking->num_rows()>0) {
											foreach ($laporan_booking->result_array() as $tampil) { ?>
                                        <tr>
                                            <td><center><?php echo $no; ?></center></td>
                                            <td><center><?php echo $tampil['jam_mulai'];?> s/d <?php echo $tampil['jam_selesai'];?></center></td>
                                            <td><center><?php echo $tampil['durasi'];?> Jam</center></td>
											<td><center>Rp.<?php echo $tampil['total'];?>,-</center></td>
                                            <td><center><?php echo $tampil['tgl_main'];?></center></td>
                                             <td><center><?php echo $tampil['status'];?></center></td>
                                            <td><center>
                                                <a href="<?php echo base_url() . 'home/detail_laporan/' . $tampil['id_transaksi'];?>" class="btn btn-primary btn-s"><i class="fa fa-search"></i></a>
                                                <a href="<?php echo base_url() . 'home/cetak_detail_booking/' . $tampil['id_transaksi'];?>" class="btn btn-primary btn-s"><i class="fa fa-print"></i></a>
                                                <a type="submit" onclick="if(confirm('Apakah anda yakin akan menghapus <?php echo $tampil['kode_transaksi'];?>')) 
                                                window.location.href='<?=base_url()?>home/batal_booking/<?php echo $tampil['id_transaksi'];?>'" class="btn btn-primary btn-s"><i class="fa fa-trash-o"></i></a>
                                                
                                            </td>
                                        </tr>
                                        <?php
										$no++;
										}
										}
										
										else { ?>
                                        <tr>
											<td colspan="10">No Result Data</td>
										</tr>
                                    <?php
                                } ?>
                                </tbody>


								</table>
							</div>
                            <div class="register-req">
                                <center><h4><i class='fa fa-fw fa-info '></i><b>Informasi</b></h4></center>

                                1. Lakukan proses pembayaran melalui transfer bank sesuai dengan harga yang tertera.
                                   <br />
                                
                                2. Jika sudah melakukan transaksi pembayaran mohon segera <b> "Konfirmasi 
                                   Pembayaran" </b> agar proses konfirmasi dapat langsung di proses oleh 
                                   <b>"Admin JayaSport".</b> <br />

                                3. Proses pembayaran dan konfirmasi akan di periksa oleh <b>"Admin JayaSport"</b> dalam waktu 24 Jam. 
                                Jika<b> BENAR, </b> maka status laporan 
                                   booking akan berubah menjadi <b>"Booking".</b><br />
                                
                                4. Klik tombol <b> <i class='fa fa-fw fa-search '></i> </b> untuk melihat detail laporan booking dan melakukan  <b> "Konfirmasi 
                                   Pembayaran".</b>
                                
                            </div>
						</div>
					</div>
				</div>
        </section>
