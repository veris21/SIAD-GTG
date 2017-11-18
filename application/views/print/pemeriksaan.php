<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DATA PEMERIKSAAN</title>
	<!-- -->
	<link rel="stylesheet" href="<?php echo BASE_URL.'assets/print.css' ?>">
	<!-- -->
</head>
<body>
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
        <h3><u>BERITA ACARA PEMERIKSAAN</u><br><i style="font-weight:normal">Nomor : <?php echo $data['nomor']; ?></i></h3>
      </td>
    </tr>
  </table>
	<table >
      <tr>
        <td colspan="2">Pada hari ini <b>tanggal <?php echo $data['tglPeriksa']; ?></b> yang dihadiri dan disaksikan oleh masing - masing yang bertandatangan dibawah ini telah memeriksa sebidang tanah seluas <b><?php echo $data['tnhLuas']; ?> M<sup>2</sup></b> dengan ukuran Panjang <b><?php echo $data['tnhPanjang']; ?></b> meter dan Lebar
          <b><?php echo $data['tnhLebar']; ?> </b> meter yang terletak di <b><?php echo $data['tnhLokasi']; ?> DESA <?php echo $data['namaDesa']; ?> KECAMATAN <?php echo $data['namaKec']; ?> KABUPATEN <?php echo $data['namaKab']; ?></b> yang diakui pemohon :</td>
      </tr>
      <tr>
        <td colspan="2"></td>
      </tr>
			<tr>
				<td>Nama</td>
				<td>: <b><?php echo $data['nama']; ?></b></td>
			</tr>
			<tr>
				<td>NIK</td>
				<td>: <b><?php echo $data['nik']; ?></b></td>
			</tr>
			<tr>
				<td>Tempat Tanggal Lahir</td>
				<td>: <?php echo $data['ttl']; ?></td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td>: <?php echo $data['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>: <?php echo $data['alamat']; ?>
				</td>
			</tr>
			<tr>
				<td colspan="2"></td>
			</tr>
			<tr>
				<td colspan="2"><b>Batas - Batas Tanah :</b></td>
			</tr>
			<tr>
				<td>Batas Utara : <b><?php echo $data['tnhUtara']; ?></b></td>
				<td>Batas Timur : <b><?php echo $data['tnhTimur']; ?></b></td>
			</tr>
			<tr>
				<td>Batas Selatan : <b><?php echo $data['tnhSelatan']; ?></b></td>
				<td>Batas Barat : <b><?php echo $data['tnhBarat']; ?></b></td>
			</tr>
			<tr>
				<td colspan="2">
					Berdasarkan hasil pemeriksaan atas tanah tersebut disimpulkan bahwa :
					<ol>
						<?php
						//&#10004;' : '&#10006;
						$checked1 = ($data['tnhSengketa']=='on' ? '<b><i>V</i></b>' : '<b><i>X</i></b>');
						$checked2 = ($data['tnhJual']=='on' ?  '<b><i>V</i></b>' : '<b><i>X</i></b>');
						$checked3 = ($data['tnhBeban']=='on' ?  '<b><i>V</i></b>' : '<b><i>X</i></b>');
						$checked4 = ($data['tnhSurat']=='on' ?  '<b><i>V</i></b>' : '<b><i>X</i></b>');
						$checked5 = ($data['tnhPatok']=='on' ?  '<b><i>V</i></b>' : '<b><i>X</i></b>');
						$checked6 = ($data['tnhKelola']=='on' ?  '<b><i>V</i></b>' : '<b><i>X</i></b>');
						 ?>
						<li>
							Memang benar tanah tersebut tidak dalam sengketa <b>(<?php echo $checked1; ?>)</b>
						</li>
						<li>
							Tanah tersebut tidak pernah diperjualbelikan <b>(<?php echo $checked2; ?>)</b>
						</li>
						<li>
							Tanah tersebut tidak dibebani hak jaminan <b>(<?php echo $checked3; ?>)</b>
						</li>
						<li>
							Tanah tersebut tidak mempunyai surat menyurat <b>(<?php echo $checked4; ?>)</b>
						</li>
						<li>
							Tanah tersebut sudah dipasang tanda batas / patok <b>(<?php echo $checked5; ?>)</b>
						</li>
						<li>
							Tanah tersebut benar sudah dikelola <b>(<?php echo $checked6; ?>)</b>
						</li>
					</ol>
				</td>
			</tr>
		</table>
		<table>
      <tr>
				<td colspan="2">
				</td>
				<td colspan="2" style="text-align:center">
					<?php echo $data['namaDesa'].", ".$data['tglSurat']; ?>
					<br>Pemeriksa,
				</td>
			</tr>
      <tr>
        <td colspan="2"></td>
        <td>1. Nama: <b><?php echo $data['pemeriksa1Nama']; ?></b></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2"></td>
        <td width="200"><i>(<?php echo $data['pemeriksa1Jab']; ?>)</i></td>
        <td>(.......................)</td>
      </tr>
      <tr>
        <td colspan="2"></td>
        <td>2. Nama: <b><?php echo $data['pemeriksa2Nama']; ?></b></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2"></td>
        <td width="200"><i>(<?php echo $data['pemeriksa2Jab']; ?>)</i></td>
        <td>(.......................)</td>
      </tr>
      <tr>
				<td colspan="4">&nbsp;<br></td>
			</tr>
			<tr>
				<td>1. Nama</td>
				<td>: <b><?php echo $data['saksi1Nama']; ?></b?</td>
				<td>3. Nama</td>
				<td>: <b><?php echo $data['saksi3Nama']; ?></b></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>: <?php echo $data['saksi1Jab']; ?></td>
				<td>Jabatan</td>
				<td>: <?php echo $data['saksi3Jab']; ?></td>
			</tr>
			<tr>
				<td>Tanda Tangan</td>
				<td>: (. . . . . . . . . . . .)</td>
				<td>Tanda Tangan</td>
				<td>: (. . . . . . . . . . . .)</td>
			</tr>
			<tr>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td>2. Nama</td>
				<td>: <b><?php echo $data['saksi2Nama']; ?></b></td>
				<td>4. Nama</td>
				<td>: <b><?php echo $data['saksi4Nama']; ?></b></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>: <?php echo $data['saksi2Jab']; ?></td>
				<td>Jabatan</td>
				<td>: <?php echo $data['saksi4Jab']; ?></td>
			</tr>
			<tr>
				<td>Tanda Tangan</td>
				<td>: (. . . . . . . . . . . .)</td>
				<td>Tanda Tangan</td>
				<td>: (. . . . . . . . . . . .)</td>
			</tr>
      <tr>
				<td colspan="4">&nbsp;<br><br></td>
			</tr>
      <tr>
        <td colspan="4"  style="text-align:center">
          Mengetahui/ Menyetujui, <br>
					<b><?php echo "KEPALA DESA ".$data['namaDesa']; ?></b>
					<br><br>&nbsp;<br><br><br><br>
					<b><?php echo $data['namaKades']; ?><b>
        </td>
      </tr>
		</table>
	</div>
</body>
</html>
