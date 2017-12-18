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
    <!-- bootstrap wysihtml5 - text editor --
    <link rel="stylesheet" href="<?php echo THEME; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js??key=AIzaSyCwYQT-WMW5KgJUqF-PjmcSlFQ2iWmAiRI&libraries=drawing,geometry,distance"></script>
    <!--  -->
    <script src="<?php echo THEME; ?>sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo THEME; ?>sweetalert.css">
    <link rel="stylesheet" href="<?php echo THEME; ?>plugins/fancybox/jquery.fancybox.css">

    <link rel="stylesheet" href="<?php echo THEME; ?>plugins/fancybox/helpers/jquery.fancybox-buttons.css">
    <link rel="stylesheet" href="<?php echo THEME; ?>plugins/fancybox/helpers/jquery.fancybox-thumbs.css">

    <link rel="stylesheet" href="<?php echo THEME;?>sidesa.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo BASE_URL.'assets/';?>new-logo.png" type="image/x-icon">
  </head>
  <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
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
    <!-- JQUERY upload -->
    <script src="<?php echo THEME; ?>plugins/jquery.ajaxfileupload.js"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo THEME; ?>raphael-min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo THEME; ?>jquery.form.min.js"></script>
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
    <!-- Download JS -->
    <!-- AdminLTE App -->
    <script src="<?php echo THEME; ?>dist/js/app.min.js"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="<?php echo THEME; ?>plugins/fancybox/jquery.mousewheel.pack.js"></script>

    <script src="<?php echo THEME; ?>plugins/fancybox/jquery.fancybox.pack.js"></script>
<!--  -->
    <script src="<?php echo THEME; ?>plugins/fancybox/helpers/jquery.fancybox-media.js"></script>
    <script src="<?php echo THEME; ?>plugins/fancybox/helpers/jquery.fancybox-buttons.js" ></script>
    <script src="<?php echo THEME; ?>plugins/fancybox/helpers/jquery.fancybox-thumbs.js" ></script>

    <!-- <script type="text/javascript" src="<?php echo THEME; ?>plugins/webcamReader/js/qrcodelib.js"></script>
    <script type="text/javascript" src="<?php echo THEME; ?>plugins/webcamReader/js/webcodecamjquery.js"></script>

    <script type="text/javascript" src="<?php echo THEME; ?>plugins/webcamReader/js/webcodecamjs.js"></script>
    <script type="text/javascript" src="<?php echo THEME; ?>plugins/webcamReader/js/mainjquery.js"></script>
    <script type="text/javascript" src="<?php echo THEME; ?>plugins/webcamReader/js/decoderworker.js"></script>
    <script type="text/javascript" src="<?php echo THEME; ?>plugins/webcamReader/js/main.js"></script> -->
    <!--  -->
    <script type="text/javascript" src="<?php echo THEME; ?>plugins/html2canvas.js"></script>
    <script type="text/javascript" src="<?php echo APPS.'apps.js';?>"></script>
    <script>
    var baseUrl = '<?php echo BASE_URL;?>';
    function cari_data() {
      event.preventDefault();
      var nik = $('[name="cari_tanah_nik"]').val();
      if(nik!=''){
        $('#loader-icon').show();
        $('#result_cari_data').hide();
        $('#data_kosong').hide();
        $.ajax({
          url: baseUrl+'cari/nik/'+nik,
          type:'GET',
          success:function(data){
            $('#loader-icon').hide();
            if(data!='null' ){
              var obj = JSON.parse(data);
                console.log(data);
              $('#no_nik').text("NIK "+obj.no_nik);
              $('#no_kk').text("No. KK "+obj.no_kk);
              $('#nama').text(obj.nama);
              $('#ttl').text(obj.tempat_lahir+"/"+obj.tanggal_lahir);
              $('#pddk_akhir').text(obj.pddk_akhir);
              $('#shdk').text(obj.shdk);
              $('#agama').text(obj.agama);
              $('#pekerjaan').text(obj.pekerjaan);
              $('#status').text(obj.status);
              $('#shdrt').text(obj.shdrt+"  Orang");
              $('#alamat').text(obj.alamat);
              $('#no_rt').text(obj.no_rt);
              $('#dusun').text(obj.dusun);
              $('[name="kependudukan_id"]').val(obj.id);
              $('[name="no_nik"]').val(obj.no_nik);
              $('[name="pemohon"]').val(obj.nama);

              $('#result_cari_data').show();
              $('#data_kosong').hide();
            }else{
              $('#result_cari_data').hide();
              $('#data_kosong').show();
            }             
          }, error: function (jqXHR, textStatus, errorThrown)
                {
                  swal('Oops...','Something went wrong!','error');
                }
        });
      }
    }
    </script>
  </body>
</html>
