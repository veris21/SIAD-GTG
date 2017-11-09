<section class="content-header">
  <h1>
    Disposisi
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Disposisi</li>
  </ol>
</section>
<section class="content">
  <?php echo form_open(); ?>
  <div class="row">
    <div class="col-md-5">
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">
          <?php $note = ($arsip!='' ?
          'Diposisikan Surat :' : 'Perintah Langsung');
           echo $note;
          ?>
          </h3>
          <?php $type = ($arsip!='' ?
          '<input type="hidden" name="id_arsip" value="'.$arsip['id'].'">
           <input type="hidden" name="type" value="1">' :
          '<input type="hidden" name="id_arsip" value="">
           <input type="hidden" name="type" value="0">');
           echo $type;
           ?>
        </div>
        <div class="box-body">
          <?php if ($arsip!=''): ?>
            <blockquote>
              <small>Nomor : <?php echo $arsip['nomor']; ?>/ tanggal <?php echo $arsip['surat_tgl']; ?>
              </small>
              <small>Dari : <?php echo $arsip['surat_pengirim']; ?>
              </small>
              <small>Perihal : <?php echo $arsip['surat_perihal']; ?></small>
            </blockquote>
          <?php endif; ?>
          <div class="form-group">
            <label>Kepada</label>
            <select class="form-control" name="kepada_id">
              <?php foreach ($kepada as $k) {
                echo "<option value='$k->id'>$k->user_fullname</option>";
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Memo Disposisi</label>
            <textarea class="form-control" name="memo" rows="8" cols="80"></textarea>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" name="diposisikan" class="btn btn-flat btn-info pull-right">Kirim Diposisi</button>
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <div class="box box-info">
        <div class="box-body">
          <img width="100%" class="img img-rounded" src="<?php echo UPLOADER.'arsip/'.$arsip['surat_path_scan']; ?>" alt="">
        </div>
      </div>
    </div>
  </div>
</form>
</section>
