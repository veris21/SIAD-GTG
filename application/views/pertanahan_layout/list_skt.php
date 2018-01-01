<section class="content-header">
  <h1>
    Data Berita Acara Pemeriksaan Pertanahan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Berita Acara</li>
  </ol>
</section>
<section class="content">
  <div class="box box-warning">
    <div class="box-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="list_skt">
        <thead>
            <tr align="center">
                <th>Tanggal Permohonan</th>                
                <th>Tanggal BAP</th>
                <th>Tanggal SKT/ S.Rekomendasi</th>
                <th>Keterangan</th>
                <th width"20">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($data as $data) {
               echo "<tr>";
               echo "<td>".$data->time_mohon."</td>";
               echo "<td>".$data->time_bap."</td>";
               echo "<td>".$data->time."</td>";
               echo "<td>a/n. ".$data->nama." NIK . ".$data->no_nik.">br>Luas : ".$data->luas."</td>";
               echo "<td></td>";
               echo "</tr>";
            }
            ?>
        </tbody>
    </table> 
    </div>
  </div> 
</section>