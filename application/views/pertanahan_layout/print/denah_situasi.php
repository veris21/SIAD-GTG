<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title.$data['nama']; ?></title>
	<!-- -->
	<link rel="stylesheet" href="<?php echo BASE_URL.'assets/print.css' ?>">
	<!-- -->
</head>
<body>
<div id="container">
  <table width="100%">
        <tr>
        <td colspan="3" width="60%"></td>
        <td width="40%">
            <table>
            <tr>
                <td colspan="2">LAMPIRAN I</td>
            </tr>
            <tr>
                <td width="20%"><b style="font-size:11px;">Nomor </b></td>
                <td width="80%"> : 
                <b style="font-size:11px;font-family: Consolas, Monaco, Courier New, Courier, monospace;"><?php echo "181/".$data['id']."-".$type."/KTD.".strtoupper($data['nama_desa'])."/".romawi(mdate("%m",$data['time']))."/".mdate("%Y",$data['time']);?></b>
                </td>
            </tr>
            <tr>
                <td width="20%"><b style="font-size:11px;">Tanggal </b></td>
                <td width="80%">: 
                    <b  style="font-size:11px;">
                <?php echo mdate("%d",$data['time'])." ".bulan(mdate("%m",$data['time']))." ".mdate("%Y",$data['time']);?></b>
                </td>
            </tr>
            </table>
        </td>
        </tr>

        <tr>
            <td colspan="4"><br></td>
        </tr>

        <tr>
            <td colspan="4"><h4 style="text-align:center;">DENAH / SITUASI TANAH</h4></td>
        </tr>
        <tr>
            <td width="20%"><b>LUAS</b></td>
            <td colspan="3" width="80%">: <?php echo $data['luas']; ?> M<sup>2</sup></td>
        </tr>
        <tr>
            <td width="20%"><b>LOKASI</b></td>
            <td colspan="3" width="80%">: <?php echo $data['lokasi']." Dusun ".$data['nama_dusun']." Desa ".$data['nama_desa']." Kecamatan".$data['nama_kecamatan']; ?></td>
        </tr>
        <tr>
            <td colspan="4"><br></td>
        </tr>
        <tr>
        <td colspan="3" width="70%"></td>
        <td width="30%">
            <table border="0.1" width="100%">
                <tr>
                    <td align="center">Titik</td>
                    <td align="center">Latitude</td>
                    <td align="center">Longitude</td>
                </tr>
                <?php $n = 1; foreach ($patok->result() as $patok) { ?>
                 <tr>
                    <td align="center"><?php echo $n;?></td>
                    <td align="center"><?php echo $patok->lat;?></td>
                    <td align="center"><?php echo $patok->lng;?></td>
                </tr>
                <?php $n++; } ?>
            </table>
        </td>
        </tr>
        <tr>
            <td colspan="4"><br></td>
        </tr>
</table>
<table border="1" width="100%">
        <tr>
            <td valign="middle" width="10%">
               <center>
                <img width="40" src="<?php echo base_url().'assets/n-1.png'; ?>" >
               </center>
            </td>
            <td valign="middle" colspan="3" width="90%">
                <center>
                <img width="100%" src="<?php echo base_url().POLYGON.$data['peta']; ?>" >
               </center>
            </td>
        </tr>
  </table>
<table>
        <tr>
        <td width="40%">
        <p align="center">Mengetahui, <br>
            <?php echo strtoupper($data['jabatan_kades']);?>
            <br><br>&nbsp;<br><br><br><br><br>
            <b><?php echo $data['nama_kades'];?></b>
        </p>
        </td>
        <td colspan="2" align="center" width="20%">
            <img width="90" src="<?php echo base_url().QRCODE.$data['qr_link'];?>" alt="logo"><br>
            <i style="font-size:9px;font-family: Consolas, Monaco, Courier New, Courier, monospace;">(Dokumen ini di generate otomatis melalui sistem SiDesa.id)</i>
        </td>
        <td width="40%">
        <p align="center">
            Yang Mengusahakan, <br>
            <br><br>&nbsp;<br><br><br><br><br>
            <b><?php echo $data['nama'];?></b>
        </p>
        </td>        
        </tr>
</table>
</div>
</body>
</html>