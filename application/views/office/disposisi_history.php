<section class="content-header">
  <h1>
    History Disposisi
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">History Disposisi</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Rekam History Disposisi </h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-disposisi">
            <thead>
              <tr valign="center" align="center">
                <td>Tanggal Disposisi</td>
                <td>Dari</td>
                <td>Kepada</td>
                <td>Memo</td>
                <td>Status</td>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($history as $d) {
                echo "<tr>
                        <td align='center'>$d->disposisi_tgl</td>
                        <td align='center'>";
                        $dari = $this->db->get_where('sig_users', array('id'=>$d->dari_id))->row_array();
                        echo $dari['user_fullname']."/<i>".$dari['user_status']."</i>";
                        echo "</td>
                        <td align='center'>";
                        $kepada = $this->db->get_where('sig_users', array('id'=>$d->kepada_id))->row_array();
                        echo $kepada['user_fullname']."/<i>".$kepada['user_status']."</i>";
                        echo "</td>
                        <td><i>$d->memo</i><br>";
                        if ($d->id_arsip !='') {
                           $arsip = $this->db->get_where('sig_surat_arsip', array('id'=>$d->id_arsip))->row_array();
                           echo "Nomor Surat :".$arsip['nomor']."/Tanggal ".$arsip['surat_tgl'];
                           echo "<br>";
                           echo "Dari : ".$arsip['surat_pengirim'];
                           echo "<br>";
                           echo "Perihal : ".$arsip['surat_perihal'];
                        }else {
                          echo "Memo Perintah Langsung";
                        }
                echo "</td>";
                echo "<td align='center'>";
                        if ($d->status == 0) {
                          echo '<a disabled class="btn btn-flat btn-warning">Belum <br> Diterima</a>';
                        }else{
                          echo '<a disabled class="btn btn-flat btn-info">Memo<br> Diterima</a>';
                        }
                echo "</td>
                      </tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
