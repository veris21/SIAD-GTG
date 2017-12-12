<section class="content-header">
  <h1>
    Data Pertanahan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Permohonan</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Detail Pemohon</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <dt>Pemohon</dt>
                            <dd>a/n. <?php echo  $data['nama'];?><br>No. NIK : <b><?php echo  $data['no_nik'];?></b> </dd>
                            <br>
                            <dt>Kontak Pemohon</dt>
                            <dd><?php echo  $data['hp'];?></dd>
                            <br>
                            <dt>Alamat</dt>
                            <dd><?php echo  $data['alamat'];?></dd>                       
                        </div>
                        <div class="col-md-4">
                        <img class="img img-responsive img-rounded" src="<?php echo QRCODE.$data['qr_link'];?>" alt="">
                        </div>
                    </div>
                    <hr>
                    <dt>Lokasi yang dimohon</dt>
                    <dd><?php echo  $data['lokasi'];?></dd>
                    <br>
                    <dt>Luas</dt>
                    <dd>&plusmn; <?php echo number_format($data['luas']);?> meter<sup>2</sup></dd>
                    <br>
                    <dt>Batas - Batas</dt>
                    <dd>
                        <ul>
                            <li>Batas Utara : <?php echo  $data['utara'];?></li>
                            <li>Batas Selatan : <?php echo  $data['selatan'];?></li>
                            <li>Batas Timur : <?php echo  $data['timur'];?></li>
                            <li>Batas Barat : <?php echo  $data['barat'];?></li>
                        </ul>
                    </dd>
                    <br>
                    <dt>Peruntukan Tanah</dt>
                    <dd><?php echo  $data['peruntukan_tanah'];?></dd>
                    <br>
                    <dt>Status Tanah</dt>
                    <dd><?php echo  $data['status_tanah'];?></dd>
                </div>
            </div>        
        </div>
        <div class="col-md-5">
            <!-- Foto Pemohon -->
            <?php if($data['foto']!=''||$data['foto']!=null){ ?>

            <img class="img img-responsive img-rounded" src="<?php echo UPLOADER.'foto_pemohon/'.$data['foto'];?>" alt="">
            <br>
            <?php } ?>
            <!--  -->
            <!-- Scan Lampiran / Fotocopy KTP atau Pengantar -->
            <?php if($data['scan_link']!=''||$data['scan_link']!=null){ ?>
             <a class="fancybox" rel="fancybox" href="<?php echo KTP.$data['scan_link'];?>" title="Lampiran dari Pemohon <?php echo $data['nama']; ?>">
                <img class="img img-responsive img-rounded" src="<?php echo KTP.$data['scan_link'];?>" alt="">
             </a>
             <br>
            <?php } ?>
            <!--  -->
            <div class="box box-warning">
                <div class="box-header">
                    <h4 class="box-title text-center">Pilihan Operasi</h4>
                </div>
                <div class="box-body">
                    <div class="pull-right">
                        <?php if($data['status'] != 1){ 
                            $jabatan = $this->session->userdata('jabatan');
                            switch ($jabatan) {
                                case 'SEKDES':
                                ?>
                                <button onclick="cetak_permohonan(<?php echo $data['time'];?>)" type="button" class="btn btn-default btn-sm">Cetak <i class="fa fa-print"></i></button>
                                <a href="<?php echo BASE_URL.'permohonan/proses/'.$data['time'];?>" class="btn btn-sm btn-success">Proses Permohonan <i class="fa fa-arrow-right"></i></a>
                                <?php
                                    break;
                                default:
                                   ?>
                                <button onclick="cetak_permohonan(<?php echo $data['time'];?>)" type="button" class="btn btn-default btn-sm">Cetak <i class="fa fa-print"></i></button>
                                   <?php
                                    break;
                            }
                         }?>
                    </div>
                </div>            
            </div>
        </div>    
    </div>
</section>