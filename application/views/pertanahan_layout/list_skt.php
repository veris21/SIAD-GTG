<section class="content-header">
  <h1>
    Data Surat Pertanahan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Surat Tanah</li>
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
               echo "<td align='center'>".mdate("%d %m %Y - %H:%i %a", $data->time_mohon)."</td>";
               echo "<td align='center'>".mdate("%d %m %Y - %H:%i %a", $data->time_bap)."</td>";
               echo "<td align='center'>".mdate("%d %m %Y - %H:%i %a", $data->time)."</td>";
               echo "<td align='center'>a/n. ".$data->nama." NIK . ".$data->no_nik."<br>Luas : ".$data->luas."<br>Lokasi : ".$data->lokasi."</td>";
               echo "<td align='center'><a class='btn btn-success ' href='".base_url().'surat_tanah/details/'.$data->id."'> Details <i class='fa fa-eye'></i></a></td>";
               echo "</tr>";
            }
            ?>
        </tbody>
    </table> 
    </div>
  </div> 
</section>