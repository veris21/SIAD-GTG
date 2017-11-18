<section class="content-header">
  <h1>
    Desa Detail
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Input Data desa</li>
  </ol>
</section>
<section class="content">
<?php echo form_open_multipart(); ?>
<div class="row">
  <div class="col-md-5">
    <div class="box box-info">
      <div class="box-header">
        <div class="box-body">
          <div class="form-group">
            <label>Desa UID</label>
            <input type="text" name="desa_uid" class="form-control" value="<?php echo $desa['desa_uid'];?>">
          </div>
          <div class="form-group">
            <label>Nama Desa</label>
            <input type="text" name="desa_nama" class="form-control" value="<?php echo $desa['desa_nama'];?>">
          </div>
          <div class="form-group">
            <label>Kecamatan</label>
            <select class="form-control" name="kecamatan_uid">
              <option value="<?php echo $desa['kecamatan_uid'];?>"><?php $kec = $this->db->get_where('sig_kecamatan', array('id'=>$desa['kecamatan_uid']))->row_array(); echo $kec['kecamatan_nama']; ?></option>
              <?php
                foreach ($kecamatan as $k) {
                echo "<option value='$k->kecamatan_uid'>".$k->kecamatan_nama."</option>";
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="desa_alamat" class="form-control" rows="4" cols="40"><?php echo $desa['desa_alamat'];?></textarea>
          </div>
          <div class="form-group">
            <label>Pj Desa</label>
            <select class="form-control" name="desa_kepala_uid">
              <?php
              if ($desa['desa_kepala_uid']!='') {
                $pjDes = $this->db->get_where('sig_users', array('id'=>$desa['desa_kepala_uid']))->row_array();
                echo "<option value='$pjDes->id'>$pjDes->user_fullname</option>";
              }
              foreach ($pj as $pj) {
                echo "<option value='$pj->id'><b>".$pj->user_status."</b>/ <i>".$pj->user_fullname."</i></option>";
              }
               ?>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="box box-warning">
      <div class="box-body">
        <div class="form-group">
          <label>Koordinat Batas</label>
          <select class="form-control" name="koordinat">
            <?php
            foreach ($koordinat as $k) {
              echo "<option value='$k->id'>$k->keterangan<br>Luas : $k->luas  meter<sup>2</sup></option>";
            }
             ?>
          </select>
        </div>
      </div>
      <div class="box-footer">
        <button type="reset" name="reset" class="btn btn-flat btn-warning">Reset</button>
        <span class="pull-right">
          <a class="btn btn-flat btn-info" href="<?php echo BASE_URL.'koordinat/input'; ?> ">Input Master Koordinat</a>
          <button type="submit" name="simpan" class="btn btn-flat btn-success">Simpan</button>
        </span>
      </div>
    </div>
  </div>
</div>
</form>
</section>
