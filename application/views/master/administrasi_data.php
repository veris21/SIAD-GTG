<section class="content-header">
  <h1>
    Data Administrasi Wilayah User
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Administrasi</li>
  </ol>
</section>
<section class="content">
<?php echo form_open();?>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-body">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#wilayah_list" data-toggle="tab">List Wilayah User</a></li>
          <li><a href="#post_desa" data-toggle="tab">Posting Desa</a></li>
          <li><a href="#post_dusun" data-toggle="tab">Posting Dusun</a></li>
          <li><a href="#post_rt" data-toggle="tab">Posting RT</a></li>
        </ul>
        <div class="tab-content">
     <div class="active tab-pane" id="wilayah_list">
     <table width="100%" class="table table-striped table-bordered table-hover" id="adm-wilayah">
     <thead>
       <tr valign="center" align="center">
         <td>Kabupaten</td>
         <td>Kecamatan</td>
         <td>Desa</td>
         <td>Dusun</td>
         <td>RT</td>
         <td>Pejabat</td>
         <td>#</td>
       </tr>
     </thead>
     <tbody>
     <?php 
        foreach ($administrasi as $adm){
        echo "<tr>";
        echo "<td>".$adm->nama_kabupaten."</td>";
        echo "<td>".$adm->nama_kecamatan."</td>";
        echo "<td>".$adm->nama_desa."</td>";
        echo "<td>".$adm->nama_dusun."</td>";
        echo "<td>".$adm->nama_rt."</td>";
        echo "<td align='center'><b>".$adm->fullname."</b> <br>".$adm->hp."</td>";
        echo "<td align='center'><a href='".BASE_URL."rt/edit/".$adm->id."' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i></a></td>";
        echo "</tr>";
        } 
     ?>
     </tbody> 
     </table>
        <!-- User Tab -->
     </div>
     <div class="tab-pane" id="post_desa">
     <table width="100%" class="table table-striped table-bordered table-hover" id="adm-desa">
     <thead>
       <tr valign="center" align="center">
         <td>Kecamatan</td>
         <td>Desa</td>
         <td>Pejabat</td>
         <td>#</td>
       </tr>
     </thead>
     <tbody>
        <?php
        foreach ($desa as $desa){
            echo "<tr>";
            echo "<td>".$desa->nama_kecamatan."</td>";
            echo "<td>".$desa->nama_desa."</td>";
            echo "<td align='center'><b>".$desa->fullname."</b> <br>".$desa->hp."</td>";
            echo "<td align='center'><a href='".BASE_URL."details/desa/".$desa->id."' class='btn btn-xs btn-success'><i class='fa fa-eye'></i></a></td>";
            echo "</tr>";
        }
        ?>
     </tbody> 
     </table>
        <!-- User Tab -->
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Kecamatan</label>
                <select name="kecamatan_id" class="form-control">
                <?php foreach($kecamatan as $kecamatan){
                    echo "<option value='".$kecamatan->id."'>Kec.".$kecamatan->nama_kecamatan."</option>";
                } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nama Desa</label>
                <input type="text" name="nama_desa" class="form-control">
            </div>            
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" class="form-control" cols="20" rows="3"></textarea>
            </div>
            <button type="submit" name="posting_desa" class="btn btn-sm btn-flat btn-success">Posting Desa</button>
        </div>
     </div>
     </div>
     <div class="tab-pane" id="post_dusun">
     <table width="100%" class="table table-striped table-bordered table-hover" id="adm-dusun">
     <thead>
       <tr valign="center" align="center">
         <td>Kecamatan</td>
         <td>Desa</td>
         <td>Dusun</td>
         <td>Pejabat</td>
         <td>#</td>
       </tr>
     </thead>
     <tbody>
        <?php
        foreach ($dusun as $dusun){
            echo "<tr>";
            echo "<td>".$dusun->nama_kecamatan."</td>";
            echo "<td>".$dusun->nama_desa."</td>";
            echo "<td>".$dusun->nama_dusun."</td>";
            echo "<td align='center'><b>".$dusun->fullname."</b><br>".$dusun->hp."</td>";
            echo "<td  align='center'><a href='".BASE_URL."rt/edit/".$dusun->id."' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i></a></td>";
            echo "</tr>";
        }
        ?>
     </tbody> 
     </table> 
     <!-- User Tab -->
     <div class="row">
     <div class="col-md-6">
         <div class="form-group">
             <label for="">Desa</label>
             <select name="desa_id" class="form-control">
             <?php foreach($desa_opt as $ds){
                 echo "<option value='".$ds->id."'>DESA ".$ds->nama_desa."</option>";
             } ?>
             </select>
         </div>
         <div class="form-group">
             <label for="">Nama Dusun</label>
             <input type="text" name="nama_dusun" class="form-control">
         </div>            
     </div>
     <div class="col-md-6">
         <div class="form-group">
         <label for="">Alamat</label>
         <textarea name="alamat" class="form-control" cols="20" rows="3"></textarea>
         </div>
         <button type="submit" name="posting_dusun" class="btn btn-sm btn-flat btn-success">Posting DUSUN</button>
     </div>
  </div>
  </div>
     <div class="tab-pane" id="post_rt">
     <div class="row">
     <div class="col-md-6">
         <div class="form-group">
             <label for="">Dusun</label>
             <select name="dusun_id" class="form-control">
             <?php foreach($dusun_opt as $dsn){
                 $nama_desa = $this->db->get_where('desa', array('id'=>$dsn->desa_id))->row_array();
                 echo "<option value='".$dsn->id."'>DSN.".$dsn->nama_dusun." DESA ".$nama_desa['nama_desa']."</option>";
             } ?>
             </select>
         </div>
         <div class="form-group">
             <label for="">Nama/ No RT</label>
             <input type="text" name="nama_rt" class="form-control">
         </div>            
     </div>
     <div class="col-md-6">
         <div class="form-group">
         <label for="">Alamat</label>
         <textarea name="alamat" class="form-control" cols="20" rows="3"></textarea>
         </div>
         <button type="submit" name="posting_rt" class="btn btn-sm btn-flat btn-success">Posting RT</button>
     </div>
  </div>
  </div>
    </div>
     </div>
     </div> 
    </div> 
  </div>
<?php echo form_close();?>
</section>
    