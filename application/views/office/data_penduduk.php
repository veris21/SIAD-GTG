<section class="content-header">
  <h1>
    Data Kependudukan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Penduduk</li>
  </ol>
</section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Rekap Data KK &amp; NIK </h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table width="100%" style="font-size:11px;" class="table table-striped table-bordered table-hover" id="dataTables-data">
          <thead>
            <tr align="center">
              <td>No. KK</td>
              <td>No. NIK</td>
              <td>Nama</td>
              <td>Alamat</td>
              <td>Dusun</td>
              <td>Pilihan</td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($data_penduduk->result() as $penduduk) {
            echo "
            <tr>
              <td>".$penduduk->no_kk."</td>
              <td>".$penduduk->no_nik."</td>
              <td>".$penduduk->nama."</td>
              <td>".$penduduk->alamat."</td>
              <td>".$penduduk->dusun."</td>
              <td align='center'>
                <a class='btn btn-flat btn-success btn-xs' href='#'>
                  <i class='fa fa-eye fa-fw'></i>
                </a>
                <a class='btn btn-flat btn-primary btn-xs' href='#'>
                  <i class='fa fa-edit fa-fw'></i>
                </a>
              </td>
            </tr>";
            } ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
      <?php if ($this->session->userdata('type') == 2): ?>
        <div class="box-footer">
          <div class="pull-right">
            <a class="btn btn-sm btn-flat btn-success" href="<?php echo BASE_URL.'input/data_penduduk'; ?>">Input Data Penduduk <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
      <?php endif; ?>
    </div><!-- /.box -->
    <?php if ($this->session->userdata('type')==99) {
    ?>
    <div class="box box-warning">
      <div class="box-header">
        Import Data KK (Pastikan Data dalam format .xls atau .xlsx)
      </div>
      <div class="box-body">
        <?php echo form_open_multipart(); ?>
        <div class="input-group input-group-sm">
          <input type="file" name="import_xls" class="form-group">
          <span class="input-group-btn">
            <button type="submit" name="import" class="btn btn-info btn-flat">Import !!!</button>
          </span>
        </div>
      </form>
      </div>
    </div>
    <?php
    } ?>
  </div>
</div>
</section>
