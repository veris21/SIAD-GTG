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
        <td colspan="3" width="70%"></td>
        <td width="30%">
            <p><?php echo $data['nama_desa'].",".mdate("%d-%m-%Y",$data['time']); ?></p>
            <p>Kepada Yth : <br>
            Bapak/Ibu Kepala Desa <?php echo $data['nama_desa'];?> <br>
            di - Tempat</p>
        </td>
        </tr>
        <tr>
            <td colspan="4"><br></td>
        </tr>
        <tr>
            <td width="25%">Perihal</td>
            <td colspan="3" align="left">: <b>Mohon Penerbitan SKT / Rekomendasi</b></td>
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
            <td colspan="4"><p>Dengan ini mengajukan permohonan kepada pemerintah Desa <?php echo $data['nama_desa'];?> agar dapat menerbitkan Surat Keterangan Tanah (SKT) yang saya usahakan sendiri yang terletak di :</p></td>
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
            <td colspan="4">
                <p>Dengan batas - batas sebagai berikut : </p>
                <ul>
                    <li>Sebelah Utara berbatasan dengan <b><?php echo $data['utara'];?></b></li>
                    <li>Sebelah Timur berbatasan dengan <b><?php echo $data['timur'];?></b></li>
                    <li>Sebelah Selatan berbatasan dengan <b><?php echo $data['selatan'];?></b></li>
                    <li>Sebelah Barat berbatasan dengan <b><?php echo $data['barat'];?></b></li>
                </ul>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <p>Apabila hak garap atas sebidang tanah yang saya mohon dikemudian hari terdapat suatu perkara baik pidana maupun perdata, maka saya tidak akan melibatkan para pihak yang menerbitkan maupun pihak yang mengesahkan atas terbitnya SKT tersebut dan akan menjadi tanggung jawab saya pribadi.</p>
                
                <p>Demikian Surat Permohonan ini dibuat dan saya lampirkan surat pernyataan untuk menjadi bahan pertimbangan Bapak/Ibu Kepala Desa <?php echo $data['nama_desa'];?> untuk menerbitkan SKT tersebut. Atas bantuan dan perhatian Bapak/Ibu diucapkan terima kasih.</p>
            </td>
        </tr>
        <tr>
            <td colspan="4"><br></td>
        </tr>
        <tr>
        <td align="center" width="20%">
            <img width="90" src="<?php echo QRCODE.$data['qr_link'];?>" alt="logo">
            <!-- <img src="<?php echo BASE_URL.'assets/logo-beltim.png'; ?>" alt="Logo" width="90" > --><br>
            <i style="font-size:9px;">(Dokumen ini di generate otomatis melalui sistem SiDesa untuk melihat validasi dokumen silahkan scan Kode QR secara online)</i>
        </td>
        <td colspan="2" width="40%"></td>
        <td align="center" width="40%">
            <p>Hormat Saya,<br><br>&nbsp;<br><br><br><br><br>
            <b><?php echo $data['nama'];?></b></p>
        </td>
        </tr>
  </table>
</div>
</body>
</html>