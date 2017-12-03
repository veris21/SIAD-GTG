<section class="content-header">
  <h1>
    Data Klasifikasi Surat
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Klasifikasi Surat</li>
  </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#klasifikasi_surat" data-toggle="tab">Klasifikasi Surat</a></li>
          <li><a href="#input_klasifikasi" data-toggle="tab">Posting Kode Klasifikasi</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="klasifikasi_surat">
            <table width="100%" class="table table-striped table-bordered table-hover" id="table_klasifikasi_surat">
                <thead>
                <tr valign="center" align="center">
                    <td>Tipe</td>
                    <td>Kode Klasifikasi</td>
                    <td>Keterangan Klasifikasi</td>
                    <td>Pilihan</td>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($data as $data) {
                            echo "<tr valign='center'>";
                            echo "<td align='center'>".$data->tipe."</td>";
                            echo "<td align='center'>".$data->kode."</td>";
                            echo "<td align='left'>".$data->klasifikasi."</td>";
                            echo "<td align='center'></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody> 
            </table>
            </div>
            <div class="tab-pane" id="input_klasifikasi">

            </div>            
        </div> 
        </div>
        </div>
    </div>
</section>