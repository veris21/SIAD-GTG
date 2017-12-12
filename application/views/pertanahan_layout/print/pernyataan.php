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
          PEMERINTAH KABUPATEN <?php echo $data['nama_kabupaten'];//'BELITUNG TIMUR'; ?> <br>
          KECAMATAN <?php echo $data['nama_kecamatan'];//'GANTUNG'; ?><br>
          KANTOR KEPALA DESA <?php echo $data['nama_desa'];//'GANTUNG'; ?>
        </h2>
				<p><i>Alamat Kantor: <?php echo $data['alamat_desa'];//'Jl Sudirman Dusun Rasau Desa Gantung Kecamatan Gantung Kabupaten Belitung Timur 33462'; ?></i></p>
      </td>
    </tr>
		<tr>
			<td colspan="8"><hr style="padding-top:0;margin-top:0;"></td>
		</tr>
    <tr>
      <td colspan="8" align="center">
        <h3><?php echo $data['nama'];?></h3>
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
        <b><?php echo 'KEPALA DESA '.$data['nama_desa'];?></b>
        <br><br>&nbsp;<br><br><br><br>
        <b><?php echo $data['fullname'];?><b>
      </td>
    </tr>
  </table>
</div>
</body>
</html>