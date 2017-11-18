<section class="content-header">
  <h1>
    Input Permohonan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Permohonan</li>
  </ol>
</section>
<section class="content">
  <div class="box box-info">
    <div class="box-body">
      <table style="font-size:11px;" width="100%" class="table table-striped table-borderless table-hover" >
        <tr>
          <td colspan="5" align="center">
            <h3>No KK <?php echo $data['no_kk']; ?></h3>
            <h4><b>No NIK <?php echo $data['no_nik']; ?></b></h4>
          </td>
        </tr>
        <tr>
          <td align="right">Nama Lengkap</td>
          <td>: <b><?php echo $data['nama']; ?></b><td>
          <td align="right">Pendidikan Terakhir</td>
          <td>: <b><?php echo $data['pddk_akhir']; ?></b><td>
        </tr>
        <tr>
          <td align="right">TTL</td>
          <td>: <b><?php echo $data['tempat_lahir'].", ".$data['tanggal_lahir']; ?></b><td>
          <td align="right">Status Dalam Keluarga</td>
          <td>: <b><?php echo $data['shdk']; ?></b><td>
        </tr>
        <tr>
          <td align="right">Agama</td>
          <td>: <b><?php echo $data['agama']; ?></b><td>
          <td align="right">Pekerjaan</td>
          <td>: <b><?php echo $data['pekerjaan']; ?></b><td>
        </tr>
        <tr>
          <td align="right">Status Perkawinan</td>
          <td>: <b><?php echo $data['status']; ?></b><td>
          <td align="right">Jumlah Anggota Keluarga</td>
          <td>: <b><?php echo $data['shdrt']; ?> Orang</b><td>
        </tr>
        <tr>
          <td align="right">Alamat</td>
          <td>: <b><?php echo $data['alamat']; ?></b><td>
          <td align="right">Dusun</td>
          <td>: <b><?php echo $data['dusun']; ?></b><td>
        </tr>
        <tr>
          <td align="right">Desa</td>
          <td>: <b><?php $desa = $this->db->get_where('sig_desa', array('id'=>$data['id_desa']))->row_array(); echo $desa['desa_nama']; ?></b><td>
          <td align="right">RT</td>
          <td>: <b><?php echo $data['no_rt']; ?></b><td>
        </tr>
      </table>
    </div>
  </div>
  <div class="box box-warning">
    <?php echo form_open_multipart(); ?>
    <div class="box-body">
      <input type="hidden" name="desa_uid" value="<?php echo $data['id_desa'];?>">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Lokasi Dusun</label>
            <select class="form-control" name="skt_mohon_dusun_id">
              <?php
              foreach ($dusun as $dusun) {
                echo "<option value='$dusun->id'>$dusun->dusun_nama</option>";
              }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label>Lokasi yang di Mohon</label>
            <input type="text" name="skt_mohon_lokasi" class="form-control">
          </div>
          <div class="form-group">
            <label>Peruntukan Lokasi</label>
            <input type="text" name="skt_mohon_peruntukan" class="form-control">
          </div>
          <div class="form-group">
            <label>Status Tanah</label>
            <input type="text" name="skt_mohon_status_tanah" class="form-control">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="skt_mohon_ket" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nama Saksi 1</label>
            <input type="text" name="skt_mohon_saksi1" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama Saksi 2</label>
            <input type="text" name="skt_mohon_saksi2" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama Saksi 3</label>
            <input type="text" name="skt_mohon_saksi3" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama Saksi 4</label>
            <input type="text" name="skt_mohon_saksi4" class="form-control">
          </div>
          <div class="form-group">
            <div class="btn bg-maroon btn-file">
              <i class="fa fa-paperclip"></i> Upload Foto Copy KTP
              <input type="file" name="ktp">
            </div>
            <p class="help-block">Format File Jpg | Jpeg | Png (Max. 10MB)</p>
          </div>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <a class="btn btn-flat btn-warning" href="<?php echo BASE_URL;?>"><i class="fa fa-arrow-left"></i> Batal &amp; Kembali</a>
      <div class="pull-right">
        <button type="submit" name="simpan" class="btn btn-flat btn-info">Simpan <i class="fa fa-save"></i></button>
      </div>
    </div>
  </form>
  </div>
</section>
