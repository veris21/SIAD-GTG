<section class="content-header">
  <h1>
    Disposisi
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Disposisi Teruskan</li>
  </ol>
</section>
<section class="content">
      <?php echo form_open(); ?>
      <div class="row">
        <div class="col-md-5">
          <div class="box box-info">
            <div class="box-body">
              <div class="form-group">
                <label>Jenis Memo</label>
                <select class="form-control" name="type">
                  <option value="1">Disposisi</option>
                  <option value="0">Perintah Langsung</option>
                </select>
              </div>
            <div class="form-group">
            <label>Kepada</label>
            <select class="form-control" name="kepada_id">
              <?php foreach ($kepada as $k) {
                echo "<option value='$k->id'>$k->user_fullname ( <b>$k->user_status</b> )</option>";
              } ?>
            </select>
            </div>
            <div class="form-group">
              <label>Memo</label>
              <textarea name="memo" class="form-control" name="memo" rows="8" cols="80"></textarea>
            </div>
            </div>
          <div class="box-footer">
            <div class="pull-right">
              <button class="btn btn-sm btn-flat btn-info" type="submit" name="teruskan">Teruskan Disosisi <i class="fa fa-arrow-right"></i> </button>
            </div>
            <a class="btn btn-warning btn-flat btn-sm" href="<?php echo BASE_URL.'timeline'; ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
        </div>
      </form>
      </div>
        <div class="col-md-7">
          <img class="img img-rounded" width="100%" src="<?php echo UPLOADER.'arsip/'.$data['surat_path_scan']; ?>" alt="">
        </div>
      </div>
</section>
