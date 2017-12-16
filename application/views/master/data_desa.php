<section class="content-header">
  <h1>
    Detail &amp; Data Desa
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Sistem Desa</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
        <div class="box box-success">
            <div class="box-body">
                <dt>Nama Desa</dt>
                <dd><?php echo $data['nama_desa'];?></dd>
                <br>
                <dt>Alamat</dt>
                <dd><?php echo $data['alamat_desa'];?></dd>
                <br>
                <dt>Kepala Desa Aktif</dt>
                <dd><?php echo $data['fullname_kades'];?></dd>
                <br>
                <dt>Sekretaris Desa</dt>
                <dd><?php echo $data['fullname_sekdes'];?></dd>
                <br>
                <dt>Kasi Pemerintahan &amp; Pertanahan</dt>
                <dd><?php echo $data['fullname_pertanahan'];?></dd>                
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-body">
                <table class="table  table-responsive" >
                    <thead>
                        <tr>
                            <th>Dusun</th>
                            <th>Kepala Dusun</th>
                            <th>Kontak</th>
                            <th>Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>                 
                </table>
                <table class="table table-responsive" >
                    <thead>
                        <tr>
                            <th>Dusun</th>
                            <th>No. RT</th>
                            <th>Kepala RT</th>
                            <th>Kontak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>                   
                </table>
            </div>
        </div>
        </div>
    </div>
    
</section>