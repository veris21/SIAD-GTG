<section class="content-header">
  <h1>
    Details Surat Tanah
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Surat Tanah</li>
  </ol>
</section>
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <?php echo $tipe = ($data['type_surat_tanah']==1 ? '<button class="btn btn-lg btn-flat btn-block btn-success">-- SURAT KETERANGAN TANAH --</button>' : '<button class="btn btn-lg btn-flat btn-block btn-warning">-- SURAT REKOMENDASI TANAH --</button>');?>
            </div>
        </div>
    </div>
</div>
            
<div class="row">                    
    <div class="col-md-7">
        <div style="height: 360px;" id="map-canvas"></div>
    </div>

    <div class="col-md-5">
        <div class="box box-info">
            <div class="box-body">
            <a class="fancybox" rel="fancybox" href="<?php echo base_url().PATOK.$data['foto_tanah']; ?>" title="Situasi Tanah">
                <img class="img img-responsive img-rounded main-img" src="<?php echo base_url().PATOK.$data['foto_tanah']; ?>" alt="FOTO SITUASI TANAH">
            </a>
            </div>
            <div class="box-footer">
                <p>Latitude : <?php echo $data['lat']; ?> - Longitude : <?php echo $data['lng']; ?></p>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Timeline Permohonan</h3>
            </div>
            <div class="box-body">
                <!--  -->
                <div id="timeline">
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-red">
                          <?php echo mdate("%d %M %Y", $data['time_permohonan']);?>
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                      <i class="fa fa-bars bg-aqua"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> <?php echo mdate("%H:%i %a", $data['time_permohonan']);?></span>
                          <h3 class="timeline-header no-border"><a href="#">Permohonan</a> di Terima System</h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-aqua">
                          <?php echo mdate("%d %M %Y", $data['time_pernyataan']);?>
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                      <i class="fa fa-bars bg-aqua"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> <?php echo mdate("%H:%i %a", $data['time_pernyataan']);?></span>
                          <h3 class="timeline-header no-border"><a href="#">Permohonan</a> di Setujui dan Pernyataan di Terima System</h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-red">
                          <?php echo mdate("%d %M %Y", $data['time_bap']);?>
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                      <i class="fa fa-bars bg-purple"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> <?php echo mdate("%H:%i %a", $data['time_bap']);?></span>
                          <h3 class="timeline-header no-border"><a href="#">Berita Acara</a> di Terima System dan Tim Pemeriksa Menginput Data Koordinat</h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-green">
                          <?php echo mdate("%d %M %Y", $data['time_skt']);?>
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                      <i class="fa fa-bars bg-aqua"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> <?php echo mdate("%H:%i %a", $data['time_skt']);?></span>
                          <h3 class="timeline-header no-border"><a href="#">Surat Tanah</a> di Finalisasi dan Input Koordinat di Setujui System</h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                </ul>       
                </div>
                <!--  -->
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Data Permohonan</h3>
            </div>
            <div class="box-body">
                <dt>Nama Pemohon</dt>
                <dd><?php echo $data['nama_pemohon'];?></dd>
                <br>
                <dt>NIK Pemohon</dt>
                <dd><?php echo $data['nik_pemohon'];?></dd>
                <br>
                <dt>Jenis Kelamin</dt>
                <dd><?php echo $data['jenis_kelamin_pemohon'];?></dd>
                <br>
                <dt>Tempat / Tanggal Lahir</dt>
                <dd><?php echo $data['tempat_lahir_pemohon']."/".$data['tanggal_lahir_pemohon'];?></dd>
                <br>
                <dt>Pekerjaan</dt>
                <dd><?php echo $data['pekerjaan_pemohon'];?></dd>
                <br>
                <dt>Status</dt>
                <dd><?php echo $data['status_pemohon'];?></dd>
                <br>
                <dt>Alamat Pemohon</dt>
                <dd><?php echo $data['alamat_pemohon'];?></dd>
                <br>
                <hr>
                <dt>Lokasi yang dimohon</dt>
                <dd><?php echo $data['lokasi'].", Dusun ".$data['nama_dusun'].", Desa ".$data['nama_desa'].", Kecamatan ".$data['nama_kecamatan'].", Kabupaten ".$data['nama_kabupaten'];?></dd>
                <br>
                <dt>Luas Tanah yang di Mohon</dt>
                <dd> &plusmn; <b><?php echo $data['luas'];?></b> meter<sup>2</sup></dd>
                <br>
                <dt>Luas Tanah yang di Ukur / Hasil Periksa</dt>
                <dd> &plusmn; <b id="luas"> <?php echo $data['luas_skt'];?></b> meter<sup>2</sup></dd>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Data Saksi &amp; Petugas Pemeriksa</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                    <h4>Petugas Pemeriksa</h4>
                    <?php
                    $ketua = $this->master_model->_get_user_id($data['pemeriksa_1'])->row_array();
                    $anggota_1 = $this->master_model->_get_user_id($data['pemeriksa_2'])->row_array();
                    $anggota_2 = $this->master_model->_get_user_id($data['pemeriksa_3'])->row_array();
                    $anggota_3 = $this->master_model->_get_user_id($data['pemeriksa_4'])->row_array();
                    $anggota_4 = $this->master_model->_get_user_id($data['pemeriksa_5'])->row_array();
                     ?>
                    <dt>Ketua Pemeriksa</dt>
                    <dd><?php echo $ketua['fullname']."<br>(".$ketua['keterangan_jabatan'].")"; ?></dd>
                    <br>
                    <dt>Anggota</dt>
                    <dd>
                        <?php echo $anggota_1['fullname']."<br>(".$anggota_1['keterangan_jabatan'].")"; ?><br><br>
                        <?php echo $anggota_2['fullname']."<br>(".$anggota_2['keterangan_jabatan'].")"; ?><br><br>
                        <?php echo $anggota_3['fullname']."<br>(".$anggota_3['keterangan_jabatan'].")"; ?><br><br>
                        <?php echo $anggota_4['fullname']."<br>(".$anggota_4['keterangan_jabatan'].")"; ?><br>
                    </dd>
                    </div>
                    <div class="col-md-6">
                    <h4>Saksi - Saksi</h4>
                    <dt>Saksi 1</dt>
                    <dd><b><?php echo $data['saksi1_nama']; ?></b>  <br>Pekerjaan : <?php echo $data['saksi1_pekerjaan']; ?> <br>Alamat : <?php echo $data['saksi1_alamat']; ?> </dd>
                    <br>
                    <dt>Saksi 2</dt>
                    <dd><b><?php echo $data['saksi2_nama']; ?></b>  <br>Pekerjaan : <?php echo $data['saksi2_pekerjaan']; ?> <br>Alamat : <?php echo $data['saksi2_alamat']; ?> </dd>
                    <br>
                    <dt>Saksi 3</dt>
                    <dd><b><?php echo $data['saksi3_nama']; ?></b>  <br>Pekerjaan : <?php echo $data['saksi3_pekerjaan']; ?> <br>Alamat : <?php echo $data['saksi3_alamat']; ?> </dd>
                    <br>
                    <dt>Saksi 4</dt>
                    <dd><b><?php echo $data['saksi4_nama']; ?></b>  <br>Pekerjaan : <?php echo $data['saksi4_pekerjaan']; ?> <br>Alamat : <?php echo $data['saksi4_alamat']; ?> </dd>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Lampiran</h3>
            </div>
            <div class="box-body">
            <h4 class="well text-center">Lampiran Permohonan</h4>
            <div class="row">
                <div class="col-md-4">
                    <a class="fancybox" rel="fancybox" href="<?php echo base_url().KTP.$data['ktp']; ?>" title="KTP <?php echo $data['nama'];?>">
                            <img class="img img-responsive img-rounded main-img"  src="<?php echo base_url().KTP.$data['ktp']; ?>" alt="KTP">
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="fancybox" rel="fancybox" href="<?php echo base_url().SURATKADUS.$data['surat_kadus']; ?>" title="Pengantar Dusun <?php echo $data['nama_dusun'];?>">
                            <img class="img img-responsive img-rounded main-img"  src="<?php echo base_url().SURATKADUS.$data['surat_kadus']; ?>" alt="SURAT KADUS">
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="fancybox" rel="fancybox" href="<?php echo base_url().PBB.$data['bukti_pbb']; ?>" title="BUKTI PBB <?php echo $data['nama'];?>">
                            <img class="img img-responsive img-rounded main-img"  src="<?php echo base_url().PBB.$data['bukti_pbb']; ?>" alt="SCAN PEMBAYARAN PBB">
                    </a>
                </div>
            </div>
            <hr>
            <h4 class="well text-center">Patok Batas</h4>
            <div class="row">
            <?php 
            $n=1; 
            foreach ($patok as $patok) {
            ?>            
                <div class="col-md-4">
                <a class="fancybox" rel="fancybox" href="<?php echo base_url().PATOK.$patok->link_dokumentasi; ?>" title="PATOK <?php echo $n;?>">
                <img class="img img-responsive img-rounded main-img"  src="<?php echo base_url().PATOK.$patok->link_dokumentasi; ?>" alt="FOTO PATOK">
                </a>
                <br> 
                <p>Lat : <b><?php echo $patok->lat;?></b> <br> Long : <b><?php echo $patok->lng;?></b></p>
                </div>            
            <?php $n++;  } ?>
                </div>
            <hr>
            </div>
        </div>
    </div>
</div>
<?php if($data['status']==1){
?>

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
            <a target="__blank" href="<?php echo base_url('final/cetak/'.$data['id']); ?>"> 
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-bars"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Surat Keterangan</span>
                  <span class="info-box-number">Download</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <a target="__blank" href="<?php echo base_url('denah/cetak/'.$data['id']); ?>"> 
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-map"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Lampiran Denah Tanah</span>
                  <span class="info-box-number">Download</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </a>
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <a target="__blank" href="<?php echo base_url('patok/cetak/'.$data['id']); ?>"> 
              <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-crosshairs"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Lampiran Data Patok</span>
                  <span class="info-box-number">Download</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a target="__blank" href="<?php echo base_url('lampiran/cetak/'.$data['id']); ?>"> 
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Lampiran Data Pemohon</span>
                  <span class="info-box-number">Download</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </a>
            </div><!-- /.col -->
</div>
<?php }else{ ?> 
    <div class="box box-danger">
        <div class="box-body">
            <div class="well">
                <center><i class="fa fa-lock fa-5x"></i></center>
            </div>            
        </div>
        <div class="box-footer">
            <button onclick="aktifasi_download()" class="btn btn-warning btn-block">
                Validasi Data &amp; Buka Kunci
            </button>
        </div>
    </div>
<?php } ?>
</section>


<!-- Modal Setuju Dan Pilihan Rekomedasi -->
<div class="modal fade" id="aktivasi_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Aktivasi Download Surat Tanah</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'aktivasi_form'));?>
      <div class="modal-body">      
        <div class="well">
            <center><i class="fa fa-lock fa-5x"></i></center>
            <p>Data Pembaruan dan Penyesuaian Luas dari Sistem akan di Validasi dan Membuka Kunci Data download Surat Keterangan</p>
        </div>    
      <input type="hidden" name="id" value="<?php echo $data['id'];?>">  
      <input type="hidden" name="type" value="<?php echo $data['type_surat_tanah']?>">
      <input type="hidden" name="luas_skt" value="">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="buka_kunci_download()" class="btn btn-success">Validasi Data <i class="fa fa-lock"></i></button>
      </div>
    </form>
    </div> 
  </div> 
</div>



<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY&libraries=geometry"></script>
<script>
var map;
function initialize() {
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 20,
    center: new google.maps.LatLng(
        <?php echo $data['lat'].",".$data['lng']; ?>
    ),
    mapTypeId: 'terrain',
    // mapTypeControl: false,
    // disableDefaultUI: true
  });

  var patok = [];
  <?php 
  foreach ($data_patok as $patok){
      ?> 
     patok.push(new google.maps.LatLng(parseFloat(<?php echo $patok->lat;?>), parseFloat(<?php echo $patok->lng;?>)));
      <?php
  }
  ?>
    
    // var color = '#'+Math.random().toString(16).substr(-6);
    var area = google.maps.geometry.spherical.computeArea(patok);
    $('#luas').text((area).toFixed(2));
    $('[name="luas_skt"]').val((area).toFixed(2));
    var contentString = '<b><?php echo $data['tengah_keterangan'];?></b><br><br>Luas : '+(area).toFixed(2)+' meter<sup>2</sup>';
    
   polygon = new google.maps.Polygon({
        paths: [patok],
        strokeColor:'#000000',
        strokeOpacity: 1,
        strokeWeight: 2,
        fillColor:'#DDD000',
        fillOpacity: 0,
        html: contentString
    });
    
    polygon.setMap(map);
    infoWindow = new google.maps.InfoWindow();
    google.maps.event.addListener(polygon, 'click', function(e) {
    infoWindow.setContent(this.html);
    infoWindow.setPosition(e.latLng);
    infoWindow.open(map);
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>