<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo THEME; ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('full_name'); ?></p>
        <a href="#"></i><?php echo $this->session->userdata('jabatan'); ?></a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="<?php echo BASE_URL; ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <?php
      $activeNav = $this->session->userdata['type'];
      switch ($activeNav) {
        case 1:
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Visual Data Layanan</span>
            <small class="label pull-right bg-green">new</small>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Chars &amp; Grafik</a></li>
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i>Laporan Pelayanan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Laporan</span>
             <small class="label pull-right bg-green">new</small>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Tabel Surat Keluar</a></li>
            <li><a href="<?php echo BASE_URL.'disposisi'; ?>"><i class="fa fa-circle-o"></i> History Disposisi</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i>Penerima Bantuan <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Penerima Raskin</a></li>
                <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Penerima Minyak</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <?php
          break;
        case 2:
        ?>
        <li>
          <a href="<?php echo BASE_URL.'data_penduduk'; ?>">
            <i class="fa fa-th"></i> <span>Data Kependudukan</span> <small class="label pull-right bg-green">new</small>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layanan Umum</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Surat Keterangan</a></li>
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Surat Pernyataan</a></li>
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Surat Pengantar</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo BASE_URL.'arsip'; ?>">
          <i class="fa fa-book"></i>
          <span>Data Arsip Surat</span>
          <small class="label pull-right bg-green">new</small>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Laporan</span>
             <small class="label pull-right bg-green">new</small>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Tabel Surat Keluar</a></li>
            <li><a href="<?php echo BASE_URL.'disposisi'; ?>"><i class="fa fa-circle-o"></i> History Disposisi</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i>Penerima Bantuan <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Penerima Raskin</a></li>
                <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Penerima Minyak</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <?php
          break;
        case 3:
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Layanan Pertanahan Desa</span>
            <small class="label pull-right bg-green">new</small>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL.'permohonan'; ?>"><i class="fa fa-circle-o"></i> Data Permohonan</a></li>
            <li><a href="<?php echo BASE_URL.'berita_acara'; ?>"><i class="fa fa-circle-o"></i> Data BAP</a></li>
            <li><a href="<?php echo BASE_URL.'pra_skt'; ?>"><i class="fa fa-circle-o"></i> Data Pra SKT</a></li>
            <li><a href="<?php echo BASE_URL.'skt_release'; ?>"><i class="fa fa-circle-o"></i> Data SKT Release</a></li>
          </ul>
        </li>
        <?php
          break;
        case 99:
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Visual Data Layanan</span>
            <small class="label pull-right bg-green">new</small>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Chars &amp; Grafik</a></li>
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i>Laporan Pelayanan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Laporan</span>
             <small class="label pull-right bg-green">new</small>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Tabel Surat Keluar</a></li>
            <li><a href="<?php echo BASE_URL.'disposisi'; ?>"><i class="fa fa-circle-o"></i> History Disposisi</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i>Penerima Bantuan <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Penerima Raskin</a></li>
                <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Penerima Minyak</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?php echo BASE_URL.'data_penduduk'; ?>">
            <i class="fa fa-th"></i> <span>Data Kependudukan</span> <small class="label pull-right bg-green">new</small>
          </a>
        </li>
        <li>
          <a href="<?php echo BASE_URL.'arsip'; ?>">
          <i class="fa fa-book"></i>
          <span>Data Arsip Surat</span>
          <small class="label pull-right bg-green">new</small>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Master System</span>
             <small class="label pull-right bg-red">new</small>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL.'master/user'; ?>"><i class="fa fa-circle-o"></i> Master User</a></li>
            <li><a href="<?php echo BASE_URL.'master/desa'; ?>"><i class="fa fa-circle-o"></i> Master Desa</a></li>
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Akses History</a></li>
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> System Cron Jobs</a></li>
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> System Option</a></li>
          </ul>
        </li>
        <?php
          break;
        default:
          redirect('logout');
          break;
      }
       ?>
      <li class="header">ACCOUNT CONTROL</li>
      <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-user"></i> <span>Profile User</span></a></li>
      <li><a href="<?php echo BASE_URL.'logout'; ?>"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
