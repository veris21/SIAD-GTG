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
            <div class="tab-pane" id="history_notifikasi">
            <table width="100%" class="table table-striped table-bordered table-hover" id="notif_history">
        <thead>
        <tr valign="center" align="center" style="font-weight:bolder;">
            <td>Tipe Notifikasi</td>
            <td>Tanggal Kirim</td>
            <td>Tanggal Baca</td>
            <td>Pesan</td>
            <td>#</td>
        </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($history_notifikasi as $value) {
          $isNotif = explode(" ", $value->message);
          $tipe_notif = ($isNotif[0]!='NOTIFIKASI' ? '<button class="btn btn-warning">'.$isNotif[0].'</button>' : '<button class="btn btn-primary">NOTIFIKASI</button>');
          echo "<tr>";
          echo "<td>".$tipe_notif."</td>";
          echo "<td>".mdate("%d/%m/%Y - %H:%i %a", $value->time)."</td>";
          echo "<td>".mdate("%d/%m/%Y - %H:%i %a", $value->time_read)."</td>";
          echo "<td width='250'>".$value->message."</td>";
          echo "<td width='70'>".anchor('notif/details/'.$value->id,'<i class="fa fa-eye"></i>', array('class'=>'btn btn-xs btn-success'))." ".anchor('notif/print/'.$value->id,'<i class="fa fa-print"></i>', array('class'=>'btn btn-xs btn-default'))."</td>";
          echo "</tr>";

        }
        ?>
        </tbody>
        </table> 
            </div> 
        </div> 
        </div> 
        </div> 
    </div>
</section>