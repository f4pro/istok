<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title><?php echo $judul; ?> - iStok</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/simplebar.css">
  <!-- Fonts CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/feather.css">
  <link rel="stylesheet" href='<?= base_url('assets/') ?>css/dataTables.bootstrap4.css'>
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/daterangepicker.css">
  <!-- App CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/app-light.css" id="lightTheme">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/app-dark.css" id="darkTheme" disabled>
  <!--Search Table -->
  <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="vertical  light  ">
  <div class="wrapper">
    <nav class="topnav navbar navbar-light">
      <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar" disabled>
        <i class="fe fe-smile navbar-toggler-icon"></i>
      </button>
      <form class="form-inline mr-auto text-muted">
        <input class="form-control mr-sm-2 bg-transparent border-0 text-muted" type="search" placeholder="Keep moving forward!" aria-label="Search" disabled>
      </form>
      <ul class="nav">
        <!-- <li class="nav-item">
          <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
            <i class="fe fe-sun fe-16"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-muted my-2" href="#" data-toggle="modal" data-target=".modal-shortcut">
            <span class="fe fe-grid fe-16"></span>
          </a>
        </li>
        <li class="nav-item nav-notif">
          <a class="nav-link text-muted my-2" href="#" data-toggle="modal" data-target=".modal-notif">
            <span class="fe fe-bell fe-16"></span>
            <span class="dot dot-md bg-success"></span>
          </a>
        </li> -->
        <!-- <li class="nav-item nav-notif">
          <input class="nav-link mr-sm-2 bg-transparent border-0 text-muted my-2" type="search" placeholder="Keep moving forward!" aria-label="Search" disabled>
        </li> -->
        <li class="nav-item dropdown">
        <?php
        if ($user['status'] == 'Karyawan') {
        ?>
          <a class="nav-link text-muted pr-2" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="avatar avatar-sm mt-2">
            <img src="<?= base_url('assets/') ?>karyawan/default.jpg" class="avatar-img rounded-circle">
            </span>
            <b><?= $user['nama']; ?></b>
          </a>
          <?php 
        } else {
          ?>
           <a class="nav-link text-muted pr-2" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="avatar avatar-sm mt-2">
              <img src="<?= base_url('assets/') ?>karyawan/default.jpg" class="avatar-img rounded-circle">
            </span>
            <b>ADMIN</b>
          </a>
          <?php
        }
          ?>
        </li>
      </ul>
    </nav>
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
      <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
      </a>
      <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
            <!-- <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
              <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
            </svg> -->
            <img src="<?= base_url('assets/') ?>/assets/images/istok.png" alt="iStok" />
          </a>
        </div>
        <!-- <ul class="navbar-nav flex-fill w-100 mb-2">
          <a href="<?php echo site_url('dashboard/'); ?>" data-toggle="collapse" aria-expanded="false" class="nav-link">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
          </a>
        </ul> -->
        <p class="text-muted nav-heading mt-4 mb-1">
          <span>Santapan Harian</span>
        </p>
        <?php
        if ($user['status'] == 'Admin') {
        ?>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <a href="<?php echo site_url('barang/'); ?>" aria-expanded="false" class="nav-link">
              <i class="fe fe-box fe-16"></i>
              <span class="ml-3 item-text">Barang</span>
            </a>
            <a href="<?php echo site_url('karyawan/'); ?>" class="nav-link" href="widgets.html">
              <i class="fe fe-users fe-16"></i>
              <span class="ml-3 item-text">Karyawan</span>
            </a>
            <a href="<?php echo site_url('Account/'); ?>" class="nav-link" href="widgets.html">
              <i class="fe fe-key fe-16"></i>
              <span class="ml-3 item-text">Account</span>
            </a>
            <a href="<?php echo site_url('record_in/'); ?>" aria-expanded="false" class="nav-link">
              <i class="fe fe-download fe-16"></i>
              <span class="ml-3 item-text">Record In</span>
            </a>
            <a href="<?php echo site_url('record_out/'); ?>" aria-expanded="false" class="nav-link">
              <i class="fe fe-share fe-16"></i>
              <span class="ml-3 item-text">Record Out</span>
            </a>
            <a href="<?php echo site_url('support/'); ?>" aria-expanded="false" class="nav-link">
              <i class="fe fe-flag fe-16"></i>
              <span class="ml-3 item-text">Laporan</span>
            </a>
          <?php 
        } else {
          ?>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
          <a href="<?php echo site_url('HomeKar/'); ?>" aria-expanded="false" class="nav-link">
              <i class="fe fe-box fe-16"></i>
              <span class="ml-3 item-text">Barang</span>
            </a>
            <a href="<?php echo site_url('Check_in/'); ?>" aria-expanded="false" class="nav-link">
              <i class="fe fe-download fe-16"></i>
              <span class="ml-3 item-text">Barang Baru</span>
            </a>
            <a href="<?php echo site_url('History/'); ?>" aria-expanded="false" class="nav-link">
              <i class="fe fe-watch fe-16"></i>
              <span class="ml-3 item-text">History</span>
            </a>
            <a href="<?php echo site_url('SupportKar/'); ?>" aria-expanded="false" class="nav-link">
              <i class="fe fe-flag fe-16"></i>
              <span class="ml-3 item-text">Laporan</span>
            </a>
          <?php
        }
          ?>
          <!-- <a href="#" data-toggle="collapse" aria-expanded="false" class="nav-link">
            <i class="fe fe-pie-chart fe-16"></i>
            <span class="ml-3 item-text">Charts</span>
          </a> -->
          </ul>
          <div class="btn-box w-100 mt-4 mb-1">
            <a href="<?php echo site_url('auth/logout'); ?>" class="btn mb-2 btn-danger btn-lg btn-block">
              <i class="fe fe-log-out fe-12 mx-2"></i><span class="small">Sign Out</span>
            </a>
          </div>
      </nav>
    </aside>
    <main role="main" class="main-content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <!--<h1 class="page-title">Let's start</h1>-->
          </div> <!-- .col-12 -->
        </div> <!-- .row -->
      </div> <!-- .container-fluid -->
      <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="list-group list-group-flush my-n3">
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-box fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Package has uploaded successfull</strong></small>
                      <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                      <small class="badge badge-pill badge-light text-muted">1m ago</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-download fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Widgets are updated successfull</strong></small>
                      <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                      <small class="badge badge-pill badge-light text-muted">2m ago</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-inbox fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Notifications have been sent</strong></small>
                      <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                      <small class="badge badge-pill badge-light text-muted">30m ago</small>
                    </div>
                  </div> <!-- / .row -->
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-link fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Link was attached to menu</strong></small>
                      <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                      <small class="badge badge-pill badge-light text-muted">1h ago</small>
                    </div>
                  </div>
                </div> <!-- / .row -->
              </div> <!-- / .list-group -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body px-5">
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <div class="squircle bg-success justify-content-center">
                    <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Control area</p>
                </div>
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Activity</p>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Droplet</p>
                </div>
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Upload</p>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-users fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Users</p>
                </div>
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Settings</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>