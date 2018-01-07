<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SKT <?php echo $data['nama']; ?></title>

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
          PEMERINTAH KABUPATEN <?php echo $data['namaKab']; ?> <br>
          KECAMATAN <?php echo $data['namaKec']; ?><br>
          KANTOR KEPALA DESA <?php echo $data['namaDesa']; ?>
        </h2>
				<p><i>Alamat Kantor: <?php echo $data['alamatDesa']; ?></i></p>
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
      <td>Nama Pemohon</td>
      <td>: <b><?php echo $data['nama']; ?></b></td>
    </tr>
    <tr>
      <td>Luas</td>
      <td>: <b><?php echo $data['tnhLuas']; ?> M<sup>2</sup></b></td>
    </tr>
    <tr>
      <td>Peruntukan</td>
      <td>: <b><?php echo $data['tnhUntuk']; ?></b></td>
    </tr>
    <tr>
      <td>Lokasi</td>
      <td>: <b><?php echo $data['tnhLokasi']; ?></b></td>
    </tr>
  </table>
  <table >
    <tr>
      <td width="60%" border-right="1">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</td>
      <td width="40%">
        <table width="40%">
          <?php $n=1; foreach ($koordinat->result() as $k) {
          ?><tr>
            <td valign="bottom" align="right">
              <h4>Patok No.<?php echo $n; ?></h4>
              <h4>Koor. Lat. (<b><i><?php echo $k->koordinat_x; ?></i></b>)</h4>
              <h4>Koor. Lng. (<b><i><?php echo $k->koordinat_y; ?></i></b>)</h4>
            </td>
            <td><img width="160" src="<?php echo BASE_URL.'uploader/patok/'.$k->lampiran; ?>" alt="FOTO PATOK"></td>
          </tr>
        <?php $n++;
        } ?>
        </table>
    </td>
    </tr>
  </table>
  <table>
    <tr>
      <td colspan="4"  style="text-align:center">
        Mengetahui/ Menyetujui, <br>
        <b><?php echo $data['pjDesaJab']; ?></b>
        <br><br>&nbsp;<br><br><br><br>
        <b><?php echo $data['pjDesa']; ?><b>
      </td>
    </tr>
  </table>
</div>
</body>
</html>
