<section class="content-header">
  <h1>
    Data Arsip Surat Masuk
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Arsip Surat Masuk</li>
  </ol>
</section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Rekap Data Arsip </h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table style="font-size:11px;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-arsip">
          <thead>
            <tr valign="center" align="center">
              <td>Tanggal Terima</td>
              <td>Nomor Surat/ Tanggal Surat</td>
              <td>Pengirim</td>
              <td>Perihal</td>
              <td>Status</td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($arsip_surat->result() as $arsip) {
            echo "
            <tr>
              <td>".$arsip->surat_tgl_terima."</td>
              <td>".$arsip->nomor."/ tanggal ".$arsip->surat_tgl."</td>
              <td>".$arsip->surat_pengirim."</td>
              <td>".$arsip->surat_perihal."</td>";
            echo "<td align='center'>";
            echo "<a class='btn btn-xs btn-success' href='".BASE_URL."arsip/lihat/$arsip->id'>
                <i class='fa fa-eye fa-fw'></i>
              </a>
              <a class='btn btn-xs btn-warning' href='".BASE_URL."arsip/edit/$arsip->id'>
                <i class='fa fa-edit fa-fw'></i>
              </a>
              </td>
            </tr>";
            } ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
      <div class="box-footer">
          <a href="<?php echo BASE_URL.'arsip/input'; ?>" class="btn btn-flat btn-success pull-right">Input Data Arsip</a>
      </div>
    </div><!-- /.box -->
  </div>
</div>
</section>
