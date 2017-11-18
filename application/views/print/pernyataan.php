<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DATA PERNYATAAN</title>

	<!-- -->
	<link rel="stylesheet" href="<?php echo BASE_URL.'assets/print.css' ?>">
	<!-- -->
</head>
<body>
<div id="container">
	<h2>SURAT PERNYATAAN <br>__________</h2>
		<table >
			<tr>
				<td colspan="2">Yang bertanda tangan dibawah ini :</td>
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
				<td>Jenis Kelamin</td>
				<td>: <?php echo $data['kelamin']; ?></td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>: <?php echo $data['agama']; ?></td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td>: <?php echo $data['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>: <?php echo "DUSUN ".$data['namaDSN']." RT ".$data['namaRT']." DESA ".$data['namaDesa']." KECAMATAN ".$data['namaKec']; ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">Dengan ini menyatakan bahwa saya dengan itikad baik telah mengusahakan / menguasai sebidang tanah yang terletak di :</td>
			</tr>
			<tr>
				<td>Tempat/ Lokasi</td>
				<td>: <b><?php echo $data['tnhLokasi']; ?></b></td>
			</tr>
			<tr>
				<td>Desa</td>
				<td>: <?php echo $data['namaDesa']; ?></td>
			</tr>
			<tr>
				<td>Kecamatan</td>
				<td>: <?php echo $data['namaKec']; ?></td>
			</tr>
			<tr>
				<td>Kabupaten</td>
				<td>: <?php echo $data['namaKab']; ?></td>
			</tr>
			<tr>
				<td>Luas</td>
				<td>: <?php echo $data['tnhLuas']; ?> M2 dengan ukuran <b>panjang </b>
					<?php echo $data['tnhPanjang']; ?> meter dan <b>lebar </b><?php echo $data['tnhLebar']; ?> meter</td>
			</tr>
			<tr>
				<td>Status Tanah</td>
				<td>: <b><?php echo $data['tnhStatus']; ?></b></td>
			</tr>
			<tr>
				<td>Dipergunakan Untuk</td>
				<td>: <b><?php echo $data['tnhUntuk']; ?></b></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">Batas - batas tanah :</td>
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
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">Tanah tersebut diusahakan sejak tahun <b><?php echo $data['tnhKet']; ?></b> sampai sekarang ini, dan tanah tersebut tidak pernah dalam sengketa, digadaikan, ataupun tersangkut suatu perkara dipengadilan. <br> Surat pernyataan ini saya buat dengan sebenarnya dengan penuh tanggungjawab, dan saya bersedia untuk mengangkat sumpah bila diperlukan, serta bersedia dituntut dihadapan pihak yang berwenang apabila dikemudian hari terjadi perbuatan hukum. <br> Demikian Surat Pernyataan ini saya buat untuk dapat dipergunakan sebagaimana mestinya.</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		</table>
		<table>
			<tr>
				<td colspan="2" style="text-align:center">
					Mengetahui/ Menyetujui, <br>
					<?php echo "KEPALA DESA ".$data['namaDesa']; ?>
					<br><br>&nbsp;&nbsp;<br><br><br><br><br>
					<b><?php echo $data['namaKades']; ?><b>
				</td>
				<td colspan="2" style="text-align:center">
					<?php echo $data['namaDesa'].", ".$data['tglSurat']; ?>
					<br><br><br>&nbsp;&nbsp;<br><br><br><br><br>
					<b><?php echo $data['nama']; ?></b>
				</td>
			</tr>
			<tr>
				<td colspan="4">&nbsp;<br><br></td>
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
		</table>
	</div>
</body>
</html>
