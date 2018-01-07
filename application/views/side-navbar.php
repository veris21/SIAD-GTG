<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
   <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="<?php echo base_url(); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <?php
      $activeNav = $this->session->userdata('jabatan');     
      switch ($activeNav) {
        case "KADES":
        ?>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo base_url().'arsip/cari'; ?>">
          <i class="fa fa-book"></i>
          <span>Cari Arsip Surat</span>
          <!-- <small class="label pull-right bg-green">new</small> -->
          </a>
        </li>
        <!-- Data Tanah -->
        <li>
          <a href="<?php echo base_url().'pertanahan/data'; ?>">
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
          <a href="<?php echo base_url().'arsip/cari'; ?>">
          <i class="fa fa-book"></i>
          <span>Cari Arsip Surat</span>
          </a>
        </li>
        <!-- Data Tanah -->
        <li>
          <a href="<?php echo base_url().'pertanahan/data'; ?>">
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
          <li><a href="<?php echo base_url().'pertanahan/permohonan'; ?>"><i class="fa fa-circle-o"></i> Data Permohonan</a></li>
          <li><a href="<?php echo base_url().'pertanahan/berita_acara'; ?>"><i class="fa fa-circle-o"></i> Data BAP</a></li>
          <li><a href="<?php echo base_url().'pertanahan/surat_tanah'; ?>"><i class="fa fa-circle-o"></i> Data SKT Release</a></li>
          <li><a href="<?php echo base_url().'pertanahan/aset_tanah_desa'; ?>"><i class="fa fa-circle-o"></i> Data Tanah Desa</a></li>
        </ul>
      </li>        <?php
          break;
          case "KAUR":
        ?>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo base_url().'arsip/cari'; ?>">
          <i class="fa fa-book"></i>
          <span>Cari Arsip Surat</span>
          </a>
        </li>
        
        <?php
          break;
          case "KASI":
        ?>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo base_url().'arsip/cari'; ?>">
          <i class="fa fa-book"></i>
          <span>Cari Arsip Surat</span>
          </a>
        </li>
        <?php
          $kasi = $this->notifikasi_model->_get_data_kasi_pemerintahan($this->session->userdata('desa_id'))->row_array();
         if($this->session->userdata('id') == $kasi['id']){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Layanan Pertanahan</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'pertanahan/permohonan'; ?>"><i class="fa fa-circle-o"></i> Data Permohonan</a></li>
            <li><a href="<?php echo base_url().'pertanahan/berita_acara'; ?>"><i class="fa fa-circle-o"></i> Data BAP</a></li>
            <li><a href="<?php echo base_url().'pertanahan/surat_tanah'; ?>"><i class="fa fa-circle-o"></i> Data SKT Release</a></li>
            <li><a href="<?php echo base_url().'pertanahan/aset_tanah_desa'; ?>"><i class="fa fa-circle-o"></i> Data Tanah Desa</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php
          break;
          case "LAYANAN":
        ?>
         <!-- DATA KEPENDUDUKAN -->
         <li>
          <a href="<?php echo base_url().'data_penduduk'; ?>">
            <i class="fa fa-th"></i> <span>Data Kependudukan</span> 
            <!-- <small class="label pull-right bg-green">new</small> -->
          </a>
        </li>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo base_url().'arsip'; ?>">
          <i class="fa fa-book"></i>
          <span>Arsip Surat</span>
          <!-- <small class="label pull-right bg-green">new</small> -->
          </a>
        </li>
        <!-- Data Tanah -->
        <li>
          <a href="<?php echo base_url().'pertanahan/data'; ?>">
          <i class="fa fa-search"></i> 
          <span>Cek Data Tanah</span>
          </a>
        </li>
        <?php
        break;
        case 'PERTANAHAN':
        ?>  
        <li>
        <a href="<?php echo base_url().'sms/undangan'; ?>">
        <i class="fa fa-comments"></i>
        <span>SMS Undangan</span>
        </a>
        </li>
        <!-- Data Tanah -->
        <li>
        <a href="<?php echo base_url().'pertanahan/data'; ?>">
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
            <li><a href="<?php echo base_url().'pertanahan/permohonan'; ?>"><i class="fa fa-circle-o"></i> Data Permohonan</a></li>
            <li><a href="<?php echo base_url().'pertanahan/berita_acara'; ?>"><i class="fa fa-circle-o"></i> Data BAP</a></li>
            <li><a href="<?php echo base_url().'pertanahan/surat_tanah'; ?>"><i class="fa fa-circle-o"></i> Data SKT Release</a></li>
            <li><a href="<?php echo base_url().'pertanahan/aset_tanah_desa'; ?>"><i class="fa fa-circle-o"></i> Data Tanah Desa</a></li>
          </ul>
        </li>
        <?php
        break;
        case 'BPD':
        ?>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo base_url().'arsip/cari'; ?>">
          <i class="fa fa-book"></i>
          <span>Cari Arsip Surat</span>
          <!-- <small class="label pull-right bg-green">new</small> -->
          </a>
        </li>
        <!-- Data Tanah -->
        <li>
        <a href="<?php echo base_url().'pertanahan/data'; ?>">
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
        <a href="<?php echo base_url().'pertanahan/data'; ?>">
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
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Chars &amp; Grafik</a></li>
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i>Laporan Pelayanan</a></li>
            <li><a href="<?php echo base_url().'koordinat'; ?>"><i class="fa fa-circle-o"></i>List Record Koordinat</a></li>
          </ul>
        </li>
        <!-- LAPORAN -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Laporan</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Tabel Surat Keluar</a></li>
            <li><a href="<?php echo base_url().'disposisi'; ?>"><i class="fa fa-circle-o"></i> History Disposisi</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i>Penerima Bantuan <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Penerima Raskin</a></li>
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Penerima Minyak</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- ===== -->
        <!-- DATA KEPENDUDUKAN -->
        <li>
          <a href="<?php echo base_url().'data_penduduk'; ?>">
            <i class="fa fa-th"></i> <span>Data Kependudukan</span> 
            <!-- <small class="label pull-right bg-green">new</small> -->
          </a>
        </li>
        <!-- ARSIP -->
        <li>
          <a href="<?php echo base_url().'arsip'; ?>">
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
            <li><a href="<?php echo base_url().'koordinat'; ?>"><i class="fa fa-circle-o"></i> Tabel Koordinat</a></li>
            <li><a href="<?php echo base_url().'grafik'; ?>"><i class="fa fa-circle-o"></i> Grafik Kinerja</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url().'pertanahan/data'; ?>">
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
            <li><a href="<?php echo base_url().'pertanahan/permohonan'; ?>"><i class="fa fa-circle-o"></i> Data Permohonan</a></li>
            <li><a href="<?php echo base_url().'pertanahan/berita_acara'; ?>"><i class="fa fa-circle-o"></i> Data BAP</a></li>
            <li><a href="<?php echo base_url().'pertanahan/surat_tanah'; ?>"><i class="fa fa-circle-o"></i> Data SKT Release</a></li>
            <li><a href="<?php echo base_url().'pertanahan/aset_tanah_desa'; ?>"><i class="fa fa-circle-o"></i> Data Tanah Desa</a></li>
          </ul>
        </li>
        <!-- MASTER SISTEM -->
        <li>
        <a href="<?php echo base_url().'sms/undangan'; ?>">
        <i class="fa fa-comments"></i>
        <span>SMS Undangan</span>
        </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Master System</span>
             <!-- <small class="label pull-right bg-red">new</small> -->
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('user/list'); ?>"><i class="fa fa-circle-o"></i> Master User</a></li>
            <li><a href="<?php echo base_url('user/administrasi'); ?>"><i class="fa fa-circle-o"></i> Master Wilayah</a></li>
            <li><a href="<?php echo base_url('arsip/klasifikasi'); ?>"><i class="fa fa-circle-o"></i> Klasifikasi Arsip</a></li>
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Akses History</a></li>
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Cron Jobs</a></li>
            <li><a href="<?php echo base_url('sms/setting'); ?>"><i class="fa fa-circle-o"></i> SMS API Option</a></li>
            <li><a href="<?php echo base_url('reset/database'); ?>"><i class="fa fa-circle-o"></i> Reset Database </a></li>
          </ul>
        </li>
        <?php
          break;
        default:
          redirect(base_url('logout'));
        break;
      }
       ?>
      <li class="header">ACCOUNT CONTROL</li>
      <li><a href="<?php echo base_url().'setting/akun'; ?>"><i class="fa fa-user"></i> <span>Setting Akun</span></a></li>
      <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
