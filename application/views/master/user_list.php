<section class="content-header">
  <h1>
    Data User
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User</li>
  </ol>
</section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">List User </h3>
        <p>Keterangan : <i class="fa fa-circle-o text-red"></i> Pemegang Kebijakan | <i class="fa fa-circle-o text-green"></i> Operator</p>
      </div><!-- /.box-header -->
      <div class="box-body">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#user_list" data-toggle="tab">List User</a></li>
          <li><a href="#post_user" data-toggle="tab">Posting User</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="user_list">
          <!-- User Tab -->
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-user">
          <thead>
            <tr valign="center" align="center">
              <td>#</td>
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
              <td>".$type."</td>
              <td align='center'>".$user->uid."</td>
              <td>".$user->fullname."</td>
              <td align='center'>".$user->jabatan."<br>DESA ".$user->nama_desa."</td>
              <td>".$user->hp."</td>
              <td>".mdate('%d %M %Y - %h:%i %a', $user->time)."</td>";
            echo "<td align='center'>";
            echo "<a class='btn btn-xs btn-success' href='".BASE_URL."user/lihat/$user->id'>
                <i class='fa fa-eye fa-fw'></i>
              </a>
              <a class='btn btn-xs btn-warning btn-circle' href='".BASE_URL."user/edit/$user->id'>
                <i class='fa fa-edit fa-fw'></i>
              </a>
              </td>
            </tr>";
            } ?>
          </tbody>
        </table>
          </div>
          <div class="tab-pane" id="post_user">
            <!-- Post User Tab -->
            <?php echo form_open(); ?>
            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
              <label for="">UID</label>
              <input type="text" name="uid" class="form-control" >
            </div>
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="fullname" class="form-control" >
            </div>
            <div class="form-group">
              <label for="">Kontak User (HP)</label>
              <input type="text" name="hp" class="form-control" >
            </div>
            <div class="form-group">
                <label for="">Jabatan</label>
                <select name="jabatan_id" class="form-control">
                  <?php foreach ($jabatan as $jabatan) {
                      echo "<option value='$jabatan->id'>$jabatan->jabatan</option>";
                  } ?>
                </select>
             </div>
             <div class="form-group">
             <label for="">Desa</label>
              <select name="desa_id" class="form-control">
                <?php foreach ($desa as $desa) {
                    echo "<option value='$desa->id'>$desa->nama_desa</option>";
                } ?>
              </select>
             </div>
             </div>
             <div class="col-md-6">
             <div class="form-group">
             <label for="">Password</label>
             <input type="password" name="pass" class="form-control">           
            </div>
            <div class="form-group">
              <label for="">Ulangi Password</label>
              <input type="password" name="passConfirm" class="form-control">           
             </div>
            </div>
            </div>
           <button type="submit" class="btn btn-success btn-flat" name="tambah">Simpan User <i class="fa fa-save"></i></button>
          <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>
</section>