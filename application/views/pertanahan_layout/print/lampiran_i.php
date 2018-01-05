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
                <td colspan="2">LAMPIRAN III</td>
            </tr>
            <tr>
                <td width="30%"><b style="font-size:11px;">Nomor </b></td>
                <td width="70%"> : 
                <b style="font-size:11px;font-family: Consolas, Monaco, Courier New, Courier, monospace;"><?php echo "181/".$data['id']."-".$type."/KTD.".strtoupper($data['nama_desa'])."/".romawi(mdate("%m",$data['time']))."/".mdate("%Y",$data['time']);?></b>
                </td>
            </tr>
            <tr>
                <td width="30%"><b style="font-size:11px;">Tanggal </b></td>
                <td width="70%">: 
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
            <td colspan="4"><h3 style="text-align:center;">LAMPIRAN PENDUKUNG</h3></td>
        </tr>
        
</table>
<table border="1" width="100%">
        <tr>            
            <td valign="middle" colspan="4">
                <center>
								<h5>KTP PEMOHON</h5>
<?php if($data['ktp']!=''){ ?>
                <img style="padding:4px;" width="240" src="<?php echo base_url().KTP.$data['ktp']; ?>" alt="">
<?php }else{ ?>
<h5><i>Data KTP Kosong</i></h5>
<?php }?>
							 </center>
            </td>
        </tr>
				<tr>            
            <td valign="middle" colspan="4">
                <center>
								<h5>SURAT PENGANTAR KEPALA DUSUN</h5>
<?php if($data['surat_kadus']!=''){ ?>
                <img style="padding:4px;" width="240" src="<?php echo base_url().SURATKADUS.$data['surat_kadus']; ?>" alt="">
<?php }else{ ?>
<h5><i>Data Surat Pengantar Kosong</i></h5>
<?php }?>
               </center>
            </td>
        </tr>
				<tr>            
            <td valign="middle" colspan="4">
                <center>
								<h5>BUKTI PEMBAYARAN PBB</h5>
<?php if($data['ktp']!=''){ ?>
                <img style="padding:4px;" width="240" src="<?php echo base_url().PBB.$data['pbb']; ?>" alt="">
<?php }else{ ?>
<h5><i>Data Bukti Bayar Pajak Bumi dan Bangunan Kosong</i></h5>
<?php }?>
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