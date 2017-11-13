<section class="content-header">
  <h1>
    Data Master User
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
      <div class="box-header">
        <h3 class="box-title">List User </h3>
        <p>Keterangan : <i class="fa fa-circle-o text-red"></i> Pemegang Kebijakan | <i class="fa fa-circle-o text-green"></i> Operator</p>
      </div><!-- /.box-header -->
      <div class="box-body">
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
              <td align='center'>".$user->user_uid."</td>
              <td>".$user->user_fullname."</td>
              <td align='center'>".$user->user_status."</td>
              <td>".$user->hp."</td>
              <td>".$user->last_login."</td>";
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
      </div><!-- /.box-body -->
      <div class="box-footer">
          <a href="<?php echo BASE_URL.'user/input'; ?>" class="btn btn-flat btn-success pull-right">Input Data User</a>
      </div>
    </div><!-- /.box -->
  </div>
</div>
</section>
