<style>

</style>
<div class="container">
<!--  -->
<?php if ($data != null || $data !='') { ?>
<!--  -->
<div class="row">        
        <div class="col-md-12">
            <h1 class="text-center">                       
                <button class="btn-lg btn-success btn-block">Data Valid <i class="fa fa-check"></i></button>
            </h1>
        </div>
</div>
<div class="row">        
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    Detail Pemilik Surat
                </div>
                <div class="box-body">
                    <dt>Nama </dt>
                    <dd><?php echo $data['nama'];?></dd>
                    <br>
                    <dt>N I K </dt>
                    <dd><?php echo $data['no_nik'];?></dd>
                    <br>
                    <dt>Alamat Pemilik </dt>
                    <dd><?php echo $data['alamat'];?></dd>
                    <br>
                    <dt>Lokasi Tanah </dt>
                    <dd><?php echo $data['lokasi'].", Dusun ".$data['nama_dusun'].", Desa ".$data['nama_desa'].", Kecamatan ".$data['nama_kecamatan'];?></dd>
                    <br>
                    <dt>Status Surat </dt>
                    <dd>Surat Keterangan <?php echo $type = ($data['type']==1?'Tanah':'Rekomendasi');?></dd>
                    <br>
                    <dt>Nomor Surat </dt>
                    <dd><b><?php echo "181/".$data['id']."-".$type."/KTD.".strtoupper($data['nama_desa'])."/".romawi(mdate("%m",$data['time']))."/".mdate("%Y",$data['time']);?></b></dd>
                    <br>
                    <dt>Tanggal Surat </dt>
                    <dd><b><?php echo mdate("%d",$data['time'])." ".bulan(mdate("%m",$data['time']))." ".mdate("%Y",$data['time']);?></b></dd>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    Layout Tanah
                </div>
                <div class="box-body">
                    <img width="100%" src="<?php echo base_url().POLYGON.$data['peta'];?>" alt="" class="img img-rounded">
                </div>
            </div>
        </div>
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