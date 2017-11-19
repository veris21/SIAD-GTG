<?php echo form_open(); ?>
<div class="login-box">
  <div class="login-logo">
    <img class="img img-logo" src="<?php echo BASE_URL.'assets/logo-gtg.png'; ?>" alt="" width="120"><br>
    <a href="#">Si<b>Desa Gantung</b></a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login Dengan ID &amp; Password Untuk Masuk kedalam Sistem</p>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="user ID" name="uid">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Log In</button>
        </div><!-- /.col -->
      </div>
  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</form>
