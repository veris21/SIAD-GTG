<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo ASSETS.'bootstrap/css/bootstrap.min.css'; ?>">
  </head>
    <body>
      <?php $this->load->view($main_content); ?>
      <script type="text/javascript" src="<?php echo ASSETS.'jquery/jquery.min.js'; ?>"></script>
      <script type="text/javascript" src="<?php echo ASSETS.'bootstrap/js/bootstrap.min.js'; ?>"></script>
  </body>
</html>
