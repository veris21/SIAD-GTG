<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SKT Lampiran</title>
	<!-- -->
	<link rel="stylesheet" href="<?php echo BASE_URL.'assets/print.css' ?>">
	<!-- -->
</head>
<body>
<div id="container">
  <table>
        <tr>
            <td colspan="4" align="center"><h2><u>SURAT PERNYATAAN</u></h2></td>
        </tr>
        <tr>
            <td colspan="4"><p>Saya yang bertandatangan dibawah ini :</p></td>
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
            <td>Agama</td>
            <td colspan="3" align="left">: <?php echo $data['agama'];?></td>
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
        <tr>
            <td colspan="4"><p>Dengan ini menyatakan bahwa saya dengan itikad baik telah mengusahakan sebidang tanah terletak di :</p></td>
        </tr>
        <tr>
            <td>Lokasi</td>
            <td colspan="3" align="left">: <?php echo $data['lokasi'];?></td>
        </tr>
        <tr>
            <td>Dusun</td>
            <td colspan="3" align="left">: <?php echo $data['nama_dusun'];?></td>
        </tr>
        <tr>
            <td>Luas Tanah</td>
            <td colspan="3" align="left">: &plusmn; <?php echo $data['luas'];?> meter<sup>2</sup></td>
        </tr>
        <tr>
            <td>Status Tanah</td>
            <td colspan="3" align="left">: <?php echo $data['status_tanah'];?></td>
        </tr>
        <tr>
            <td>Dipergunakan Untuk</td>
            <td colspan="3" align="left">: <?php echo $data['peruntukan_tanah'];?></td>
        </tr>
        <tr>
            <td colspan="4"><p>Dengan batas - batas sebagai berikut : </p></td>
        </tr>
        <tr>
            <td colspan="2">
                <ul>
                    <li>Utara berbatasan dengan <b><?php echo $data['utara'];?></b></li>
                    <li>Timur berbatasan dengan <b><?php echo $data['timur'];?></b></li>
                </ul>
            </td>
            <td colspan="2">
                <ul>
                    <li>Selatan berbatasan dengan <b><?php echo $data['selatan'];?></b></li>
                    <li>Barat berbatasan dengan <b><?php echo $data['barat'];?></b></li>
                </ul>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <p>Tanah tersebut diusahakan sejak tahun <?php echo $data['tahun_kelola'];?> Sampai sekarang ini, dan tanah tersebut tidak pernah dalam sengketa, digadaikan, ataupun tersangkut suatu perkara dipengadilan.</p>
                <p>Surat Pernyataan ini saya buat dengan sebenarnya dengan penuh tanggungjawab, dan saya bersedia untuk mengangkat sumpah bila diperlukan, serta bersedia dituntut dihadapan pihak yang berwenang apabila pernyataan ini tidak benar dan saya tidak akan melibatkan para pihak yang mengesahkan pernyataan ini apabila dikemudian hari terjadi perbuatan hukum</p>
                <p>Demikian Surat Permohonan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
            </td>
        </tr>
</table> 
<table>
        <tr>
        <td align="center" width="40%">
            <img width="90" src="<?php echo QRCODE.$data['qr_link'];?>" alt="logo"><br>
            <i style="font-size:9px;">(Dokumen ini di generate otomatis melalui sistem SiDesa untuk melihat validasi dokumen silahkan scan Kode QR secara online)</i>
        </td>
        <td colspan="2" width="20%"></td>
        <td align="center" width="40%">
            <p><?php echo $data['nama_desa'].", ".mdate("%d-%m-%Y", $data['time']);?>
            <br>Yang membuat pernyataan,<br><br>&nbsp;<br><br><i style="font-size:9px;text-align:left;opacity:0.5;">materai 6000</i><br><br><br>
            <b><?php echo $data['nama'];?></b></p>
        </td>
        </tr>
</table>
<table>
        <tr>
            <td align="left" colspan="4">Saksi - Saksi</td>
        </tr>
        <tr>
        <td width="25%">
            <ul>
                <li>Nama : <b><?php echo $data['saksi1_nama'];?></b></li>
                <li>Umur : <b><?php echo $data['saksi1_umur'];?></b> Tahun</li>
                <li>Pekerjaan : <b><?php echo $data['saksi1_pekerjaan'];?></b></li>
                <li>Tanda Tangan :</li>
            </ul>
        </td>
        <td width="25%" valign="bottom">
            <ul>
                <li> (............)</li>
            </ul>
        </td>
        <td width="25%">
            <ul>
                <li>Nama : <b><?php echo $data['saksi3_nama'];?></b></li>
                <li>Umur : <b><?php echo $data['saksi3_umur'];?></b> Tahun</li>
                <li>Pekerjaan : <b><?php echo $data['saksi3_pekerjaan'];?></b></li>
                <li>Tanda Tangan :</li>
            </ul>
        </td>
        <td width="25%" valign="bottom">
            <ul>
                <li> (............)</li>
            </ul>
        </td>
        </tr>
        <tr>
        <td>
            <ul>
                <li>Nama : <b><?php echo $data['saksi2_nama'];?></b></li>
                <li>Umur : <b><?php echo $data['saksi2_umur'];?></b> Tahun</li>
                <li>Pekerjaan : <b><?php echo $data['saksi2_pekerjaan'];?></b></li>
                <li>Tanda Tangan :</li>
            </ul>
        </td>
        <td valign="bottom">
            <ul>
                <li> (............)</li>
            </ul>
        </td>
        <td>
            <ul>
                <li>Nama : <b><?php echo $data['saksi4_nama'];?></b></li>
                <li>Umur : <b><?php echo $data['saksi4_umur'];?></b> Tahun</li>
                <li>Pekerjaan : <b><?php echo $data['saksi4_pekerjaan'];?></b></li>
                <li>Tanda Tangan :</li>
            </ul>
        </td>
        <td valign="bottom">
            <ul>
                <li> (............)</li>
            </ul>
        </td>
        </tr>
</table> 
<table>
        <tr>
        <td width="20%"></td>
        <td width="60%" colspan="2"><br>
            Nomor : <b><?php echo "181/".$data['id']."-PERNYATAAN/".$data['nama_desa']."/".mdate("%m/%Y", $data['time']);?></b><br>
            Tanggal : <b><?php echo mdate("%d - %m - %Y", $data['time']);?></b>
        <p align="center">
            KEPALA DESA <?php echo $data['nama_desa'];?>
            <br><br>&nbsp;<br><br><br><br><br>
            <b><?php echo $data['fullname'];?></b>
        </p>
        </td>
        <td width="20%"></td>
        </tr>
  </table>
</div>
</body>
</html>