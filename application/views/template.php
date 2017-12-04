<?php 
// Controller Level Navigasi
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo THEME; ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo THEME; ?>Font_Awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo THEME; ?>ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo THEME; ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo THEME; ?>dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo THEME;?>plugins/datatables-plugins/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo THEME;?>plugins/datatables-responsive/dataTables.responsive.css">
    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="<?php echo THEME; ?>plugins/iCheck/flat/blue.css"> -->
    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="<?php echo THEME; ?>plugins/morris/morris.css"> -->
    <!-- jvectormap -->
    <!-- <link rel="stylesheet" href="<?php echo THEME; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo THEME; ?>plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo THEME; ?>plugins/daterangepicker/daterangepicker-bs3.css">
    <!--  -->
    <link rel="stylesheet" href="<?php echo THEME; ?>plugins/select2/select2.min.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo THEME; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js??key=AIzaSyCwYQT-WMW5KgJUqF-PjmcSlFQ2iWmAiRI&libraries=drawing,geometry,distance"></script>
    <script src="<?php echo THEME; ?>sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME; ?>sweetalert.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo BASE_URL.'assets/';?>new-logo.png" type="image/x-icon">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php $this->load->view('top-navbar'); ?>
      <?php $this->load->view('side-navbar'); ?>
      <div class="content-wrapper">
        <?php $this->load->view($main_content); ?>
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2017 <a href="#">Pemerintah Desa Gantung</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo THEME; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo THEME; ?>plugins/jQueryUI/jquery-ui2.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo THEME; ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo THEME; ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo THEME; ?>plugins/datatables-plugins/dataTables.bootstrap.js"></script>
    <script src="<?php echo THEME; ?>plugins/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Input Mask -->
    <script src="<?php echo THEME; ?>plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo THEME; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo THEME; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo THEME; ?>raphael-min.js"></script>
    <!-- <script src="<?php echo THEME; ?>plugins/morris/morris.js"></script> -->
    <!-- Sparkline -->
    <script src="<?php echo THEME; ?>plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <!-- <script src="<?php echo THEME; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
    <!-- <script src="<?php echo THEME; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="<?php echo THEME; ?>plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo THEME; ?>moment.min.js"></script>
    <script src="<?php echo THEME; ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo THEME; ?>plugins/datepicker/bootstrap-datepicker.js"></script>

    <!--  -->
    <script src="<?php echo THEME; ?>plugins/select2/select2.min.js"></script>

    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo THEME; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo THEME; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo THEME; ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo THEME; ?>dist/js/app.min.js"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script type="text/javascript">
      $("#table_arsip_masuk").DataTable({
        responsive: true, 
        order:[[ 0, "desc"]],
        rowGroup: {
          dataSrc: 'tipe'
          }
      });



// ==========================

      $("#table_klasifikasi_surat").DataTable({
        responsive: true, 
        rowGroup: {
          dataSrc: 'tipe'
          }
      });

      $(".select2").select2();
      $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
      $("[data-mask]").inputmask();

      $("#master_penduduk").DataTable({
        responsive: true, 
        rowGroup: {
          dataSrc: 'no_kk'
          }
      });

      $("#mutasi_penduduk").DataTable({
        responsive: true, 
        rowGroup: {
          dataSrc: 'no_kk'
          }
      });

      $("#adm-wilayah").DataTable({
        responsive: true, 
        rowGroup: {
          dataSrc: 'nama_dusun'
          }
      });
      $("#adm-desa").DataTable({
        responsive: true, 
        rowGroup: {
          dataSrc: 'nama_kecamatan'
          }
      });
      $("#adm-dusun").DataTable({
        responsive: true, 
        rowGroup: {
          dataSrc: 'nama_desa'
        }
      });
      // fast_search system load
      $('#fast_search').select2({
        ajax: {
          url: 'lookup',
          dataType: 'json',
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });

      function autofill() {
        var nik = $('#search').val();
        if (nik='') {
          $('#details_nik').prop('disabled',true);
        }else{
          $('#details_nik').prop('disabled',false);
          $.ajax({
            url:'search',
            dataType: 'json',
          }).success(function(data){
            obj = JSON.parse(data);
            $('#nik').val(obj.nik);
            $('#kk').val(obj.kk);
            $('#nama').val(obj.nama);
            $('#tempat_lahir').val(obj.tempat_lahir);
            $('#tanggal_lahir').val(obj.tanggal_lahir);
            $('#pendidikan').val(obj.pendidikan);
            $('#agama').val(obj.agama);
            $('#pekerjaan').val(obj.pekerjaan);
            $('#status_kawin').val(obj.status_kawin);
            $('#status_dalam_keluarga').val(obj.status_dalam_keluarga);
            $('#jumlah_anggota_keluarga').val(obj.jumlah_anggota_keluarga);
            $('#rt').val(obj.rt);
            $('#dusun').val(obj.dusun);
            $('#desa').val(obj.desa);
            $('#alamat').val(obj.alamat);
          });
        }
      }
      // MAPS
    </script>


<script>
// ======= Posting Via Ajax 
var save_method;
var arsip_method;
    function posting_arsip(){
      arsip_method = 'posting_arsip';
      // swal('Good job!','Berhasil Menginput Data Arsip!','success');
      $('#arsip_input')[0].reset();
      $('#modal_arsip').modal('show');
    }

      function save_arsip(){
        event.preventDefault();
        var url;
        switch (arsip_method) {
          case 'posting_arsip':
          url = '<?php echo BASE_URL."arsip/input";?>';
            break;
          case 'edit_arsip':
          url = '<?php echo BASE_URL."arsip/update";?>';
            break;
          default:
            break;
        }
        $.ajax({
          url: url,
          type:"POST",
          dataType:"JSON",
          data: new FormData(this),
          processData: false,
          contentType: false,
          success: function (data) {
            swal('Good job!','Berhasil Menginput Data Arsip!','success');
            location.reload();
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Oops...','Something went wrong!','error');
            }
        });
      }

      function posting(){
        save_method = 'posting_klasifikasi';
        $('#klasifikasi')[0].reset(); // reset form on modals
        $('#modal_klasifikasi').modal('show');
      }
      function delete_posting(id){
        event.preventDefault();
        var url = '<?php echo BASE_URL."klasifikasi/delete/";?>'+id;
        swal({
              title: 'Apa Anda Yakin?',
              text: "Data Akan dihapus Secara Permanen!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Iya, Hapus Data!'              
            }, function isConfirm(){
              $.ajax({
                url:url,
                type:"POST",
                dataType:"JSON",
                success: function (data){
                  swal('Good job!','Berhasil Menghapus data!','success');
                  location.reload();
                },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                    swal('Oops...','Something went wrong!','error');
                  }
              });
            });
      }
      function edit_posting(id){
        save_method= 'edit_klasifikasi';
        $('#klasifikasi')[0].reset(); // reset form on modals
        $.ajax({
          url:'<?php echo BASE_URL."klasifikasi/get/";?>'+id,
          type:"GET",
          dataType:"JSON",
          success: function(data){
            $('[name="id"]').val(data.id);
            $('[name="kode"]').val(data.kode);
            $('[name="klasifikasi"]').val(data.klasifikasi);
            $('#modal_klasifikasi').modal('show');
            $('.modal-title').text('Edit Data Klasifikasi');
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Oops...','Something went wrong!','error');
            }
        });
      }
      function save(){
        var url;
        switch (save_method) {
          case 'posting_klasifikasi':
            url = '<?php echo BASE_URL."klasifikasi/posting";?>';
            break;
          case 'edit_klasifikasi':
            url = '<?php echo BASE_URL."klasifikasi/edit";?>';
            break;
          default:
            break;
        }
        $.ajax({
          url:url,
          type:'POST',
          data:$('#klasifikasi').serialize(),
          dataType: 'JSON',
          success: function (data){
            $('#modal_klasifikasi').modal('show');
            swal('Good job!','Berhasil menambahkan data!','success');
            location.reload();
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Oops...','Something went wrong!','error');
            }
        });
      }
</script>
  </body>
</html>
