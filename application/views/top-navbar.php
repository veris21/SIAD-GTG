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
          $notif = $this->notifikasi_model->get_notifikasi_user($id, $status);
           ?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>

            <?php if ($notif->num_rows()!=0): ?>
              <span class="label label-danger"><?php echo $notif->num_rows(); ?></span>
            <?php endif; ?>
          </a>
          <ul class="dropdown-menu">
            <?php if ($notif->num_rows()!=0){ ?>
            <li class="header">
            Anda mempunyai <?php echo $notif->num_rows(); ?> Pesan Belum terbaca
            </li>
            <li>
                <ul class="menu">
                <?php foreach ($notif->result() as $notifikasi) { ?>
                  <li>
                  <a href="<?php echo 'notifikasi/view/'.$notifikasi->id;?>">
                  <i class="fa fa-warning text-yellow"></i> <?php echo $notifikasi->message;?>
                  </a>
                  </li>
                <?php } ?>
                </ul>
             </li>
             <?php }else{ ?>
              <li class="header">Belum ada notifikasi masuk!!</li>
              <?php } ?>
             <li class="footer"><a href="<?php echo BASE_URL.'notifikasi/list'; ?>">Lihat Semua Notifikasi</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
