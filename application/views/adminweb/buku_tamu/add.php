<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><center><b>Tulis Pesan</b></h1>
                <?php
                    $query = $this->db->query("select count(status) as stts from tbl_hubungikami where status='0'");
                        foreach ($query->result_array() as $tampil) {
                            $status = $tampil['stts'];
                        }
                ?>
          


          <div class="row">
          		<div class="col-lg-12">

          		<?= form_error('menu','<div class="alert alert-danger" role="alert">', '</div>'); ?>

					<?php
					if ($status!="0") { ?>
							<p><u><a href="<?php echo base_url();?>adminweb/buku_tamu" class="text" data-title="Inbox"><b>Pesan Masuk(<?php echo $status;?>)</b></a></u></p>
							
							<?php
								 }
					else { ?>
				
				<!--<a href="<?php echo base_url();?>adminweb/buku_tamu" class="btn btn-primary mb-3" data-title="Inbox">Pesan Masuk</a>
				<a href="<?php echo base_url();?>adminweb/buku_tamu_kirim" class="btn btn-secondary mb-3" data-title="Sent">Pesan Terkirim</a>-->
							<?php
							}
							?>

							<?php
							  if ($this->session->flashdata('hapus')){
								echo "<div class='alert alert-block alert-success show'>
									  	<button type='button' class='close' data-dismiss='alert'>×</button>
										<span>Pesan Masuk Berhasil di Hapus</span>
									</div>";
							}
							?>

							<div class="form-group row">
								<label for="email" class="col-sm-1 col-form-label">Kepada</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="email" name="email" value="" placeholder="Email..">
									<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>

							<div class="form-group row">
								<label for="email" class="col-sm-1 col-form-label">Judul</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="judul" name="judul" value="" placeholder="Judul..">
									<?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
				 
							<div class="form-group row">
								<label for="description" class="col-sm-1 col-form-label">Pesan</label>
								<div class="col-sm-7">
									<textarea class="form-control" rows="7" id="isi_buku_tamu_kirim" name="isi_buku_tamu_kirim" value="" placeholder="Tulis pesan di sini.."></textarea>
									<?= form_error('isi_buku_tamu_kirim', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
							<br />
							<?php echo form_close(); ?>
							<div class="inbox-compose-btn">
								<button class="btn btn-primary" id="simpan"><i class="icon-check"></i>Kirim</button>
								<a href="<?php echo base_url();?>adminweb/buku_tamu/"> <button class="btn btn-secondary">Kembali</button></a>
								
							</div>
							

<script type="text/javascript">
	
	$(document).ready(function(){
		
		$("#simpan").click(function(){

			var email = $("#email").val();
			var judul = $("#judul").val();
			var isi_hubungi_kami_kirim = $("#isi_hubungi_kami_kirim").val();

			var email_check = email.split("@");

			

			if (email=="") {
				alert("To Masih Kosong");
				$("#email").focus();
			}
			else if (judul=="") {
				alert("Subject Masih Kosong");
				$("#judul").focus();
			}
			else if (isi_hubungi_kami_kirim=="") {
				alert("Isi Pesan Masih Kosong");
				$("#isi_hubungi_kami_kirim").focus();
			}

			else if (email!=""){
                            if (email_check[1]) {
                                var email_check2 = email_check[1].split(".");
                            }
                                                
                            if (!email_check[1] || !email_check2[0] || !email_check2[1]) {
                                alert('Penulisan Email Tidak Valid');
                                return false;
                            }
                            else {
                            	 $.ajax({
                                    type:"POST",
                                    url :"<?php echo base_url();?>adminweb/buku_tamu_add_simpan",
                                     data:"email="+email+"&judul="+judul+"&isi_hubungi_kami_kirim="+isi_hubungi_kami_kirim,
                                    success : function (data) {
                                   	alert("Pesan Berhasil Dikirim")
   									window.location.href="<?php echo base_url();?>adminweb/buku_tamu_kirim";
                                    }


                                    });

                            }
                    }

		});


		$("#inbox").click(function(){

			window.location.href="<?php echo base_url();?>adminweb/buku_tamu";
		});
	})
</script>