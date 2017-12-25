<section class="content-header">
  <h1>
    Data Arsip
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Arsip</li>
  </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Cari Data Arsip yang Tersimpan di Sistem</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="">Cari Arsip Berdasarkan Nomor/Pengirim/Perihal/Sifat Surat</label>
                <input type="text" name="cari_arsip" class="form-control" onkeyup="cari_data_arsip()" value="">
                <p id="label" class="bg-red"></p>
            </div>        
        </div>
    </div>

    <div class="box box-warning">
        <div class="box-header">
            Hasil Pencarian
        </div>
        <div class="box-body">
        <center id="loader" style="display:none;">
          <img width="50%" class="img img-responsive" src="<?php echo base_url().'assets/';?>nyapu.gif" />
        </center>
        <div id="hasil"></div>
        </div>
    </div>
    
</section>