<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
  <!--  -->
  <div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Selamat Datang!</h4>
    Selamat Datang <?php echo $this->session->userdata('fullname')." - ".$this->session->userdata('jabatan'); ?> di Sistem Informasi Geografis dan Administrasi Desa Gantung. Ini Merupakan aplikasi berbasis Web dan Database Sistem untuk membantu pengadministrasian pemerintahan desa dan <i>open data public</i> dengan menyediakan informasi umum terbuka terkait pelayanan yang di wewenangi pemerintah desa, serta terintegrasi dengan Visual Data Pertanahan Desa, pemberintahuan berupa SMS Notifikasi Pelayanan Desa guna menerapkan pelayanan yang cepat, teradministrasi baik dan terbuka.
  </div>
  <!-- <?php //if ($this->session->userdata('type') == 2 ||$this->session->userdata('type') == 3 || $this->session->userdata('type') == 99 ): ?>
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="box box-info">
        <?php //echo form_open('proses'); ?>
        <div class="box-header with-border">
          <h3 class="box-title">Pencarian Data NIK Cepat</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <select class="form-control" style="width: 100%;" id="fast_search" name="id">
            </select>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn bg-maroon btn-flat pull-right" name="proses">Proses Berdasarkan NIK <i class="fa fa-arrow-right"></i></button>
        </div>
      </form>
    </div>
  </div>
</div> -->
<!-- <?php //endif; ?>

<?php //if ($this->session->userdata('type') == 1 || $this->session->userdata('type') == 99 || $this->session->userdata('type') == 3): ?>
<?php //$this->load->view(MAPS.'maps_desa'); ?>
<?php //endif; ?>
<?php //if ($this->session->userdata('type') == 1 || $this->session->userdata('type') == 2 ): ?>
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>150</h3>
          <p>Pelayanan Hari Ini</p>
        </div>
        <div class="icon">
          <i class="fa fa-calendar-times-o"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-green">
        <div class="inner">
          <h3>53</h3>
          <p>Total Surat Keluar</p>
        </div>
        <div class="icon">
          <i class="fa fa-envelope-square"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>44</h3>
          <p>Total Arsip Surat</p>
        </div>
        <div class="icon">
          <i class="fa fa-folder-open-o"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-maroon">
        <div class="inner">
          <h3>65</h3>
          <p>Data Surat Tanah Terindeks</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
<?php// endif; ?>
<?php //if ($this->session->userdata('type') == 3): ?>
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>150</h3>
          <p>Berkas Tanah (SKT)</p>
        </div>
        <div class="icon">
          <i class="glyphicon glyphicon-align-left"></i>
        </div>
        <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-maroon">
        <div class="inner">
          <h3>150</h3>
          <p>Data Koordinat</p>
        </div>
        <div class="icon">
          <i class="fa fa-map"></i>
        </div>
        <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-12 col-xs-12">
      <div class="small-box bg-purple">
        <div class="inner">
          <h3>150</h3>
          <p>Permohonan Masuk</p>
        </div>
        <div class="icon">
          <i class="fa fa-plus-square"></i>
        </div>
        <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
<?php //endif; ?> -->
</section>
