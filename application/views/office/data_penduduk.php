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
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-data">
          <thead>
            <tr align="center">
              <td>NIK</td>
              <td>Nama</td>
              <td>Nama/No.KK</td>
              <td>Alamat Lengkap</td>
              <td>Pilihan</td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($data_penduduk->result() as $penduduk) {
            echo "
            <tr>
              <td>".$penduduk->nik_no."</td>
              <td>".$penduduk->nik_nama."</td>
              <td>".$penduduk->kk_nama."<br>".$penduduk->kk_no."</td>
              <td>".$penduduk->alamat."</td>
              <td align='center'>
                <a class='btn btn-sm btn-success btn-circle' href='#'>
                  <i class='fa fa-eye fa-fw'></i>
                </a>
                <a class='btn btn-sm btn-primary btn-circle' href='#'>
                  <i class='fa fa-edit fa-fw'></i>
                </a>
              </td>
            </tr>";
            } ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
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
          <input type="file" name="import_kk_excel" class="form-group">
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
