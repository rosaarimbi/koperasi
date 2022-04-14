<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>HS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
      <b>KSP</b> Karya Husada</span>

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">        
      </a>

      <div class="navbar-custom-menu">
          <!-- Messages: style can be found in dropdown.less-->
          <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo base_url('Login/logout'); ?>"><i class="fa fa-sign-out"></i>Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MENU
          
        </li>
        <li>
          <a href="<?php echo base_url(); ?>Home">
            <i class="fa fa-home"></i> <span>HOME</span>
          </a>
        </li>
        <?php 
          if($this->session->userdata('akses') == 'bendahara'){
           echo '
        <li>
          <a href="'.base_url().'User">
            <i class="fa fa-users"></i> <span>USER</span>
          </a>
        </li>
        <li>
          <a href="'.base_url().'Anggota">
            <i class="fa fa-users"></i> <span>ANGGOTA</span>
          </a>
        </li>

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>TRANSAKSI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="'.base_url().'Simpanan"><i class="fa fa-circle-o"></i> Simpanan</a></li>
            <li><a href="'.base_url().'Pinjaman"><i class="fa fa-circle-o"></i>Pinjaman</a></li>
            
            <li><a href="'.base_url().'Angsuran"><i class="fa fa-circle-o"></i>Angsuran</a></li>
          </ul>
        </li>
        <li>
          <a href="'.base_url().'Jenis_simpanan">
            <i class="fa fa-book"></i> <span>JENIS SIMPANAN</span>
          </a>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>LAPORAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="'.base_url().'Laporan/simpanan"><i class="fa fa-circle-o"></i> Simpanan</a></li>
            <li><a href="'.base_url().'Laporan/pinjaman"><i class="fa fa-circle-o"></i>Pinjaman</a></li>
            <li><a href="'.base_url().'Laporan/anggota"><i class="fa fa-circle-o"></i>Anggota</a></li>
          </ul>
          </li>';
          }
          ?>
          <?php 
          if($this->session->userdata('akses') == 'ketua'){
           echo '
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>LAPORAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="'.base_url().'Laporan/simpanan"><i class="fa fa-circle-o"></i> Simpanan</a></li>
            <li><a href="'.base_url().'Laporan/pinjaman"><i class="fa fa-circle-o"></i>Pinjaman</a></li>
            <li><a href="'.base_url().'Laporan/anggota"><i class="fa fa-circle-o"></i>Anggota</a></li>
          </ul>';
          }
          ?>
    </section>
    <!-- /.sidebar -->
  </aside>