

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><center><b>Pesan Terkirim</b></h1>
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
                <a href="<?php echo base_url();?>adminweb/buku_tamu" class="btn btn-secondary mb-3" data-title="Inbox">Pesan Masuk</a>
							<br />
					<?php
					if ($status!="0") { ?>
							<p><u><a href="<?php echo base_url();?>adminweb/buku_tamu" class="btn btn-primary mb-3" data-title="Inbox"><b>Pesan Masuk(<?php echo $status;?>)</b></a></u></p>
							
							<?php
								 }
					else { ?>
							<?php
							}
							?>
							<!--<u><a type="text" href="<?php echo base_url();?>adminweb/buku_tamu_kirim"  data-title="Sent">Pesan Terkirim</a></u><br />-->
							<br />
							
          					<?php
							  if ($this->session->flashdata('terkirim')){
								echo "<div class='alert alert-block alert-success show'>
									  	<button type='button' class='close' data-dismiss='alert'>×</button>
										<span>Pesan Terkirim Berhasil di Hapus</span>
									</div>";
							}
							?>



<table class="table table-striped">
  <thead>
    <tr>
			<th scope="col">Kepada</th>
			<th scope="col">Judul</th>
			<th scope="col">Aksi</th>
    </tr>
  </thead>
	    <tbody>
        
        <?php
            foreach ($data_buku_tamu_kirim->result_array() as $tampil) { ?>

            <tr >
                <td><a href="<?php echo base_url();?>adminweb/buku_tamu_kirim_detail/<?php echo $tampil['id_hubungi_kami_kirim'];?>"><?php echo $tampil['kepada'];?></a></b></td>
                <td><a href="<?php echo base_url();?>adminweb/buku_tamu_kirim_detail/<?php echo $tampil['id_hubungi_kami_kirim'];?>"><?php echo substr($tampil['judul'],0,50);?></a></b></td>
                <td><a class="badge badge-danger" href="<?php echo base_url();?>adminweb/buku_tamu_kirim_hapus/<?php echo $tampil['id_hubungi_kami_kirim'];?>" onclick="return confirm('Yakin Ingin Menghapus Pesan <?php echo $tampil['kepada'];?>?')"> Delete</a></td>
            </tr>
        <?php
        }
        ?>
		
        </tbody>
</table>
          
        </div>
      </div>
    </div>
</div>