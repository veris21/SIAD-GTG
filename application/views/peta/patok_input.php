<section class="content-header">
  <h1>
    Data Batas Tanah
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Input Dokumentasi Koordinat</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
<?php echo form_open_multipart(); ?>
  <div class="row">
    <div class="col-md-4">
      <div class="box box-info">
        <div class="box-body">
          <div class="form-group">
            <label><i class="fa fa-map-o"></i> Latitude</label>
            <input type="text" name="patok_lat" class="form-control">
          </div>
          <div class="form-group">
            <label><i class="fa fa-map-o"></i> Latitude </label>
            <input type="text" name="patok_lng" class="form-control">
          </div>
          <div class="form-group">
            <label><i class="fa fa-camera"></i> Foto Patok </label>
            <input type="file" name="patok_foto" class="form-control">
          </div>
        </div>
        <div class="box-footer">
          <div class="pull-right">
            <button type="submit" class="btn btn-flat btn-success" name="simpanDataPatok">Save <i class="fa fa-save"></i></button>
          </div>
          <a class="btn btn-flat btn-warning" href="<?php echo BASE_URL.'koordinat'; ?> "><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <?php
      if ($patok) {
        foreach ($patok as $p) {
      ?>
      <div class="box box-warning">
        <div class="box-body">
          <img width="100%" class="img img-responsive img-rounded" src="<?php echo UPLOADER.'patok/'.$p->patok_foto;?>" alt="">
        </div>
        <div class="box-footer">
          <div class="col-md-6">
            Latitude : <b><?php echo $p->patok_lat; ?></b>
          </div>
          <div class="col-md-6">
            Longitude : <b><?php echo $p->patok_lng; ?></b>
          </div>
        </div>
      </div>
      <?php
        }
      }else {
        echo "<div class='alert alert-warning alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4><i class='icon fa fa-ban'></i> Data Belum Tersedia!</h4>
          Silahkan Input Dokumentasi dan Koordinat.
        </div>";
      }
       ?>
    </div>
  </div>
</form>
</section>
