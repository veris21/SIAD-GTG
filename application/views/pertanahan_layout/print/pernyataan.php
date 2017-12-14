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
                <p style="text-align:justify;">Tanah tersebut diusahakan sejak tahun <?php echo $data['tahun_kelola'];?> Sampai sekarang ini, dan tanah tersebut tidak pernah dalam sengketa, digadaikan, ataupun tersangkut suatu perkara dipengadilan.</p>
                <p style="text-align:justify;">Surat Pernyataan ini saya buat dengan sebenarnya dengan penuh tanggungjawab, dan saya bersedia untuk mengangkat sumpah bila diperlukan, serta bersedia dituntut dihadapan pihak yang berwenang apabila pernyataan ini tidak benar dan saya tidak akan melibatkan para pihak yang mengesahkan pernyataan ini apabila dikemudian hari terjadi perbuatan hukum</p>
                <p>Demikian Surat Permohonan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
            </td>
        </tr>
</table> 
<table>
        <tr>
        <td align="center" width="40%">
            <img width="90" src="<?php echo QRCODE.$data['qr_link'];?>" alt="logo"><br>
            <i style="font-size:9px;font-family: Consolas, Monaco, Courier New, Courier, monospace;">(Dokumen ini di generate otomatis melalui sistem SiDesa untuk melihat validasi dokumen silahkan scan Kode QR secara online)</i>
        </td>
        <td colspan="2" width="20%"></td>
        <td align="center" width="40%">
            <p><?php echo $data['nama_desa'].", ".mdate("%d", $data['time'])." ".bulan(mdate("%m", $data['time']))." ".mdate("%Y", $data['time']);?>
            <br>Yang membuat pernyataan,<br><br>&nbsp;<br><br><i style="font-size:9px;text-align:left;opacity:0.5;">materai 6000</i><br><br><br>
            <b><?php echo $data['nama'];?></b></p>
        </td>
        </tr>
</table>
<table>
        <tr>
            <td align="left" colspan="4">Saksi - Saksi</td>
        </tr>
        <tr style="font-size:10px;">
        <td width="30%">
            <ul>
                <li>Nama : <b><?php echo $data['saksi1_nama'];?></b></li>
                <li>Pekerjaan : <b><?php echo $data['saksi1_pekerjaan'];?></b></li>
                <li>Alamat : <b><?php echo $data['saksi1_alamat'];?></b></li>                
                <li>Tanda Tangan :</li>
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
                <li>Tanda Tangan :</li>
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
                <li>Tanda Tangan :</li>
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
                <li>Tanda Tangan :</li>
            </ul>
        </td>
        <td width="20%" valign="bottom" align="center">
            (..............)
        </td>
        </tr>
</table> 
<br><br><br>
<table>
    <tr>
        <td align="left" width="50%">
            <p class="backed">
            Nomor : <b style="font-family: Consolas, Monaco, Courier New, Courier, monospace;"><?php echo "181/".$data['id']."-PERNYATAAN/".strtoupper($data['nama_desa'])."/".mdate("%m/%Y", $data['time']);?></b><br>
            Tanggal : <b style="font-family: Consolas, Monaco, Courier New, Courier, monospace;"><?php echo mdate("%d", $data['time'])." ".bulan(mdate("%m", $data['time']))." ".mdate("%Y", $data['time']);?></b>        
            </p>
       </td>
       <td width="50%" ></td>
    </tr>
</table>
<table>
        <tr>
        <td colspan="4">
        <p align="center">Mengetahui, <br>
            KEPALA DESA <?php echo strtoupper($data['nama_desa']);?>
            <br><br>&nbsp;<br><br><br><br><br>
            <b><?php echo $data['fullname'];?></b>
        </p>
        </td>
        </tr>
  </table>
</div>
</body>
</html>