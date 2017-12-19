<section class="content-header">
  <h1>
    Details Berita Acara Pemeriksaan Pertanahan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Berita Acara</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header">
                <h4 class="box-title"><i class="fa fa-globe"></i> Visual Data Tanah</h4>
            </div>
            <div class="box-body">
                <div  style="height: 360px;" id="map-canvas"></div>
            </div>       
        </div>
        </div>
        <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header">
                <h4 class="box-title"><i class="fa fa-map-o"></i> Data Patok Batas</h4>
            </div>
            <div class="box-body">
                 <?php 
                 if($patok->num_rows() > 0){
                     $n = 1;
                     foreach($patok->result() as $patok){
                ?>
                <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <dt>Patok <?php echo $n; ?></dt>
                            <dd>Lat . | Lng. </dd><br>
                            <dt>Batas - Batas Patok</dt>
                            <dd>Utara : </dd>
                            <dd>Selatan : </dd>
                            <dd>Barat : </dd>
                            <dd>Timur : </dd>
                        </div>
                </div>
                <?php 
                $n++;
                     }
                 }else{
                 ?>
                 <div class="well">
                    <h5 class="text-center">Data Koordinat Patok Belum Ada !!</h5>
                 </div>
                 <?php } ?>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="box box-warning">
             <div class="box-header">
                <h4 class="box-title"><i class="fa fa-file-archive-o"></i> Data Pemohon</h4>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <dt>Pemohon</dt>
                        <dd>a/n. <?php echo $data['nama'];?> <br>NIK. <b><?php echo $data['no_nik'];?></b></dd>
                        <br>
                        <dt>Alamat Pemohon</dt>
                        <dd> <?php echo $data['alamat'];?></dd>
                        <br>
                        <dt>Lokasi yg dimohon</dt>
                        <dd>  <b><?php echo $data['lokasi'];?></b><br> Dusun <?php echo $data['nama_dusun'];?> Desa <?php echo $data['nama_desa'];?> Kecamatan <?php echo $data['nama_kecamatan'];?> Kabupaten <?php echo $data['nama_kabupaten'];?> <br>
                        - Luas tanah &plusmn;<b> <?php echo $data['luas'];?></b> m<sup>2</sup></dd>
                        <br>
                        </div>
                    <div class="col-md-4 hidden-xs hidden-sm">
                        <img class="img img-responsive pad"  src="<?php echo base_url().QRCODE.$data['permohonan_qr'];?>" alt="">
                     </div>
                     <div class="col-md-8">
                        <dt>Tanggal Permohonan</dt>
                        <dd><?php echo mdate("%d %D %Y - %H:%i %a", $data['time_permohonan']); ?></dd>
                        <br>
                        <dt>Tanggal Peryataan</dt>
                        <dd><?php echo mdate("%d %D %Y - %H:%i %a", $data['time_pernyataan']); ?></dd>
                        <br>
                    </div>
                    <div class="col-md-4 hidden-xs hidden-sm">
                        <img class="img img-responsive pad"  src="<?php echo base_url().QRCODE.$data['pernyataan_qr'];?>" alt="">
                     </div>
                </div>
                <div class="row">
                    <div class="col-md-12"><b>Lampiran :</b></div>
                    <div class="col-md-6">
                    <a class="fancybox" rel="fancybox" href="<?php echo base_url().PBB.$data['scan_bukti_pbb'];?>" title="Scan Bukti Pembayaran PBB">
                        <img class="img img-responsive pad" src="<?php echo base_url().PBB.$data['scan_bukti_pbb'];?>" alt="">
                    </a>
                    </div>
                    <div class="col-md-6">
                    <a class="fancybox" rel="fancybox" href="<?php echo base_url().KTP.$data['lampiran_permohonan'];?>" title="Lampiran Scan KTP/ Pengantar Kepala Dusun">
                        <img class="img img-responsive pad"  src="<?php echo base_url().KTP.$data['lampiran_permohonan'];?>" alt="">
                    </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="box box-warning">
             <div class="box-header">
                <h4 class="box-title"><i class="fa fa-sticky-note-o"></i> Data Pemeriksaan</h4>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <dt>Ketua Tim Pemeriksa</dt>
                        <dd><?php echo $ketua_pemeriksa['fullname'];?></dd>
                        <br>
                        <dt>Anggota</dt>
                        <dd><?php echo $pemeriksa_1['fullname'];?></dd>
                        <dd><?php echo $pemeriksa_2['fullname'];?></dd>
                        <dd><?php echo $pemeriksa_3['fullname'];?></dd>
                        <dd><?php echo $pemeriksa_4['fullname'];?></dd>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <dt>Saksi 1</dt>
                        <dd>Nama : <?php echo $data['saksi1_nama'];?> <br> Pekerjaan :  <?php echo $data['saksi1_pekerjaan'];?><br> Alamat :  <?php echo $data['saksi1_alamat'];?></dd><br>
                        <dt>Saksi 2</dt>
                        <dd>Nama :  <?php echo $data['saksi2_nama'];?> <br> Pekerjaan :  <?php echo $data['saksi2_pekerjaan'];?><br> Alamat :  <?php echo $data['saksi2_alamat'];?></dd>
                    </div>
                    <div class="col-md-6">
                        <dt>Saksi 3</dt>
                        <dd>Nama : <?php echo $data['saksi3_nama'];?> <br> Pekerjaan :  <?php echo $data['saksi3_pekerjaan'];?><br> Alamat :  <?php echo $data['saksi3_alamat'];?></dd><br>
                        <dt>Saksi 4</dt>
                        <dd>Nama :  <?php echo $data['saksi4_nama'];?> <br> Pekerjaan :  <?php echo $data['saksi4_pekerjaan'];?><br> Alamat :  <?php echo $data['saksi4_alamat'];?></dd>                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="http://maps.google.com/maps/api/js??key=AIzaSyCwYQT-WMW5KgJUqF-PjmcSlFQ2iWmAiRI&libraries=drawing,geometry,distance"></script>
<script>
 var map;
 function initialize() {
    map = new google.maps.Map(document.getElementById('map-canvas'), {
      zoom: 14,
      center: new google.maps.LatLng(-2.975289, 108.158662),
      mapTypeId: 'terrain',
      mapTypeControl: false,
      disableDefaultUI: true
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>