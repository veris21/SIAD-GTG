<section class="content-header">
  <h1>
    Data Administrasi Wilayah User
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Administrasi</li>
  </ol>
</section>
<section class="content">
<?php echo form_open();?>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-body">
     <table width="100%" class="table table-striped table-bordered table-hover" id="adm-desa">
     <thead>
       <tr valign="center" align="center">
         <td>Kabupaten</td>
         <td>Kecamatan</td>
         <td>Desa</td>
         <td> Kepala Desa </td>
         <td>#</td>
       </tr>
     </thead>
     <tbody>
        <?php
        foreach ($desa as $desa){
            echo "<tr>";
            echo "<td>".$desa->nama_kabupaten."</td>";
            echo "<td>".$desa->nama_kecamatan."</td>";
            echo "<td>".$desa->nama_desa."</td>";
            echo "<td align='center'><b>".$desa->fullname."</b> <br>".$desa->hp."</td>";
            echo "<td align='center'><a  data-toggle='tooltip' title='Lihat Details Desa'  href='".base_url("details/desa/".$desa->id)."' class='btn btn-xs btn-success'><i class='fa fa-eye'></i></a></td>";
            echo "</tr>";
        }
        ?>
     </tbody> 
     </table>
     </div> 
     <div class="box-footer">
        <div class="pull-right">
            <a class="btn btn-success btn-flat btn-sm" onclick="button_input_desa()" >Input Desa Baru <i class="fa fa-plus"></i></a>
        </div>
     </div>
   </div> 
  </div> 
</div>
</section>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_desabaru" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Input Desa</h3>
      </div>

      <div class="modal-body form">
        <!--  -->
        <form action="#" id="desa_baru" class="form-horizontal">
        <div class="form-body">
            <div class="row form-group">
              <label class="control-label col-sm-3">Kabupaten</label>
              <div class="col-sm-9">
              <select name="kabupaten_id" class="form-control select2" style="width:100%" id="">
              <?php 
              foreach ($kabupaten as $kab) {
                 echo "<option value='".$kab->id."'>".$kab->nama_kabupaten."</option>";
              }
              ?>
              </select>
              </div>
            </div>
        </div>
            
            
            <div class="row form-group">
              <label class="control-label col-sm-3">Kecamatan</label>
              <div class="col-sm-9">
                <select name="kecamatan_id" class="form-control select2" style="width:100%" id="">
                <?php 
              foreach ($kecamatan as $kec) {
                echo "<option value='".$kec->id."'>".$kec->nama_kecamatan."</option>";
              }
              ?>
                </select>
              </div>
            </div>

            <div class="row form-group">
              <label class="control-label col-sm-3">Nama Desa</label>
              <div class="col-sm-9">
                <input name="nama_desa" placeholder="nama desa" class="form-control" type="text">
              </div>
            </div>

            <div class="row form-group">
              <label class="control-label col-sm-3">Alamat</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="alamat_desa" id="" cols="8" rows="4"></textarea>
              </div>
            </div>

            <div class="row form-group">
              <label class="control-label col-sm-3">Nama Kepala Desa</label>
              <div class="col-sm-9">
                <select name="uid" class="form-control select2" style="width:100%" id="">
                <?php 
              foreach ($users as $user) {
                 echo "<option value='".$user->id."'>".$user->fullname." - ".$user->keterangan_jabatan."</option>";
              }
              ?>
                </select>
              </div>
            </div>

            <div class="row form-group">
              <label class="control-label col-sm-3">Nama Sekretaris Desa</label>
              <div class="col-sm-9">
                <select name="uid" class="form-control select2" style="width:100%" id="">
                <?php 
              foreach ($sekdes as $sekdes) {
                 echo "<option value='".$sekdes->id."'>".$sekdes->fullname." - ".$sekdes->keterangan_jabatan."</option>";
              }
              ?>
                </select>
              </div>
            </div>

            <div class="row form-group">
              <label class="control-label col-sm-3">Nama Kasi Pemerintahan</label>
              <div class="col-sm-9">
                <select name="uid" class="form-control select2" style="width:100%" id="">
                <?php 
              foreach ($kasi_pemerintahan as $kasi) {
                 echo "<option value='".$kasi->id."'>".$kasi->fullname." - ".$kasi->keterangan_jabatan."</option>";
              }
              ?>
                </select>
              </div>
            </div>

            <div class="row form-group">
              <label class="control-label col-sm-3">Nama Petugas Pertanahan</label>
              <div class="col-sm-9">
                <select name="uid" class="form-control select2" style="width:100%" id="">
                <?php 
              foreach ($pertanahan as $tanah) {
                 echo "<option value='".$tanah->id."'>".$tanah->fullname." - ".$tanah->keterangan_jabatan."</option>";
              }
              ?>
                </select>
              </div>
            </div>
         </form>
        <!--  -->
      </div>

        <div class="modal-footer">
        <button type="button" id="btnSave" onclick="save_desa_baru()" class="btn btn-primary btn-sm">Simpan Data</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->