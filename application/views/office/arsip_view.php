<section class="content-header">
  <h1>
    Arsip Viewer
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Arsip Viewer</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-5">
          <div class="box box-info">
            <div class="box-body">
          <table class="table table-borderless">
            <tr>
              <td><b>Pengirim</b></td>
              <td><?php echo $arsip_surat['surat_pengirim']; ?></td>
            </tr>
            <tr>
              <td><b>Nomor</b></td>
              <td><?php echo $arsip_surat['nomor']; ?></td>
            </tr>
            <tr>
              <td><b>Tanggal</b></td>
              <td><i><?php echo $arsip_surat['surat_tgl']; ?></i></td>
            </tr>
            <tr>
              <td><b>Perihal</b></td>
              <td ><i><?php echo $arsip_surat['surat_perihal']; ?></i></td>
            </tr>
            <tr>
              <td colspan="2"></td>
            </tr>
            <tr>
              <td><b>Penerima</b></td>
              <td>  <?php echo $arsip_surat['surat_penerima']; ?></td>
            </tr>
            <tr>
              <td><b>Tanggal Terima</b></td>
              <td>  <?php echo $arsip_surat['surat_tgl_terima']; ?></td>
            </tr>
            <tr>
              <td colspan="2">
              <?php  if ($arsip_surat['surat_disposisi_type']==1) {
                echo "<button class='btn btn-flat btn-block btn-success'>Telah di Disposisikan</button><br>";
                }else {
                echo "<button class='btn btn-flat btn-block btn-warning'>Belum di Disposisikan</button>";
              }?>
              </td>
            </tr>
          </table>
        </div>
        <div class="box-footer">
          <button type="button" name="cetakArsip" class="btn btn-flat btn-primary">Cetak Ulang</button>
          <button type="button" name="downloadArsip" class="btn btn-flat btn-info">Download Arsip</button>
        </div>
          </div>
        </div>

        <div class="col-md-7">
          <img class="img img-rounded" width="100%" src="<?php echo UPLOADER.'arsip/'.$arsip_surat['surat_path_scan'];?>" alt="">
        </div>
  </div>
</section>
