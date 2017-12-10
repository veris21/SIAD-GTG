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
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Selamat Datang!</h4>
    Selamat Datang <?php echo $this->session->userdata('fullname')." - ".$this->session->userdata('jabatan'); ?> di Sistem Informasi Geografis dan Administrasi Desa Gantung. Ini Merupakan aplikasi berbasis Web dan Database Sistem untuk membantu pengadministrasian pemerintahan desa dan <i>open data public</i> dengan menyediakan informasi umum terbuka terkait pelayanan yang di wewenangi pemerintah desa, serta terintegrasi dengan Visual Data Pertanahan Desa, pemberintahuan berupa SMS Notifikasi Pelayanan Desa guna menerapkan pelayanan yang cepat, teradministrasi baik dan terbuka.
  </div>

<!-- ==============SCANNER ============-->
<div class="box box-success">
  <div class="box-header">
    <div class="box-title">
      Scan QR Code Data
    </div>   

    <div class="navbar-form navbar-right">
                        <select class="form-control" id="camera-select"></select>
                        <div class="form-group">
                            <input id="image-url" type="text" class="form-control" placeholder="Image url">
                            <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                            <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                            <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                            <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                            <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                         </div>
                    </div>

  </div>
  <div class="box-body">

    <div class="row">
      <div class="col-md-6">

      <div class="well" style="position: relative;display: inline-block;">
          <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
          <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
          <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
          <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
          <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
       </div>

       <!-- <div class="well" style="width: 100%;">
                <label id="zoom-value" width="100">Zoom: 2</label>
                <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
                <label id="brightness-value" width="100">Brightness: 0</label>
                <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
                <label id="contrast-value" width="100">Contrast: 0</label>
                <input id="contrast" onchange="Page.changeContrast();" type="range" min="0" max="64" value="0">
                <label id="threshold-value" width="100">Threshold: 0</label>
                <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
                <label id="sharpness-value" width="100">Sharpness: off</label>
                <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                <label id="grayscale-value" width="100">grayscale: off</label>
                <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                <br>
                <label id="flipVertical-value" width="100">Flip Vertical: off</label>
                <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
                <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
            </div> -->
      </div>
      <div class="col-md-6">
      <div class="thumbnail" id="result">
          <div class="well" style="overflow: hidden;">
              <img width="320" height="240" id="scanned-img" src="">
          </div>
          <div class="caption">
              <h3>Scanned result</h3>
              <p id="scanned-QR"></p>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- ================================= -->
  <div class="box box-widget collapsed-box">
    <div class='box-header with-border'>
    <div class='user-block'>
    <img class='img-circle' src='<?php echo BASE_URL."assets/new-logo.png"; ?>' alt='user image'>
    <span class='username'><h4>Informasi Penggunaan</h4></span>
      </div>
      <div class='box-tools'>          
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
            <button onclick='tandai_mengerti(<?php echo $this->session->userdata('id');?>)' class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
      </div><!-- /.box-tools -->
    </div>
    <div class='box-body'>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus vitae quam omnis eaque neque! Placeat quibusdam labore doloribus? Modi dolorum placeat ipsa saepe illum a ducimus facere vitae fugiat voluptatum.</p>
    </div>
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
