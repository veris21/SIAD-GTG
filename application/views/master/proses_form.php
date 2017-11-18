<section class="content-header">
  <h1>
    Detail Proses
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Fast Proses</li>
  </ol>
</section>
<section class="content">
    <div class="box box-info">
      <div class="box-body">
        <table style="font-size:11px;" width="100%" class="table table-striped table-borderless table-hover" >
          <tr>
            <td colspan="5" align="center">
              <h3>No KK <?php echo $data['no_kk']; ?></h3>
              <h4><b>No NIK <?php echo $data['no_nik']; ?></b></h4>
            </td>
          </tr>
          <tr>
            <td align="right">Nama Lengkap</td>
            <td>: <b><?php echo $data['nama']; ?></b><td>
            <td align="right">Pendidikan Terakhir</td>
            <td>: <b><?php echo $data['pddk_akhir']; ?></b><td>
          </tr>
          <tr>
            <td align="right">TTL</td>
            <td>: <b><?php echo $data['tempat_lahir'].", ".$data['tanggal_lahir']; ?></b><td>
            <td align="right">Status Dalam Keluarga</td>
            <td>: <b><?php echo $data['shdk']; ?></b><td>
          </tr>
          <tr>
            <td align="right">Agama</td>
            <td>: <b><?php echo $data['agama']; ?></b><td>
            <td align="right">Pekerjaan</td>
            <td>: <b><?php echo $data['pekerjaan']; ?></b><td>
          </tr>
          <tr>
            <td align="right">Status Perkawinan</td>
            <td>: <b><?php echo $data['status']; ?></b><td>
            <td align="right">Jumlah Anggota Keluarga</td>
            <td>: <b><?php echo $data['shdrt']; ?> Orang</b><td>
          </tr>
          <tr>
            <td align="right">Alamat</td>
            <td>: <b><?php echo $data['alamat']; ?></b><td>
            <td align="right">Dusun</td>
            <td>: <b><?php echo $data['dusun']; ?></b><td>
          </tr>
          <tr>
            <td align="right">Desa</td>
            <td>: <b><?php $desa = $this->db->get_where('sig_desa', array('id'=>$data['id_desa']))->row_array(); echo $desa['desa_nama']; ?></b><td>
            <td align="right">RT</td>
            <td>: <b><?php echo $data['no_rt']; ?></b><td>
          </tr>

        </table>
      </div>
      <div class="box-footer">
        <div class="pull-right">
          <?php if ($this->session->userdata('type')==3): ?>
            <a class="btn btn-flat btn-info btn-sm" href="<?php echo BASE_URL.'permohonan/input/'.$data['id'];?>">Permohonan Tanah</a>
          <?php endif; ?>
          <?php if ($this->session->userdata('type')==1||$this->session->userdata('type')==2): ?>
            <a class="btn btn-flat btn-info btn-sm" href="<?php echo BASE_URL.'surat/pernyataan/'.$data['id'];?>">Surat Pernyataan</a>
            <a class="btn btn-flat btn-warning btn-sm" href="<?php echo BASE_URL.'surat/keterangan/'.$data['id'];?>">Surat Keterangan</a>
            <a class="btn btn-flat btn-success btn-sm" href="<?php echo BASE_URL.'surat/pengantar'.$data['id'];?>">Surat Pengantar</a>
          <?php endif; ?>
          <?php if ($this->session->userdata('type')==99): ?>
            <a class="btn btn-flat btn-info btn-sm" href="<?php echo BASE_URL.''.$data['id'];?>">Permohonan Tanah</a>
            <a class="btn btn-flat btn-warning btn-sm" href="<?php echo BASE_URL.''.$data['id'];?>">Keterangan Tidak Mampu</a>
            <a class="btn btn-flat btn-success btn-sm" href="<?php echo BASE_URL.''.$data['id'];?>">Surat Pengantar</a>
          <?php endif; ?>
        </div>
      </div>
    </div><!-- /.box -->
</section>
