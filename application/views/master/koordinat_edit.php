<section class="content-header">
  <h1>
    Master Data Koordinat
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Koordinat</li>
  </ol>
</section>
<section class="content">
  <?php echo form_open(); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Edit Data Koordinat &amp; Keterangan Tanah</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-8">
            <div class="well text-center">
              <h1>No Data</h1>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Keterangan</label>
              <textarea  class="form-control" name="keterangan" rows="2" cols="20"><?php echo $koordinat['keterangan']; ?></textarea>
            </div>
            <div class="form-group">
              <label>Koordinat</label>
              <textarea  class="form-control" name="koordinat" rows="2" cols="20"><?php echo $koordinat['koordinat']; ?></textarea>
            </div>
            <div class="form-group">
              <label>Luas</label>
              <input type="text" name="luas" class="form-control" value="<?php echo $koordinat['luas']; ?>">
            </div>
          </div>
        </div>
      </div><!-- /.box-body -->
      <div class="box-footer">
          <button type="submit" name="simpan" class="btn btn-flat btn-success pull-right">Simpan</button>
      </div>
    </div><!-- /.box -->
  </div>
</div>
</form>
</section>
