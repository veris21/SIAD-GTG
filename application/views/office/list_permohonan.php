<section class="content-header">
  <h1>
    Permohonan Layanan Tanah
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Permohonan Layanan Tanah</li>
  </ol>
</section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Rekap Data Permohonan SKT </h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table style="font-size:11px;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-permohonan">
          <thead>
            <tr align="center">
              <td>NIK</td>
              <td>Nama</td>
              <td>Lokasi Mohon</td>
              <td>Dusun</td>
              <td>Tanggal Mohon</td>
              <td>Status</td>
              <td>Pilihan</td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($data as $data) {
              $dusun = $this->db->get_where('sig_dusun', array('id'=>$data->skt_mohon_dusun_id))->row_array();
              echo "<tr align='center'>";
              echo "<td>$data->no_nik</td>";
              echo "<td>$data->nama</td>";
              echo "<td>$data->skt_mohon_lokasi</td>";
              echo "<td>".$dusun['dusun_nama']."</td>";
              echo "<td>$data->skt_mohon_tgl</td>";
              echo "<td>";
              echo $type = ($data->type == 0 ? '<b>Proses</b>':'<b>Diterima</b>');
              echo "</td>";
              echo "<td>";
              echo "<a class='btn btn-flat btn-xs btn-primary' href='".BASE_URL."permohonan/view/$data->id'><i class='fa fa-eye'></i> </a> ";
              echo " <a class='btn btn-flat btn-xs btn-warning' href='".BASE_URL."permohonan/edit/$data->id'> <i class='fa fa-edit'></i></a>";
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>
</section>
