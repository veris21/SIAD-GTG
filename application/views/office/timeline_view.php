<section class="content-header">
  <h1>
    Timeline Details
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Disposisi</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-7">
      <a target="_blank" href="<?php echo UPLOADER.'arsip/'.$item['surat_path_scan'];  ?>">
        <img class="img img-rounded" width="100%" src="<?php echo UPLOADER.'arsip/'.$item['surat_path_scan']; ?>" alt="">
      </a>
    </div>
    <div class="col-md-5">
      <div class="box box-info">
        <div class="box-header">
          <h4 class="box-title">Details Surat</h4>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label>Surat Dari</label>
            <p><?php echo $item['surat_pengirim']; ?></p>
          </div>
          <div class="form-group">
            <label>Nomor /Tanggal Surat</label>
            <p><?php echo $item['nomor']; ?>/ <i><?php echo $item['surat_tgl']; ?></i></p>
          </div>
          <div class="form-group">
            <label>Perihal</label>
            <p><?php echo $item['surat_perihal']; ?></p>
          </div>
        </div>
        <div class="box-footer">
          <div class="form-group">
            <label>Waktu Terima Surat</label>
            <p><?php echo $item['surat_tgl_terima']; ?></p>
          </div>
          <div class="form-group">
            <label>Diterima Oleh</label>
            <p><?php echo $item['surat_penerima']; ?></p>
          </div>
        </div>
      </div>
      <div class="box box-warning">
        <div class="box-header">
          <h4 class="box-title">Details Disposisi</h4>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label>Dari :</label>
            <p><?php echo $item['dari']; ?></p>
          </div>
          <div class="form-group">
            <label>Waktu Disposisi :</label>
            <p><?php echo $item['disposisi_tgl']; ?></p>
          </div>
          <div class="form-group">
            <label>Memo :</label>
            <p><?php echo $item['memo']; ?></p>
          </div>
        </div>
        <div class="box-footer">
          <a class="btn btn-flat btn-warning btn-sm" href="<?php echo BASE_URL.'timeline';?>"><i class="fa fa-arrow-left"></i> Kembali</a>
          <?php if ($this->session->userdata('type') == 1 || $this->session->userdata('type') == 99 ): ?>
            <span class="pull-right">
              <a class="btn btn-flat btn-sm btn-success" href="<?php echo BASE_URL.'disposisi/teruskan/'.$item['id_arsip'];?>">Teruskan Disposisi <i class="fa fa-ban"></i></a>
            </span>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
