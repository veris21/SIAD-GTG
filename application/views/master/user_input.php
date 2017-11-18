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
            <div class="box box-warning">
              <div class="box-body">
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
                <td><input type="text" class="form-control" name="user_fullname" ></td>
              </tr>
              <tr>
                <td>Desa</td>
                <td>
                  <select class="form-control" name="desa_uid">
                    <?php
                    foreach ($desa as $desa) {
                      echo "<option value='$desa->id'>$desa->desa_nama</option>";
                    }
                     ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><input type="text" class="form-control" name="user_status" ></td>
              </tr>
              <tr>
                <td>NIP</td>
                <td>
                  <input type="text" name="nip" class="form-control">
                </td>
              </tr>
              <tr>
                <td>Kontak</td>
                <td><input type="text" class="form-control" name="hp"></td>
              </tr>
              <tr>
                <td>Rule Access</td>
                <td>
                  <select class="form-control" name="type">
                      <option value='1'>Pemegang Jabatan</option>
                      <option value='2'>Operator Umum</option>
                      <option value='3'>Petugas Layanan Tanah</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>UID</td>
                <td><input type="text" class="form-control" name="user_uid" ></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" name="user_pass" ></td>
              </tr>
              <tr>
                <td>Confirm Password</td>
                <td><input type="password" class="form-control" name="user_pass_confirm" ></td>
              </tr>
            </table>
          </div>
        </div>
      </div><!-- /.box-body -->
      <div class="box-footer">
          <button type="reset" name="reset" class="btn btn-flat btn-warning" >Reset</button>
          <span class="pull-right">
          <button type="submit" name="simpan" class="btn btn-flat btn-info" >Simpan Data User<i class="fa fa-edit fa-fw"></i></button>
          </span>
      </div>
    </div><!-- /.box -->
  </div>
</div>
</form>
</section>
