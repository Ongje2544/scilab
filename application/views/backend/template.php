<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Scilab</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?PHP echo config_item("assets_url"); ?>/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?PHP echo config_item("assets_url"); ?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?PHP echo config_item("assets_url"); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?PHP echo config_item("assets_url"); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?PHP echo config_item("assets_url"); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?PHP echo config_item("assets_url"); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?PHP echo config_item("assets_url"); ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?PHP echo config_item("assets_url"); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/select2/js/select2.full.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/dist/js/adminlte.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/dist/js/adminlte.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/chart.js/Chart.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/dist/js/pages/dashboard3.js"></script>
  <!-- DataTables  & Plugins -->
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/jszip/jszip.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/pdfmake/pdfmake.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/pdfmake/vfs_fonts.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- bs-custom-file-input -->
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- Bootstrap Switch -->
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- AdminLTE App -->
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/dist/js/adminlte.min.js"></script>


  <!-- Page specific script -->
  <!-- <script type="text/javascript" src="< ?PHP echo config_item("assets_url"); ?>/dist/js/demo.js"></script> -->

  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>

</head>

<?php 
$Actionlink = $this->uri->segment(1);
$Actionlink2 = $this->uri->segment(2);
?>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../index3.html" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="<?PHP echo config_item("assets_url"); ?>/dist/img/bsru.png" class="brand-image" style="margin-left: 5px;">
        <span class="brand-text font-weight-normal">BSRU</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item <?php if($Actionlink == 'dashboard'){ echo 'menu-open';}?>">
              <a href="#" class="nav-link <?php if($Actionlink == 'dashboard'){ echo 'active';}?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item <?php if($Actionlink == 'dashboard'){ echo 'active';}?>">
                  <a href="<?PHP echo config_item("base_url"); ?>/dashboard/" class="nav-link <?php if($Actionlink == 'dashboard'){ echo 'active';}?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">ฐานข้อมูล</li>
            <li class="nav-item <?php if($Actionlink == 'lab'){ echo 'menu-open';}?>">
              <a href="#" class="nav-link <?php if($Actionlink == 'lab'){ echo 'active';}?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  ข้อมูลค่าย
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?PHP echo config_item("base_url"); ?>/lab/" class="nav-link <?php if($Actionlink == 'lab' && $Actionlink2 == ''){ echo 'active';}?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>รายการรายวิชา</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?PHP echo config_item("base_url"); ?>/lab/schoollist" class="nav-link <?php if($Actionlink == 'lab' && $Actionlink2 == 'schoollist'){ echo 'active';}?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>รายการโรงเรียน</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <?PHP echo $module; ?>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>BSRU</b> Lab
      </div>
      <strong>มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา <a href="https://www.bsru.ac.th/">BSRU.AC.TH</a></strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
</body>

</html>