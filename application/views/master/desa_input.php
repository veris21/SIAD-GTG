<section class="content-header">
  <h1>
    Desa Detail
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Input Data desa</li>
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
            <label>Desa UID</label>
            <input type="text" name="desa_uid" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama Desa</label>
            <input type="text" name="desa_nama" class="form-control">
          </div>
          <div class="form-group">
            <label>Kecamatan</label>
            <select class="form-control" name="kecamatan_uid">
              <?php
                foreach ($kecamatan as $k) {
                echo "<option value='$k->kecamatan_uid'>".$k->kecamatan_nama."</option>";
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="desa_alamat" class="form-control" rows="4" cols="40"></textarea>
          </div>
          <div class="form-group">
            <label>Pj Desa</label>
            <select class="form-control" name="desa_kepala_uid">
              <?php
              foreach ($pj as $pj) {
                echo "<option value='$pj->id'><b>".$pj->user_status."</b>/ <i>".$pj->user_fullname."</i></option>";
              }
               ?>
            </select>
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
