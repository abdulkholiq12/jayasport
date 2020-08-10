

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <center><h1 class="h3 mb-4 text-gray-800"><b>Jam</h1></b></center>

          


          <div class="row">
          		<div class="col-lg-12">

          		<?= form_error('menu','<div class="alert alert-danger" role="alert">', '</div>'); ?>
          		
          		<a href="<?php echo base_url();?>adminweb/jam_tambah" class="btn btn-primary mb-3" >Tambah Jam Baru</a>

          		<?= $this->session->flashdata('message'); ?>



<table class="table table-striped">
  <thead>
    <tr>
			<th scope="col"><center>No</center></th>
			<th scope="col"><center>Jam Mulai</center></th>
			<th scope="col"><center>Jam Selesai</center></th>
			<th scope="col"><center>Action</center></th>
    </tr>
  </thead>
	<tbody>
										<?php
										$no=1;
										if ($data_jam->num_rows()>0) {
											foreach ($data_jam->result_array() as $tampil) { ?>
										<tr >
											<th scope="row"><center><?php echo $no;?></center></th>
											<td><center><?php echo $tampil['jam_mulai'];?></center></td>
											<td><center><?php echo $tampil['jam_selesai'];?></center></td>
											
											<td>
											<center>
											<a class="badge badge-success" href="<?php echo base_url();?>adminweb/jam_edit/<?php echo $tampil['id_jam'];?>"> Edit</a>
											<a class="badge badge-danger" href="<?php echo base_url();?>adminweb/jam_delete/<?php echo $tampil['id_jam'];?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['id_jam'];?>?')"> Delete</a>
											</center>
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

										}
										?>
  </tbody>
</table>
          
        </div>
      </div>
    </div>
</div>   