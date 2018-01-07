<div class="container" style="padding:8px;background-color:rgba(0,0,0,0.2);">
<!--  -->
<?php if ($data != null || $data !='') { ?>
<!--  -->
<div class="row">        
        <div class="col-md-12">
            <h1 class="text-center">                       
                <button class="btn-lg btn-success btn-block">Data Berita Acara Valid <i class="fa fa-check"></i></button>
            </h1>
        </div>
</div>
<div class="row" style="color:black;">        
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    Detail Pemilik Tanah yang di Periksa
                </div>
                <div class="box-body">
                    <b>Nama </b>
                    <li><?php echo $data['nama'];?></li>
                    <br>
                    <b>N I K </b>
                    <li><?php echo $data['no_nik'];?></li>
                    <br>
                    <b>Alamat Pemilik </b>
                    <li><?php echo $data['alamat'];?></li>
                    <br>
                    <b>Lokasi Tanah </b>
                    <li><?php echo $data['lokasi'].", Dusun ".$data['nama_dusun'].", Desa ".$data['nama_desa'].", Kecamatan ".$data['nama_kecamatan'];?></li>
                    <br>
                    <b>Status Surat </b>
                    <li>Surat Keterangan <?php echo $type = ($data['type']==1?'Tanah':'Rekomendasi');?></li>
                    <br>
                    <b>Nomor Berita Acara </b>
                    <li><b> <?php echo "181/".$data['id']."-BAP/KTD.".strtoupper($data['nama_desa'])."/".romawi(mdate("%m",$data['time']))."/".mdate("%Y",$data['time']);?></b></li>
                    <br>
                    <b>Tanggal Pemeriksaan </b>
                    <li><b><?php echo mdate("%d",$data['time'])." ".bulan(mdate("%m",$data['time']))." ".mdate("%Y",$data['time']);?></b></li>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Detail Pemeriksaan</h3>
                </div>
                <div class="box-body">
                    <b>Ketua Pemeriksa</b><br><br>
                    <li><?php echo $ketua_pemeriksa['fullname'];?> / <i><?php echo $ketua_pemeriksa['keterangan_jabatan'];?></i></li>
                    <hr>
                    <b>Anggota Pemeriksa</b>
                    <br><br>
                        <li><?php echo $pemeriksa_1['fullname'];?> / <i><?php echo $pemeriksa_1['keterangan_jabatan'];?></i></li><br>
                        <li><?php echo $pemeriksa_2['fullname'];?> / <i><?php echo $pemeriksa_2['keterangan_jabatan'];?></i></li><br>
                        <li><?php echo $pemeriksa_3['fullname'];?> / <i><?php echo $pemeriksa_3['keterangan_jabatan'];?></i></li><br>
                        <li><?php echo $pemeriksa_4['fullname'];?> / <i><?php echo $pemeriksa_4['keterangan_jabatan'];?></i></li>
                    <br>
                </div>
            </div>
        </div>
</div>
<div class="row">
    <?php foreach ($patok as $patok) {
    ?>
    <div class="col-md-3">
        <div class="box box-info">
            <div class="box-body">
                <img class="img img-rounded img-responsive" width="100%" src="<?php echo base_url().PATOK.$patok->link_dokumentasi;?>" alt="">
                <hr>
                <p>Latitude : <?php echo $patok->lat;?> <br> Longitude : <?php echo $patok->lng;?></p>
            </div>
        </div>
    </div>
<?php }?>
</div>
<!--  -->
<?php }else{ ?>
<!--  -->
<div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-body">
                    <h1 class="text-center">                       
                        <button class="btn-lg btn-danger btn-block">Data Anda Tidak Ditemukan di Sistem ! <i class="fa fa-ban"></i></button>
                    </h1> 
                </div>
                <div class="box-footer">
                    <a href="<?php echo base_url('public');?>"> Lihat Lebih Banyak Terkait Tanah !!!</a>
                </div>
            </div>
        </div>
</div>
<!--  -->
<?php } ?>
<!--  -->
</div>