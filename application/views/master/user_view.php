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
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
        <?php
        $type = ($user['type']==1 ? '<b><i class="fa fa-circle-o text-red"></i> Pemegang Jabatan</b>':'<b><i class="fa fa-circle-o text-green"></i> Operator</b>');
        ?>
      <div class="box-body">
        <div class="row">
          <div class="col-md-3">
            <?php $img = ($user['avatar']!='' || $user['avatar'] != NULL ? $user['avatar'] : 'logo-gtg.png'); ?>
            <div class="box box-green">
              <div class="box-body">
                <img class="img img-rounded" width="100%" src="<?php echo UPLOADER.'avatar/'.$img; ?>" alt="">
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <table class="table table-bordderless">
              <tr>
                <td>Nama Lengkap</td>
                <td>: <?php echo $user['user_fullname']; ?></td>
              </tr>
              <tr>
                <td>UID</td>
                <td>: <b><?php echo $user['user_uid']; ?></b></td>
              </tr>
              <tr>
                <td>Pass Hashing Val (SHA1)</td>
                <td>: <i><?php echo $user['user_pass']; ?></i></td>
              </tr>
              <tr>
                <td>Desa</td>
                <td>: <b><?php echo $user['desa_uid']; ?></b></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td>: <?php echo $user['user_status']; ?></td>
              </tr>
              <tr>
                <td>NIP</td>
                <td>: <?php $nip = ($user['user_nip']!=NULL ? $user['user_nip'] : '<b><i>NO DATA</i></b>' ); echo $nip;?></td>
              </tr>
              <tr>
                <td>Kontak</td>
                <td>: <?php echo $user['hp']; ?></td>
              </tr>
              <tr>
                <td>Rule Access</td>
                <td>: <?php echo $type; ?></td>
              </tr>
              <tr>
                <td>Last Login</td>
                <td>: <?php echo $user['last_login']; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div><!-- /.box-body -->
      <div class="box-footer">
          <a class="btn btn-flat btn-warning" href="<?php echo BASE_URL.'master/user'; ?>">Return <i class="fa fa-edit fa-fw"></i></a>
          <span class="pull-right">
            <a class="btn btn-flat btn-info" href="<?php echo BASE_URL.'user/edit/'.$user['id']; ?>">Edit Data User<i class="fa fa-edit fa-fw"></i></a>
          </span>
      </div>
    </div><!-- /.box -->
  </div>
</div>
</section>
