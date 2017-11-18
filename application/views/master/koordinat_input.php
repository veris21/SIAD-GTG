<section class="content-header">
  <h1>
    Master Data Koordinat
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Koordinat</li>
  </ol>
</section>
<section class="content">
  <?php echo form_open(); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Tabel Keterangan Tanah</h3>
      </div><!-- /.box-header -->
      <div class="box-body">

            <div class="form-group">
              <label>Keterangan</label>
              <textarea  class="form-control" name="keterangan" rows="2" cols="20"></textarea>
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
