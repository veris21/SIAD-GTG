<section class="content-header">
  <h1>
    Input Arsip Surat Masuk
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Input Data Arsip</li>
  </ol>
</section>
<section class="content">
  <?php echo form_open_multipart(); ?>
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title">Input Data Arsip </h3>
    </div>
    <div class="box-body">
      <div class="form-group">
        <label>Nomor Surat</label>
        <input type="text" name="nomor" class="form-control">
      </div>
      <div class="form-group">
        <label>Tanggal</label>
        <input type="text" name="surat_tgl" class="form-control">
      </div>
      <div class="form-group">
        <label>Pengirim</label>
        <input type="text" name="surat_pengirim" class="form-control">
      </div>
      <div class="form-group">
        <label>Perihal Surat</label>
        <textarea class="form-control" name="surat_perihal" rows="4" cols="40"></textarea>
      </div>
    </div>
  </div>
  <div class="box box-info">
    <div class="box-body">
      <div class="form-group">
        <label>Pilihan</label>
        <select class="form-control" name="surat_disposisi_type">
          <option value="1">Teruskan Ke Disposisi</option>
          <option value="0">Hanya Simpan Arsip</option>
        </select>
      </div>
      <div class="form-group">
        <div class="btn btn-default btn-file">
          <i class="fa fa-paperclip"></i> File Scan
          <input type="file" name="arsip_surat">
        </div>
        <p class="help-block">Format File Jpg | Jpeg | Png (Max. 10MB)</p>
      </div>
    </div>
    <div class="box-footer">
      <div class="pull-right">
        <button type="submit" name="upload" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Save </button>
      </div>
      <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Reset</button>
    </div>
  </div>
</form>
</section>
