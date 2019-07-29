<?php include "config.php";?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WarungGo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="themes/css/bootstrap.min.css">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="themes/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="themes/css/AdminLTE.min.css">
    <link rel="stylesheet" href="themes/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="themes/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <!-- <script src="themes/js/jquery.js"></script> -->
    <!-- Bootstrap 3.3.5 -->
    <script src="themes/js/bootstrap.min.js"></script>
    <script src="themes/js/bootstrap-datepicker.min.js"></script>

  
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>W</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Warung</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <span class="fa fa-user"></span>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo ucwords($_SESSION['id']);?></span>
                </a>
                
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li>
                <a href="pesanan.php">  
                 <i class="fa fa-shopping-cart"></i> <span>Pesanan</span>
              </a>
            </li>
            
            <li>
              <a href="kategori.php">
                <i class="fa fa-cubes"></i> <span>Kategori</span>  
              </a>
            </li>
            <li>
              <a href="produk.php">
                <i class="fa fa-cube"></i> <span>Produk</span>  
              </a>
            </li>
            <li>
              <a href="member.php">
                <i class="fa fa-group"></i> <span>Member</span>  
              </a>
            </li>
            <li>
              <a href="notifikasi.php">
                <i class="fa fa-envelope-o"></i> <span>Notifikasi</span>  
              </a>
            </li>   
            <li>
              <a href="setting.php">
                <i class="fa fa-wrench"></i> <span>Setting</span>  
              </a>
            </li>         
            <li>
              <a href="logout.php">
                <i class="fa  fa-key"></i> <span>Keluar</span>  
              </a>
            </li>


          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
