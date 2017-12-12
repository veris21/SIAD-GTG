<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
   <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="<?php echo BASE_URL; ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <?php
      $activeNav = $this->session->userdata['jabatan'];     
      switch ($activeNav) {
        case "KADES":
        ?>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo BASE_URL.'arsip'; ?>">
          <i class="fa fa-book"></i>
          <span>Arsip Surat</span>
          <!-- <small class="label pull-right bg-green">new</small> -->
          </a>
        </li>
        <!-- Data Tanah -->
        <li>
          <a href="<?php echo BASE_URL.'pertanahan/data'; ?>">
          <i class="fa fa-search"></i>
          <span>Cek Data Tanah</span>
          </a>
        </li>
        <?php
          break;
          case "SEKDES":
        ?>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo BASE_URL.'arsip'; ?>">
          <i class="fa fa-book"></i>
          <span>Arsip Surat</span>
          </a>
        </li>
        <!-- Data Tanah -->
        <li>
          <a href="<?php echo BASE_URL.'pertanahan/data'; ?>">
          <i class="fa fa-search"></i> 
          <span>Cek Data Tanah</span>
          </a>
        </li>
        <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Layanan Pertanahan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo BASE_URL.'pertanahan/permohonan'; ?>"><i class="fa fa-circle-o"></i> Data Permohonan</a></li>
          <li><a href="<?php echo BASE_URL.'berita_acara'; ?>"><i class="fa fa-circle-o"></i> Data BAP</a></li>
          <li><a href="<?php echo BASE_URL.'pra_skt'; ?>"><i class="fa fa-circle-o"></i> Data Pra SKT</a></li>
          <li><a href="<?php echo BASE_URL.'skt_release'; ?>"><i class="fa fa-circle-o"></i> Data SKT Release</a></li>
        </ul>
      </li>        <?php
          break;
          case "KAUR":
        ?>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo BASE_URL.'arsip'; ?>">
          <i class="fa fa-book"></i>
          <span>Arsip Surat</span>
          </a>
        </li>
        
        <?php
          break;
          case "KASI":
        ?>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo BASE_URL.'arsip'; ?>">
          <i class="fa fa-book"></i>
          <span>Arsip Surat</span>
          </a>
        </li>
        <?php
          break;
          case "LAYANAN":
        ?>
         <!-- DATA KEPENDUDUKAN -->
         <li>
          <a href="<?php echo BASE_URL.'data_penduduk'; ?>">
            <i class="fa fa-th"></i> <span>Data Kependudukan</span> 
            <!-- <small class="label pull-right bg-green">new</small> -->
          </a>
        </li>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo BASE_URL.'arsip'; ?>">
          <i class="fa fa-book"></i>
          <span>Arsip Surat</span>
          <!-- <small class="label pull-right bg-green">new</small> -->
          </a>
        </li>
        <!-- Data Tanah -->
        <li>
          <a href="<?php echo BASE_URL.'pertanahan/data'; ?>">
          <i class="fa fa-search"></i> 
          <span>Cek Data Tanah</span>
          </a>
        </li>
        <?php
        break;
        case 'PERTANAHAN':
        ?>  
        
        <!-- Data Tanah -->
        <li>
          <a href="<?php echo BASE_URL.'pertanahan/data'; ?>">
          <i class="fa fa-search"></i> Cek Data Tanah</a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Layanan Pertanahan</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL.'pertanahan/permohonan'; ?>"><i class="fa fa-circle-o"></i> Data Permohonan</a></li>
            <li><a href="<?php echo BASE_URL.'berita_acara'; ?>"><i class="fa fa-circle-o"></i> Data BAP</a></li>
            <li><a href="<?php echo BASE_URL.'pra_skt'; ?>"><i class="fa fa-circle-o"></i> Data Pra SKT</a></li>
            <li><a href="<?php echo BASE_URL.'skt_release'; ?>"><i class="fa fa-circle-o"></i> Data SKT Release</a></li>
          </ul>
        </li>
        <?php
        break;
        case 'BPD':
        ?>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo BASE_URL.'arsip'; ?>">
          <i class="fa fa-book"></i>
          <span>Arsip Surat</span>
          <!-- <small class="label pull-right bg-green">new</small> -->
          </a>
        </li>
        <!-- Data Tanah -->
        <li>
          <a href="<?php echo BASE_URL.'pertanahan/data'; ?>">
          <i class="fa fa-search"></i>
          <span>Cek Data Tanah</span>
          </a>
        </li>
        <?php
        break;
        case 'KADUS':
        ?>
        <!-- Data Tanah -->
        <li>
          <a href="<?php echo BASE_URL.'pertanahan/data'; ?>">
          <i class="fa fa-search"></i>
          <span>Cek Data Tanah</span>
          </a>
        </li>
        <?php
        break;
        case 'RT':
        ?>  
        <?php
        break;
        case 'ROOT':
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Visual Data Layanan</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Chars &amp; Grafik</a></li>
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i>Laporan Pelayanan</a></li>
            <li><a href="<?php echo BASE_URL.'koordinat'; ?>"><i class="fa fa-circle-o"></i>List Record Koordinat</a></li>
          </ul>
        </li>
        <!-- LAPORAN -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Laporan</span>
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
        <!-- ===== -->
        <!-- DATA KEPENDUDUKAN -->
        <li>
          <a href="<?php echo BASE_URL.'data_penduduk'; ?>">
            <i class="fa fa-th"></i> <span>Data Kependudukan</span> 
            <!-- <small class="label pull-right bg-green">new</small> -->
          </a>
        </li>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo BASE_URL.'arsip'; ?>">
          <i class="fa fa-book"></i>
          <span>Arsip Surat</span>
          <!-- <small class="label pull-right bg-green">new</small> -->
          </a>
        </li>
        <!-- PERTANAHAN -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-map-o"></i> <span>Data Koordinat</span>
             <!-- <small class="label pull-right bg-green">new</small> -->
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL.'koordinat'; ?>"><i class="fa fa-circle-o"></i> Tabel Koordinat</a></li>
            <li><a href="<?php echo BASE_URL.'grafik'; ?>"><i class="fa fa-circle-o"></i> Grafik Kinerja</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo BASE_URL.'pertanahan/data'; ?>">
          <i class="fa fa-search"></i>
          <span>Cek Data Tanah</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Layanan Pertanahan</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL.'pertanahan/permohonan'; ?>"><i class="fa fa-circle-o"></i> Data Permohonan</a></li>
            <li><a href="<?php echo BASE_URL.'berita_acara'; ?>"><i class="fa fa-circle-o"></i> Data BAP</a></li>
            <li><a href="<?php echo BASE_URL.'pra_skt'; ?>"><i class="fa fa-circle-o"></i> Data Pra SKT</a></li>
            <li><a href="<?php echo BASE_URL.'skt_release'; ?>"><i class="fa fa-circle-o"></i> Data SKT Release</a></li>
          </ul>
        </li>
        <!-- MASTER SISTEM -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Master System</span>
             <!-- <small class="label pull-right bg-red">new</small> -->
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL.'user/list'; ?>"><i class="fa fa-circle-o"></i> Master User</a></li>
            <li><a href="<?php echo BASE_URL.'user/administrasi'; ?>"><i class="fa fa-circle-o"></i> Master Wilayah</a></li>
            <li><a href="<?php echo BASE_URL.'arsip/klasifikasi'; ?>"><i class="fa fa-circle-o"></i> Klasifikasi Arsip</a></li>
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> Akses History</a></li>
            <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-circle-o"></i> System Cron Jobs</a></li>
            <li><a href="<?php echo BASE_URL.'master/sms'; ?>"><i class="fa fa-circle-o"></i> SMS Option</a></li>
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
      <li><a href="<?php echo BASE_URL.'setting/akun'; ?>"><i class="fa fa-user"></i> <span>Setting Akun</span></a></li>
      <li><a href="<?php echo BASE_URL.'logout'; ?>"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
