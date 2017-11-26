<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SKT Lampiran</title>
	<!-- -->
	<link rel="stylesheet" href="<?php echo BASE_URL.'assets/print.css' ?>">
	<!-- -->
</head>
<body id="logo-back">
<div id="container">
  <table>
    <tr>
      <td align="center"  style="padding-bottom:0;margin-bottom:0;">
				<img src="<?php echo BASE_URL.'assets/logo-beltim.png'; ?>" alt="Logo" width="90" >
			</td>
      <td colspan="7" align="center" class="header-surat"  style="padding-bottom:0;margin-bottom:0;">
        <h2>
          PEMERINTAH KABUPATEN <?php echo 'BELITUNG TIMUR'; ?> <br>
          KECAMATAN <?php echo 'GANTUNG'; ?><br>
          KANTOR KEPALA DESA <?php echo 'GANTUNG'; ?>
        </h2>
				<p><i>Alamat Kantor: <?php echo 'Jl Sudirman Dusun Rasau Desa Gantung Kecamatan Gantung Kabupaten Belitung Timur 33462'; ?></i></p>
      </td>
    </tr>
		<tr>
			<td colspan="8"><hr style="padding-top:0;margin-top:0;"></td>
		</tr>
    <tr>
      <td colspan="8" align="center">
        <h3><u>DENAH / SITUASI TANAH</h3>
      </td>
    </tr>
  </table>
	<table>
		<tr>
			<td  width="60%">
				<div style="height:480px;" id="map"></div>
			</td>
			<td width="40%" valign="top">
				<table>
			    <tr>
			      <td>Nama Pemohon</td>
			      <td>: Veris Juniardi</td>
			    </tr>
			    <tr>
			      <td>Luas</td>
			      <td>: <b><?php echo '800'; ?> M<sup>2</sup></b></td>
			    </tr>
			    <tr>
			      <td>Peruntukan</td>
			      <td>: <b><?php echo 'PERUMAHAN'; ?></b></td>
			    </tr>
			    <tr>
			      <td>Lokasi</td>
			      <td>: <b><?php echo 'DUSUN RASAU'; ?></b></td>
			    </tr>
					<tr>
						<td colspan="2"><hr/><br></td>
					</tr>
					<?php
					for ($i=0; $i < 5; $i++) {
					 ?>
					<tr>
						<td width="60%">
							<img width="100%" src="<?php echo PATOK.'1510755387IMG_20170526_154346.jpg'; ?>" alt="">
						</td>
						<td width="40%" valign="bottom">
							<h4>No.Patok <?php echo $i; ?></h4>
              <h5>
								Koor. Lat. (<b><i><?php echo $i; ?></i></b>)<br>
								Koor. Lng. (<b><i><?php echo $i; ?></i></b>)
							</h5>
						</td>
					</tr>
					<?php $i++; } ?>
			  </table>
			</td>
		</tr>
	</table>
	<hr>
  <table>
    <tr align="center">
			<td width="20%">
				<img src="<?php echo QRCODE.'gantung.si-desa.jpg'; ?>" class="img img-responsive" width="100%" alt="">
			</td>
      <td width="80%" colspan="3"  style="text-align:center">
        Mengetahui/ Menyetujui, <br>
        <b><?php echo 'KEPALA DESA GANTUNG'; ?></b>
        <br><br>&nbsp;<br><br><br><br>
        <b><?php echo 'SISWADI USMAN'; ?><b>
      </td>
    </tr>
  </table>
</div>
<script type="text/javascript">
function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: {lat: 24.886, lng: -70.268},
          mapTypeId: 'roadmap',
					disableDefaultUI: true,
					styles:[
						{
						    "featureType": "all",
						    "stylers": [
						      { "visibility": "off" }
						    ]
						 },
						 {

						 }
					]
        });

        var triangleCoords = [
          {lat: 25.774, lng: -80.190},
          {lat: 18.466, lng: -66.118},
          {lat: 32.321, lng: -64.757},
          {lat: 25.774, lng: -80.190}
        ];

        var bermudaTriangle = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: '#000000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FFFFFF',
          fillOpacity: 0.1
        });
        bermudaTriangle.setMap(map);
      }
	</script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwYQT-WMW5KgJUqF-PjmcSlFQ2iWmAiRI&callback=initMap"></script>
</body>
</html>
