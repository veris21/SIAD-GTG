<section class="content-header">
  <h1>
    Timeline Notifikasi
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Notifikasi</li>
  </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#notifikasi" data-toggle="tab">Notifikasi Terbaru</a></li>
          <li><a href="#history_notifikasi" data-toggle="tab">History Notifikasi</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="notifikasi">
<?php foreach($notifikasi as $notif ){ 
    $tipe = explode(" ", $notif->message);
    $judul = ($tipe[0] != 'NOTIFIKASI' ? 'DISPOSISI' : 'NOTIFIKASI');

?>
            <div class="box box-widget collapsed-box">
            <div class='box-header with-border'>
              <div class='user-block'>
                <img class='img-circle' src='<?php echo BASE_URL."assets/new-logo.png"; ?>' alt='user image'>
                <span class='username'><a href="#"><?php echo $judul; ?></a></span>
                <span class='description'>Dikirim pada - <?php echo mdate("%d %M %Y - %H:%i %a", $notif->time); ?></span>
              </div>
              <div class='box-tools'>
                
                <button onclick='lihat_notif(<?php echo $notif->id;?>)' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                <button onclick='lihat_notif(<?php echo $notif->id;?>)' class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class='box-body'>
              <!-- post text -->
             <p><?php echo $notif->message; ?></p>
             <?php if($notif->link!=''||$notif->link!=NULL){?>              
              <div class="attachment-block clearfix">
                <img class="attachment-img" src="../dist/img/photo1.png" alt="attachment image">
                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>
                  <div class="attachment-text">
                    <?php echo $notif->link;?>... <a href="#">more</a>
                  </div>
                </div>
              </div>
             <?php } ?>
              <!-- Social sharing buttons -->
              <div class="pull-right">           
              <button class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> Lihat Detail</button>
              <button class='btn btn-success btn-xs'><i class='fa fa-check'></i> Tandai Telah Dibaca</button>            
              <?php if($judul='NOTIFIKASI'){?>
              <button class='btn btn-warning btn-xs'> Teruskan Disposisi <i class='fa fa-arrow-right'></i></button>
             <?php } ?>
              </div>
            </div><!-- /.box-body -->
            </div>        
<?php } ?>
            </div>
            <div class="tab-pane" id="history_notifikasi">

            </div> 
        </div> 
        </div> 
        </div> 
    </div>
</section>