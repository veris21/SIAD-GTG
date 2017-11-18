<section class="content-header">
  <h1>
    Timeline
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Notifikasi</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12 col-xs-12">
              <?php if ($item!=''||$item!=NULL): ?>
              <?php foreach ($item as $item): ?>
                <?php if ($item->is_type == 1){ ?>
                  <div class="alert alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-bell"></i>Disposisi Dari <?php echo $item->dari." (".$item->dari_status.")"; ?></h4>
                        <b>Waktu </b>:<?php echo $item->disposisi_tgl; ?> <br>
                        <b>Memo </b>:<?php echo $item->memo; ?><br><br>
                        <?php if ($item->id_arsip!=''): ?>
                          <div class="pull-right">
                            <a href="<?php echo BASE_URL.'timeline/details/'.$item->id; ?>" class="btn btn-info btn-flat ">Lihat &amp; Teruskan Disposisi</a>
                          </div>
                          <a href="<?php echo BASE_URL.'arsip/lihat/'.$item->id_arsip; ?>" class="btn btn-flat btn-warning">Lihat Detail</a>
                        <?php endif; ?>
                  </div>
                <?php }elseif ($item->is_type == 0){ ?>
                  <div class="alert alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-bell"></i>Perintah Langsung Dari <?php echo $item->dari." (".$item->dari_status.")"; ?></h4>
                    <b>Waktu </b>:<?php echo $item->disposisi_tgl; ?> <br>
                    <b>Memo </b>:<?php echo $item->memo; ?><br><br>
                    <?php if ($item->id_arsip!=''): ?>
                      <div class="pull-right">
                        <a href="<?php echo BASE_URL.'timeline/details/'.$item->id; ?>" class="btn btn-info btn-flat ">Lihat &amp; Teruskan Disposisi</a>
                      </div>
                      <a href="<?php echo BASE_URL.'arsip/lihat/'.$item->id_arsip; ?>" class="btn btn-flat btn-warning">Lihat Detail</a>
                    <?php endif; ?>
                  </div>
                <?php } ?>
            <?php endforeach; ?>
            <?php endif; ?>
      </div>
    </div>
</section>
