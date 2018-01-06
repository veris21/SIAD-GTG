<section class="content-header">
  <h1>
    Data Pertanahan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
  <div class="box box-warning">
    <div class="box-body">

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#permohonan_list" data-toggle="tab">List Permohonan</a></li>
          <li><a href="#permohonan_input" data-toggle="tab">Input Permohonan</a></li>          
        </ul>
        <div class="tab-content">
     <div class="active tab-pane" id="permohonan_list">
        <table width="100%" class="table table-striped table-responsive" id="list_permohonan">
          <thead>
            <tr>
              <th align="center" >Nik/Nama Pemohon</th>
              <th align="center" >Tanggal Mohon</th>
              <th align="center" >Lokasi</th>
              <th align="center" >Luas</th>
              <th align="center" >Status</th>
              <th align="center" >#</th>
            </tr>           
          </thead>
          <tbody>
          <?php 
            foreach($data as $data){
              if($data->status_proses==0){
                $status = '<button class="btn btn-xs btn-flat btn-warning">Di Prosess <i class="fa fa-ban"></i></button>';
              }elseif ($data->status_proses==2) {
                $status = '<button class="btn btn-xs btn-flat btn-default">Di Setujui <i class="fa fa-paper-plane"></i></button>';
              }else{
                $status = '<button class="btn btn-xs btn-flat btn-success">Di Terima <i class="fa fa-check"></i></button>';
              }              
            echo "<tr>";
            echo "<td>".$data->nama."<br>".$data->no_nik."</td>";
            echo "<td>".mdate("%d %M %Y - %H:%i %a", $data->time)."</td>";
            echo " <td>".$data->lokasi."</td>";
            echo "<td align='center'><b>&plusmn; ".$data->luas." </b>m<sup>2</sup></td>";
            echo "<td align='center'>".$status."            
            </td>";
            echo "<td width='60' align='center'>
            <a href='".base_url("permohonan/edit/".$data->id)."' class='btn btn-xs btn-flat btn-primary'><i class='fa fa-edit'></i></a>
            <a href='".base_url("permohonan/view/".$data->time)."' class='btn btn-xs btn-flat btn-success'><i class='fa fa-eye'></i></a>
            </td>";
            echo "</tr>";
            }
            ?>
          </tbody>
        </table>
     </div>
     <div class="tab-pane" id="permohonan_input">
        <div class="heading-2">
        Masukkan <b>NIK</b> atau <b>Nama Lengkap </b>untuk mencari data pemohon di database
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="cari_tanah_nik" id="cari_tanah_nik" onkeyup="cari_data()" value="">
       </div>
       <hr> 
       <center id="loader-icon" style="display:none;">
          <img width="50%" class="img img-responsive" src="<?php echo base_url().'assets/';?>nyapu.gif" />
      </center>
      <div id="data_kosong" hidden>
          <div  class="alert alert-danger">
               <h3 class="text-center"><i class="icon fa fa-ban"></i>Data Tidak Ditemukan !!</h3>
          </div>         
          Apa Anda ingin menginput Data Penduduk Baru ?        
          <button class="btn btn-sm btn-flat btn-success" onclick="input_penduduk_baru()" >Iya, Input Data <i class="fa fa-plus"></i></button>
         
      </div>
      <!--  -->
      <div id="result_cari_data" class="box box-info" hidden>
          <div class="box-body">
          <table width="100%" class="table table-bordered  table-responsive" id="details_nik">
            <tr>
              <td colspan="5" align="center">
                <h3 id="no_kk"></h3>
                <h4 id="no_nik"></h4>
              </td>
            </tr>
            <tr>
              <td align="right">Nama Lengkap</td>
              <td>: <b id="nama"></b><td>
              <td align="right">Pendidikan Terakhir</td>
              <td>: <b id="pddk_akhir"></b><td>
            </tr>
            <tr>
              <td align="right">TTL</td>
              <td>: <b id="ttl"></b><td>
              <td align="right">Status Dalam Keluarga</td>
              <td>: <b id="shdk"></b><td>
            </tr>
            <tr>
              <td align="right">Agama</td>
              <td>: <b id="agama"></b><td>
              <td align="right">Pekerjaan</td>
              <td>: <b id="pekerjaan"></b><td>
            </tr>
            <tr>
              <td align="right">Status Perkawinan</td>
              <td>: <b id="status"></b><td>
              <td align="right">Jumlah Anggota Keluarga</td>
              <td>: <b id="shdrt"></b><td>
            </tr>
            <tr>
              <td align="right">Alamat</td>
              <td>: <b id="alamat"></b><td>
              <td align="right">Dusun</td>
              <td>: <b id="dusun"></b><td>
            </tr>
            <tr>
              <td align="right">Desa</td>
              <td>: <b></b><td>
              <td align="right">RT</td>
              <td>: <b id="no_rt"></b><td>
            </tr>
          </table>
          <hr> 
          <div class="text-center success">
          <h3>Lengkapi Data Permohonan Sesuai Pengantar</h3>
          </div>
          <?php echo form_open_multipart('', array('id'=>'permohonan_form','class'=>'form-horizontal'));?>
          <input type="hidden" name="kependudukan_id" >
          <input type="hidden" name="pemohon">
          <input type="hidden" name="no_nik">
          <div class="form-group">
          <label class="control-label col-sm-4" for="">Kontak (hp)</label>
          <div class="col-sm-8">
              <input type="text" name="kontak" class="form-control">
          </div>              
          </div>
          <div class="form-group">
          <label class="control-label col-sm-4" for="">Lokasi Tanah</label>
            <div class="col-sm-8">
                <input type="text" name="lokasi" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="">Dusun</label>
              <div class="col-sm-8">
            <select name="dusun_id" class="form-control">
              <?php
              foreach ($dusun as $dusun) {
               echo "<option value='".$dusun->id."'>".$dusun->nama_dusun."</option>";
              }
              ?>            
            </select>
            </div>
          </div>
          <div class="form-group">
          <label class="control-label col-sm-4" for="">Perkiraan Luas Tanah dalam ( &plusmn;m<sup>2</sup>)</label>
          <div class="col-sm-8">
          <input type="text" name="luas" class="form-control">
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-sm-4" for="">Status Tanah</label>
          <div class="col-sm-8">
          <select name="status_tanah" id="" class="form-control">
            <option value="TANAH NEGARA">TANAH NEGARA</option>
            <option value="TANAH DESA">TANAH DESA</option>
            <option value="TANAH GIRIK">TANAH GIRIK</option>
            <option value="TANAH GARAPAN">TANAH GARAPAN</option>
          </select>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-sm-4" for="">Peruntukan Tanah</label>
          <div class="col-sm-8">
          <select name="peruntukan_tanah" class="form-control">
            <option value="PERUMAHAN">PERUMAHAN</option>
            <option value="PERKEBUNAN">PERKEBUNAN</option>
           
            <option value="TEMPAT USAHA">TEMPAT USAHA</option>
            <option value="RUMAH IBADAH">RUMAH IBADAH</option>
            <option value="FASILITAS UMUM">FASILITAS UMUM</option>
            <option value="FASILITAS KHUSUS">FASILITAS KHUSUS</option>

          </select>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-sm-4" for="">Tahun Pengelolaan Objek Tanah</label>
          <div class="col-sm-8">
          <input type="text" name="tahun_kelola" class="form-control"  data-inputmask='"mask": "####"' data-mask>
          </div>
          </div>
          <table class="table table-striped">
              <tr>
                <td>
                  <div class="form-group">
                    <label  class="control-label col-sm-4"  for="">Batas Utara</label>
                    <div class="col-sm-8">
                    <input type="text" name="utara" class="form-control">
                    </div>
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <label class="control-label col-sm-4"  for="">Batas Barat</label>
                    <div class="col-sm-8">
                    <input type="text" name="barat" class="form-control">
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
                    <label class="control-label col-sm-4"  for="">Batas Selatan</label>
                    <div class="col-sm-8">
                    <input type="text" name="selatan" class="form-control">
                    </div>
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <label class="control-label col-sm-4"  for="">Batas Timur</label>
                    <div class="col-sm-8">
                    <input type="text" name="timur" class="form-control">
                    </div>
                  </div>
                </td>
              </tr>
          </table>
          <div class="form-group">
          <label class="control-label col-sm-4" for="scan_file">Scan KTP</label>
          <div class="col-sm-8">
          <input type="file" name="ktp" class="form-control" accept="image/*" >
          </div>
          </div>
          <hr>
          <div class="form-group">
          <label class="control-label col-sm-4" for="">Scan Surat Pengantar Kadus</label>
          <div class="col-sm-8">
          <input type="file" name="scan_link" class="form-control" accept="image/*" >
          </div>
          </div>
          <hr>
          <div class="form-group">
          <label class="control-label col-sm-4" for="">Bukti Pembayaran PBB</label>
          <div class="col-sm-8">
          <input type="file" name="pbb" class="form-control" accept="image/*" >
          </div>
          </div>
          <hr>
          <div class="pull-right">
              <button type="reset"  class="btn btn-flat btn-sm btn-warning" >Reset</button>
              <button onclick="posting_permohonan()" class="btn btn-flat btn-sm btn-success" type="submit">Posting <i class="fa fa-save"></i>  </button>
          </div>
          </form>
          <!--  -->
        </div>
      </div>
      
     </div>    

    </div>
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
              </select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Kecamatan</label>
            <div class="col-sm-8">
              <select name="kecamatan" class="form-control select2" style="width:100%;" id="">
                <option value="">-- Pilih Kecamatan --</option>
              </select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Desa</label>
            <div class="col-sm-8">
              <select name="desa" class="form-control select2" style="width:100%;" id="">
                <option value="">-- Pilih Desa --</option>
              </select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Dusun</label>
            <div class="col-sm-8">
              <select name="dusun" class="form-control select2" style="width:100%;" id="">
                <option value="">-- Pilih Dusun --</option>
              </select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">RT</label>
            <div class="col-sm-8">
              <select name="rt" class="form-control select2" style="width:100%;" id="">
                <option value="">-- Pilih RT --</option>
              </select>
            </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">Alamat</label>
              <div class="col-sm-8">
                  <input type="text" name="alamat" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">No. Kartu Keluarga</label>
              <div class="col-sm-8">
                  <input type="text" name="no_kk" class="form-control" id="">
               </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-4" for="">No. NIK</label>
              <div class="col-sm-8">
                  <input type="text" name="no_nik" class="form-control" id="">
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
              <select name="rt" class="form-control" id="">
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

<script>
var kab = $('[name="kabupaten"]').val();
$('[name="kabupaten"]').change(function(){
  $.ajax({

  });
});
</script>