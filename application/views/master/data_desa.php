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
                   echo "<td  align='center'><a href='".base_url("rt/edit/".$dusun->id)."' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i></a></td>";
                   echo "</tr>";
               }
               ?>
            </tbody> 
     </table> 
               
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
        echo "<td align='center'><a href='".base_url("rt/edit/".$adm->id)."' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i></a></td>";
        echo "</tr>";
        } 
     ?>
     </tbody> 
     </table>
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
                            foreach ($kades as $kades) {
                                echo "<option value='".$kades->id."'>".$kades->fullname."</option>";
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
                            foreach ($sekdes as $sekdes) {
                                echo "<option value='".$sekdes->id."'>".$sekdes->fullname."</option>";
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
                            foreach ($kasi_pemerintahan as $kasi_pemerintahan) {
                                echo "<option value='".$kasi_pemerintahan->id."'>".$kasi_pemerintahan->fullname."</option>";
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
                            foreach ($kasi_pembangunan as $kasi_pembangunan) {
                                echo "<option value='".$kasi_pembangunan->id."'>".$kasi_pembangunan->fullname."</option>";
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
                            foreach ($kasi_pemberdayaan as $kasi_pemberdayaan) {
                                echo "<option value='".$kasi_pemberdayaan->id."'>".$kasi_pemberdayaan->fullname."</option>";
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
                            foreach ($kaur_umum as $kaur_umum) {
                                echo "<option  value='".$kaur_umum->id."'>".$kaur_umum->fullname."</option>";
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
                            foreach ($kaur_keuangan as $kaur_keuangan) {
                                echo "<option value='".$kaur_keuangan->id."'>".$kaur_keuangan->fullname."</option>";
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
                            foreach ($kaur_pelayanan as $kaur_pelayanan) {
                                echo "<option value='".$kaur_pelayanan->id."'>".$kaur_pelayanan->fullname."</option>";
                            }                           
                            ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Bendahara</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="kaur_pelayanan">
                            <?php 
                            foreach ($bendahara as $bendahara) {
                                echo "<option value='".$bendahara->id."'>".$bendahara->fullname."</option>";
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
                            foreach ($pertanahan as $pertanahan) {
                                echo "<option value='".$pertanahan->id."'>".$pertanahan->fullname."</option>";
                            }                           
                            ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Ketua BPD</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="ketua_bpd">
                            <?php 
                            foreach ($bpd as $bpd) {
                                echo "<option value='".$bpd->id."'>".$bpd->fullname."</option>";
                            }                           
                            ?>
                            </select> 
                        </div>
                    </div>
      </div>
      <input type="hidden" name="desa_id" value="<?php echo $data['id'];?>">
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" onclick="save_edit_data_desa()">Save <i class="fa fa-save"></i></button>
      </div>
    </div> 
  </div> 
</div>