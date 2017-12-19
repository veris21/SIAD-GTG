<section class="content-header">
  <h1>
    Details Notifikasi
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



<?php foreach($notifikasi as $notif ){ 
    $tipe = explode(" ", $notif->message);
    $judul = ($tipe[0] != 'NOTIFIKASI' ? 'DISPOSISI' : 'NOTIFIKASI');

?>
            <div class="box box-widget collapsed-box">
            <div class='box-header with-border'>
              <div class='user-block'>
                <img class='img-circle' src='<?php echo base_url()."assets/new-logo.png"; ?>' alt='user image'>
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
              
             <?php 
             $linkType = explode("/", $notif->link);
            //  echo "<h1>".$linkType[0]."</h1>";
             if($linkType[0]=="arsip"){
              $arsipDetail = $this->arsip_model->get_arsip_one($linkType[1])->row_array();
              ?>              
              <div class="attachment-block clearfix">
                <img class="attachment-img" src="<?php echo base_url().SCAN_ARSIP.$arsipDetail['scan_link'];?>" alt="attachment image">
                <div class="attachment-pushed">
                  <h4 class="attachment-heading">Surat/Arsip dari : <?php echo $arsipDetail['pengirim']?></h4>
                  <div class="attachment-text">
                    Nomor Surat :<?php echo $arsipDetail['nomor_surat'];?><br>
                    Tanggal Surat :<?php echo $arsipDetail['tanggal_surat'];?><br>
                    Sifat Surat :<b><?php echo $arsipDetail['sifat'];?></b><br>
                    Perihal:<?php echo $arsipDetail['perihal'];?>
              <div class="pull-right"> 
              <?php echo anchor('arsip/details/'.$arsipDetail["time"],'<i class="fa fa-eye"></i> Lihat Detail Arsip',array('class'=>'btn btn-primary btn-xs', 'onclick'=>'return baca_arsip('.$notif->time.')'));?>        
              </div>
                  </div>
                </div>
              </div>
             <?php }elseif($linkType[0]=="permohonan"){
               $permohonan = $this->pertanahan_model->_get_details_one($linkType[1])->row_array(); ?>
               <div class="attachment-block clearfix">
                <img class="attachment-img" src="<?php echo base_url().KTP.$permohonan['scan_link'];?>" alt="attachment image">
                <div class="attachment-pushed">
                  <h4 class="attachment-heading">Permohonan dari : <?php echo $permohonan['nama']?></h4>
                  <div class="attachment-text">
                    Lokasi :<?php echo $permohonan['lokasi'];?><br>
                    Dusun :<?php echo $permohonan['nama_dusun'];?><br>
                    Luas :<b><?php echo $permohonan['luas'];?>m<sup>2</sup></b>
              <div class="pull-right"> 
              <?php echo anchor('permohonan/view/'.$permohonan["time"],'<i class="fa fa-eye"></i> Lihat Detail Permohonan',array('class'=>'btn btn-primary btn-xs'));?>        
              </div>
                  </div>
                </div>
              </div>
              <?php }elseif($linkType[0]=="pernyataan"){
                ?>
              <?php }elseif($linkType[0]=="berita_acara"){
                ?>
              <?php }elseif($linkType[0]=="surat_keterangan"){
                ?>
              <?php
              }else{
               ?> 
               <div class="attachment-block clearfix">
                 <h5 class="text-center">Tidak Ada Lampiran</h5>
              </div>
               <?php
              } ?>
             <?php }else{ ?>
              <div class="attachment-block clearfix">
                 <h5 class="text-center">Tidak Ada Lampiran</h5>
              </div>
            <?php
             } ?>
              <!-- Social sharing buttons -->
              <div class="pull-right">
              <button onclick='lihat_notif(<?php echo $notif->id;?>)' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Tandai Telah Dibaca</button>            
              <?php if($judul='DISPOSISI'){?>
              <button class='btn btn-warning btn-xs'> Teruskan Disposisi <i class='fa fa-arrow-right'></i></button>
             <?php } ?>
              </div>
            </div><!-- /.box-body -->
            </div>        
<?php } ?>

        </div>
    </div> 
</section>