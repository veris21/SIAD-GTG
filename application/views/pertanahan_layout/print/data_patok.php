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
                <td colspan="2">LAMPIRAN II</td>
            </tr>
            <tr>
                <td width="20%"><b style="font-size:11px;">Nomor </b></td>
                <td width="80%"> : 
                <b style="font-size:11px;font-family: Consolas, Monaco, Courier New, Courier, monospace;"> <?php echo "181/".$data['id']."-".$type."/KTD.".strtoupper($data['nama_desa'])."/".romawi(mdate("%m",$data['time']))."/".mdate("%Y",$data['time']);?></b>
                </td>
            </tr>
            <tr>
                <td width="30%"><b style="font-size:11px;">Tanggal </b></td>
                <td width="80%">: 
                <b style="font-size:11px;"> <?php echo mdate("%d",$data['time'])." ".bulan(mdate("%m",$data['time']))." ".mdate("%Y",$data['time']);?></b>
                </td>
            </tr>
            </table>

        </td>

        </tr>

        <tr>
            <td colspan="4"><h4 style="text-align:center;">PHOTO LOKASI SITUASI TANAH <br> (PHOTO DAN PATOK/BATAS TANAH)</h4></td>
        </tr>
        
        <tr>
            <td colspan="4">
                <center>
                    <img width="240" src="<?php echo base_url().PATOK.$titik_tengah['foto_tanah'];?>" alt="FOTO SITUASI TANAH">
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="4"><br></td>
        </tr>
    </table>

    <table width="100%" border='1'>
        <?php $n=1;
        foreach ($patok->result() as $patok) { ?>
        <tr>
            <td valign="top" align="center" width="30%" >
            <b>PATOK <?php echo $n;?></b><br>         
            <img style="padding:2px;" width="150" src="<?php echo base_url().PATOK.$patok->link_dokumentasi;?>" alt="FOTO PATOK">
            </td>
            <td width="50%" colspan="2">            
                <dd>  
                Latitude : <?php echo $patok->lat; ?> <br>
                Longitude : <?php echo $patok->lng; ?> 
                </dd>
                <dt>Batas - Batas</dt>
                <dd>
                - Utara : <?php echo $patok->utara; ?> <br>
                - Selatan : <?php echo $patok->selatan; ?><br>
                - Timur : <?php echo $patok->timur; ?> <br>
                - Barat : <?php echo $patok->barat; ?> 
                </dd>
            </td>
            <td  width="20%" valign="bottom" align="center">
            (...............)
            </td>
        </tr>
<?php $n++; }?>
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
           <br><br>&nbsp;<br><br><br><br>
            <b><?php echo $data['nama'];?></b>
        </p>
        </td>        
        </tr>
</table>
</div>
</body>
</html>