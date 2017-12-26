<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lembar Disposisi></title>
	<!-- -->
	<link rel="stylesheet" href="<?php echo base_url('assets/print.css'); ?>">
	<!-- -->
</head>
<body>
<div id="container">
  <table>
    <tr>
      <td align="center"  style="padding-bottom:0;margin-bottom:0;">
				<img src="<?php echo base_url('assets/logo-beltim.png'); ?>" alt="Logo" width="90" >
			</td>
      <td colspan="7" align="center" class="header-surat"  style="padding-bottom:0;margin-bottom:0;">
        <h2>
          PEMERINTAH KABUPATEN <?php echo strtoupper($header['nama_kabupaten']); ?> <br>
          KECAMATAN <?php echo strtoupper($header['nama_kecamatan']); ?><br>
          KANTOR KEPALA DESA <?php echo strtoupper($header['nama_desa']); ?>
        </h2>
				<p><i>Alamat Kantor: <?php echo $header['alamat_desa']; ?></i></p>
      </td>
    </tr>
  </table>
  <table>
  <tr>
    <td>Kode : <?php echo $data['kode']."-".$data['klasifikasi'];?></td>
    <td>Sifat : <?php echo $data['sifat'];?></td>
    <td>Sifat : <?php echo $data['sifat'];?></td>
    <td>Pengirim : <?php echo $data['pengirim'];?></td>
  </tr>
  <tr>
    <td>Pengirim : <?php echo $data['pengirim'];?></td>
    <td>Pengirim : <?php echo $data['pengirim'];?></td>
    <td>Pengirim : <?php echo $data['pengirim'];?></td>
    <td>Pengirim : <?php echo $data['pengirim'];?></td>
  </tr>
  </table>
</div> 
</body> 
</html>