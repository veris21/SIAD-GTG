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
                            <dd>a/n. <?php echo  $data['nama'];?><br>NIK : <b><?php echo  $data['no_nik'];?></b> </dd>
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
                        <?php 
                        $jabatan = $this->session->userdata('jabatan');
                        switch ($jabatan) {
                            case 'KADES':
                                if($data['status_proses']==0){
                                ?>
                                <button onclick="permohonan_setujui(<?php echo $data['id'];?>)" class="btn btn-sm btn-primary">Setujui <i class="fa fa-check"></i></button>     
                                <?php
                                }elseif($data['status_proses']==2){
                                ?>
                                <button onclick="pernyataan_input()" class="btn btn-sm btn-success">Input Pernyataan <i class="fa fa-arrow-right"></i></button>          
                                <?php
                                }else{
                                ?>
                                <button onclick="cetak_pernyataan(<?php echo $data['id'];?>)" type="button" class="btn btn-warning btn-sm">Cetak Pernyataan <i class="fa fa-print"></i></button>
                                <?php
                                }
                                break;
                            case 'SEKDES':
                            if($data['status_proses']==0){
                                ?>
                                <button onclick="permohonan_setujui(<?php echo $data['id'];?>)" class="btn btn-sm btn-primary">Setujui <i class="fa fa-check"></i></button>     
                                <?php
                                }elseif($data['status_proses']==2){
                                ?>
                                <button onclick="pernyataan_input()" class="btn btn-sm btn-success">Input Pernyataan <i class="fa fa-arrow-right"></i></button>          
                                <?php
                                }else{
                                ?>
                                <button onclick="cetak_pernyataan(<?php echo $data['id'];?>)" type="button" class="btn btn-warning btn-sm">Cetak Pernyataan <i class="fa fa-print"></i></button>
                                <?php
                                }                                
                                break;                            
                            default:
                                # code...
                                break;
                        }
                        ?>                        
                         <button onclick="cetak_permohonan(<?php echo $data['time'];?>)" type="button" class="btn btn-default btn-sm">Cetak <i class="fa fa-print"></i></button>                                
                    </div>
                </div>            
            </div>
        </div>    
    </div>
</section>

<!-- Modal Input Disposisi -->
<div class="modal fade" id="modal_pernyataan" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Lengkapi Form Pernyataan</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'pernyataan_input'));?>
      <div class="modal-body form">
          <input type="hidden" name="permohonan_id" value="<?php echo $data['id'];?>">
        <table class="table table-striped">
            <tr align="center">
                <td>Saksi</td>
                <td>Nama Saksi</td>
                <td>Umur <i>(Tahun)</i></td>
                <td>Pekerjaan</td>
            </tr>
            <tr>
                <td align="center">1</td>
                <td><input placeholder="Nama Saksi" type="text" name="saksi1_nama" class="form-control"></td>
                <td width="60"><input type="text" name="saksi1_umur" class="form-control"></td>
                <td><input placeholder="Pekerjaan" type="text" name="saksi1_pekerjaan" class="form-control"></td>
            </tr>
            <tr>
                <td align="center">2</td>
                <td><input placeholder="Nama Saksi" type="text" name="saksi2_nama" class="form-control"></td>
                <td width="60"><input type="text" name="saksi2_umur" class="form-control"></td>
                <td><input placeholder="Pekerjaan" type="text" name="saksi2_pekerjaan" class="form-control"></td>
            </tr>
            <tr>
                <td align="center">3</td>
                <td><input placeholder="Nama Saksi" type="text" name="saksi3_nama" class="form-control"></td>
                <td width="60"><input type="text" name="saksi3_umur" class="form-control"></td>
                <td><input placeholder="Pekerjaan" type="text" name="saksi3_pekerjaan" class="form-control"></td>
            </tr>
            <tr>
                <td align="center">4</td>
                <td><input placeholder="Nama Saksi" type="text" name="saksi4_nama" class="form-control"></td>
                <td width="60"><input type="text" name="saksi4_umur" class="form-control"></td>
                <td><input placeholder="Pekerjaan" type="text" name="saksi4_pekerjaan" class="form-control"></td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="pernyataan_save()" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div> 
  </div> 
</div>