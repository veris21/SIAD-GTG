<div class="container">
<?php echo form_open(); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
            <div class="panel-body">
              <h3 class="heading text-center"><img src="<?php echo BASE_URL.'assets/logo-beltim.png' ?>"  class="img img-rounded text-center" width="50%" alt="" ><br><br> Sistem Informasi Administrasi Desa
              </h3>
                <?php echo form_open(); ?>
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="User Unique ID" name="user_uid" type="text" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="user_pass" type="password" >
                        </div>
                        <button type="submit" name="login" class="btn btn-lg btn-success btn-block">Masuk</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</form>
</div>
