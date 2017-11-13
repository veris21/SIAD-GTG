<section class="content-header">
  <h1>
    Detail User
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User Aplikasi</li>
  </ol>
</section>
<section class="content">
<?php echo form_open_multipart(); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-body">
        <div class="row">
          <div class="col-md-4">
            <?php $img = ($user['avatar']!='' || $user['avatar']!= NULL ? $user['img'] : 'logo-gtg.png'); ?>
            <div class="box box-warning">
              <div class="box-body">
                <img class="img img-rounded" width="100%" src="<?php echo UPLOADER.'avatar/'.$img; ?>" alt="">
              </div>
              <div class="box-footer">
                <input type="file" name="avatar" class="form-control">
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <table class="table table-bordderless">
              <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" class="form-control" name="user_fullname" value="<?php echo $user['user_fullname']; ?>" ></td>
              </tr>
              <tr>
                <td>UID</td>
                <td><input type="text" class="form-control" name="user_uid" value="<?php echo $user['user_uid']; ?>" ></td>
              </tr>
              <tr>
                <td>Desa</td>
                <td><input type="text" class="form-control" name="desa_uid" value="<?php echo $user['desa_uid']; ?>" ></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><input type="text" class="form-control" name="user_status" value="<?php echo $user['user_status']; ?>"></td>
              </tr>
              <tr>
                <td>NIP</td>
                <td>
                  <?php $nip = ($user['user_nip'] != NULL || $user['user_nip'] != '' ? 'value="'.$user['user_nip'].'"' : 'value="NULL" disabled');?>
                  <input type="text" name="nip" class="form-control" <?php echo $nip; ?>>
                </td>
              </tr>
              <tr>
                <td>Kontak</td>
                <td><input type="text" class="form-control" name="hp" value="<?php echo $user['hp']; ?>"></td>
              </tr>
              <tr>
                <td>Rule Access</td>
                <td>
                  <select class="form-control" name="type">
                    <?php
                    switch ($user['type']) {
                      case 1:
                      echo "<option value='1'>Pemegang Jabatan</option>";
                      echo "<option value='2'>Operator Umum</option>";
                      echo "<option value='3'>Petugas Layanan Tanah</option>";
                        break;
                      case 2:
                      echo "<option value='2'>Operator Umum</option>";
                      echo "<option value='1'>Pemegang Jabatan</option>";
                      echo "<option value='3'>Petugas Layanan Tanah</option>";
                        break;
                      case 3:
                      echo "<option value='3'>Petugas Layanan Tanah</option>";
                      echo "<option value='1'>Pemegang Jabatan</option>";
                      echo "<option value='2'>Operator Umum</option>";
                        break;
                    }
                     ?>
                  </select>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div><!-- /.box-body -->
      <div class="box-footer">
          <a href="<?php echo BASE_URL.'user/lihat/'.$user['id']; ?>" class="btn btn-flat btn-warning" >Return <i class="fa fa-edit fa-fw"></i></a>
          <span class="pull-right">
          <button type="submit" name="simpan" class="btn btn-flat btn-info" >Simpan Data User<i class="fa fa-edit fa-fw"></i></button>
          </span>
      </div>
    </div><!-- /.box -->
  </div>
</div>
</form>
</section>
