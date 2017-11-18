<section class="content-header">
  <h1>
    SMS API
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">SMS Setting</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-body">
          <table class="table table-borderless">
            <tr>
              <td colspan="4"><?php echo ($data['status_option'] == 1 ? '<button class="btn btn-flat btn-block btn-success">SYSTEM AKTIF</button>' : '<button class="btn btn-flat btn-block btn-warning">SYSTEM NONAKTIF</button>'); ?></td>
            </tr>
            <tr>
              <td>User Key</td>
              <td>: <b><?php echo $data['userKey']; ?></b></td>
              <td>Pass Key</td>
              <td>: <b><?php echo $data['passKey']; ?></b></td>
            </tr>
            <tr>
              <td>URL</td>
              <td>: <b><?php echo $data['url']; ?></b></td>
              <td>API Kirim</td>
              <td>: <b><?php echo $data['kirim_api']; ?></b></td>
            </tr>
            <tr>
              <td>Kirim Group</td>
              <td>: <b><?php echo $data['kirim_group_api']; ?></b></td>
              <td>API Kirim Semua</td>
              <td>: <b><?php echo $data['kirim_semua_api']; ?></b></td>
            </tr>
            <tr>
              <td colspan="4">
                <?php if ($data['type']!='' || $data['type'] = NULL): ?>
                  <button class="btn btn-flat btn-primary" name="button"><?php echo $data['type']; ?></button>
                <?php endif; ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
