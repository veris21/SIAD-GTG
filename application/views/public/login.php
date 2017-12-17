<?php echo form_open(); ?>
<div class="login-box">
  <div class="login-logo">
    <img class="img img-logo" src="<?php echo BASE_URL.'assets/new-logo.png'; ?>" alt="" width="120"><br>
    <a href="<?php echo BASE_URL.'public';?>">Si<b>Desa Gantung</b></a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <?php if($this->session->flashdata('error')!=''){?>
    <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fa fa-ban"></i> Maaf! <?php echo $this->session->flashdata('error');?></p>    
    </div>
    <?php }?>
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
