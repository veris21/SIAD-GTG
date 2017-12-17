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
                <dt>Kasi Pemerintahan &amp; Pertanahan</dt>
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
                <table class="table  table-responsive" >
                    <thead>
                        <tr>
                            <th>Dusun</th>
                            <th>Kepala Dusun</th>
                            <th>Kontak</th>
                            <th>Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>                 
                </table>
                <table class="table table-responsive" >
                    <thead>
                        <tr>
                            <th>Dusun</th>
                            <th>No. RT</th>
                            <th>Kepala RT</th>
                            <th>Kontak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>                   
                </table>
            </div>
        </div>
        </div>
    </div>
    
</section>

<!-- Modal Edit Disposisi -->
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
                            echo "<option></option>";
                            ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Sekretaris Desa</label>
                        <div class="col-sm-8">
                            <select style='width: 100%;'  class="form-control select2" name="sekretaris_desa">
                            <?php 
                            echo "<option></option>";
                            ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Kasi Pertanahan</label>
                        <div class="col-sm-8">
                            <select  style='width: 100%;'  class="form-control select2" name="kasi_pertanahan_desa">
                            <?php 
                            echo "<option></option>";
                            ?>
                            </select> 
                        </div>
                    </div>
      </div>
      <input type="hidden" name="desa_id" value="<?php echo $data['id'];?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="save_edit_data_desa()" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
      </div>
    </form>
    </div> 
  </div> 
</div>