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
          <?php
          $id = $this->session->userdata('id');
          $status = 0;
          $notif = $this->office_model->get_timeline_user($id,$status);
           ?>
          <a href="<?php echo BASE_URL.'timeline'; ?>">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning"><?php echo $notif->num_rows(); ?></span>
          </a>
        </li>
      </ul>
    </div>
  </nav>

</header>
