<section class="content-header">
  <h1>
    Setting
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User</li>
  </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Setting <i class="fa fa-gear"></i></h3>
        </div>
        <div class="box-body">
           <div class="row">
               <div class="col-md-8">
                    <table width="100%" class="table table-striped table-responsive">
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>: <?php echo $this->session->userdata('fullname');?></td>
                            </tr>
                            <tr>
                                <td>Desa</td>
                                <td>: <?php 
                                $des = $this->master_model->_get_desa_id($this->session->userdata('desa_id'))->row_array();
                                echo "Desa ".$des['nama_desa']." Kecamatan ".$des['nama_kecamatan']." Kabupaten ".$des['nama_kabupaten'] ;?></td>
                            </tr>
                            <tr>
                                <td>Keterangan Jabatan </td>
                                <td>: <?php echo $this->session->userdata('keterangan_jabatan');?></td>
                            </tr>
                            <tr>
                                <td>Kontak Aktif</td>
                                <td>: <?php echo $this->session->userdata('hp');?></td>
                            </tr>
                            <tr>
                                <td>Last Login</td>
                                <td>: <?php echo mdate("%d %M %Y - %H:%i %a", $this->session->userdata('last_login'));?></td>
                            </tr>
                            <tr>
                                <td>Setting</td>
                                <td>
                                    <button class="btn btn-warning" onclick="ganti_password_one(<?php echo $this->session->userdata('id');?>)">Ganti Password <i class="fa fa-lock"></i></button>
                                    <button class="btn btn-success" onclick="edit_user_one(<?php echo $this->session->userdata('id');?>)">Edit Profil <i class="fa fa-user"></i></button>
                                </td>
                            </tr>
                    </table>
               </div>
               <div class="col-md-4">
                    <div class="well">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum vitae cum corrupti ratione eos fugit. Modi reprehenderit dolorum repellendus beatae delectus veniam voluptate quasi est. Nam dolore cum quo officia.</p>
                    </div>
               </div>
           </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <!-- <button class="btn-success"></button> -->
            </div>
        </div>
    </div>
</section>
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_setting_user" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">User Data</h3>
      </div>
      <div class="modal-body form">
        <?php echo form_open('#',array('class'=>'form-horizontal', 'id'=>'setting_user'));?>
          <input type="hidden" name="id" value="">

          <div class="form-body">

            <div class="form-group" id="set_uid">
              <label class="control-label col-md-3">User ID</label>
              <div class="col-md-9">
                <input type="text" name="uid" class="form-control">
              </div>
            </div>

            <div class="form-group" id="set_nama">
              <label class="control-label col-md-3">Nama Lengkap</label>
              <div class="col-md-9">              
                <input type="text" class="form-control" >
              </div>
            </div>
            
            <div class="form-group" id="set_keterangan">
              <label class="control-label col-md-3">Keterangan Jabatan</label>
              <div class="col-md-9">              
                <input type="text" name="keterangan_jabatan" class="form-control" >
              </div>
            </div>

            <div class="form-group"  id="set_hp">
              <label class="control-label col-md-3">Kontak</label>
              <div class="col-md-9">              
                <input type="text" name="hp" class="form-control" >
              </div>
            </div>

            <div  id="password">

                <div class="form-group">
                  <label class="control-label col-md-3">Password Baru</label>
                  <div class="col-md-9">              
                    <input type="password" name="pass" class="form-control" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3">Ulangi Password</label>
                  <div class="col-md-9">              
                    <input type="password" name="passConfirm" class="form-control" onkeyup="validate_setting_pass()">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3">*</label>
                  <div class="col-md-9">              
                    <p id="notif"></p>
                  </div>
                </div>
            </div>

            <div class="form-group"  id="set_otp">
              <label class="control-label col-md-3">OTP (One Time Password)</label>
              <div class="col-md-9">              
                <input type="text" name="otp" class="form-control" >
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <div class="pull-right">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" id="btnSave" onclick="save_setting_one()" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
              </div>           
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->