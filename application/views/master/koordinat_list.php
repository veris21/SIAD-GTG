<section class="content-header">
  <h1>
    Master Data Koordinat
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Koordinat</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Visual Koordinat</h3>
        </div>
        <div class="box-body">
          <div class="well text-center">
            <h1>No Data</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Tabel Koordinat &amp; Keterangan Tanah</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-koordinat">
          <thead>
            <tr valign="center" align="center" style="font-weight:bolder;">
              <td>Keterangan</td>
              <td>Koordinat</td>
              <td>Luas</td>
              <td>#</td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($koordinat as $koordinat) {
              echo "<tr>";
              echo "<td><b>$koordinat->keterangan</b></td>";
              if ($koordinat->koordinat) {
                echo "<td>$koordinat->koordinat</td>";
                echo "<td>";

                echo ($koordinat->luas!=NULL || $koordinat->luas!='' ? "<b><i>".number_format($koordinat->luas, 0, ",", ".")."</i></b> meter<sup>2</sup>" : '<p  class="text-center"><i>Data Luas Tidak Ada !!!</i></p>');
                echo "</td>";
              }else {
                echo "<td align='center'>Data Koordinat Dan Dokumentasi<br> Belum Tersedia!!</td>";
                echo "<td><a class='btn btn-flat btn-danger' href='".BASE_URL."patok/input/".$koordinat->id."'>Lengkapi Data Batas <i class='fa fa-ban'></i></a></td>";
              }
              echo "<td width='60' align='center'>";
              ?>
              <a class="btn btn-xs btn-info" href="<?php echo BASE_URL.'maps/view/'.$koordinat->id; ?> "><i class="fa fa-eye fa-fw"></i></a>
              <a class="btn btn-xs btn-warning" href="<?php echo BASE_URL.'koordinat/edit/'.$koordinat->id; ?> "><i class="fa fa-edit fa-fw"></i></a>
              <?php
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
      <div class="box-footer">
          <a href="<?php echo BASE_URL.'koordinat/input'; ?>" class="btn btn-flat btn-success pull-right">Input Koordinat</a>
      </div>
    </div><!-- /.box -->
  </div>
</div>
</section>
