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
  <style>
		canvas {
			width:100%;
			height:100%;
		}
	</style>
    <link rel="shortcut icon" href="<?php echo BASE_URL.'assets/';?>favicon.ico" type="image/x-icon">
  </head>
  <body>
  
  <div id="control">
		<center>
		<img src="<?php echo BASE_URL.'assets/new-logo.png'; ?>" width="70%" alt="">
		</center>
		<!-- <h2>Temukan Data <br>Tanah Anda</h2> -->
		<p>Kami membantu anda melihat status tanah anda melalui database Si Desa pemerintah Desa Gantung </p>
		<form method="get" id="chooseData">
			<!-- <button type="submit" class="learnButton">Gunakan Lokasi</button> -->
			<button type="button" id="searchBtn" class="learnButton">Cari Nama/NIK</button>
			<div class="clear"></div>
			<div class="dataSearch">
				
				<input id="data" type="text" name="data" autofocus>
				<button type="submit" class="learnButton">Search</button>
				<!-- <button class="btn" onclick="get_snap()">Test</button> -->
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
		
		<p>A Project by <?php echo anchor('login','Si-Desa Gantung');?></p>
	</div>
		<!-- an empty div for the map -->
	<div id="map-canvas"></div> 
	<div>
	Capture Data : <div id="cap"></div>
	</div>
	
	<!-- <script type="text/javascript" src="<?php echo THEME; ?>plugins/html2canvas.js"></script> -->
	<script type="text/javascript" src="<?php echo THEME; ?>plugins/canvas2image.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

	<script type="text/javascript">
		function get_snap(){
			html2canvas($("#map-canvas"),{
				useCORS: true,
				onrendered: function(canvas){
				document.body.appendChild(canvas);	
					// Convert and download as image 
				Canvas2Image.saveAsPNG(canvas); 
					
					$("#cap").append(canvas);
					// Clean up 
					//document.body.removeChild(canvas);
				}
			});
		}
	</script>
  </body>
</html>
