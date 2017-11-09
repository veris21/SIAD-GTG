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
  <div class="box box-info">
    <div class="box-header">

    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-5">
          <table class="table table-borderless">
            <tr>
              <td><b>Pengirim</b></td>
              <td>: <?php echo $arsip_surat['surat_pengirim']; ?></td>
            </tr>
            <tr>
              <td><b>Nomor</b></td>
              <td>: <?php echo $arsip_surat['nomor']; ?>/<i><?php echo $arsip_surat['surat_tgl']; ?></i></td>
            </tr>
            <tr>
              <td><b>Perihal</b></td>
              <td align="left">:</td>
            </tr>
            <tr>
              <td colspan="2"><b><i><?php echo $arsip_surat['surat_perihal']; ?></i></b></td>
            </tr>
            <tr>
              <td colspan="2"></td>
            </tr>
            <tr>
              <td><b>Penerima</b></td>
              <td>:  <?php echo $arsip_surat['surat_penerima']; ?></td>
            </tr>
            <tr>
              <td><b>Tanggal Terima</b></td>
              <td>:  <?php echo $arsip_surat['surat_tgl_terima']; ?></td>
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
        <div class="col-md-7">
          <img class="img img-rounded" width="100%" src="<?php echo UPLOADER.'arsip/'.$arsip_surat['surat_path_scan'];?>" alt="">
        </div>
      </div>
    </div>
    <div class="box-footer">

    </div>
  </div>
</section>
