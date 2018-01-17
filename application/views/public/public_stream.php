<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<title><?php echo $title;?></title>
	<meta content='desa, sistem informasi desa, si desa, sidesa, geografis, geologi, pertanahan, rekomendasi, skt, surat tanah, desa gantung, belitung, laskar pelangi, belitung timur, pulau belitung, indah, pantai, bumdes, karang taruna, gantung makmur sejahtera, data desa, dana desa, pades, perdes, teknologi tepat guna, pemdes, pemerintah desa' name='KEYWORDS'/> 
	<meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'/>
	<meta name='geo.placename' content='Indonesia'/>
	<meta name="language" content="id" />
	<meta name='description' content='Sistem Informasi Geografis dan Perkantoran Desa Gantung, menampilkan data pertanahan dalam ruang lingkup wilayah pemerintahan desa gantung berbasis online dan terbarukan'/>
	<meta name='author' content='SiDesa Sistem'/>	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta property="og:url"                content="<?php echo base_url('public');?>" />
	<meta property="og:type"               content="article" />
	<meta property="og:title"              content="<?php echo $title;?>" />
	<meta property="og:description"        content="Sistem Informasi Geografis dan Perkantoran Desa Gantung, menampilkan data pertanahan dalam ruang lingkup wilayah pemerintahan desa gantung berbasis online dan terbarukan" />
	<meta property="og:image"              content="http://gantung.sideka.id/wp-content/uploads/sites/3869/2017/11/cropped-DSC_0331.jpg" />	
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="<?php echo base_url().THEME; ?>bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url().THEME; ?>Font_Awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().APPS;?>css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().APPS;?>css/style.css">
	<!--  -->	
	<link rel="stylesheet" href="<?php echo base_url().THEME; ?>plugins/select2/select2.min.css">
	<!-- <link rel="stylesheet" href="<?php //echo base_url().APPS;?>css/map-icons.css"> -->
 
	<!--[if lt IE 9]>
		<script src="/js/html5shiv.min.js"></script>
	<![endif]-->
	<!-- jQuery 2.1.4 -->
	<script src="<?php echo base_url().THEME; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url().THEME; ?>plugins/jQueryUI/jquery-ui2.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	$.widget.bridge('uibutton', $.ui.button);
	</script>

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
	<!-- Bootstrap 3.3.5 -->
	<script src="<?php echo base_url(); ?>assets/theme/bootstrap/js/bootstrap.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> -->
	<!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY"></script> -->
	<script> var baseUrl = '<?php echo base_url();?>';</script>	
	<script type="text/javascript" src="<?php echo base_url().THEME; ?>plugins/canvas2image.js"></script>
    <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script> -->
	<!--  -->
	<script src="<?php echo base_url().THEME; ?>plugins/select2/select2.min.js"></script>
		<style>
			canvas {
				width:100%;
				height:100%;
			}
		</style>
    <link rel="shortcut icon" href="<?php echo base_url().'assets/';?>favicon.ico" type="image/x-icon">
  </head>
  <body>
							<!-- /* ============================= */
							|     	  MASTER SI-DESA SYSTEM	      |
							|	       @Author     Veris Juniardi |
							|	       @veris_juniardi	          |
							|	       veris.juniardi@gmail.com	  |
							|	       +6282281469926	          |
							/* ===================================*/ -->
<!-- /* ===================================================================================== */
	/* =======================================================================================-
	| SISTEM INI DIBUAT UNTUK MEMBANTU KESEMRAWUTAN DATA PERTANAHAN DARI TINGKAT TAPAK      |
	| DAN MEMBANTU PENGADMINISTRASIAN DATA AGAR LEBIH TERTIB DAN TERINDEX DENGAN BAIK       |
	| UNTUK MENGHINDARI "TANAH BODONG" ATAU "TUMPANG TINDIH STATUS PERTANAHAN"		        |
	| JIKA ANDA MENEMUKAN TULISAN INI DAN TERTARIK UNTUK IKUT BERKONTRIBUSI                 |
	| DALAM TIM PENGEMBANGAN SILAHKAN HUBUNGI : 		  								    |
	| @Author     Veris Juniardi   															|
	| @veris_juniardi              															|
	| veris.juniardi@gmail.com     															|
	| +6282281469926               															|
	/* ======================================================================================-
	|  DON'T BE DICK                   			      	 	 		 						|
	|  THIS CODE IS PROVIDED FOR PUBLIC SERVICE                          					|
	|  DONT EVEN TO THINK BE DICK                           								|
	|  EVERYTHING IS LEGAL AND PROVIDED FROM "ANAK BELITONG" FOR "BELITONG"    		        |
	|  JUST CALL ME IF YOU WANT TO KNOW ABOUT THE TECH :  									|
	|  @Author     Veris Juniardi                    	 									|
	|  @veris_juniardi                               	 									|
	|  veris.juniardi@gmail.com                      	 									|
	|  +6282281469926                                										|
	=========================================================================================- */
/* ======================================================================================= */ -->
	<?php $this->load->view($main_content); ?>
	<script type="text/javascript">
		// function get_snap(){
		// 	html2canvas($("#map-canvas"),{
		// 		useCORS: true,
		// 		onrendered: function(canvas){
		// 			var imagedata = canvas.toDataURL('image/png');
		// 			var imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, "");
		// 		document.body.appendChild(canvas);	
		// 			// Convert and download as image 
		// 		Canvas2Image.saveAsPNG(canvas); 
					
		// 			$("#cap").append(canvas);
		// 			// Clean up 
		// 			//document.body.removeChild(canvas);
		// 		}
		// 	});
		// }
	</script>
  </body>
</html>
