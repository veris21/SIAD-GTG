<section class="content-header">
  <h1>
    Details Permohonan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Permohonan Layanan Tanah</li>
  </ol>
</section>
<section class="content">
  <div class="box box-info">
    <div class="box-body">
      <div class="row">
        <div class="col-md-3">
          <img class="img img-rounded" width="100%" src="<?php echo UPLOADER.'ktp/' ?>" alt="">
        </div>
        <div class="9">
          <table style="font-size:11px;" width="100%" class="table table-striped table-borderless table-hover" >
            <tr>
              <td colspan="5" align="center">
                <h1>Data Pemohon</h1>
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
      </div>
    </div>
  </div>
</section>
