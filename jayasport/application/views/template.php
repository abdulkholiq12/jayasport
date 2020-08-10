<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>JayaSport - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="icon" href="<?php echo base_url('assets/');?>/img/logo/logo1.png">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>adminweb/home">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-fw fa-">JS</i>
        </div>
        <div class="sidebar-brand-text mx-3">Jaya Sport <sup>*</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>adminweb/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        User & Lapangan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOnes" aria-expanded="true" aria-controls="collapseOnes">
          <i class="fas fa-fw fa-user"></i>
          <span>Kelola Data User</span>
        </a>
        <div id="collapseOnes" class="collapse" aria-labelledby="headingOnes" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url();?>adminweb/admin">Data Admin</a>
            <a class="collapse-item" href="<?php echo base_url();?>adminweb/member">Data Member</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>adminweb/lapangan">
          <i class="fas fa-fw fa-table"></i>
          <span>Kelola Data Lapangan</span></a>
      </li>
      <hr class="sidebar-divider">
      <!-- Divider 
      <hr class="sidebar-divider">-->

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaksi & Konfirmasi
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>adminweb/transaksi" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Konfirmasi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Login Screens:</h6>-->
            <a class="collapse-item" href="<?php echo base_url();?>adminweb/transaksi">Belum Konfirmasi</a>
            <a class="collapse-item" href="<?php echo base_url();?>adminweb/transaksi_sudah">Sudah Konfirmasi</a>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>adminweb/konfirmasi">
          <i class="fas fa-fw fa-money-bill"></i>
          <span>Transaksi</span></a>
      </li>
        
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Pengaturan
      </div>

      <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengaturan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">    
                    <a class="collapse-item" href="<?php echo base_url();?>adminweb/logo">Logo</a>
                    <a class="collapse-item" href="<?= base_url()?>adminweb/slider">Slider</a>
                    <a class="collapse-item" href="<?= base_url()?>adminweb/sosial_media">Sosial Media</a>
                    <a class="collapse-item" href="<?= base_url()?>adminweb/kontak">Kontak</a>
                    <a class="collapse-item" href="<?= base_url()?>adminweb/jam">Waktu / Jam</a>
                    <a class="collapse-item" href="<?= base_url()?>adminweb/tentangkami">Tentang Kami</a>
                    <a class="collapse-item" href="<?= base_url()?>adminweb/cara_booking">Cara Booking</a>
                    <a class="collapse-item" href="<?= base_url()?>adminweb/bank">Bank</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Laporan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>adminweb/transaksi" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
          <i class="fas fa-fw fa-book"></i>
          <span>Laporan</span>
        </a>
        <div id="collapsethree" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Login Screens:</h6>-->
            <a class="collapse-item" href="<?php echo base_url();?>adminweb/cetak_laporan_member">Member</a>
            <a class="collapse-item" href="<?php echo base_url();?>adminweb/cetak_laporan_lapangan">Lapangan</a>
            <a class="collapse-item" href="<?php echo base_url();?>adminweb/cetak_laporan_transaksi">Booking</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Keluar
      </div>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>adminweb/logout">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                  <?php
                  $query = $this->db->query("select count(status) as stts from tbl_transaksi where status='Belum Konfirmasi'");
                  foreach ($query->result_array() as $tampil) {
                    $status = $tampil['stts'];
                  }
                  ?>
                  <?php
                  if ($status!="Belum Konfirmasi") { ?>
                  <span class="badge badge-danger badge-counter"><?php echo $status;?></span>  
                  <?php
                  }
                  else { ?>
                    <span class="badge"></span> 
                  <?php
                  }
                  ?>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Notifikasi Transaksi
                </h6>
                <div class="font-weight-bold">
                    <a class="dropdown-item text-center small text-gray-500" href="<?php echo base_url();?>adminweb/transaksi">Lihat Semua Transaksi</a>
                  </div>
                
              </div>
            </li>
            

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                  <?php
                  $query = $this->db->query("select count(status) as stts from tbl_hubungikami where status='0'");
                  foreach ($query->result_array() as $tampil) {
                    $status = $tampil['stts'];
                  }
                  ?>
                  <?php
                  if ($status!="0") { ?>
                  <span class="badge badge-danger badge-counter"><?php echo $status;?></span>  
                  <?php
                  }
                  else { ?>
                    <span class="badge"></span> 
                  <?php
                  }
                  ?>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Notifikasi Pesan
                </h6>
                <div class="font-weight-bold">
                    <a class="dropdown-item text-center small text-gray-500" href="<?php echo base_url();?>adminweb/buku_tamu">Lihat Semua Pesan</a>
                  </div>
                
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama_user');?></span>
                <!--<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">-->
              </a>
              
              <!-- Dropdown - User Information -->
              <ul class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>adminweb/profile/">
                  <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href="<?php echo base_url();?>adminweb/ubahpass/">
                  <i class="fas fa-fw fa-key fa-sm mr-2 text-gray-400"></i>
                  Ubah Password
                </a>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </ul>
            </li>

          </ul>

        </nav>
        
        <?php echo $contents; ?> 

      

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->session->userdata('nama_user');?> Keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" jika ingin mengakhiri.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?php echo base_url();?>adminweb/logout">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/');?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/');?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/');?>js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url('assets/');?>js/demo/chart-pie-demo.js"></script>

</body>

</html>
