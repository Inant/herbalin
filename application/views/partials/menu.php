<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url().'assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css'?>">
  <link rel="stylesheet" href="<?= base_url().'assets/vendors/iconfonts/font-awesome/css/font-awesome.css'?>">
  <link rel="stylesheet" href="<?= base_url().'assets/vendors/css/vendor.bundle.base.css'?>">
  <link rel="stylesheet" href="<?= base_url().'assets/vendors/css/vendor.bundle.addons.css'?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url().'assets/vendors/icheck/skins/all.css'?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link href="<?php echo base_url().'assets/vendors/select2-develop/dist/css/select2.min.css'?>" rel="stylesheet">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" /> -->
  <link rel="stylesheet" href="<?= base_url().'assets/css/style.css'?>">
  <link rel="stylesheet" href="<?= base_url().'assets/css/custom.css'?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url().'assets/images/favicon.png'?>" />
  
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="<?= base_url().'assets/images/logo.svg' ?>" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="<?= base_url().'assets/images/logo-mini.svg' ?>" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="#" class="nav-link">Schedule
              <span class="badge badge-primary ml-1">New</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Reports</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?= base_url().'assets/images/faces/face3.jpg' ?>" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                  <p class="font-weight-light small-text">
                    Private message
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-email-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                  <p class="font-weight-light small-text">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, <?= $this->session->userdata('nama') ?></span>
              <?php 
              $foto = $this->MainModel->getData('foto', 'user', '', ['username' => $this->session->userdata('username')], '');
              ?>
              <img class="img-xs rounded-circle" src="<?= base_url(). 'upload/fotouser/'.$foto[0]['foto'] ?>" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item mt-2">
                Manage Accounts
              </a>
              <a class="dropdown-item">
                Change Password
              </a>
              <a class="dropdown-item">
                Check Inbox
              </a>
              <a href="<?= base_url(). 'login/logout' ?>" class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?= base_url().'upload/fotouser/'.$foto[0]['foto'] ?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?= $this->session->userdata('nama'); ?></p>
                  <div>
                    <small class="designation text-muted"><?= $this->session->userdata('level'); ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'dashboard' ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php
          if ($this->session->userdata('level') == "Admin") {
          ?>
          <li class="nav-item">
            <a href="<?= base_url().'user' ?>" class="nav-link">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <?php    
          }
          if ($this->session->userdata('level') == "Admin" || $this->session->userdata('level') == "Farmasi") {
              ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#obat" aria-expanded="false" aria-controls="obat">
              <i class="menu-icon mdi mdi-pill"></i>
              <span class="menu-title">Obat</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="obat">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a href="<?= base_url().'satuanobat' ?>"class="nav-link">Satuan Obat</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url().'kategori' ?>"class="nav-link">Kategori Obat</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url().'obat' ?>"class="nav-link">Obat</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url().'obat/kadaluarsa' ?>"class="nav-link">Obat Kadaluarsa</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url().'obat/keluar' ?>"class="nav-link">Obat Keluar</a>
                </li>
              </ul>
            </div>
          </li>
          <?php
          }
          if ($this->session->userdata('level') == "Admin" || $this->session->userdata('level') == "Resepsionis") {
              ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(). 'pasien' ?>">
              <i class="menu-icon mdi mdi-wheelchair-accessibility"></i>
              <span class="menu-title">Pasien</span>
            </a>
          </li>
          <?php
          }
          if ($this->session->userdata('level') == "Admin") {
              ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#diagnosa" aria-expanded="false" aria-controls="diagnosa">
              <i class="menu-icon mdi mdi-heart-pulse"></i>
              <span class="menu-title">Diagnosa</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="diagnosa">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                <a href="<?= base_url().'diagnosa' ?>"class="nav-link">Diagnosa</a>
                </li>
                <li class="nav-item">
                <a href="<?= base_url().'diagnosa/laporan-diagnosa' ?>"class="nav-link">Laporan Diagnosa</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(). 'pelayanan' ?>">
              <i class="menu-icon mdi mdi-stethoscope"></i>
              <span class="menu-title">Pelayanan</span>
            </a>
          </li>
          <?php
          }
          if ($this->session->userdata('level') == "Resepsionis" || $this->session->userdata('level') == "Perawat") {
              ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'antrian' ?>">
              <i class="menu-icon mdi mdi-account-multiple-plus"></i>
              <span class="menu-title">Antrian</span>
            </a>
          </li>
          <?php
          }
          if ($this->session->userdata('level') == "Farmasi") {
              ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'resep' ?>">
              <i class="menu-icon mdi mdi-receipt"></i>
              <span class="menu-title">Antrian Resep</span>
            </a>
          </li>
          <?php
          }
          if ($this->session->userdata('level') == "Kasir") {
              ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'pembayaran' ?>">
              <i class="menu-icon mdi mdi-cash-usd"></i>
              <span class="menu-title">Antrian Pembayaran</span>
            </a>
          </li>
          <?php
          }
          if ($this->session->userdata('level') == "Admin") {
              ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#kunjungan" aria-expanded="false" aria-controls="kunjungan">
              <i class="menu-icon fa fa-file-pdf-o"></i>
              <span class="menu-title">Laporan Kunjungan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="kunjungan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                <a href="<?= base_url().'laporan-kunjungan/all' ?>"class="nav-link">Semua Kunjungan</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url().'laporan-kunjungan/perhari' ?>"class="nav-link">Kunjungan Perhari</a>
                </li>
                <li class="nav-item">
                <a href="<?= base_url().'laporan-kunjungan/perbulan' ?>"class="nav-link">Kunjungan Perbulan</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#pembayaran" aria-expanded="false" aria-controls="pembayaran">
              <i class="menu-icon fa fa-file-pdf-o"></i>
              <span class="menu-title">Laporan Pembayaran</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pembayaran">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                <a href="<?= base_url().'laporan-pembayaran/all' ?>"class="nav-link">Semua Pembayaran</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url().'laporan-pembayaran/perhari' ?>"class="nav-link">Pembayaran Perhari</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url().'laporan-pembayaran/perbulan' ?>"class="nav-link">Pembayaran Perbulan</a>
                </li>
              </ul>
            </div>
          </li>
          <?php
          }
          ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        
        <!-- partial:../../partials/_footer.html -->
        