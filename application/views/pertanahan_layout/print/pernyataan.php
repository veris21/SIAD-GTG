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
                - Utara berbatasan dengan <b><?php echo $data['utara'];?></b><br> 
                - Timur berbatasan dengan <b><?php echo $data['timur'];?></b>
            </td>
            <td colspan="2">
                - Selatan berbatasan dengan <b><?php echo $data['selatan'];?></b><br> 
                - Barat berbatasan dengan <b><?php echo $data['barat'];?></b>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <p style="text-align:justify;">Tanah tersebut diusahakan sejak tahun <?php echo $data['tahun_kelola'];?> Sampai sekarang ini, dan tanah tersebut tidak pernah dalam sengketa, digadaikan, ataupun tersangkut suatu perkara dipengadilan.</p>
                <p style="text-align:justify;">Surat Pernyataan ini saya buat dengan sebenarnya dengan penuh tanggungjawab, dan saya bersedia untuk mengangkat sumpah bila diperlukan, serta bersedia dituntut dihadapan pihak yang berwenang apabila pernyataan ini tidak benar dan saya tidak akan melibatkan para pihak yang mengesahkan pernyataan ini apabila dikemudian hari terjadi perbuatan hukum.</p>
                <!-- <p>Demikian Surat Permohonan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p> -->
            </td>
        </tr>
</table> 
<table width="100%">
        <tr>
        <td valign="top" colspan="2" width="50%"><p>
        Nomor :<b><?php echo "181/".$data['id']."-PER/".strtoupper($data['nama_desa'])."/".romawi(mdate("%m", $data['time']))."/".mdate("%Y", $data['time']);?></b></p>
        <center>
            <img width="90" src="<?php echo base_url().QRCODE.$data['qr_link'];?>" alt="logo"><br>
            <i style="font-size:9px;font-family: Consolas, Monaco, Courier New, Courier, monospace;">(Dokumen ini di generate otomatis melalui sistem SiDesa)</i>
        </center>
        </td>
        <td colspan="2" align="center" width="50%">
            <p><?php echo $data['nama_desa'].", ".mdate("%d", $data['time'])." ".bulan(mdate("%m", $data['time']))." ".mdate("%Y", $data['time']);?>
            <br>Yang membuat pernyataan,<br><br><br><i style="font-size:9px;text-align:left;opacity:0.5;">materai 6000</i><br><br><br>
            <b><?php echo $data['nama'];?></b></p>
        </td>
        </tr>
<!-- </table>
<table >     -->

        <tr>
            <td colspan="4"  width="100%">Saksi - Saksi</td>
        </tr>

        <tr style="font-size:10px;">
            <td width="25%">
            - Nama : <b><?php if($data['saksi1_nama']!=''){echo $data['saksi1_nama'];}else{echo "...........";}?></b><br> 
            - Pekerjaan : <b><?php if($data['saksi1_pekerjaan']!=''){echo $data['saksi1_pekerjaan'];}else{echo "...........";}?></b><br> 
            - Alamat : <b><?php if($data['saksi1_alamat']!=''){echo $data['saksi1_alamat'];}else{echo "...........";}?></b><br> 
            - Tanda Tangan : (..............)
            </td>

            <td width="25%">
            - Nama : <b><?php if($data['saksi2_nama']!=''){echo $data['saksi2_nama'];}else{echo "...........";}?></b><br> 
            - Pekerjaan : <b><?php if($data['saksi2_pekerjaan']!=''){echo $data['saksi2_pekerjaan'];}else{echo "...........";}?></b><br> 
            - Alamat : <b><?php if($data['saksi2_alamat']!=''){echo $data['saksi2_alamat'];}else{echo "...........";}?></b><br> 
            - Tanda Tangan : (..............)
            </td>

            <td  width="25%">
            - Nama : <b><?php if($data['saksi3_nama']!=''){echo $data['saksi3_nama'];}else{echo "...........";}?></b><br> 
            - Pekerjaan : <b><?php if($data['saksi3_pekerjaan']!=''){echo $data['saksi3_pekerjaan'];}else{echo "...........";}?></b><br> 
            - Alamat : <b><?php if($data['saksi3_alamat']!=''){echo $data['saksi3_alamat'];}else{echo "...........";}?></b><br> 
            - Tanda Tangan : (..............)
            </td>

            <td width="25%">
            - Nama : <b><?php if($data['saksi4_nama']!=''){echo $data['saksi4_nama'];}else{echo "...........";}?></b><br> 
            - Pekerjaan : <b><?php if($data['saksi4_pekerjaaan']!=''){echo $data['saksi4_pekerjaaan'];}else{echo "...........";}?></b><br> 
            - Alamat : <b><?php if($data['saksi4_alamat']!=''){echo $data['saksi4_alamat'];}else{echo "...........";}?></b><br> 
            - Tanda Tangan : (..............)
            </td>
        </tr>
        <tr><td width="100%" colspan="4"><br></td></tr>
        <tr>
            <td valign="bottom" colspan="4" width="100%">
                <p align="center">Mengetahui, <br>
                    KEPALA DESA <?php echo strtoupper($data['nama_desa']);?>
                    <br><br><br><br><br><br>
                    <b><?php echo $data['fullname'];?></b>
                </p>
            </td>
        </tr>
</table>
</div>
</body>
</html>