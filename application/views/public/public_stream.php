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
		<style>
			canvas {
				width:100%;
				height:100%;
			}
		</style>
    <link rel="shortcut icon" href="<?php echo base_url().'assets/';?>favicon.ico" type="image/x-icon">
  </head>
  <body>

  <div id="control">
		<center>
		<img src="<?php echo base_url().'assets/new-logo.png'; ?>" width="60%" alt="Logo si-desa.id">
		</center>
		<br>
		<hr>		
		<!-- <h2>Temukan Data <br>Tanah Anda</h2> -->
		<p>Kami membantu anda melihat status tanah anda melalui database Si Desa pemerintah Desa Gantung </p>
		<hr>
		<br>
			<!-- <button type="submit" class="learnButton">Gunakan Lokasi</button> -->
			<button type="button" id="searchBtn" class="learnButton">Cari Data Tanah</button>
			<?php echo form_open('',array('id'=>'form_cari'));?>
			<div id="desa" class="form-group">
				<label for="">Desa</label>
				<select name="desa" class="form-control select2" id="">
					<option value="">--Pilih Desa--</option>
					<option value="1">Gantung</option>
					<option value="2">Lenggang</option>
					<option value="3">Selinsing</option>
					<option value="4">Batu Penyu</option>
					<option value="5">Jangkar Asam</option>
					<option value="6">Lilangan</option>
				</select>
			</div>
			<div id="cariDesa" class="pull-right">
			
				<button onclick="buka_dusun()"  class="btn btn-primary" type="button"><i class="fa fa-search"></i> Dusun</button>
				<button onclick="cari_desa()" class="btn btn-success" type="button"><i class="fa fa-search"></i> Desa</button>
			</div>
			<div id="dusun" class="form-group">
				<label for="">Dusun</label>
				<select name="dusun" class="form-control select2" id="">
					<option value="">--Pilih Dusun--</option>
					<option value="1">Baru</option>
					<option value="2">Rasau</option>
					<option value="3">Ganse</option>
				</select>
			</div>
			<div id="cariDusun" class="pull-right">
			
				<button onclick="buka_nik()"  class="btn btn-primary" type="button"><i class="fa fa-search"></i> Pemilik</button>
				<button onclick="cari_dusun()"  class="btn btn-success" type="button"><i class="fa fa-search"></i> Dusun </button>
			</div>

			<div id="nama_or_nik" class="form-group">
				<label for="">Nama / NIK</label>
				<input onkeyup="cari_data()" type="text" name="nikData" class="form-control" id="">
			</div>
			<div id="btnCari" class="pull-right">
				<button class="btn btn-warning" type="reset">Reset <i class="fa fa-ban"></i> </button>
				<button  onclick="cari_nik()"  class="btn btn-success" type="button">Cari <i class="fa fa-search"></i> </button>
			</div>
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
		
		<p style="font-size:9px;">Simple Project by <?php echo anchor('login','Si-Desa Gantung');?></p>
	</div>
		<!-- an empty div for the map -->
	<?php $this->load->view($main_content); ?>	



	
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
	<script src="<?php echo base_url().THEME; ?>bootstrap/js/bootstrap.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> -->
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY"></script>
	<script> var baseUrl = '<?php echo base_url();?>';</script>	
	<script type="text/javascript" src="<?php echo base_url().THEME; ?>plugins/canvas2image.js"></script>
    <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script> -->
	<!--  -->
	<script src="<?php echo base_url().THEME; ?>plugins/select2/select2.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url().APPS;?>js/peta.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url().APPS;?>js/search.js"></script>

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
