<section class="content-header">
  <h1>
    Data Klasifikasi Surat
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Klasifikasi Surat</li>
  </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#klasifikasi_surat" data-toggle="tab">Klasifikasi Surat</a></li>
          <li><a href="#input_klasifikasi" data-toggle="tab">Posting Kode Klasifikasi</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="klasifikasi_surat">
            <table width="100%" class="table table-striped table-bordered table-hover" id="table_klasifikasi_surat">
                <thead>
                <tr valign="center" align="center">
                    <td>Tipe</td>
                    <td>Kode Klasifikasi</td>
                    <td>Keterangan Klasifikasi</td>
                    <td>Pilihan</td>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($data as $data) {
                            echo "<tr valign='center'>";
                            echo "<td align='center'>".$data->tipe."</td>";
                            echo "<td align='center'>".$data->kode."</td>";
                            echo "<td align='left'>".$data->klasifikasi."</td>";
                            echo "<td align='center' width='70'>
                            <button class='btn btn-xs btn-flat btn-warning' onclick='edit_posting(".$data->id.")'><i class='glyphicon glyphicon-pencil'></i></button>
                            <button class='btn btn-xs btn-flat btn-danger' onclick='delete_posting(".$data->id.")'><i class='glyphicon glyphicon-trash'></i></button>
                            </td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody> 
            </table>
            </div>
            <div class="tab-pane" id="input_klasifikasi">
            <button class="btn btn-success" onclick="posting()"><i class="glyphicon glyphicon-plus"></i> Input Klasifikasi</button>
            </div>            
        </div> 
        </div>
        </div>
    </div>
</section>


    <!-- Bootstrap modal -->
<div class="modal fade" id="modal_klasifikasi" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Book Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="klasifikasi" class="form-horizontal">
        <input type="hidden" name="id" value="">
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Kode Klasifikasi Arsip</label>
              <div class="col-md-9">
                <input name="kode" placeholder="kode klasifikasi" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Keterangan Klasifikasi</label>
              <div class="col-md-9">
                <input name="klasifikasi" placeholder="klasifikasi" class="form-control" type="text">
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->