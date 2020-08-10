<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><center><b>Lihat Pesan</b></h1>
                <?php
                    $query = $this->db->query("select count(status) as stts from tbl_hubungikami where status='0'");
                        foreach ($query->result_array() as $tampil) {
                            $status = $tampil['stts'];
                        }
                ?>
          


          <div class="row">
          		<div class="col-lg-12">

                            <div class="form-group row">
								<label for="nama" class="col-sm-8 col-form-label"><h4>Nama : <?php echo $nama;?></h4></label>
							</div>
                            <hr>
                            <div class="form-group row">
								<label for="alamat" class="col-sm-6 col-form-label"><?php echo $alamat;?> <b>&#60;<?php echo $email;?>&#62;</b> to me on  <b><?php echo $tanggal;?></b></label> 
								<div class="span5 inbox-info-btn">
                                    <div class="btn-group">
                                        <a href="<?php echo base_url();?>adminweb/buku_tamu_balas/<?php echo $id_hubungikami;?>"> <button class="btn btn-primary">
                                        <i class="icon-reply"></i> Balas
                                        </button></a>
                                    </div>

                                    <div class="btn-group">
                                        <a href="<?php echo base_url();?>adminweb/buku_tamu/"> <button class="btn btn-secondary">
                                        <i class="icon-reply"></i> Kembali
                                        </button></a>
                                        
                                    </div>
                                </div>
							</div>
                            <hr>

                            <div class="form-group row">
                                <label for="description" class="col-sm-1 col-form-label">Pesan</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" rows="7" id="pesan" name="pesan" value="<?php echo $pesan;?>"><?php echo $pesan;?></textarea>
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
