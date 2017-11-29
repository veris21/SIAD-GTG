<section class="content-header">
<h1>
  Master Data Penduduk
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Input Data desa</li>
</ol>
</section>
<section class="content">
<div class="box box-info">
    <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="master_penduduk">
        <thead>
        <tr valign="center" align="center" style="font-weight:bolder;">
            <td>No NIK</td>
            <td>No KK</td>
            <td>Nama Lengkap</td>
            <td>Alamat</td>
            <td>Tempat Tanggal Lahir</td>
            <td>#</td>
        </tr>
        </thead>
        <tbody>
        
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tbody>
        </table>
    </div>
</div>
    <?php 
    echo form_open_multipart();
    ?>
    <div class="box-footer">
        <div class="form-group">
           <div class="btn btn-default btn-file">
            <i class="fa fa-paperclip"></i> File Eksensi .xls | .xlsx Max.1000 baris Data 
            <input type="file" name="import_xls">
           </div>
        </div>
        <button type="submit" name="import" class="btn btn-sm btn-flat btn-warning btn-block">Import Excel <i class="fa fa-excel-o"></i> </button>
      </div>
    <?php 
    echo form_close();
    ?>
</section>