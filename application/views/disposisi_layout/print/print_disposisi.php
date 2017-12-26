<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lembar Disposisi</title>
	<!-- -->
	<link rel="stylesheet" href="<?php echo base_url('assets/print.css'); ?>">
	<!-- -->
</head>
<body>
<div id="container">
  <table>
    <tr>
      <td align="center"  style="padding-bottom:0;margin-bottom:0;">
				<img src="<?php echo base_url().'assets/logo-beltim.png'; ?>" alt="Logo" width="80" >
			</td>
      <td colspan="7" align="center" class="header-surat"  style="padding-bottom:0;margin-bottom:0;">
        <h2 style="padding-bottom:0;margin-bottom:0;">
          PEMERINTAH KABUPATEN <?php echo strtoupper($header['nama_kabupaten']); ?> <br>
          KECAMATAN <?php echo strtoupper($header['nama_kecamatan']); ?><br>
          KANTOR KEPALA DESA <?php echo strtoupper($header['nama_desa']); ?>
        </h2>
				<p style="padding-bottom:0;margin-bottom:0;">Alamat Kantor: <?php echo $header['alamat_desa']; ?></p>
      </td>
    </tr>
		<tr>
			<td colspan="8"><hr style="padding-top:0;margin-top:0;padding-bottom:0;margin-bottom:0;"></td>
		</tr>
    <tr>
      <td colspan="8" align="center">
        <h3 style="padding-bottom:0;margin-bottom:0;"><u>LEMBAR DISPOSISI</u></h3>
      </td>
    </tr>
    <tr>
			<td colspan="8"><br><br></td>
		</tr>
  </table>

    <table style="border: 1px solid #000;" border="0.5">
      <tr>
        <td style="margin:4px;padding:4px;" colspan="2">Index : <b><?php echo $data['klasifikasi'];?></b> </td>   
        <td style="margin:2px;padding:4px;" colspan="2">Kode :  <b><?php echo $data['kode'];?></b> </td>
        <td style="margin:4px;padding:4px;" colspan="2">No Urut :  <b><?php echo $data['id']; ?></b>  </td>           
      </tr>
      <tr>
      <td style="margin:4px;padding:4px;" colspan="6"> Isi Ringkasan/ Perihal : <p> <b><?php echo $data['perihal'];?></b> </p></td>      
      </tr>
      <tr>
      <td style="margin:4px;padding:4px;" colspan="6"> Dari :  <b><?php echo $data['pengirim'];?></b> </td>      
      </tr>      
      <tr>
        <td style="margin:4px;padding:4px;" colspan="2">
        Tanggal Surat :  <b><?php echo $data['tanggal_surat'];?></b> <br><br><br>
        Pengolah :  <b><?php echo $data['penerima'];?></b>
        </td>   
        <td style="margin:2px;padding:4px;" colspan="2">
        No. Surat :  <b><?php echo $data['nomor_surat'];?></b> <br><br><br>
        Tanggal diteruskan :  <b><?php echo mdate("%d-%m-%Y", $data['time']);?></b> 
        </td>
        <td style="margin:4px;padding:4px;" colspan="2">
        Lampiran :  <i>Terlampir</i> <br><br><br>
        Tanda Terima :  <br>&nbsp;<br> 
        </td> 
      </tr>
      <tr>
        <td style="margin:4px;padding:4px;" colspan="3"> 
        <p><?php echo "<b>Memo dari : ".$kades_memo['dari']."</b><br><br><br><i>".$kades_memo['isi_disposisi']."</i>"; ?></p> 
        <p align="right"><img width="40" src="<?php echo base_url().QRCODE.$kades_memo['qr_link']; ?>" alt=""></p>
        </td>   
        <td style="margin:2px;padding:4px;" colspan="3">Isi Disposisi :   
        <p><?php echo "<b>Memo dari : ".$sekdes_memo['dari']."</b><br><br><br><i>". $sekdes_memo['isi_disposisi']."</i>"; ?></p> 
        <p align="right"><img width="40" src="<?php echo  base_url().QRCODE.$sekdes_memo['qr_link']; ?>" alt=""></p> 
         </td>
      </tr>
  </table>
  
</div> 
</body> 
</html>