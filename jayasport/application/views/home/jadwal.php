
            <div class="blog-post-area">
                <h2 class="title text-center">JADWAL JayaSport</h2>
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
                                <td><center>Tanggal Main</center></td>
                                <td><center>Status</center></td>
                                <td><center>Aksi</center></td>
                            </tr>
                        </thead>
									<tbody>
                                    <?php
										$no=1;
										if ($jadwal->num_rows()>0) {
											foreach ($jadwal->result_array() as $tampil) { ?>
                                        <tr>
                                            <td><center><?php echo $no; ?></center></td>
                                            <td><center><?php echo $tampil['jam_mulai'];?> s/d <?php echo $tampil['jam_selesai'];?></center></td>
                                            <td><center><?php echo $tampil['durasi'];?> Jam</center></td>
                                            <td><center><?php echo $tampil['tgl_main'];?></center></td>
                                            <td><center><?php echo $tampil['status'];?></center></td>
                                            <td><center>
                                                <a href="<?php echo base_url() . 'home/detail_jadwal/' . $tampil['id_transaksi'];?>" class="btn btn-primary btn-s"><i class="fa fa-search"></i></a>
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
						</div>
					</div>
				</div>
        </section>
