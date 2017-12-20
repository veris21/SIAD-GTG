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
                        <img class="img img-responsive img-rounded hidden-xs hidden-sm" src="<?php echo base_url().QRCODE.$data['qr_link'];?>" alt="">
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
                    <br>
                    <dt>Status Persetujuan </dt>
                    <dd><?php switch ($data['type_yang_disetujui']) {
                        case 1:
                        ?> 
                        <button class="btn btn-flat btn-success">Surat Keterangan Tanah (SKT)</button>
                        <?php
                            break;
                        case 2:
                        ?> 
                        <button class="btn btn-flat btn-warning">Surat Keterangan Rekomendasi</button>
                        <?php
                            break;                       
                        default:
                        ?> 
                        <p class="well text-center">Belum Ada Keputusan Persetujuan</p>
                        <?php
                            break;
                    } ?></dd>
                </div>
            </div>        
        </div>
        <div class="col-md-5">
            <!-- Foto Pemohon -->
            <?php if($data['foto']!=''||$data['foto']!=null){ ?>

            <img class="img img-responsive img-rounded" src="<?php echo base_url().UPLOADER.'foto_pemohon/'.$data['foto'];?>" alt="">
            <br>
            <?php } ?>
            <!--  -->
            <!-- Scan Lampiran / Fotocopy KTP atau Pengantar -->
            <?php if($data['scan_link']!=''||$data['scan_link']!=null){ ?>
             <a class="fancybox" rel="fancybox" href="<?php echo base_url().KTP.$data['scan_link'];?>" title="Lampiran dari Pemohon <?php echo $data['nama']; ?>">
                <img class="img img-responsive img-rounded" src="<?php echo base_url().KTP.$data['scan_link'];?>" alt="">
             </a>
             <br>
            <?php } ?>
            <!--  -->
             <!-- Scan Bukti PBB -->
             <?php if($data['pbb']!=''||$data['pbb']!=null){ ?>
             <a class="fancybox" rel="fancybox" href="<?php echo base_url().UPLOADER.'pbb_pemohon/'.$data['pbb'];?>" title="Lampiran Bukti PBB <?php echo $data['nama']; ?>">
                <img class="img img-responsive img-rounded" src="<?php echo base_url().UPLOADER.'pbb_pemohon/'.$data['pbb'];?>" alt="">
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
                                <button onclick="permohonan_setujui()" class="btn btn-sm btn-primary">Setujui <i class="fa fa-check"></i></button>     
                                <?php
                                }
                                break;
                            case 'PERTANAHAN':
                            if($data['status_proses']==2){
                                ?>
                                <button onclick="pernyataan_input()" class="btn btn-sm btn-success">Input Pernyataan <i class="fa fa-arrow-right"></i></button>          
                                <?php
                                }                                
                                break;
                            case 'LAYANAN':
                            if($data['status_proses']==2){
                                    ?>
                                    <button onclick="pernyataan_input()" class="btn btn-sm btn-success">Input Pernyataan <i class="fa fa-arrow-right"></i></button>          
                                    <?php
                                    }                                
                                    break;
                            default:
                                # code...
                                break;
                        }
                        ?>                        
                         <!-- --
                             <button onclick="cetak_permohonan(<?php echo $data['time'];?>)" type="button" class="btn btn-default btn-sm">Cetak <i class="fa fa-print"></i></button> 
                          <!-- -->
                          <?php echo anchor('cetak/permohonan/'.$data['time'], 'Cetak <i class="fa fa-print"></i>', array('class'=>'btn btn-default btn-sm','target'=>'__blank')); ?>
                    </div>
                </div>            
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php 
            $isOK = $data['status_proses'];
            switch ($isOK) {
                case 0:
                 ?>
            <div class="well">
                <h3 class="text-center">Permohonan Sedang di Proses / Belum di Setujui</h3>
            </div>
                 <?php
                    break;
                case 1:
                $id = $data['id'];
                $pernyataan = $this->pertanahan_model->_get_pernyataan($id)->row_array();
                if($pernyataan!=''||$pernyataan!=null){
                ?>
                <div class="box box-info">
                    <div class="box-body">
                        <div class="row">
                        <div class="col-md-9">
                        <div class="well">
                        <dt>Keterangan</dt>
                        <dd>Objek Tanah Telah diusahakan sejak <b><?php echo $data['tahun_kelola']; ?></b> hingga sekarang.</dd>
                        <br>
                        <dt>Penandatanganan Pernyataan</dt>
                        <dd>Pernyataan dibuat pada <?php echo mdate("%d - %m - %Y", $pernyataan['time']);?></dd>
                        </div>
                        </div>
                        <div class="col-md-3" align="center">
                        <img class="img img-responsive img-rounded hidden-xs hidden-sm" src="<?php echo QRCODE.$pernyataan['qr_link'];?>" alt="">
                        </div>
                        </div>
                        <hr>
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                Saksi 1
                                <ul>
                                    <li>Nama : <b><?php echo $pernyataan['saksi1_nama'];?></b></li>                                    
                                    <li>Pekerjaan : <b><?php echo $pernyataan['saksi1_pekerjaan'];?></b></li>
                                    <li>Alamat : <b><?php echo $pernyataan['saksi1_alamat'];?></b></li>
                                </ul>
                                </td>
                                <td>
                                Saksi 3
                                <ul>
                                    <li>Nama : <b><?php echo $pernyataan['saksi3_nama'];?></b></li>                                    
                                    <li>Pekerjaan : <b><?php echo $pernyataan['saksi3_pekerjaan'];?></b></li>
                                    <li>Alamat : <b><?php echo $pernyataan['saksi3_alamat'];?></b></li>
                                </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Saksi 2
                                <ul>
                                    <li>Nama : <b><?php echo $pernyataan['saksi2_nama'];?></b></li>                                    
                                    <li>Pekerjaan : <b><?php echo $pernyataan['saksi2_pekerjaan'];?></b></li>
                                    <li>Alamat : <b><?php echo $pernyataan['saksi2_alamat'];?></b></li>
                                </ul>
                                </td>
                                <td>
                                Saksi 4
                                <ul>
                                    <li>Nama : <b><?php echo $pernyataan['saksi4_nama'];?></b></li>                                    
                                    <li>Pekerjaan : <b><?php echo $pernyataan['saksi4_pekerjaan'];?></b></li>
                                    <li>Alamat : <b><?php echo $pernyataan['saksi4_alamat'];?></b></li>
                                </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                        <?php
                        // IF DATA ID NOW = ID PEJABAT PERTANAHAN
                        // $pejabat_pertanahan = $this->master_model->_get_desa_id($this->session->userdata('desa_id'))->row_array();
                        // $id_pejabat_pertanahan = $pejabat_pertanahan['pertanahan_uid'];
                        // $id = $this->session->userdata('id');                                             
                        //  if($id == $id_pejabat_pertanahan) { ?>
                            <button class="btn btn-primary btn-flat btn-sm" onclick="input_tim_verifikasi()">Input Tim Verifikasi Tanah <i class="fa fa-users"></i></button>
                        <?php //} ?>
                        <?php echo anchor('cetak/pernyataan/'.$pernyataan['id'], 'Cetak Pernyataan <i class="fa fa-print"></i>', array('class'=>'btn btn-warning btn-sm','target'=>'__blank')); ?>

                            <!-- <button onclick="cetak_pernyataan(<?php echo $pernyataan['id'];?>)" type="button" class="btn btn-warning btn-sm">Cetak Pernyataan <i class="fa fa-print"></i></button> -->
                        </div>
                    </div>
                </div>


                <!--  -->
                
<!-- Modal Input BAP -->
<div class="modal fade" id="modal_bap" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Setujui Pernyataan &amp; Proses Pertanahan</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'bap_input','class'=>'form-horizontal'));?>
      <div class="modal-body form">
          <input type="hidden" name="permohonan_id" value="<?php echo $data['id'];?>">
          <input type="hidden" name="pernyataan_id" value="<?php echo $pernyataan['id'];?>">    
          <input type="hidden" name="pemohon" value="<?php echo $data['nama'];?>">
          <input type="hidden" name="luas" value="<?php echo $data['luas'];?>">
          <input type="hidden" name="lokasi" value="<?php echo $data['lokasi'];?>">    

            <div class="box box-warning">
                <div class="box-header">
                    <h3>Input Pemeriksa &amp; Petugas Verifikasi Tanah</h3>
                </div>
                <div class="box-body"> 
                   <!--  -->
                   <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Petugas Pemeriksa 1</label>
                        <div class="col-sm-8">
                        <select name="pemeriksa_1" class="form-control select2" style="width:100%;">
                        <?php foreach ($pemeriksa1 as $p1) {
                           echo "<option value='".$p1->id."'>".$p1->fullname." - ".$p1->jabatan."</option>";
                        }?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Petugas Pemeriksa 2</label>
                        <div class="col-sm-8">
                        <select name="pemeriksa_2" class="form-control select2" style="width:100%;">
                        <?php foreach ($pemeriksa2 as $p2) {
                           echo "<option value='".$p2->id."'>".$p2->fullname." - ".$p2->jabatan."</option>";
                        }?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Petugas Pemeriksa 3</label>
                        <div class="col-sm-8">
                        <select name="pemeriksa_3" class="form-control select2" style="width:100%;">
                        <?php foreach ($pemeriksa3 as $p3) {
                           echo "<option value='".$p3->id."'>".$p3->fullname." - ".$p3->jabatan."</option>";
                        }?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Petugas Pemeriksa 4</label>
                        <div class="col-sm-8">
                        <select name="pemeriksa_4" class="form-control select2" style="width:100%;">
                        <?php foreach ($pemeriksa4 as $p4) {
                           echo "<option value='".$p4->id."'>".$p4->fullname." - ".$p4->jabatan."</option>";
                        }?>
                        </select>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
                    
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="bap_save()" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
      </div>
    </form>
    </div> 
  </div> 
</div>


                <!--  -->
                <?php
                }
                    # code...
                    break;
                case 2:
                ?>
                 <div class="well">
                    <h3 class="text-center">Data Pelengkap Pernyataan Belum di Input</h3>
                </div>
                <?php
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
            ?>
        </div>
    </div>
</section>

<!-- Modal Input Pernyataan -->
<div class="modal fade" id="modal_pernyataan" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Lengkapi Form Pernyataan</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'pernyataan_input','class'=>'form-horizontal'));?>
      <div class="modal-body form">
          <input type="hidden" name="permohonan_id" value="<?php echo $data['id'];?>">
            <div class="box box-success">
                <div class="box-body"> 
                    <div class="box-header"> 
                    <h4 class="box-title">Saksi 1</h4></div>
                    <!--  -->
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Nama</label>
                        <div class="col-sm-10"><input placeholder="Nama Saksi" type="text" name="saksi1_nama" class="form-control"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Pekerjaan</label>
                        <div class="col-sm-10"><input placeholder="Pekerjaan" type="text" name="saksi1_pekerjaan" class="form-control"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Alamat</label>
                        <div class="col-sm-10"><input placeholder="Alamat" type="text" name="saksi1_alamat" class="form-control"> 
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>

            <div class="box box-warning">
                <div class="box-body"> 
                    <div class="box-header"> 
                    <h4 class="box-title">Saksi 2</h4></div>
                    <!--  -->
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Nama</label>
                        <div class="col-sm-10"><input placeholder="Nama Saksi" type="text" name="saksi2_nama" class="form-control"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Pekerjaan</label>
                        <div class="col-sm-10"><input placeholder="Pekerjaan" type="text" name="saksi2_pekerjaan" class="form-control"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Alamat</label>
                        <div class="col-sm-10"><input placeholder="Alamat Saksi" type="text" name="saksi2_alamat" class="form-control"> 
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>

            <div class="box box-info">
                <div class="box-body"> 
                    <div class="box-header"> 
                    <h4 class="box-title">Saksi 3</h4></div>
                    <!--  -->
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Nama</label>
                        <div class="col-sm-10"><input placeholder="Nama Saksi" type="text" name="saksi3_nama" class="form-control"> 
                        </div>
                    </div> 
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Pekerjaan</label>
                        <div class="col-sm-10"><input placeholder="Pekerjaan" type="text" name="saksi3_pekerjaan" class="form-control"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Alamat</label>
                        <div class="col-sm-10"><input placeholder="Alamat Saksi"  type="text" name="saksi3_alamat" class="form-control"> 
                        </div>
                    </div> 
                    <!--  -->
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-body"> 
                    <div class="box-header"> 
                    <h4 class="box-title">Saksi 4</h4></div>
                    <!--  -->
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Nama</label>
                        <div class="col-sm-10"><input placeholder="Nama Saksi" type="text" name="saksi4_nama" class="form-control"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Pekerjaan</label>
                        <div class="col-sm-10"><input placeholder="Pekerjaan" type="text" name="saksi4_pekerjaan" class="form-control"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="">Alamat</label>
                        <div class="col-sm-10"><input placeholder="Alamat Saksi" type="text" name="saksi4_alamat" class="form-control"> 
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
                    
      </div>
      <input type="hidden" name="pemohon" value="<?php echo $data['nama'];?>">
      <input type="hidden" name="luas" value="<?php echo $data['luas'];?>">
      <input type="hidden" name="lokasi" value="<?php echo $data['lokasi'];?>">
      <input type="hidden" name="kontak_pemohon" value="<?php echo $data['hp'];?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="pernyataan_save()" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
      </div>
    </form>
    </div> 
  </div> 
</div>

<!-- ==== -->


<!-- Modal Setuju Dan Pilihan Rekomedasi -->
<div class="modal fade" id="modal_setuju" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Setujui Pernyataan &amp; Proses Pertanahan</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'setuju_input','class'=>'form-horizontal'));?>
      <div class="modal-body form">
          
          <input type="hidden" name="id" value="<?php echo $data['id'];?>">    

            <div class="box box-warning">
                <div class="box-body"> 
                   <!--  -->
                   <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Setujui Sebagai</label>
                        <div class="col-sm-8">
                        <select name="status_persetujuan" class="form-control" style="width:100%;">
                        <option value="1">Surat Keterangan Tanah</option>
                        <option value="2">Surat Keterangan Rekomendasi</option>
                        <option value="99">Tolak Permohonan</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Catatan Persetujuan</label>
                        <div class="col-sm-8">
                            <textarea name="nota_kades" class="form-control" rows="4" cols="2"></textarea>
                        </select>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
                    
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="persetujuan_save()" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
      </div>
    </form>
    </div> 
  </div> 
</div>

