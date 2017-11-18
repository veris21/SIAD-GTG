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
        <h3><u>SURAT KETERANGAN TANAH</u><br><i style="font-weight:normal">Nomor : <?php echo $data['nomorSKT']; ?></i></h3>
      </td>
    </tr>
  </table>

  <table>
    <tr>
      <td colspan="2">Yang bertanda tangan dibawah ini <?php echo $data['pjDesaJab']." KECAMATAN ".$data['namaKec']." KABUPATEN ".$data['namaKab']; ?> menerangkan bahwa :</td>
    </tr>
    <tr>
      <td>N a m a</td>
      <td> : <?php echo $data['nama']; ?></td>
    </tr>
    <tr>
      <td>NIK</td>
      <td> : <?php echo $data['nik']; ?></td>
    </tr>
    <tr>
      <td>Tempat/Tanggal Lahir</td>
      <td> : <?php echo $data['ttl']; ?></td>
    </tr>
    <tr>
      <td>Pekerjaan</td>
      <td> : <?php echo $data['pekerjaan']; ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td> : <?php echo $data['alamat']; ?></td>
    </tr>
  </table>
  <br>
  <table>
    <tr>
      <td colspan="2">Berdasarkan Surat Pernyataan Tanggal <i><?php echo $data['tglSurat']; ?></i> dan hasil Pemeriksaan kami pada Tanggal <i><?php echo $data['tglPeriksa']; ?></i> Dengan nomor : <b><?php echo $data['nomorPeriksa']; ?></b> Memang benar yang bersangkutan menguasai/mengusahakan sebidang tanah yang terletak/berlokasi di
      <?php echo $data['tnhLokasi']." RT ".$data['namaRT']." DESA ".$data['namaDesa']." KECAMATAN ".$data['namaKec']." KABUPATEN ".$data['namaKab']; ?> yang digunakan untuk <b>
      <?php echo $data['tnhUntuk'];?></b> Seluas <b><?php echo $data['tnhLuas']; ?> M<sup>2</sup></b> dengan ukuran <b>panjang </b> <?php echo $data['tnhPanjang']; ?> meter dan <b>lebar </b><?php echo $data['tnhLebar']; ?> meter, dengan batas -batas tanah :
    </td>
    </tr>
    <tr>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td>Sebelah Utara berbatasan dengan</td>
      <td> : <?php echo $data['tnhUtara'] ?></td>
    </tr>
    <tr>
      <td>Sebelah Selatan berbatasan dengan</td>
      <td> : <?php echo $data['tnhSelatan'] ?></td>
    </tr>
    <tr>
      <td>Sebelah Timur berbatasan dengan</td>
      <td> : <?php echo $data['tnhTimur'] ?></td>
    </tr>
    <tr>
      <td>Sebelah Barat berbatasan dengan</td>
      <td> : <?php echo $data['tnhBarat'] ?></td>
    </tr>
    <tr>
      <td colspan="2"><br></td>
    </tr>
    <tr>
      <td colspan="2"><?php echo $data['tnhKet']; ?></td>
    </tr>
    <tr>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td colspan="2">Selanjutnya kepada yang bersangkutan diwajibkan untuk :
      <ol>
        <li>Memasang tanda batas tanah.</li>
        <li>Memelihara dan mengerjakan tanah dengan baik.</li>
        <li>Tidak dibenarkan mengalihkan tanahnya kepada pihak lain tanpa seizin <b>Pejabat</b> yang berwenang.</li>
        <li>Surat Keterangan Tanah ini bukan merupakan <b>Bukti Hak Milik.</b></li>
        <li>Apabila tanah tersebut dalam jangka waktu 6 (enam) bulan terhitung tanggal surat ini ditetapkan tidak dikelola maka Kepala Desa berhak mencabut Surat Keterangan Tanah ini.</li>
      </ol>
    </td>
    </tr>
  </table>
  <table>
    <tr>
      <td colspan="4">Demikianlah surat keterangan ini kami buat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya.</td>
    </tr>
    <tr>
      <td colspan="4"></td>
    </tr>
    <tr>
      <td colspan="4"align="left">Telah Diregister <br>
        di Kantor Camat <?php echo $data['namaKec']; ?>
      </td>
    </tr>
    <tr>
      <td>Nomor</td><td><b style="font-family: Consolas, Monaco, Courier New, Courier, monospace;"> : <?php echo $data['nomorSuratCamat']; ?></b></td>
      <td>Ditetapkan di</td><td><b> : <?php echo $data['namaDesa']; ?></b></td>
    </tr>
    <tr>
      <td>Tanggal</td><td><b style="font-family: Consolas, Monaco, Courier New, Courier, monospace;"> : <?php echo $data['tanggalSuratCamat']; ?></b></td>
      <td>Pada Tanggal</td><td><i> : <?php echo $data['tglSKT']; ?></i></td>
    </tr>
    <tr style="font-family: Consolas, Monaco, Courier New, Courier, monospace;">
      <td valign="top" align="center" colspan="2">______________________________</td>
      <td valign="top" align="center" colspan="2">______________________________</td>
    </tr>
    <tr>
      <td valign="top" align="center" colspan="2">
        <b>
          <?php echo "CAMAT ".$data['namaKec']; ?><br><br>&nbsp;<br><br><br><br>
          <?php echo $data['pjKec']; ?><br>
          NIP.<i style="font-family: Consolas, Monaco, Courier New, Courier, monospace;">
            <?php echo $data['nip']; ?>
          </i>
        </b>
      </td>
      <td align="center" colspan="2">
        <b>
          <?php echo $data['pjDesaJab']; ?><br><br>&nbsp;<br><br><br><br>
          <?php echo $data['pjDesa']; ?>
        </b>
      </td>
    </tr>
  </table>
</div>
</body>
</html>
