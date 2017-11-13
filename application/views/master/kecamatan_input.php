<section class="content-header">
  <h1>
    Kecamatan Detail
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Input Data Kecamatan</li>
  </ol>
</section>
<section class="content">
<?php echo form_open_multipart(); ?>
<div class="row">
  <div class="col-md-5">
    <div class="box box-info">
      <div class="box-header">
        <div class="box-body">
          <div class="form-group">
            <label>Kecamatan UID</label>
            <input type="text" name="kecamatan_uid" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama Kecamatan</label>
            <input type="text" name="kecamatan_nama" class="form-control">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="kecamatan_alamat" class="form-control" rows="4" cols="40"></textarea>
          </div>
          <div class="form-group">
            <label>Pj Kecamatan</label>
            <input type="text" name="kecamatan_kepala_uid" class="form-control">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="box box-warning">
      <div class="box-body">
        <div class="form-group">
          <label>Koordinat Batas</label>
          <textarea class="form-control" name="koordinat" rows="4" cols="40"></textarea>
        </div>
        <div class="form-group">
          <label>keterangan</label>
          <textarea class="form-control" name="keterangan" rows="4" cols="20"></textarea>
        </div>
        <div class="form-group">
          <label>Luas</label>
          <input class="form-control" type="text" name="luas" >
        </div>
      </div>
      <div class="box-footer">
        <button type="reset" name="reset" class="btn btn-flat btn-warning">Reset</button>
        <span class="pull-right">
          <button type="submit" name="simpan" class="btn btn-flat btn-info">Simpan</button>
        </span>
      </div>
    </div>
  </div>
</div>
</form>
</section>
