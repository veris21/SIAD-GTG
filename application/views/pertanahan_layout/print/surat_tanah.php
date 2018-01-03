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
        <h3 style="padding-bottom:0;margin-bottom:0;"><u>SURAT KETERANGAN <?php echo $type = ($data['type']==1 ? 'TANAH' : 'REKOMENDASI'); ?> </u><br>
        Nomor :<i style="font-weight: lighter;font-family: Consolas, Monaco, Courier New, Courier, monospace;"> <?php echo "181/".$data['id']."-".$type."/KTD.".strtoupper($data['nama_desa'])."/".romawi(mdate("%m",$data['time']))."/".mdate("%Y",$data['time']);?></i></h3>
      </td>
    </tr>
  </table>
  <table>
        <tr>
            <td colspan="4">
            <p style="text-align:justify;">Yang bertandatangan dibawah ini <?php echo $data['jabatan_kades']." Kecamatan ".$data['nama_kecamatan']." Kabupaten ".$data['nama_kabupaten'];?>, dengan ini menerangkan bahwa : </p>
            </td>
        </tr>        
        <tr>
            <td>Nama Lengkap</td>
            <td colspan="3" align="left">: <?php echo $data['nama'];?></td>
        </tr>
        <tr>
            <td>N I K</td>
            <td colspan="3" align="left">: <?php echo $data['no_nik'];?></td>
        </tr>
         <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td colspan="3" align="left">: <?php echo $data['tempat_lahir'].",".$data['tanggal_lahir'];?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td colspan="3" align="left">: <?php echo $data['jenis_kelamin'];?></td>
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
            <td>Alamat</td>
            <td colspan="3" align="left">: <?php echo $data['alamat'].",".$data['nama_dusun'].", ".$data['nama_desa'].", ".$data['nama_kecamatan'].", ".$data['nama_kabupaten'];?></td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="4">
                <p style="padding-bottom:0;margin-bottom:0;text-align:justify;">
                Berdasarkan Surat Permohonan Tanggal <b><?php echo mdate("%d-%m-%Y", $data['time_permohonan']);?></b> dan Surat Pernyataan yang bersangkutan diatas materai Rp.6000,- Tanggal <b><?php echo mdate("%d-%m-%Y", $data['time_pernyataan']);?></b> dan Hasil Pemeriksaan kami pada Tanggal <b><?php echo mdate("%d-%m-%Y", $data['time_bap']); ?></b>, memang benar yang bersangkutan menguasai/mengusahakan sebidang tanah yang dipergunakan untuk <b><?php echo $data['peruntukan_tanah']; ?></b> seluas &plusmn; <b><?php echo $data['luas']; ?></b>  m<sup>2</sup> yang terletak di <?php echo $data['lokasi'];?> <?php echo "Dusun ".$data['nama_dusun']." Desa ".$data['nama_desa']." Kecamatan ".$data['nama_kecamatan']." Kabupaten ".$data['nama_kabupaten'];?> dengan batas tanah :               
                </p>
            </td>
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
                <p style="padding-bottom:0;margin-bottom:0;text-align:justify;">Adapun tanah tersebut dikuasai/diusahakan <b>Sejak Tahun <?php echo $data['tahun_kelola'];?> yang berasal dari Tanah Negara</b> hingga sekarang ini dan menurut sepengetahuan Kami berdasarkan Surat Pernyataan <i>sporadik</i> pemohon bahwa pada tanah tersebut tidak dalam sengketa ataupun dalam gugatan pihak lain dan tidak juga digadaikan/dalam suatu perkara pengadilan.</p>

                <p style="padding-bottom:0;margin-bottom:0;text-align:justify;">Surat Keterangan ini Kami buat agar yang bersangkutan dapat meningkatkan hak atas tanah serta dapat memenuhi ketentuan - ketentuan sebagai berikut :</p>

            <ol>
                <li>Pemilik harus memasang tanda batas Tanah Perumahan/Perkebunan (Patok) Permanen disetiap sudut tanah garapan;</li>
                <li>Pemilik harus memelihara lokasinya dengan baik, dan mengerjakan secara intensif dan tidak ditelantarkan;</li>
                <li>Pemilik tidak dibenarkan menjual ataupun mengalihkan ke pihak lain, kecuali melalui Pejabat yang berwenang (Pejabat Pembuat Akta Tanah);</li>
                <li>Keterangan ini tidak merupakan hak atas tanah garapan dan dipergunakan untuk pengurusan Hak Atas Tanah (sertifikat) di instansi yang berwenang;</li>
                <li>Apabila SKT / Surat Rekomendasi yang diterbitkan ternyata dikemudian hari terdapat dalam kawasan (HLP, HP, HL) dan SIPD maka SKT ini akan batal dengan sendirinya demi hukum;</li>
                <li><b>Surat Keterangan ini bukan merupakan Bukti Hak Milik, apabila tanah tersebut selama kurun waktu 6 (enam) bulan tidak dipelihara/dikelola (ditelantarkan) maka dengan sendirinya Surat Keterangan ini tidak berlaku dan akan dicabut.</b></li>
            </ol>
            <p style="padding-bottom:0;margin-bottom:0;text-align:justify;">Demikian Surat Keterangan <?php echo $type; ?> ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
            </td>
        </tr>
</table> 
<br><br>
<table>
        <tr>
        <td width="40%">
        <table style="font-family: Consolas, Monaco, Courier New, Courier, monospace;">
            <tr>
                <td width="40%">Nomor</td>
                <td width="60%">: </td>
            </tr>
            <tr>
                <td width="40%">Tanggal</td>
                <td width="60%">:</td>
            </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
        </table>
        <p align="center">Mengetahui, <br>
            CAMAT GANTUNG
            <br><br>&nbsp;<br><br><br><br><br>
            <b>KHAIRIL ANWAR<br>
            NIP. 19620307 198503 1 011
            </b>

        </p>
        </td>
        <td colspan="2" align="center" width="20%">
            <img width="90" src="<?php echo base_url().QRCODE.$data['qr_link'];?>" alt="logo"><br>
            <i style="font-size:9px;font-family: Consolas, Monaco, Courier New, Courier, monospace;">(Dokumen ini di generate otomatis melalui sistem SiDesa.id)</i>
        </td>
        <td width="40%">
        <table style="font-family: Consolas, Monaco, Courier New, Courier, monospace;">
            <tr>
                <td width="40%">Dikeluarkan di</td>
                <td width="60%">: <?php echo $data['nama_desa'];?></td>
            </tr>
            <tr>
                <td width="40%">Tanggal</td>
                <td width="60%">: <?php echo mdate("%d",$data['time'])." ".bulan(mdate("%m",$data['time']))." ".mdate("%Y",$data['time']);?></td>
            </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
        </table>
        <p align="center">
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
