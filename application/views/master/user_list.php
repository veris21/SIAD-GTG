<section class="content-header">
  <h1>
    Data User
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User List</li>
  </ol>
</section>
<section class="content">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">List User </h3>
        
      </div><!-- /.box-header -->
      <div class="box-body">      
          <!-- User Tab -->
          <table width="100%" class="table table-striped table-bordered table-hover" id="list-user">
          <thead>
            <tr valign="center" align="center">
              <td>UID</td>
              <td>Nama</td>
              <td>Jabatan</td>
              <td>Kontak</td>
              <td>Last Login</td>
              <td>Status</td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($user_list as $user) {
            $type = ($user->type==1 ? '<b><i class="fa fa-circle-o text-red"></i></b>':'<b><i class="fa fa-circle-o text-green"></i></b>');
            echo "
            <tr>
              <td align='center'>".$user->uid."</td>
              <td>".$user->fullname."<br>".$user->keterangan_jabatan."</td>
              <td align='center'>".$user->jabatan."<br>DESA ".$user->nama_desa."</td>
              <td>".$user->hp."</td>
              <td>".mdate('%d %M %Y - %h:%i %a', $user->time)."</td>";
            echo "<td align='center'>";
            echo "<a class='btn btn-xs btn-success' href='".BASE_URL."user/lihat/$user->id'>
                <i class='fa fa-eye fa-fw'></i>
              </a>
              <a class='btn btn-xs btn-warning btn-circle' onclick='edit_user(".$user->id.")'>
                <i class='fa fa-edit fa-fw'></i>
              </a>
              <a class='btn btn-xs btn-danger btn-circle' onclick='delete_user(".$user->id.")'>
              <i class='fa fa-trash'></i>
            </a>
              </td>
            </tr>";
            } ?>
          </tbody>
        </table>
        <button onclick="add_user()" class="btn btn-flat btn-sm btn-success">Tambah User <i class="fa fa-user"></i></button>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
</section>

   <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_user" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">User Data</h3>
      </div>
      <div class="modal-body form">
        <?php echo form_open('#',array('class'=>'form-horizontal', 'id'=>'user_data'));?>
          <input type="hidden" name="id" value="">

          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">User ID</label>
              <div class="col-md-9">
                <input type="text" name="uid" placeholder="user id" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama Lengkap</label>
              <div class="col-md-9">              
                <input type="text" name="fullname" class="form-control" >
              </div>
            </div>
            <div class="form-group" id="desa">
              <label class="control-label col-md-3">Desa</label>
              <div class="col-md-9">              
              <select name="desa_id" class="form-control">
                <?php foreach ($desa as $desa) {
                    echo "<option value='$desa->id'>$desa->nama_desa</option>";
                } ?>
              </select>
              </div>
            </div>
            <div class="form-group" id="jabatan">
              <label class="control-label col-md-3">Jabatan</label>
              <div class="col-md-9">              
              <select name="jabatan_id" class="form-control">
                  <?php foreach ($jabatan as $jabatan) {
                      echo "<option value='$jabatan->id'>$jabatan->jabatan</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Keterangan Jabatan</label>
              <div class="col-md-9">              
                <input type="text" name="keterangan_jabatan" class="form-control" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Kontak</label>
              <div class="col-md-9">              
                <input type="text" name="hp" class="form-control" >
              </div>
            </div>
            <div  id="password">
                <div class="form-group">
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-9">              
                    <input type="password" name="pass" class="form-control" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Ulangi Password</label>
                  <div class="col-md-9">              
                    <input type="password" name="passConfirm" class="form-control" >
                  </div>
                </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <div class="pull-right">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" id="btnSave" onclick="save_user()" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
              </div>           
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->