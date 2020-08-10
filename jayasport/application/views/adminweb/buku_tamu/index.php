

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><center><b>Pesan Masuk</b></h1>
                <?php
                    $query = $this->db->query("select count(status) as stts from tbl_hubungikami where status='0'");
                        foreach ($query->result_array() as $tampil) {
                            $status = $tampil['stts'];
                        }
                ?>
          


          <div class="row">
          		<div class="col-lg-12">

          		<?= form_error('menu','<div class="alert alert-danger" role="alert">', '</div>'); ?>
              
				  		<a href="<?php echo base_url();?>adminweb/buku_tamu_add" class="btn btn-primary mb-3">Tulis Pesan</a>
							<a href="<?php echo base_url();?>adminweb/buku_tamu_kirim" class="btn btn-secondary mb-3"  data-title="Sent">Pesan Terkirim</a>

							<br />

							<?php
							  if ($this->session->flashdata('hapus')){
								echo "<div class='alert alert-block alert-success show'>
									  	<button type='button' class='close' data-dismiss='alert'>×</button>
										<span>Pesan Masuk Berhasil di Hapus</span>
									</div>";
							}
							?>


<table class="table table-striped">
  <thead>
    <tr>
			<th scope="col">Nama</th>
			<th scope="col">Pesan</th>
			<th scope="col">Tanggal</th>
			<th scope="col">Aksi</th>
    </tr>
  </thead>
	<tbody>
	<?php
		foreach ($data_buku_tamu->result_array() as $tampil) { ?>

		<?php
		if ($tampil['status']=="1") {?>
										<tr >
											<b><td><a href="<?php echo base_url();?>adminweb/buku_tamu_detail/<?php echo $tampil['id_hubungikami'];?>"><?php echo $tampil['nama'];?></a></b></td>
											<td><a href="<?php echo base_url();?>adminweb/buku_tamu_detail/<?php echo $tampil['id_hubungikami'];?>"><?php echo substr($tampil['pesan'],0,50);?></a></td>
											<td><a href="<?php echo base_url();?>adminweb/buku_tamu_detail/<?php echo $tampil['id_hubungikami'];?>"><?php echo $tampil['tanggal'];?></a></td>
											
											<td>
											<a class="badge badge-danger" href="<?php echo base_url();?>adminweb/buku_tamu_hapus/<?php echo $tampil['id_hubungikami'];?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama'];?>?')"> Delete</a>
											</td>
										</tr>

										<?php
										}
										else { ?>
										<tr >
											<td><a href="<?php echo base_url();?>adminweb/buku_tamu_detail/<?php echo $tampil['id_hubungikami'];?>"><b><?php echo $tampil['nama'];?></a></b></td>
											<td><a href="<?php echo base_url();?>adminweb/buku_tamu_detail/<?php echo $tampil['id_hubungikami'];?>"><b><?php echo substr($tampil['pesan'],0,50);?></a></b></td>
											<td><a href="<?php echo base_url();?>adminweb/buku_tamu_detail/<?php echo $tampil['id_hubungikami'];?>"><b><?php echo $tampil['tanggal'];?></a></b></td>
											
											<td>
											<a class="badge badge-danger" href="<?php echo base_url();?>adminweb/buku_tamu_hapus/<?php echo $tampil['id_hubungikami'];?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama'];?>?')"> Delete</a>
											</td>
										</tr>
										<?php
										}
										?>
		
										<?php
										}
										?>
  </tbody>
</table>
          
        </div>
      </div>
    </div>
</div>