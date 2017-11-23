<section class="content-header">
  <h1>
    Setting Akun
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Setting</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-4">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="img-responsive img img-rounded" src="<?php echo UPLOADER.'avatar/'.$user['avatar']; ?> " alt="User profile picture">
          <h4 class="profile-username text-center"><?php echo $user['user_fullname']; ?></h4>
          <p class="text-muted text-center"><?php echo $user['user_status']; ?></p>
          <p class="text-center">Terakhir Login : <?php echo $user['last_login']; ?></p>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <?php echo form_open_multipart(); ?>
          <div class="form-group">
            <div class="btn btn-default btn-file">
              <i class="fa fa-paperclip"></i> File Foto Profile
              <input type="file" name="avatar">
            </div>
          </div>
          <button type="submit" name="fotoUpdate" class="btn btn-sm btn-flat btn-warning btn-block">Update Profile</button>
          </form>
        </div>
      </div><!-- /.box -->

    </div><!-- /.col -->
    <div class="col-md-8">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
          <li><a href="#datauser" data-toggle="tab">Profile</a></li>
          <li><a href="#settings" data-toggle="tab">Ganti Password</a></li>
        </ul>
        <div class="tab-content">

          <div class="active tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <?php if ($item!=''||$item!=NULL): ?>
              <?php foreach ($item as $item): ?>
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-purple">
                  <?php echo $item->disposisi_tgl; ?>
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-envelope bg-aqua"></i>
                <div class="timeline-item">
                  <span class="time">
                    <?php if ($item->status==0): ?>
                      <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-bell"></i> Notifikasi Baru belum dibaca!
                      </div>
                      <?php if ($item->is_type==0): ?>
                        <div class="alert alert-danger alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon fa fa-bell"></i> Perintah Langsung!
                        </div>
                      <?php endif; ?>
                    <?php endif; ?>
                  </span>
                  <h3 class="timeline-header"><b><?php echo $item->dari."</b> <i>( ".$item->dari_status." )</i>"; ?></h3>
                  <div class="timeline-body">
                        <ul>
                          <li>Pengirim : <?php echo $item->surat_pengirim; ?> </li>
                          <!-- <li>Nomor : <?php echo $item->nomor; ?>/<?php echo $item->surat_tgl; ?>  </li> -->
                          <li>Perihal : <?php echo $item->surat_perihal; ?> </li>
                        </ul>
                        <!-- <blockquote>Memo :<small> <?php echo $item->memo; ?></small></blockquote> -->
                  </div>
                  <div class="timeline-footer">
                      <a href="<?php echo BASE_URL.'timeline/details/'.$item->id; ?>" class="btn btn-info btn-sm">Lihat Detail</a>
                      <?php if ($item->status==1): ?>
                        <a disabled class="btn btn-success btn-sm">Telah Dibaca <i class="fa fa-eye fa-fw"></i></a>
                      <?php endif; ?>
                  </div>
                </div>
              </li>
              <?php endforeach; ?>
              <?php endif; ?>
              <!-- END timeline item -->
            </ul>
          </div><!-- /.tab-pane -->

          <div class="tab-pane" id="settings">
            <?php echo form_open('','class="form-horizontal"'); ?>
              <div class="form-group">
                <label for="inputL" class="col-sm-4 control-label">Password Lama</label>
                <div class="col-sm-8">
                  <input id="inputL" type="password"  class="form-control" name="passwordLama">
                </div>
              </div>
              <div class="form-group">
                <label for="inputB1" class="col-sm-4 control-label">Password Baru</label>
                <div class="col-sm-8">
                  <input id="inputB1" type="password"  class="form-control" name="passwordBaru">
                </div>
              </div>
              <div class="form-group">
                <label for="inputB2"  class="col-sm-4 control-label">Ulangi Password</label>
                <div class="col-sm-8">
                  <input id="inputB2" type="password" class="form-control" name="passwordBaru2">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" name="gantiPassword" class="btn btn-flat btn-sm btn-danger">Ganti Password <i class="fa fa-ban"></i></button>
              </div>
              </div>
            </form>
          </div><!-- /.tab-pane -->

          <div class="tab-pane" id="datauser">
            <?php echo form_open_multipart('','class="form-horizontal"'); ?>
            <div class="form-group">
              <label  class="col-sm-4 control-label" for="inputNama">Nama Lengkap </label>
              <div class="col-sm-8">
                <input id="inputNama" class="form-control" type="text" name="user_fullname" value="<?php echo $user['user_fullname']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-4 control-label" for="inputKontak">Kontak </label>
              <div class="col-sm-8">
                <input id="inputKontak" class="form-control" type="text" name="hp" value="<?php echo $user['hp']; ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-8">
                <button onclick="return confirmDialog();" type="submit" name="updateProfile" class="btn btn-danger btn-flat btn-sm confirm_update">Update Profile <i class="fa fa-ban"></i></button>
              </div>
            </div>
            </form>
          </div><!-- /.tab-pane -->

        </div><!-- /.tab-content -->
      </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->
  </div><!-- /.row -->

</section><!-- /.content -->

<script>
function confirmDialog() {
 return swal('Selamat!', 'Data Berhasil Diupdate!', 'success');
}
</script>
