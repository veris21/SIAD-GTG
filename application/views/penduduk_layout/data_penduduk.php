<section class="content-header">
<h1>
  Master Data Penduduk
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Input Data Penduduk</li>
</ol>
</section>
<section class="content">
<div class="box box-info">
    <div class="box-header">
    <?php 
        switch ($this->session->userdata('jabatan')) {
        case 'LAYANAN':
        ?> 
        <h3 class="box-title">Apa Anda ingin menginput Data Penduduk Baru ?</h3>       
        <button class="btn btn-sm btn-flat btn-success" onclick="input_penduduk_baru()" >Iya, Input Data <i class="fa fa-plus"></i></button>
        <?php
        break;
        case 'ROOT':
        echo form_open_multipart('', array('id'=>'import'));
    ?>
    <div class="box-footer">
        <div class="form-group">
           <div class="btn btn-default btn-file">
            <i class="fa fa-paperclip"></i> Attachment .xls|.xlsx 
            <input id="import_xls" type="file" name="import_xls">
           </div>
        </div>
        <center id="loader-icon" style="display:none;">
            <img width="50%" class="img img-responsive" src="<?php echo base_url('assets/nyapu.gif');?>" />
        </center>
        <button type="submit" name="upload" onclick="import_data()" class="btn btn-sm btn-flat btn-warning btn-block">Import Excel <i class="fa fa-excel-o"></i> </button>
      </div>
    <?php 
    echo form_close();
    break;
    }
    ?>
    </div>
    <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="master_penduduk">
        <thead>
        <tr valign="center" align="center" style="font-weight:bolder;">
            <td>No NIK</td>
            <td>No KK</td>
            <td>Nama Lengkap</td>
            <td>Alamat</td>
            <td>Tempat Tanggal Lahir</td>
            <td>#</td>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($data->result() as $data) {
            $tgl = explode("/", $data->tanggal_lahir);    
            echo "<tr>";
            echo "<td>".$data->no_nik."</td>";
            echo "<td>".$data->no_kk."</td>";
            echo "<td>".$data->nama."<br>(<i>".$data->shdk."</i>)</td>";
            echo "<td>".$data->alamat."</td>";
            echo "<td>".$data->tempat_lahir.", ".$tgl[1]."-".$tgl[0]."-".$tgl[2]."</td>";
            echo "<td>"
            .anchor('data_penduduk/details/'.$data->id,'<i class="fa fa-eye"></i>', array('class'=>'btn btn-success btn-xs')).
            "<button onclick='edit_penduduk(".$data->no_nik.")' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button>
            <button onclick='hapus_penduduk(".$data->id.",".$data->no_nik.")' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></button>
            </td>";
            echo "</tr>";
             } ?>
        </tbody>
        </table>
    </div>
</div>
</section>


<!-- Modal Input Data Penduduk Baru -->
<div class="modal fade" id="modal_input_data_penduduk_baru" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Input Data Penduduk ke Sistem</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'input_data_penduduk_baru','class'=>'form-horizontal'));?>
      <div class="modal-body form">
      <!--  -->
      <div class="form-group">
      <label class="control-label col-sm-4" for="">Kabupaten</label>
            <div class="col-sm-8">
              <select name="kabupaten" class="form-control select2" style="width:100%;" id="">
                <option value="">-- Pilih Kabupaten --</option>
                <?php 
                foreach ($kabupaten as $kabupaten) {
                  echo "<option value='".$kabupaten->id."'>".$kabupaten->nama_kabupaten."</option>";
                }
                ?>
              </select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Kecamatan</label>
            <div class="col-sm-8"  id="kecamatan">
                <select name='kecamatan' class='form-control select2' style='width:100%'></select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Desa</label>
            <div class="col-sm-8" id="desa">
            <select name='desa' class='form-control select2' style='width:100%' ></select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Dusun</label>
            <div class="col-sm-8" id="dsn">
            <select name='dusun' class='form-control select2' style='width:100%' ></select>      
            </div>
      </div>

      <div class="form-group" >
      <label class="control-label col-sm-4" for="">RT</label>
            <div class="col-sm-8" id="rt">
                <select name='rt' class='form-control  select2' style='width:100%' ></select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Alamat</label>
              <div class="col-sm-8">
                  <input type="text" name="alamat" class="form-control" >
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">No. Kartu Keluarga</label>
              <div class="col-sm-8">
                  <input type="number" name="no_kk" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">No. NIK</label>
              <div class="col-sm-8">
                  <input type="number" name="no_nik" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Nama Lengkap</label>
              <div class="col-sm-8">
                  <input type="text" name="nama" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Jenis Kelamin</label>
            <div class="col-sm-8">
              <select name="jenis_kelamin" class="form-control" id="">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
      </div>
      
      <div class="form-group">
      <label class="control-label col-sm-4" for="">Tempat Lahir</label>
              <div class="col-sm-8">
                  <input type="text" name="tempat_lahir" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Tanggal Lahir</label>
              <div class="col-sm-8">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="tanggal_lahir" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Pekerjaan</label>
              <div class="col-sm-8">
                  <input type="text" name="pekerjaan" class="form-control" id="">
               </div>
      </div>
      
      <div class="form-group">
      <label class="control-label col-sm-4" for="">Agama</label>
              <div class="col-sm-8">
                <select name="agama" class="form-control" id="">
                  <option value="">-- PIlih Agama --</option>
                  <option value="ISLAM">ISLAM</option>
                  <option value="KRISTEN">KRISTEN</option>
                  <option value="KATOLIK">KATOLIK</option>
                  <option value="BUDHA">BUDHA</option>
                  <option value="HINDU">HINDU</option>
                  <option value="KONGHUCU">KONGHUCU</option>
                </select>
               </div>
      </div>
      
      <div class="form-group">
      <label class="control-label col-sm-4" for="">Pendidikan Terakhir</label>
              <div class="col-sm-8">
                  <select name="pddk_akhir" class="form-control" id="">
                  <option value="">-- Pendidikan Terakhir --</option>
                  <option value="TIDAK/BELUM SEKOLAH">TIDAK/BELUM SEKOLAH</option>
                  <option value="TAMAT SD/SEDERAJAT">TAMAT SD/SEDERAJAT</option>
                  <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                  <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                  <option value="PERGURUAN TINGGI/SEDERAJAT">PERGURUAN TINGGI/SEDERAJAT</option>
                </select>
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Status Perkawinan</label>
              <div class="col-sm-8">
                <select name="status" class="form-control" id="">
                  <option value="">-- Pilih Status Perkawinan --</option>
                  <option value="BELUM KAWIN">Belum Kawin</option>
                  <option value="KAWIN">Kawin</option>
                  <option value="DUDA">DUDA</option>
                  <option value="JANDA">JANDA</option>
                </select>
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Status Dalam Keluarga</label>
              <div class="col-sm-8">
                  <select name="shdk" class="form-control" id="">
                  <option value="">-- Pilih Status Dalam Rumah Tangga --</option>
                  <option value="KEPALA KELUARGA">KEPALA KELUARGA</option>
                  <option value="ISTRI">ISTRI</option>
                  <option value="ANAK">ANAK</option>
                  <option value="FAMILI LAIN">FAMILI LAIN</option>
                </select>
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Jumlah Anggota Keluarga</label>
              <div class="col-sm-8">
                  <input type="number" name="shdrt" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Nama Ayah</label>
              <div class="col-sm-8">
                  <input type="text" name="nama_ayah" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Nama Ibu</label>
              <div class="col-sm-8">
                  <input type="text" name="nama_ibu" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Scan FC KTP/KK</label>
        <div class="col-sm-8">
            <input type="file" name="ktp" class="form-control" id="">
        </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Memo / Catatan Input</label>
              <div class="col-sm-8">
                  <textarea name="keterangan" class="form-control" cols="8" rows="4"></textarea>
               </div>
      </div>
      <!--  -->
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="save_penduduk_baru()" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div> 
  </div> 
</div>
