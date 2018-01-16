<section class="content-header">
  <h1>
    Detail &amp; Data Desa
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Sistem Desa</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-5">
        <div class="box box-success">
            <div class="box-body">
                <dt>Nama Desa</dt>
                <dd><?php echo $data['nama_desa'];?></dd>
                <br>
                <dt>Alamat</dt>
                <dd><?php echo $data['alamat_desa'];?></dd>
                <br>
                <dt>Kepala Desa Aktif</dt>
                <dd><?php echo $data['fullname_kades'];?></dd>
                <br>
                <dt>Sekretaris Desa</dt>
                <dd><?php echo $data['fullname_sekdes'];?></dd>
                <br>
                <dt>Kasi Pemerintahan</dt>
                <dd><?php echo $data['fullname_pemerintahan'];?></dd>
                <br>
                <dt>Kasi Pembangunan</dt>
                <dd><?php echo $data['fullname_pembangunan'];?></dd>
                <br>
                <dt>Kasi Pemberdayaan</dt>
                <dd><?php echo $data['fullname_pemberdayaan'];?></dd>
                <br>
                <dt>Kaur Umum</dt>
                <dd><?php echo $data['fullname_umum'];?></dd>
                <br>
                <dt>Kaur Pelayanan</dt>
                <dd><?php echo $data['fullname_pelayanan'];?></dd>
                <br>
                <dt>Kaur Keuangan</dt>
                <dd><?php echo $data['fullname_keuangan'];?></dd>
                <br>
                <dt>Bendahara</dt>
                <dd><?php echo $data['fullname_bendahara'];?></dd>
                <br>
                <dt>Petugas Pertanahan</dt>
                <dd><?php echo $data['fullname_pertanahan'];?></dd>                
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <button onclick="desa_edit()" class="btn btn-warning btn-flat btn-sm">Edit Data Desa &amp; Pejabat Desa <i class="fa fa-edit"></i></button>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-7">
        <div class="box box-warning">
            <div class="box-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="adm-dusun">
            <thead>
              <tr valign="center" align="center">
                <td>Dusun</td>
                <td>Pejabat</td>
                <td>#</td>
              </tr>
            </thead>
            <tbody>
               <?php
               foreach ($dusun as $dusun){
                   echo "<tr>";
                   echo "<td>".$dusun->nama_dusun."</td>";
                   echo "<td align='center'><b>".$dusun->fullname."</b><br>".$dusun->hp."</td>";
                   echo "<td  align='center'>
                   <button onclick='edit_dusun(".$dusun->id.")' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i></button>
                   <button onclick='hapus_dusun(".$dusun->id.")' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button>                  
                   </td>";
                   echo "</tr>";
               }
               ?>
            </tbody> 
     </table> 
        </div> 
        <div class="box-footer">
            <button onclick="tambah_dusun()" class="btn btn-flat btn-success">Tambah Dusun <i class="fa fa-plus"></i></button>
        </div>
    </div>
    <div class="box box-warning">
        <div class="box-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="adm-wilayah">
     <thead>
       <tr valign="center" align="center">
         <td>Dusun</td>
         <td>RT</td>
         <td>Pejabat</td>
         <td>#</td>
       </tr>
     </thead>
     <tbody>
     <?php 
        foreach ($administrasi as $adm){
        echo "<tr>";
        echo "<td>".$adm->nama_dusun."</td>";
        echo "<td>RT ".$adm->nama_rt."</td>";
        echo "<td align='center'><b>".$adm->fullname."</b> <br>".$adm->hp."</td>";
        echo "<td align='center'>
        <button onclick='edit_rt(".$adm->id.")' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i></button>
        <button onclick='hapus_rt(".$adm->id.")' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button></td>";
        echo "</tr>";
        } 
     ?>
     </tbody> 
     </table>
            </div>
        <div class="box-footer">
            <button onclick="tambah_rt()" class="btn btn-flat btn-success">Tambah RT <i class="fa fa-plus"></i></button>
        </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Data Aset Pertanahan &amp; Fasilitas Desa</h3> 
                </div>
                <div class="box-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="aset_desa">
                        <thead>
                        <tr valign="center" align="center">
                            <td>Keterangan</td>
                            <td>Latitude / Longitude</td>
                            <td>Foto</td>
                            <td>#</td>
                        </tr>
                        </thead>
                            <?php 

                            foreach ($aset as $aset) {
                               echo "<tr>";
                               echo "<td>".$aset->keterangan."</td>";
                               echo "<td>".$aset->lat.",".$aset->lng."</td>";
                               echo "<td align='center'>
                                    <img src='".base_url().PATOK.$aset->foto_tanah."' width='120'>
                               </td>";
                               echo "<td align='center'>
                                    <a href='".base_url('aset/tanah/'.$aset->id)."' class='btn btn-sm btn-primary'><i class='fa fa-edit'></i></a>
                                    <a href='".base_url('aset/nonaktif/'.$aset->id)."' class='btn btn-sm btn-warning'><i class='fa fa-ban'></i></a>
                               </td>";
                               echo "</tr>";
                            }
                            ?>
                        <tbody>
                        </tbody>
                        </table>

                </div>
                <div class="box-footer">
                    <!-- <div class="pull-right">
                        <button onclick="input_aset()" class="btn btn-primary btn-sm">Input Data Lokasi Aset Tanah <i class="fa fa-map-o"></i></button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>    
</section>

<!-- Modal Edit Data Desa -->
<div class="modal fade" id="modal_data_desa" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Edit Data Desa</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'data_desa_form','class'=>'form-horizontal'));?>
      <div class="modal-body form">
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Nama Desa</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_desa" value="<?php echo $data['nama_desa'];?>" class="form-control"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Alamat Desa</label>
                        <div class="col-sm-8">
                            <textarea  name="alamat_desa" rows="2" cols="4"  class="form-control"><?php echo $data['alamat_desa'];?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Kepala Desa</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="kepala_desa">
                            <?php 
                            echo "<option value='".$data["kades_id"]."'>".$data["fullname_kades"]." - ".$data["kades_keterangan_jabatan"]."</option>";
                            foreach ($kades as $kades) {
                                if($kades->id != $data['kades_id']){
                                echo "<option value='".$kades->id."'>".$kades->fullname." - ".$kades->keterangan_jabatan."</option>";
                                }
                            } 
                            ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Sekretaris Desa</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="sekretaris_desa">
                            <?php 
                            echo "<option value='".$data["sekdes_id"]."'>".$data["fullname_sekdes"]." - ".$data["kades_keterangan_jabatan"]."</option>";                    
                            foreach ($sekdes as $sekdes) {
                                if($sekdes->id != $data['sekdes_id']){
                                echo "<option value='".$sekdes->id."'>".$sekdes->fullname." - ".$sekdes->keterangan_jabatan."</option>";
                                }
                            }                           
                            ?>
                            </select> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Kasi Pemerintahan</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="kasi_pemerintahan">
                            <?php 
                            echo "<option value='".$data["pemerintahan_id"]."'>".$data["fullname_pemerintahan"]." - ".$data["pemerintahan_keterangan_jabatan"]."</option>";                    
                            foreach ($kasi_pemerintahan as $kasi_pemerintahan) {
                                if($kasi_pemerintahan->id != $data['pemerintahan_id']){
                                echo "<option value='".$kasi_pemerintahan->id."'>".$kasi_pemerintahan->fullname." - ".$kasi_pemerintahan->keterangan_jabatan."</option>";
                                }
                            }                             
                            ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Kasi Pembangunan</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="kasi_pembangunan">
                            <?php 
                            echo "<option value='".$data["pembangunan_id"]."'>".$data["fullname_pembangunan"]." - ".$data["pembangunan_keterangan_jabatan"]."</option>";                    
                            foreach ($kasi_pembangunan as $kasi_pembangunan) {
                                if($kasi_pembangunan->id != $data['pembangunan_id']){
                                echo "<option value='".$kasi_pembangunan->id."'>".$kasi_pembangunan->fullname." - ".$kasi_pembangunan->keterangan_jabatan."</option>";
                                }
                            }                     
                            ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Kasi Pemberdayaan</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="kasi_pemberdayaan">
                            <?php 
                           echo "<option value='".$data["pemberdayaan_id"]."'>".$data["fullname_pemberdayaan"]." - ".$data["pemberdayaan_keterangan_jabatan"]."</option>";                    
                           foreach ($kasi_pemberdayaan as $kasi_pemberdayaan) {
                               if($kasi_pemberdayaan->id != $data['pemberdayaan_id']){
                               echo "<option value='".$kasi_pemberdayaan->id."'>".$kasi_pemberdayaan->fullname." - ".$kasi_pemberdayaan->keterangan_jabatan."</option>";
                               }
                           }                          
                            ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Kaur Umum</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="kaur_umum">
                            <?php 
                            echo "<option value='".$data["umum_id"]."'>".$data["fullname_umum"]." - ".$data["umum_keterangan_jabatan"]."</option>";                    
                            foreach ($kaur_umum as $kaur_umum) {
                                if($kaur_umum->id != $data['umum_id']){
                                echo "<option value='".$kaur_umum->id."'>".$kaur_umum->fullname." - ".$kaur_umum->keterangan_jabatan."</option>";
                                }
                            }                             
                            ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Kaur Keuangan</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="kaur_keuangan">
                            <?php 
                            echo "<option value='".$data["keuangan_id"]."'>".$data["fullname_keuangan"]." - ".$data["keuangan_keterangan_jabatan"]."</option>";                    
                            foreach ($kaur_keuangan as $kaur_keuangan) {
                                if($kaur_keuangan->id != $data['keuangan_id']){
                                echo "<option value='".$kaur_keuangan->id."'>".$kaur_keuangan->fullname." - ".$kaur_keuangan->keterangan_jabatan."</option>";
                                }
                            }                           
                            ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Kaur Pelayanan</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="kaur_pelayanan">
                            <?php 
                           echo "<option value='".$data["pelayanan_id"]."'>".$data["fullname_pelayanan"]." - ".$data["pelayanan_keterangan_jabatan"]."</option>";                    
                           foreach ($kaur_pelayanan as $kaur_pelayanan) {
                               if($kaur_pelayanan->id != $data['pelayanan_id']){
                               echo "<option value='".$kaur_pelayanan->id."'>".$kaur_pelayanan->fullname." - ".$kaur_pelayanan->keterangan_jabatan."</option>";
                               }
                           }                            
                            ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Bendahara</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="bendahara">
                            <?php 
                           echo "<option value='".$data["bendahara_id"]."'>".$data["fullname_bendahara"]." - ".$data["bendahara_keterangan_jabatan"]."</option>";                    
                           foreach ($bendahara as $bendahara) {
                               if($bendahara->id != $data['bendahara_id']){
                               echo "<option value='".$bendahara->id."'>".$bendahara->fullname." - ".$bendahara->keterangan_jabatan."</option>";
                               }
                           }                             
                            ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Petugas Pertanahan</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="pertanahan">
                            <?php 
                           echo "<option value='".$data["pertanahan_id"]."'>".$data["fullname_pertanahan"]." - ".$data["pertanahan_keterangan_jabatan"]."</option>";                    
                           foreach ($pertanahan as $pertanahan) {
                               if($pertanahan->id != $data['pertanahan_id']){
                               echo "<option value='".$pertanahan->id."'>".$pertanahan->fullname." - ".$pertanahan->keterangan_jabatan."</option>";
                               }
                           }                             
                            ?>
                            </select> 
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Ketua BPD</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="ketua_bpd">
                            <?php 
                            //echo "<option value='".$data["bpd_id"]."'>".$data["fullname_bpd"]." - ".$data["bpd_keterangan_jabatan"]."</option>";                    
                            // foreach ($bpd as $bpd) {
                            //     if($bpd->id != $data['bpd_id']){
                            //     echo "<option value='".$bpd->id."'>".$bpd->fullname." - ".$bpd->keterangan_jabatan."</option>";
                            //     }
                            // }                            
                            ?>
                            </select> 
                        </div>
                    </div> -->
      </div>
      <input type="hidden" name="desa_id" value="<?php echo $data['id'];?>">
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" onclick="save_data_desa()">Save <i class="fa fa-save"></i></button>
      </div>
    </div> 
  </div> 
</div>

<!-- Modal Edit Data Desa -->
<div class="modal fade" id="modal_data_dusun" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Tambah Data dusun</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'data_dusun_form','class'=>'form-horizontal'));?>
      <div class="modal-body form">
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Nama dusun</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_dusun" value="" class="form-control"> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Alamat dusun</label>
                        <div class="col-sm-8">
                            <textarea  name="alamat_dusun" rows="2" cols="4"  class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Kepala Dusun</label>
                        <div class="col-sm-8">
                            <select name="dusun_uid" class="form-control select2" style="width:100%;" id="">
                                <?php 
                                foreach ($kadus as $kadus) {
                                    echo "<option value='".$kadus->id."'>".$kadus->fullname." - ".$kadus->keterangan_jabatan."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>                    
               
      </div>
      <input type="hidden" name="desa_id" value="<?php echo $data['id'];?>">
      <input type="hidden" name="dusun_id" value="">
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" onclick="save_data_dusun()">Save <i class="fa fa-save"></i></button>
      </div>
    </div> 
  </div> 
</div>



<!-- Modal Edit Data Desa -->
<div class="modal fade" id="modal_data_rt" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Tambah Data RT</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'data_rt_form','class'=>'form-horizontal'));?>
      <div class="modal-body form">
                <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Dusun</label>
                        <div class="col-sm-8">
                            <select name="dusun_id" class="form-control select2" style="width:100%;" id="">
                            <?php 
                                foreach ($dusun_id as $dusun_id) {
                                    echo "<option value='".$dusun_id->id."'>".$dusun_id->nama_dusun."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Nama RT</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_rt" value="" class="form-control"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Ketua RT</label>
                        <div class="col-sm-8">
                            <select name="rt_uid" class="form-control select2" style="width:100%;" id="">
                            <?php 
                                foreach ($ketua_rt as $ketua_rt) {
                                    echo "<option value='".$ketua_rt->id."'>".$ketua_rt->fullname." - ".$ketua_rt->keterangan_jabatan."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
               
      </div>
      <input type="hidden" name="rt_id" value="">      
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" onclick="save_data_rt()">Save <i class="fa fa-save"></i></button>
      </div>
    </div> 
  </div> 
</div>