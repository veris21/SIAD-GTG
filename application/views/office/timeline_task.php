<section class="content-header">
  <h1>
    Timeline Task Sceduler
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Timeline Notifikasi</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Timeline Task</h3>
        </div>
        <div class="box-body">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <?php if ($item!=''): ?>
              <?php foreach ($item as $item): ?>
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-warning">
                  <?php echo $item->disposisi_tgl; ?>
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-envelope bg-aqua"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header"><a href="#"><?php echo $item->dari; ?></a></h3>
                  <div class="timeline-body">
                    <div class="row">
                      <div class="col-md-4">
                        <img class="img img-rouded" width="100%" src="<?php echo UPLOADER.'arsip/'.$item->surat_path_scan; ?>" alt="">
                      </div>
                      <div class="col-md-8">
                        <ul>
                          <li>Pengirim : <?php echo $item->surat_pengirim; ?> </li>
                          <li>Nomor : <?php echo $item->nomor; ?>/<?php echo $item->surat_tgl; ?>  </li>
                          <li>Perihal : <?php echo $item->surat_perihal; ?> </li>
                        </ul>
                        <blockquote>Memo :<small> <?php echo $item->memo; ?></small></blockquote>
                      </div>
                    </div>
                  </div>
                  <div class="timeline-footer pull-right">
                    <a href="<?php echo BASE_URL.'disposisi/teruskan/'.$item->id; ?>" class="btn btn-success btn-sm">Terima dan Teruskan Disposisi</a>
                    <a href="<?php echo BASE_URL.'disposisi/tandai_baca/'.$item->id; ?>" class="btn btn-warning btn-sm">Tandai Telah Dibaca</a>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
            <?php endif; ?>
              <!-- END timeline item -->
            </ul>
        </div>
      </div>
    </div>
</section>
