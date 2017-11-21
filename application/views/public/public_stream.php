<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Data Geografis Desa Gantung || Stream</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo THEME; ?>Font_Awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo THEME; ?>ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo THEME; ?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo THEME; ?>dist/css/skins/_all-skins.min.css">
    <style media="screen">
      #map_stream{
       height: 83vh;
       overflow: hidden;
       padding-bottom: 22.25%;
       padding-top: 30px;
       position: relative;
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="<?php echo BASE_URL; ?>" class="logo">
          <span class="logo-mini">Si<b>G</b></span>
          <span class="logo-lg">Si<b>Desa Gantung</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="notifications-menu">
                <a href="<?php echo BASE_URL.'login'; ?>">
                  Login
                  <i class="fa fa-user"></i>
                  <span class="label label-warning">New</span>
                </a>

              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo UPLOADER.'avatar/logo-gtg.png'; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Nama</p>
            </div>
          </div>
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Cari Data Peta...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <div id="map_stream"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-xs-12">
        <div class="box box-warning">
          <div class="box-body">
            <div class="well">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
        </div>
          </div>
        </div>
      </section>
      <!--  -->
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="<?php echo THEME; ?>plugins/jQueryUI/jquery-ui2.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="<?php echo THEME; ?>dist/js/app.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js??key=AIzaSyAQZ5juJWnQk7IjkS1xtzSzor1bChd_L3A&libraries=drawing,geometry,distance"></script>
    <script type="text/javascript" src="<?php echo APPS.'maps.js'; ?>"></script>
  </body>
</html>
