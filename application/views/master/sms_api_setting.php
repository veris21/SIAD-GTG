<section class="content-header">
  <h1>
    SMS API SETTING
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Sistem Desa</li>
  </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="sms_set">
                <thead>
                <tr valign="center" align="center">
                    <td>STATUS</td>
                    <td>PROVIDER</td>
                    <td>URL</td>
                    <td>Tipe</td>
                    <td>Endpoint</td>
                    <td>Pilihan</td>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($data->result() as $data){
                    $provider = explode('.', $data->url);
                    $tipe = ($provider[0]=='https://reguler'? 'REGULER':'PREMIUM');
                    $status = ($data->status==1?'<button class="btn btn-success btn-flat">API AKTIF</button>':'<button class="btn btn-flat btn-danger">API NONAKTIF</button>');
                    echo "<tr>";
                    echo "<td align='center'>".$status."</td>";
                    echo "<td align='center'>".$provider[1]."</td>";
                    echo "<td align='center'>".$data->url."</td>";
                    echo "<td align='center'>".$tipe."</td>";
                    echo "<td align='center'>".$data->user."/".$data->pass."</td>";
                    echo "<td align='center'>";
                    echo "<a class='btn btn-sm btn-flat btn-warning' onclick='edit_api(".$data->id.")'><i class='fa fa-edit'></i></a>  ";
                    switch ($data->status) {
                        case 0:
                        echo " <a class='btn btn-sm btn-flat btn-success' onclick='aktifkan_setting_sms(".$data->id.")'><i class='fa fa-check'></i></a>";
                            break;                        
                        case 1:
                        echo " <a class='btn btn-sm btn-flat btn-danger' onclick='nonaktifkan_setting_sms(".$data->id.")'><i class='fa fa-ban'></i></a>";
                            break;
                    }     
                    echo " ";               
                    echo "</td>";
                    echo "</tr>";
                    }
                    ?>
                </tbody> 
        </table>
        </div>
        <div class="box-footer">
            <a class="btn btn-primary" onclick="add_api()">Tambah Data API SMS <i class="fa fa-plus"></i></a>
        </div>
    </div>
</section>



<!-- Modal Edit Data Desa -->
<div class="modal fade" id="modal_data_api" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Tambah Data SMS API</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'data_api_form','class'=>'form-horizontal'));?>
      <div class="modal-body form">
                <!-- <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Desa</label>
                        <div class="col-sm-8">
                            <select name="desa_id" class="form-control select2" style="width:100%;" id="">
                            <?php 
                                //foreach ($desa_id as $desa_id) {
                               //     echo "<option value='".$desa_id->id."'>".$desa_id->nama_desa."</option>";
                                //}
                                ?>
                            </select>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">URL API </label>
                        <div class="col-sm-8">
                            <input type="text" name="url" value="" class="form-control"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">User Key</label>
                        <div class="col-sm-8">
                            <input type="text" name="user" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Pass Key</label>
                        <div class="col-sm-8">
                            <input type="text" name="pass" class="form-control">
                        </div>
                    </div>
               
      </div>
      <input type="hidden" name="api_id" value="">      
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" onclick="save_data_api()">Save <i class="fa fa-save"></i></button>
      </div>
    </div> 
  </div> 
</div>