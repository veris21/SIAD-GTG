<?php echo form_open('',array('id'=>'auth')); ?>
<div class="login-box">

  <div class="login-logo">
    <img class="img img-logo" src="<?php echo base_url().'assets/new-logo.png'; ?>" alt="www.si-desa.id" width="120"><br>
    <a href="<?php echo base_url().'public';?>">Si<b>Desa Gantung</b></a>
  </div>
  
  <div class="login-box-body"> 
    <center id="overlay">
      <img width="70%" class="img img-responsive" src="<?php echo base_url('assets/nyapu.gif'); ?>" alt="loader">
    </center>
  <div class="auth-form">
    <p class="login-box-msg">Silahkan Login Dengan ID &amp; Password Untuk Masuk kedalam Sistem</p>
    <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="user ID" name="uid">
        <span id="loader" class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <a onclick="validate()" name="login" class="btn btn-primary btn-block btn-flat">Log In</a>
        </div><!-- /.col -->
      </div>
  </div>    
  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</form>
 