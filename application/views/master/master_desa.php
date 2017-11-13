<section class="content-header">
  <h1>
    Data Master Administrasi
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Master Administrasi</li>
  </ol>
</section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">List Desa </h3>
        <p>Keterangan : <i class="fa fa-circle-o text-red"></i> Block | <i class="fa fa-circle-o text-green"></i> Aktif | <i class="fa fa-circle-o text-warning"></i> Pending</p>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-mDesa">
          <thead>
            <tr valign="center" align="center">
              <td>Kecamatan UID</td>
              <td>Desa UID</td>
              <td>Nama Desa</td>
              <td>Alamat</td>
              <td>Pj UID</td>
              <td>Point Batas Desa</td>
              <td>Status</td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($desa as $desa) {
              # code...
            echo "<tr>";
            echo "<td>".$desa->kecamatan_uid."</td>";
            echo "<td>";
            ?>
            <a href="<?php echo BASE_URL.'desa/view/';?>">
            <?php
            echo $desa->desa_uid."</a></td>";
            echo "<td>".$desa->desa_nama."</td>";
            echo "<td>".$desa->desa_alamat."</td>";
            echo "<td>".$desa->desa_kepala_uid."</td>";
            echo "<td>".$desa->data_map_uid."</td>";
            echo "<td>".$desa->type."</td>";
            echo "</tr>";
          }
            ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
      <div class="box-footer">
          <a href="<?php echo BASE_URL.'desa/input'; ?>" class="btn btn-flat btn-success pull-right">Input Data Desa</a>
      </div>
    </div><!-- /.box -->


    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">List Kecamatan </h3>
        <p>Keterangan : <i class="fa fa-circle-o text-red"></i> Block | <i class="fa fa-circle-o text-green"></i> Aktif | <i class="fa fa-circle-o text-warning"></i> Pending</p>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-mKecamatan">
          <thead>
            <tr valign="center" align="center">
              <td>Kecamatan UID</td>
              <td>Nama Desa</td>
              <td>Alamat</td>
              <td>Pj UID</td>
              <td>Point Batas Kecamatan</td>
              <td>Status</td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($kecamatan as $kecamatan) {
              # code...
            echo "<tr>";
            echo "<td>";
            ?>
            <a href="<?php echo BASE_URL.'kecamatan/view/'.$kecamatan->id;?>"><?php echo $kecamatan->kecamatan_uid; ?></a>
            <?php
            echo "</td>";
            echo "<td>".$kecamatan->kecamatan_nama."</td>";
            echo "<td>".$kecamatan->kecamatan_alamat."</td>";
            echo "<td>".$kecamatan->kecamatan_kepala_uid."</td>";
            echo "<td>".$kecamatan->data_map_uid."</td>";
            echo "<td>".$kecamatan->type."</td>";
            echo "</tr>";
          }
            ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
      <div class="box-footer">
          <a href="<?php echo BASE_URL.'kecamatan/input'; ?>" class="btn btn-flat btn-success pull-right">Input Data Kecamatan</a>
      </div>
    </div><!-- /.box -->
  </div>
</div>
</section>
