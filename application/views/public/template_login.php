
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url().THEME; ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url().THEME; ?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/iCheck/square/blue.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().THEME; ?>sweetalert.css">
    <script src="<?php echo base_url().THEME; ?>sweetalert.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>      
  .login-page:before {
    content: "";
    position: fixed;
    left: 0;
    right: 0;
    top: 0; bottom: 0;
    z-index: -1;
    display: block;
    background-image: url(<?php echo base_url('assets/Minion2.png'); ?>);
    width: 100%;
    height: 100%;
    background-size: cover;
  }

  #overlay {
    display:none;
    margin: auto;
    padding: 0;
  }

</style>
  </head>
  <body class="hold-transition login-page">
    <?php $this->load->view($main_content); ?>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url().THEME; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url().THEME; ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script type="text/javascript" >/*/ Base Setting /*/ var baseUrl = '<?php echo base_url();?>';</script>
    <script type="text/javascript" src="<?php echo base_url().APPS.'auth.js';?>"></script>

  </body>
</html>
