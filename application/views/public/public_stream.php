<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Data Geografis Desa Gantung || Stream</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo APPS;?>css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APPS;?>css/style.css">
    
	<!--[if lt IE 9]>
		<script src="/js/html5shiv.min.js"></script>
	<![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwYQT-WMW5KgJUqF-PjmcSlFQ2iWmAiRI"></script>
  <script language="javascript" type="text/javascript" src="<?php echo APPS;?>js/map.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo APPS;?>js/search.js"></script>
  
    <link rel="shortcut icon" href="<?php echo BASE_URL.'assets/';?>favicon.ico" type="image/x-icon">
  </head>
  <body>
  
  <div id="control">
		<center>
		<img src="<?php echo BASE_URL.'assets/new-logo.png'; ?>" width="70%" alt="">
		</center>
		<!-- <h2>Temukan Data <br>Tanah Anda</h2> -->
		<p>Kami membantu anda melihat status tanah anda melalui database Si Desa pemerintah Desa Gantung </p>
		<form method="get" id="chooseZip">
			<button type="submit" class="learnButton">Gunakan Lokasi</button>
			<button type="button" id="searchZip" class="learnButton">Cari Nama/NIK</button>
			<div class="clear"></div>
			<div class="zipSearch">
				<input id="textZip" type="text" name="zip" autofocus>
				<button type="submit" class="learnButton">Search</button>
			</div>
			<div class="clear"></div>
		</form>	
		<div class="social">
		
			<div class="twitter">
				<!-- <a href="https://twitter.com/share" class="twitter-share-button" data-via="pauldessert">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script> -->
			</div>
			
			<div class="facebook">
				<!-- <iframe src=""></iframe>		 -->
			</div>

		
		</div>
		<div class="clear"></div>
		<div id="results"></div>
		<p>project by <?php echo anchor('login','Si-Desa Gantung');?></p>
	</div>
	
	<!-- an empty div for the map -->
	<div id="map-canvas"></div> 

  </body>
</html>
