<section class="content-header">
  <h1>
    Fitur SMS Notifikasi
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Kirim SMS</li>
  </ol>
</section>
<section class="content">
<?php echo form_open_multipart('', array('id'=>'sms_input','class'=>'form-horizontal'));?>
    <div class="box box-warning">
        <div class="box-body">
            <div class="form-group"> 
                <label class="col-sm-4" for="">Pilihan Tipe SMS</label>
                <div class="col-sm-8">
                    <select name="pilihan_type" class="form-control" id="">
                        <option value=""> - </option>
                        <option value="0">SMS Semua Perangkat Desa</option>
                        <option value="1">SMS Per Dusun</option>
                        <option value="2">SMS Per User</option>
                    </select>
                </div>
            </div>

            <div class="form-group"> 
                <label class="col-sm-4" for="">Pilih Dusun <br> <i style="font-size:10px;"> (Hanya Isi Jika Memilih Per Dusun)</i></label>
                <div class="col-sm-8">
                    <select name="pilihan_dusun" class="form-control select2" style="width:100%">
                        <?php 
                        echo "<option value=''> - </option>";
                        foreach ($dusun->result() as $dusun) {
                            
                            echo "<option value='".$dusun->id."'>".$dusun->nama_dusun."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group"> 
                <label class="col-sm-4" for="">Pilih User <br> <i style="font-size:10px;">(Hanya Isi Jika Memilih Per User)</i> </label>
                <div class="col-sm-8">
                    <select name="pilihan_user" class="form-control select2" style="width:100%">
                        <?php 
                         echo "<option value=''> - </option>";
                        foreach ($users->result() as $users) {
                           
                            echo "<option value='".$users->id."'>".$users->fullname." - ".$users->keterangan_jabatan."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group"> 
                <label class="col-sm-4" for="">Isi Pesan</label>
                <div class="col-sm-8">
                   <textarea name="message" onkeyup="hitungkarakter()" rows="8" cols="4" class="form-control"></textarea>
                   <input readonly disabled type="text" name="sisa" value="150" size="3"/> <i style="font-size:10px;">karakter lagi tersisa.</i>
                </div>
            </div>

        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button type="reset" class="btn btn-flat btn-warning">Reset <i class="fa fa-ban"></i></button>
                <button onclick="kirim_sms()" type="submit" class="btn btn-flat btn-success">Kirim SMS <i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
</form>
</section>