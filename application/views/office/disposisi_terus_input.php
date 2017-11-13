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
  <div class="box box-info">
    <div class="box-header">
    </div>
    <div class="box-body">
      <?php echo form_open(); ?>
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label>Kepada</label>
            <select class="form-control" name="kepada_id">
              <?php foreach ($kepada as $k) {
                echo "<option value='$k->id'>$k->user_fullname</option>";
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Memo</label>
            <textarea class="form-control" name="memo" rows="8" cols="80"></textarea>
          </div>
        </div>
        <div class="col-md-7">
          <img class="img img-rounded" width="100%" src="<?php echo UPLOADER.'arsip/'.$data['surat_path_scan']; ?>" alt="">
        </div>
      </div>
    </div>
    <div class="box-footer">

    </div>
  </div>
</section>
