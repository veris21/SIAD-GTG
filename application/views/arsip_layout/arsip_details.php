<section class="content-header">
  <h1>
    Details Arsip
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Arsip</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="box box-info">
                <div class="box-body">
                <a class="fancybox" rel="fancybox" href="<?php echo SCAN_ARSIP.$data['scan_link']; ?>" title="Surat dari <?php echo $data['pengirim']; ?>">
                    <img src="<?php echo SCAN_ARSIP.$data['scan_link']; ?>" width="100%" class="img img-rounded" alt="">
                </a>
                </div>
            </div>
        </div>

        <div class="col-md-5">

            <div class="box box-warning">
                <div class="box-header with-border">
                  <i class="fa fa-text-width"></i>
                  <h3 class="box-title">Deskripsi Arsip</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <dl>
                    <dt>Pengirim</dt>
                    <dd><?php echo $data['pengirim']; ?></dd>
                    <br>
                    <dt>Rincian</dt>
                    <dd>Nomor.<?php echo $data['nomor_surat']; ?></dd>
                    <dd>Tanggal.<?php echo $data['tanggal_surat']; ?></dd>
                    <dd>Sifat : <b><?php echo $data['sifat']; ?></b></dd>
                    <br>
                    <dt>Perihal</dt>
                    <dd><?php echo $data['perihal']; ?>.</dd>
                    <br>
                  </dl>
                </div>
            </div>
            <div class="box">
                <div class="box-body">
                    <dl>
                        <dt>Klasifikasi Arsip</dt>
                        <dd><b><?php echo $data['kode'];?></b>-<i><?php echo $data['klasifikasi'];?></i></dd>
                        <dt>Pada</dt>
                        <dd><?php echo mdate("%d %M %Y %H:%i %a",$data['time']);?></dd>
                    </dl>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                    <button onclick='cetak_disposisi(<?php echo $data['id'];?>)' class='btn btn-sm btn-flat btn-default'>Cetak Disposisi <i class='fa fa-print'></i></button>
                <?php 
                    switch ($this->session->userdata('jabatan')) {
                        case 'KADES':
                        ?>
                        <button onclick='buat_disposisi(<?php echo $data['id'];?>)' class='btn btn-sm btn-flat btn-primary'>Disposisikan Arsip <i class='fa fa-arrow-right'></i></button>
                        <?php
                            break;
                        case 'SEKDES':
                        ?>
                        <button onclick='buat_disposisi(<?php echo $data['id'];?>)' class='btn btn-sm btn-flat btn-primary'>Disposisikan Arsip <i class='fa fa-arrow-right'></i></button>
                        <?php
                            break;
                        case 'KAUR':
                        ?>
                        <button onclick='buat_disposisi(<?php echo $data['id'];?>)' class='btn btn-sm btn-flat btn-primary'>Disposisikan Arsip <i class='fa fa-arrow-right'></i></button>
                        <?php
                            break;
                         case 'KASI':
                         ?>
                         <button onclick='buat_disposisi(<?php echo $data['id'];?>)' class='btn btn-sm btn-flat btn-primary'>Disposisikan Arsip <i class='fa fa-arrow-right'></i></button>
                        <?php
                            break;
                        default:
                            # code...
                            break;
                    }
                 ?>
                  </div>
                </div>
            </div>

        </div>

    </div>
    <?php
            $id = $data['id']; 
            $disposisi = $this->disposisi_model->_get_all_on_arsip_id($id);
            if($disposisi->num_rows() != 0){
            ?>
            <div class="box box warning">
                <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr align="center" style="font-weight:bolder;">
                                <td>#</td>
                                <td>Dari</td>
                                <td>Kepada</td>
                                <td>Tanggal Kirim</td>
                                <td>Isi Disposisi</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($disposisi->result() as $disposisi){
                            // $dr = $this->db->get_where('users', array('id'=>$disposisi->dari_id))->row_array();
                            // $kpd = $this->db->get_where('users', array('id'=>$disposisi->kepada_id))->row_array();                            
                            $status = ($disposisi->status != 0 ? '<button class="btn btn-xs btn-success">Telah Dibaca</button>':'<button class="btn btn-xs btn-warning">Belum Dibaca</button>');
                            echo "<tr>";
                            echo "<td>
                            <a class='fancybox' rel='fancybox' href='".QRCODE.$disposisi->qr_link."' title='".$disposisi->isi_disposisi."'>
                            <img width='60' class='img img-responsive img-rounded' src='".QRCODE.$disposisi->qr_link."'>
                            </a></td>";
                            echo "<td align='center'>".$disposisi->dari."<br><b>(".$disposisi->dari_jabatan.")</b></td>";
                            echo "<td align='center'>".$disposisi->kepada."<br><b>(".$disposisi->kepada_jabatan.")</b></td>";
                            echo "<td>".mdate("%d %M %Y - %H:%i %a", $disposisi->time)."</td>";
                            echo "<td>".$disposisi->isi_disposisi."</td>";
                            echo "<td align='center'>". $status."</td>";
                            echo "</tr>";
                        }?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
                <div class="well text-center">Belum Didisposisikan</div>
            <?php } ?>
</section>
<!-- Modal Input Disposisi -->
<div class="modal fade" id="modal_disposisi" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Disposisikan Arsip</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'disposisi_input'));?>
      <div class="modal-body form">
          <div class="form-group">
              <label for="">Diposisikan Kepada</label>
              <?php 
              $desa_id = $this->session->userdata('desa_id');
               if( $this->session->userdata('jabatan') != 'KADES') {                  
                echo "<select class='form-control select2' style='width: 100%;' name='kepada_id'>";
                foreach ($kepada as $kepada){
                      if( $this->session->userdata('id') != $kepada->id){
                          echo "<option value='".$kepada->id."'>".$kepada->fullname."-".$kepada->jabatan."</option>";
                      }
                  } 
                echo "</select>";    
               }else{
                $sekdes = $this->arsip_model->_get_sekdes_same_desa($desa_id)->row_array();
                echo "<select name='kepada_id' class='form-control'>";
                echo "<option value='".$sekdes['id']."'>".$sekdes['fullname']."</option>";
                echo "</select>";              
                } ?>
          </div>
          <div class="form-group">
              <label for="">Isi Disposisi</label>
              <textarea  class="form-control" name="isi" id="" cols="10" rows="3"></textarea>
          </div>
      </div>
      <input type="hidden" name="arsip_time" value="<?php echo $data['time'];?>">
      <input type="hidden" name="arsip_id" value="<?php echo $data['id'];?>">
      <input type="hidden" name="perihal" value="<?php echo $data['perihal'];?>">
      <input type="hidden" name="pengirim" value="<?php echo $data['pengirim'];?>">
      <input type="hidden" name="surat_nomor" value="<?php echo $data['nomor_surat'];?>">
      <input type="hidden" name="surat_tanggal" value="<?php echo $data['tanggal_surat'];?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="save_disposisi()" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div> 
  </div> 
</div>