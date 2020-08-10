<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>futsal</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="icon" href="<?php echo base_url('assets/');?>/img/logo/logo1.png">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>


  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!--<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>-->
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Ubah Password</h1>
              </div>
              <?= $this->session->flashdata('message'); ?>
              <?php echo form_open('adminweb/ubahpass'); ?>

              <?php 
				foreach ($data_admin->result_array() as $tampil) { ?>
              <input type="hidden" name='id_admin' value="<?php echo $tampil['id_admin']?>">
                <div class="form-group">
				<label>Username</label>
                  <input type="text" class="form-control form-control-user" id="username" name="username" value="<?php echo $tampil['username']?>" readonly="true" />
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
				<label>Password Lama</label>
                  <input type="password" class="form-control form-control-user" id="password_lama" name="password_lama" value="" placeholder="Masukan Password Lama..">
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label>Password Baru</label>
                    <input type="password" class="form-control form-control-user" id="password_baru" name="password_baru" value="" placeholder="Masukan Password Baru..">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="col-sm-6 mb-3 mb-sm-0">
				  <label>Ulangi Password Baru</label>
                    <input type="password" class="form-control form-control-user" id="ulangi_password" name="ulangi_password" value="" placeholder="Masukan Ulangi Password Baru..">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>

                <button type ="submit" class="btn btn-primary btn-user btn-block">Update</button>
                <?php
				}
				?>
				<?php echo form_close(); ?>
                <!--<hr />
                <a href="<?php echo base_url();?>adminweb/login/">
                <button class="btn btn-secondary btn-user btn-block">Kembali</button></a>-->
                <!--<hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>-->
              </form>
              <hr>
              <!--<div class="text-center">
                <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
              </div>-->
              <div class="text-center">
                <a class="small" href="<?php echo base_url();?>adminweb/home">Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

    <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>

