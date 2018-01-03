<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Berita Acara</title>
	<!-- -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/print.css' ?>">
	<!-- -->
</head>
<body id="logo-back">
<div id="container">
  <table>
    <tr>
      <td align="center"  style="padding-bottom:0;margin-bottom:0;">
				<img src="<?php echo base_url().'assets/logo-beltim.png'; ?>" alt="Logo" width="80" >
			</td>
      <td colspan="7" align="center" class="header-surat"  style="padding-bottom:0;margin-bottom:0;">
        <h2 style="padding-bottom:0;margin-bottom:0;">
          PEMERINTAH KABUPATEN <?php echo strtoupper($data['nama_kabupaten']); ?> <br>
          KECAMATAN <?php echo strtoupper($data['nama_kecamatan']); ?><br>
          KANTOR KEPALA DESA <?php echo strtoupper($data['nama_desa']); ?>
        </h2>
				<p style="padding-bottom:0;margin-bottom:0;">Alamat Kantor: <?php echo $data['alamat_desa']; ?></p>
      </td>
    </tr>
		<tr>
			<td colspan="8"><hr style="padding-top:0;margin-top:0;padding-bottom:0;margin-bottom:0;"></td>
		</tr>
    <tr>
      <td colspan="8" align="center">
        <h3 style="padding-bottom:0;margin-bottom:0;"><u>BERITA ACARA PEMERIKSAAN LAHAN/ LOKASI</u><br>
        Nomor :<i style="font-weight: lighter;font-family: Consolas, Monaco, Courier New, Courier, monospace;"> <?php echo "181/".$data['id']."-BAP/KTD.".strtoupper($data['nama_desa'])."/".romawi(mdate("%m",$data['time']))."/".mdate("%Y",$data['time']);?></i></h3>
      </td>
    </tr>
  </table>
  <table>
        <tr>
            <td colspan="4">
                <p style="text-align:justify;">
                Pada hari ini <?php echo nama_hari(mdate("%D",$data['time']));?>, Tanggal <?php echo terbilang(mdate("%d", $data['time']));?> Bulan <?php echo bulan(mdate("%m", $data['time']));?> Tahun <?php echo terbilang(mdate("%Y", $data['time']));?> (<?php echo mdate("%d-%m-%Y", $data['time']); ?>) yang dihadiri oleh masing - masing yang bertandatangan dibawah ini, telah dilakukan pemeriksaan sebidang tanah yang dipergunakan untuk <b><?php echo $data['peruntukan_tanah'];?></b> dengan Luas &plusmn; <b><?php echo number_format($data['luas'], 1, ',', '.');;?></b> m<sup>2</sup> yang terletak di <?php echo $data['lokasi'];?> <?php echo "Dusun ".$data['nama_dusun']." Desa ".$data['nama_desa']." Kecamatan ".$data['nama_kecamatan']." Kabupaten ".$data['nama_kabupaten'];?>, yang dimohon oleh :
                </p>
            </td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td colspan="3" align="left">: <?php echo $data['nama'];?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td colspan="3" align="left">: <?php echo $data['jenis_kelamin'];?></td>
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td colspan="3" align="left">: <?php echo $data['tempat_lahir'].",".$data['tanggal_lahir'];?></td>
        </tr>
        
        <tr>
            <td>Status Perkawinan</td>
            <td colspan="3" align="left">: <?php echo $data['status'];?></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td colspan="3" align="left">: <?php echo $data['pekerjaan'];?></td>
        </tr>
        <tr>
            <td>NIK/KTP</td>
            <td colspan="3" align="left">: <?php echo $data['no_nik'];?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td colspan="3" align="left">: <?php echo $data['alamat'];?></td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>        
        <tr >
            <td colspan="4"><p style="padding-bottom:0;margin-bottom:0;">Dengan batas - batas sebagai berikut : </p></td>
        </tr>
        <tr>
            <td colspan="2">                
                <p>- Utara berbatasan dengan <b><?php echo $data['utara'];?></b><br>
                    - Timur berbatasan dengan <b><?php echo $data['timur'];?></b></p>
            </td>
            <td colspan="2">                
                <p>- Selatan berbatasan dengan <b><?php echo $data['selatan'];?></b><br>
                    - Barat berbatasan dengan <b><?php echo $data['barat'];?></b></p>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <p style="padding-bottom:0;margin-bottom:0;">Berdasarkan hasil pemeriksaan atas tanah tersebut disimpulkan bahwa :</p>
            <ol>
                <li>Memang benar tanah tersebut tidak dalam sengketa  (. . .)</li>
                <li>Tanah tersebut tidak pernah diperjualbelika  (. . .)</li>
                <li>Tanah tersebut tidak dibebani hak jaminan  (. . .)</li>
                <li>Tanah tersebut tidak mempunyai surat menyurat  (. . .)</li>
                <li>Tanah tersebut sudah dipasang tanda/patok batas  (. . .)</li>
                <li>Tanah tersebut benar sudah dikelola  (. . .)</li>
            </ol>
            <!-- <p style="text-align:justify;">Berita Acara ini dipergunakan untuk Pembuatan Surat Keterangan Tanah disertai Peta/Sketsa gambar lokasi <b><i>terlampir</i></b></p>
            <p style="text-align:justify;">Demikianlah Berita Acara Pemeriksaan Lahan/Lokasi ini dibuat untuk diketahui dan dipergunakan seperlunya.</p>
            </td> -->
        </tr>
</table> 
<table>
        <tr>
        <td align="center" width="30%">
            <img width="90" src="<?php echo base_url().QRCODE.$data['qr_link'];?>" alt="logo"><br>
            <i style="font-size:9px;font-family: Consolas, Monaco, Courier New, Courier, monospace;">(Dokumen ini di generate otomatis melalui sistem SiDesa untuk melihat validasi dokumen silahkan scan Kode QR secara online)</i>
        </td>
        <td width="10%"></td>
        <td colspan="2" align="left" width="60%">
            <p><?php echo $data['nama_desa'].", ".mdate("%d", $data['time'])." ".bulan(mdate("%m", $data['time']))." ".mdate("%Y", $data['time']);?>
            <br>Pemeriksa :
            <table style="font-size:11px;font-family: Consolas, Monaco, Courier New, Courier, monospace;padding-top:0;margin-top:0;">
                <tr>
                    <td width="70%">1. <b><?php echo $ketua_pemeriksa['fullname']; ?></b><br> (<?php echo $ketua_pemeriksa['keterangan_jabatan']; ?>) </td>
                    <td width="30%">(...........)</td>
                </tr>
                <tr>
                    <td width="70%">2. <b><?php echo $pemeriksa_1['fullname']; ?></b><br> (<?php echo $pemeriksa_1['keterangan_jabatan']; ?>)  </td>
                    <td width="30%">(...........)</td>
                </tr>
                <tr>
                    <td width="70%">3. <b><?php echo $pemeriksa_2['fullname']; ?></b><br> (<?php echo $pemeriksa_2['keterangan_jabatan']; ?>)  </td>
                    <td width="30%">(...........)</td>
                </tr>
                <tr>
                    <td width="70%">4. <b><?php echo $pemeriksa_3['fullname']; ?></b><br> (<?php echo $pemeriksa_3['keterangan_jabatan']; ?>)  </td>
                    <td width="30%">(...........)</td>
                </tr>
                <tr>
                    <td width="70%">5. <b><?php echo $pemeriksa_4['fullname']; ?></b><br> (<?php echo $pemeriksa_4['keterangan_jabatan']; ?>)  </td>
                    <td width="30%">(...........)</td>
                </tr>
            </table>
            </p>
        </td>
        </tr>
</table>
<table>
<tr>
<td align="center" colspan="5">Saksi - Saksi :</td>
</tr>
<tr style="font-size:10px;">
<td width="30%">
<ul>
    <li>Nama : <b><?php echo $data['saksi1_nama'];?></b></li>
    <li>Pekerjaan : <b><?php echo $data['saksi1_pekerjaan'];?></b></li>
    <li>Alamat : <b><?php echo $data['saksi1_alamat'];?></b></li>                
</ul>
</td>
<td width="20%" valign="bottom" align="center">
(..............)
</td>
<td width="30%">
<ul>
    <li>Nama : <b><?php echo $data['saksi3_nama'];?></b></li>                
    <li>Pekerjaan : <b><?php echo $data['saksi3_pekerjaan'];?></b></li>
    <li>Alamat : <b><?php echo $data['saksi3_alamat'];?></b></li>
</ul>
</td>
<td width="20%" valign="bottom" align="center">
(..............)
</td>
</tr>
<tr style="font-size:10px;">
<td width="30%">
<ul>
    <li>Nama : <b><?php echo $data['saksi2_nama'];?></b></li>                
    <li>Pekerjaan : <b><?php echo $data['saksi2_pekerjaan'];?></b></li>
    <li>Alamat : <b><?php echo $data['saksi2_alamat'];?></b></li>
</ul>
</td>
<td width="20%" valign="bottom" align="center">
(..............)
</td>
<td width="30%">
<ul>
    <li>Nama : <b><?php echo $data['saksi4_nama'];?></b></li>                
    <li>Pekerjaan : <b><?php echo $data['saksi4_pekerjaan'];?></b></li>
    <li>Alamat : <b><?php echo $data['saksi4_alamat'];?></b></li>
</ul>
</td>
<td width="20%" valign="bottom" align="center">
(..............)
</td>
</tr>
</table> 
<br><br>
<table>
        <tr>
        <td colspan="4">
        <p align="center">Mengetahui, <br>
            <?php echo strtoupper($data['jabatan_kades']);?>
            <br><br>&nbsp;<br><br><br><br><br>
            <b><?php echo $data['nama_kades'];?></b>
        </p>
        </td>
        </tr>
  </table>
</div>
</body>
</html>
