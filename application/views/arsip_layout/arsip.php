<section class="content-header">
  <h1>
    Data Arsip Surat
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Arsip Surat</li>
  </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#arsip_masuk" data-toggle="tab">Arsip Masuk</a></li>
          <li><a href="#arsip_keluar" data-toggle="tab">Arsip Keluar</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="arsip_masuk">
            <div class="pull-right">
            <button class="btn btn-success" onclick="posting_arsip()"> Input Arsip <i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <br><br>
            <table width="100%" class="table table-striped table-bordered table-hover" id="table_arsip_masuk">
                <thead>
                <tr valign="center" align="center">
                    <td>Tanggal Terima</td>
                    <td>Kode Klasifikasi</td>
                    <td>Detail</td>          
                    <td>Perihal </td>
                    <td  width='80'>Pilihan</td>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($arsip_masuk as $data) {
                            echo "<tr valign='center'>";
                            echo "<td align='center'>".mdate("%d %M %Y %H:%i %a", $data->time)."</td>";
                            echo "<td align='left'><b>".$data->kode."</b>-";
                            echo $data->klasifikasi."</td>";                            
                            echo "<td align='left'>Pengirim : <b>".$data->pengirim."</b><br>";
                            echo "No.".$data->nomor_surat."<br> tanggal ".$data->tanggal_surat."</td>";
                            echo "<td align='left'>Sifat : <b>".$data->sifat."</b><br><br>".$data->perihal."</td>";
                            echo "<td align='center'>
                            <a data-toggle='tooltip' title='Lihat Details Arsip' class='btn btn-xs btn-flat btn-success' href='".BASE_URL."arsip/details/".$data->time."'>
                            <i class='fa fa-eye'></i>
                            </a>

                            <a data-toggle='tooltip' title='Cetak Ulang Arsip' class='btn btn-xs btn-flat btn-default' href='".BASE_URL."arsip/cetak/".$data->time."'>
                            <i class='fa fa-print'></i>
                            </a>
                            </td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody> 
            </table>
            </div>
            <div class="tab-pane" id="arsip_keluar">
            </div>            
        </div> 
        </div>
        </div>
    </div>
</section>


    <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_arsip" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Arsip Input</h3>
      </div>
      <div class="modal-body form">
        <?php echo form_open_multipart('', array('id'=>'arsip_input','class'=>'form-horizontal'));?>
        <input type="hidden" name="id" value="">
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-4">Kode Klasifikasi</label>
              <div class="col-md-8">
              <select class="form-control select2" style="width: 100%;" name="klasifikasi_id">
                <?php
                foreach ($klasifikasi as $klasifikasi){
                    echo "<option value='".$klasifikasi->id."'>".$klasifikasi->kode." - ".$klasifikasi->klasifikasi."</option>";
                }
                ?>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nomor Surat</label>
              <div class="col-md-8">
                <input name="nomor_surat" placeholder="nomor surat" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Pengirim Surat</label>
              <div class="col-md-8">
                <input name="pengirim" placeholder="pengirim surat" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Tanggal Surat</label>
              <div class="col-md-8">
              <div class="input-group">
                <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="tanggal_surat" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
             </div><!-- /.input group -->
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-4">Perihal Surat</label>
              <div class="col-md-8">
                <textarea rows="2" cols="4" class="form-control" name="perihal"></textarea>                
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-4">Sifat Surat</label>
              <div class="col-md-8">
                <select name="sifat_surat" class="form-control">
                <option value=""> -- </option>
                <option value="PEMBERITAHUAN">PEMBERITAHUAN</option>
                <option value="PENTING">PENTING</option>
                <option value="RAHASIA">RAHASIA</option>
                </select>                
              </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-4">Lampiran /Scanning Arsip</label>
              <div class="col-md-8">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Scan Arsip
                      <input type="file" name="scan_link">
                    </div>
                    <p class="help-block">Max. 10MB</p>
            </div>
            </div>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" onclick="save_arsip()" class="btn btn-primary">Save</button>
          </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->