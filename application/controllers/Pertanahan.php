<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author Veris Juniardi <veris.juniardi@gmail.com>
 */
class Pertanahan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    // $this->load->library('html2pdf');
    $this->load->library('pdfgenerator');
    $this->load->model('auth_model');
  }

  function cari_skt($id){
    $data = $this->datapenduduk_model->_get_data_nik($nik)->row_array();
    echo json_encode($data);
  }

  function data_view()
  {
    $data['title']  = TITLE.'Data Pertanahan';
    $data['main_content'] = PERTANAHAN.'view';
    $this->load->view('template', $data);
  }

  public function permohonan(){
    $desa_id = $this->session->userdata('desa_id');
    $data['title']    = TITLE.'Data Permohonan Tanah';
    $data['main_content'] = PERTANAHAN.'permohonan';
    $data['dusun']        = $this->master_model->dusun_on($desa_id)->result();
    $data['data']         = $this->pertanahan_model->_get_permohonan()->result();
    $this->load->view('template', $data);
  }

  public function permohonan_view($id){
    $data['title']    = TITLE.'Data Permohonan Tanah';
    $data['main_content'] = PERTANAHAN.'view_permohonan';
    $data['pemeriksa1']   = $this->master_model->get_user_detail()->result();
    $data['pemeriksa2']   = $this->master_model->get_user_detail()->result();
    $data['pemeriksa3']   = $this->master_model->get_user_detail()->result();
    $data['pemeriksa4']   = $this->master_model->get_user_detail()->result();
    $data['data']         = $this->pertanahan_model->_get_details_one($id)->row_array();
    $this->load->view('template', $data);
  }

  public function permohonan_print($id){
    
    $data['title'] = TITLE.'Cetak Permohonan';
    $data['data']  = $this->pertanahan_model->_get_details_one($id)->row_array();
    $html = $this->load->view(PERTANAHAN.'print/permohonan', $data, TRUE);
    if($this->pdfgenerator->generate($html, $data['data']['nama']." - PERMOHONAN (".date('d-M-Y').")")){
      echo json_encode(array("status" => TRUE));
    }
  }

  public function pernyataan_print($id){
    $data['title'] = TITLE.'Cetak Pernyataan';
    $data['data']  = $this->pertanahan_model->_get_pernyataan_one($id)->row_array();
    // $this->load->view(PERTANAHAN.'print/pernyataan', $data);
    $html = $this->load->view(PERTANAHAN.'print/pernyataan', $data, TRUE);
    if($this->pdfgenerator->generate($html, $data['data']['nama']." - PERNYATAAN (".date('d-M-Y').")")){
      echo json_encode(array("status" => TRUE));
    }
  }

  // ALTERNATIF PRINT MASALAH SSL 
  public function permohonan_print_alternatif($id){
    $data['title'] = TITLE.'Cetak Permohonan';
    $data['data']  = $this->pertanahan_model->_get_details_one($id)->row_array();
    $html = $this->load->view(PERTANAHAN.'print/permohonan', $data, TRUE);
    $this->pdfgenerator->generate($html, $data['data']['nama']." - PERMOHONAN (".date('d-M-Y').")");
  }

  public function pernyataan_print_alternatif($id){
    $data['title'] = TITLE.'Cetak Pernyataan';
    $data['data']  = $this->pertanahan_model->_get_pernyataan_one($id)->row_array();
    // $this->load->view(PERTANAHAN.'print/pernyataan', $data);
    $html = $this->load->view(PERTANAHAN.'print/pernyataan', $data, TRUE);
    $this->pdfgenerator->generate($html, $data['data']['nama']." - PERNYATAAN (".date('d-M-Y').")");
  }

  // ===============

  public function permohonan_input(){
    if(isset($_FILES['ktp'])){
      $ktp = time()."-".$_FILES['ktp']['name'];
      $config['upload_path'] = './assets/uploader/ktp/'; //buat folder dengan nama assets di root folder
      $config['allowed_types'] = 'png|jpg|jpeg';
      $config['max_size'] = 10000;
      $config['file_name'] = $ktp;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if(! $this->upload->do_upload('ktp') );
    }
    if(isset($_FILES['pbb'])){
      $pbb = time()."-".$_FILES['pbb']['name'];
      $config['upload_path'] = './assets/uploader/pbb_pemohon/'; //buat folder dengan nama assets di root folder
      $config['allowed_types'] = 'png|jpg|jpeg';
      $config['max_size'] = 10000;
      $config['file_name'] = $pbb;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if(! $this->upload->do_upload('pbb') );
    }
    if(isset($_FILES['scan_link'])){
      $fileName = time()."-".$_FILES['scan_link']['name'];
      $config['upload_path'] = './assets/uploader/surat_kadus/'; //buat folder dengan nama assets di root folder
      $config['allowed_types'] = 'png|jpg|jpeg';
      $config['max_size'] = 10000;
      $config['file_name'] = $fileName;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if(! $this->upload->do_upload('scan_link') );
      $media = $this->upload->data('scan_link'); 
      $sekarang = time();
      $kependudukan_id = $this->input->post('kependudukan_id');
      $nik = $this->input->post('no_nik');
      $pemohon = $this->input->post('pemohon');
      $luas = $this->input->post('luas');
      $lokasi = $this->input->post('lokasi');
      $utara = $this->input->post('utara');
      $selatan = $this->input->post('selatan');
      $timur = $this->input->post('timur');
      $barat = $this->input->post('barat');
      $kontak = $this->input->post('kontak');
      $tahun_kelola = $this->input->post('tahun_kelola');
      $peruntukan_tanah = $this->input->post('peruntukan_tanah');
      $status_tanah = $this->input->post('status_tanah');
      $dusun_id = $this->input->post('dusun_id');
      $qr_link = $sekarang.'.png';
      $insert = array(
        'kependudukan_id'=>$kependudukan_id,
        'nik'=> $nik,
        'lokasi'=> $lokasi,
        'luas'=>$luas,
        'status_tanah'=>$status_tanah,
        'peruntukan_tanah'=>$peruntukan_tanah,
        'utara'=>$utara,
        'selatan'=>$selatan,
        'barat'=>$barat,
        'timur'=>$timur,
        'time'=> $sekarang,
        'scan_link'=>$fileName,
        'qr_link'=>$qr_link,
        'dusun_id'=>$dusun_id,
        'tahun_kelola'=>$tahun_kelola,
        'hp'=>$kontak,
        'ktp'=>$ktp,
        'pbb'=>$pbb,
        'status_proses'=>0,
        'type_yang_disetujui'=>0
      );
      // SMS NOTIFIKASI INPUT MASUK =====> PAK KADES/SEKDES 
      $desa_id = $this->session->userdata('desa_id');
      $hp_kades = $this->notifikasi_model->_get_data_kades($desa_id)->row_array();
      $kepada_id = $hp_kades['id'];
      $jabatan = $hp_kades['jabatan'];
      $nama_desa = $hp_kades['nama_desa'];
      $message = 'NOTIFIKASI PERTANAHAN : Yth. '.$jabatan.' '.$nama_desa.' Permohonan SKT '.$pemohon.', Lokasi : '.$lokasi.', Luas : '.$luas.' meter persegi (SiDesa Sistem)';
      $to = $hp_kades['hp'];
      sms_notifikasi($to, $message);
      // ==========================
      // QRCODE GENERATE
      // $apiQr = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example';
      $params['data'] = base_url('permohonan/validasi/').$sekarang;
      $params['level'] = 'M';
      $params['size'] = 10;
      $params['savename'] = './assets/uploader/qr_code/'.$sekarang.'.png';
      $this->ciqrcode->generate($params);
      // +===============+
      $link = "permohonan/".$sekarang;
      $posting = array(
        'kepada_id'=> $kepada_id,
        'hp'=> $to,
        'message'=> $message,
        'link'=> $link,
        'time'=> time(),
        'status'=> 0,
        'type'=> 0
      );
      $this->notifikasi_model->posting_notifikasi($posting);
      $check = $this->pertanahan_model->_post_permohonan($insert);
      if($check){
        echo json_encode(array("status" => TRUE));
      }
    }
  }

  public function pernyataan_input(){ 
    $saksi1_nama      = strip_tags($this->input->post('saksi1_nama'));
    $saksi1_alamat      = strip_tags($this->input->post('saksi1_alamat'));
    $saksi1_pekerjaan = strip_tags($this->input->post('saksi1_pekerjaan'));
    $saksi2_nama      = strip_tags($this->input->post('saksi2_nama'));
    $saksi2_alamat      = strip_tags($this->input->post('saksi2_alamat'));
    $saksi2_pekerjaan = strip_tags($this->input->post('saksi2_pekerjaan'));
    $saksi3_nama      = strip_tags($this->input->post('saksi3_nama'));
    $saksi3_alamat      = strip_tags($this->input->post('saksi3_alamat'));
    $saksi3_pekerjaan = strip_tags($this->input->post('saksi3_pekerjaan'));
    $saksi4_nama      = strip_tags($this->input->post('saksi4_nama'));
    $saksi4_alamat      = strip_tags($this->input->post('saksi4_alamat'));
    $saksi4_pekerjaan = strip_tags($this->input->post('saksi4_pekerjaan'));

    $id    = $this->input->post('permohonan_id');
    // $pemohon =  strip_tags($this->input->post('pemohon'));
    // $lokasi =  strip_tags($this->input->post('lokasi'));
    // $luas =  strip_tags($this->input->post('luas'));

    // $kontak_pemohon =  strip_tags($this->input->post('kontak_pemohon'));
    $sekarang = time();

    // SMS NOTIFIKASI INPUT MASUK =====> PAK KADES/SEKDES 
    // ==============================
    // $desa_id = $this->session->userdata('desa_id');
    // $hp_pertanahan = $this->notifikasi_model->_get_data_kasi_pemerintahan($desa_id)->row_array();
    // $kepada_id = $hp_pertanahan['id'];
    // $jabatan = $hp_pertanahan['jabatan'];
    // $nama_desa = $hp_pertanahan['nama_desa'];
    // $message = 'NOTIFIKASI : Yth. '.$jabatan.' '.$nama_desa.' Pernyataan SKT '.$pemohon.', Lokasi : '.$lokasi.', Luas : '.$luas.' meter persegi Telah disetujui dan menunggu Data Tim Verifikasi (SiDesa Sistem)';
    // $to = $hp_kades['hp'];
    // sms_notifikasi($to, $message);
      // ==============================
      // QRCODE GENERATE
      $params['data'] = base_url('pernyataan/validasi/').$sekarang;
      $params['level'] = 'M';
      $params['size'] = 10;
      // $params['savename'] = FCPATH.'assets/uploader/qr_code/'.$sekarang.'.png';
       $params['savename'] = './assets/uploader/qr_code/'.$sekarang.'.png';
      $this->ciqrcode->generate($params);
      // +===============+
      // +===============+
      // $link = "pernyataan/".$sekarang;
      // $posting = array(
      //   'kepada_id'=> $kepada_id,
      //   'hp'=> $to,
      //   'message'=> $message,
      //   'link'=> $link,
      //   'time'=> time(),
      //   'status'=> 0,
      //   'type'=> 0
      // );
      $setujui = array('status_proses'=>1);
      $up = $this->pertanahan_model->_setujui_permohonan($id, $setujui);
      // $this->notifikasi_model->posting_notifikasi($posting);
      $qr_link = $sekarang.'.png';
      $insert = array(
        'permohonan_id'=>$id,
        'saksi1_nama'=>$saksi1_nama,
        'saksi1_alamat'=>$saksi1_alamat,
        'saksi1_pekerjaan'=>$saksi1_pekerjaan,
        'saksi2_nama'=>$saksi2_nama,
        'saksi2_alamat'=>$saksi2_alamat,
        'saksi2_pekerjaan'=>$saksi2_pekerjaan,
        'saksi3_nama'=>$saksi3_nama,
        'saksi3_alamat'=>$saksi3_alamat,
        'saksi3_pekerjaan'=>$saksi3_pekerjaan,
        'saksi4_nama'=>$saksi4_nama,
        'saksi4_alamat'=>$saksi4_alamat,
        'saksi4_pekerjaan'=>$saksi4_pekerjaan,
        'time'=>$sekarang,
        'qr_link'=>$qr_link,
        'status_proses'=>0
      );
      $check = $this->pertanahan_model->_post_pernyataan($insert);
      if($check){
        echo json_encode(array("status" => TRUE));
      }   
  }


  public function permohonan_setuju(){
    $id = $this->input->post('id');
    $nota_kades = strip_tags($this->input->post('nota_kades'));
    $nama_pemohon = strip_tags($this->input->post('nama_pemohon'));
    $time_permohonan = strip_tags($this->input->post('time_permohonan'));
    $status_persetujuan = strip_tags($this->input->post('status_persetujuan'));
    switch ($status_persetujuan) {
      case 1:
       $persetujuan = "Disetujui Sebagai Surat Keterangan Tanah (SKT) ";
        break;
      case 2:
        $persetujuan = "Disetujui Sebagai Surat Keterangan Rekomendasi ";
        break;
     case 99:
        $persetujuan = "Ditolak ";
        break;
    }
    $setujui = array('status_proses'=>2,'type_yang_disetujui'=>$status_persetujuan, 'nota_kades'=>$nota_kades);
    $kasi_pemerintahan = $this->notifikasi_model->_get_data_kasi_pemerintahan($this->session->userdata('desa_id'))->row_array();
     // +===============+
     $kepada_id = $kasi_pemerintahan['id'];
     $to = $kasi_pemerintahan['hp'];
     $message = "NOTIFIKASI Pertanahan : Persetujuan Permohonan Surat Tanah a/n. ".$nama_pemohon." di ".$persetujuan." oleh Kepala Desa dengan #Memo: ".$nota_kades." (SiDesa Sistem)";
     sms_notifikasi($to, $message);
     $link = "permohonan/".$time_permohonan;
     $posting = array(
        'kepada_id'=> $kepada_id,
        'hp'=> $to,
        'message'=> $message,
        'link'=> $link,
        'time'=> time(),
        'status'=> 0,
        'type'=> 0
      );
    $this->notifikasi_model->posting_notifikasi($posting);
    $check = $this->pertanahan_model->_setujui_permohonan($id, $setujui);
    if($check){
      echo json_encode(array("status" => TRUE));
    }

  }

  public function berita_acara(){
    $data['title'] = TITLE.'List Berita Acara';
    $data['bap_data'] = $this->pertanahan_model->get_bap_list()->result();
    $data['main_content'] = PERTANAHAN.'list_berita_acara';
    $this->load->view('template', $data);
  }

  public function berita_acara_view($id){
    $data['title'] = TITLE.'Detail Berita Acara';
    $data['data']  = $this->pertanahan_model->_get_bap_details($id)->row_array();
    $data['ketua_pemeriksa'] = $this->auth_model->get_user_id($data['data']['ketua_pemeriksa_id'])->row_array();
    $data['pemeriksa_1'] = $this->auth_model->get_user_id($data['data']['pemeriksa_1_id'])->row_array();
    $data['pemeriksa_2'] = $this->auth_model->get_user_id($data['data']['pemeriksa_2_id'])->row_array();
    $data['pemeriksa_3'] = $this->auth_model->get_user_id($data['data']['pemeriksa_3_id'])->row_array();
    $data['pemeriksa_4'] = $this->auth_model->get_user_id($data['data']['pemeriksa_4_id'])->row_array();
    $data['titik_tengah'] = $this->pertanahan_model->_get_data_link($data['data']['id'])->row_array();
    $data['patok']        = $this->pertanahan_model->_get_data_patok($data['titik_tengah']['id']); 
    $data['data_patok']  = $this->pertanahan_model->_get_data_patok($data['titik_tengah']['id'])->result();
    $data['main_content'] = PERTANAHAN.'detail_berita_acara';
    $this->load->view('template', $data);
  }

  public function berita_acara_print($id){
    $data['title'] = TITLE.'Cetak Berita Acara';
    $data['data']  = $this->pertanahan_model->_get_pernyataan_one($id)->row_array();
    $html = $this->load->view(PERTANAHAN.'print/berita_acara', $data, TRUE);
    if($this->pdfgenerator->generate($html, $data['data']['nama']." - Berita Acara Pemeriksaan (".date('d - M - Y').")")){
      echo json_encode(array("status" => TRUE));
    }
  }

  public function berita_acara_print_alternatif($id){
    $data['title'] = TITLE.'Cetak Berita Acara';
    $data['data']  = $this->pertanahan_model->_get_pernyataan_one($id)->row_array();
    $html = $this->load->view(PERTANAHAN.'print/berita_acara', $data, TRUE);
    $this->pdfgenerator->generate($html, $data['data']['nama']." - Berita Acara Pemeriksaan (".date('d - M - Y').")");
  }

  public function berita_acara_input(){
    $sekarang = time();
    $permohonan_id = strip_tags($this->input->post('permohonan_id'));
    $pernyataan_id = strip_tags($this->input->post('pernyataan_id'));
    $pemohon =  strip_tags($this->input->post('pemohon'));
    $lokasi =  strip_tags($this->input->post('lokasi'));
    $luas =  strip_tags($this->input->post('luas'));
    $p1 = 1; //$this->session->userdata('id');    
    
    $p2 = strip_tags($this->input->post('pemeriksa_1'));    
    $p3 = strip_tags($this->input->post('pemeriksa_2'));
    $p4 = strip_tags($this->input->post('pemeriksa_3'));
    $p5 = strip_tags($this->input->post('pemeriksa_4'));
     //========= SMS NOTIFIKASI =================
    $message = "Notifikasi : Anda ditunjuk sebagai Tim Pemeriksa Pertanahan a/n.".$pemohon." Lokasi : ".$lokasi ." (SiDesa Sistem)";
    $p2_data = $this->auth_model->get_user_id($p2)->row_array();
    if($p2_data!=''){
      sms_notifikasi($p2_data['hp'], $message);
    }
    $p3_data = $this->auth_model->get_user_id($p3)->row_array();
    if($p3_data!=''){
      sms_notifikasi($p3_data['hp'], $message);
    }
    $p4_data = $this->auth_model->get_user_id($p4)->row_array();
    if($p4_data!=''){
      sms_notifikasi($p4_data['hp'], $message);
    }
    $p5_data = $this->auth_model->get_user_id($p5)->row_array();
    if($p5_data!=''){
      sms_notifikasi($p5_data['hp'], $message);
    }
    // =========================================
    $insert = array(
      'permohonan_id'=>$permohonan_id,
      'pernyataan_id'=>$pernyataan_id,
      'pemeriksa_1'=>$p1,
      'pemeriksa_2'=>$p2,
      'pemeriksa_3'=>$p3,
      'pemeriksa_4'=>$p4,
      'pemeriksa_5'=>$p5,
      'time_input'=> $sekarang,
      'status_bap'=> 0
    );
    $check = $this->pertanahan_model->_post_berita_acara($insert);
    if($check){
      echo json_encode(array("status" => TRUE));
    }
    
  }


  // MAPS KOORDINAT 
  /*------------------ Titik Tengah Koordinat / Marker ----------------------*/
  public function input_koordinat_tengah(){
    $lat = strip_tags($this->input->post('lat'));
    $lng = strip_tags($this->input->post('lng'));
    $keterangan = strip_tags($this->input->post('keterangan'));
    $tanah_id = strip_tags($this->input->post('tanah_id'));
    $status = strip_tags($this->input->post('status'));

    $post = array('lat'=>$lat,'lng'=>$lng,'keterangan'=>$keterangan, 'tanah_id'=>$tanah_id, 'status'=>$status);
    $check = $this->pertanahan_model->_post_titik_marker($post);
    if($check){
      echo json_encode(array("status" => TRUE));
    }
  }

   /*------------------ Titik Tengah Koordinat / Polygon ----------------------*/
  public function input_koordinat(){
    if(isset($_FILES['patok'])){
      $patok = time()."-".$_FILES['patok']['name'];
      $config['upload_path'] = './assets/uploader/patok/'; //buat folder dengan nama assets di root folder
      $config['allowed_types'] = 'png|jpg|jpeg';
      $config['max_size'] = 10000;
      $config['file_name'] = $patok;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if(! $this->upload->do_upload('patok') );
      $lat = strip_tags($this->input->post('lat'));
      $lng = strip_tags($this->input->post('lng'));   
      $data_link_id = strip_tags($this->input->post('data_link_id'));
      $utara = strip_tags($this->input->post('utara'));
      $selatan = strip_tags($this->input->post('selatan'));
      $barat = strip_tags($this->input->post('barat'));
      $timur = strip_tags($this->input->post('timur'));

      $post = array(
        'link_dokumentasi'=>$patok,
        'lat'=>$lat,
        'lng'=>$lng,
        'utara'=>$utara,
        'selatan'=>$selatan,
        'timur'=>$timur,
        'barat'=>$barat, 
        'id_data_link'=>$data_link_id);

        $check = $this->pertanahan_model->_post_titik_polygon($post);
        if($check){
          echo json_encode(array("status" => TRUE));
        }
    }
    
  }

  public function update_koordinat(){   
    if(isset($_FILES['patok'])){
      if($_FILES['patok']['name']!=''){
        $patok = time()."-".$_FILES['patok']['name'];
      $config['upload_path'] = './assets/uploader/patok/'; //buat folder dengan nama assets di root folder
      $config['allowed_types'] = 'png|jpg|jpeg';
      $config['max_size'] = 10000;
      $config['file_name'] = $patok;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if(! $this->upload->do_upload('patok') );
      $id = $this->input->post('id_patok');
      $lat = strip_tags($this->input->post('lat'));
      $lng = strip_tags($this->input->post('lng')); 
      $utara = strip_tags($this->input->post('utara'));
      $selatan = strip_tags($this->input->post('selatan'));
      $barat = strip_tags($this->input->post('barat'));
      $timur = strip_tags($this->input->post('timur'));
        $update = array(
          'link_dokumentasi'=>$patok,
          'lat'=>$lat,
          'lng'=>$lng,
          'utara'=>$utara,
          'selatan'=>$selatan,
          'timur'=>$timur,
          'barat'=>$barat);
          $check = $this->pertanahan_model->_update_patok($id, $update);
          if($check){
            echo json_encode(array("status" => TRUE, "message"=>"FOTO TIDAK KOSONG"));
          }
      }else{
      $id = $this->input->post('id_patok');
      $lat = strip_tags($this->input->post('lat'));
      $lng = strip_tags($this->input->post('lng')); 
      $utara = strip_tags($this->input->post('utara'));
      $selatan = strip_tags($this->input->post('selatan'));
      $barat = strip_tags($this->input->post('barat'));
      $timur = strip_tags($this->input->post('timur'));
        $update = array(
          'lat'=>$lat,
          'lng'=>$lng,
          'utara'=>$utara,
          'selatan'=>$selatan,
          'timur'=>$timur,
          'barat'=>$barat);
          $check = $this->pertanahan_model->_update_patok($id , $update);
          if($check){
            echo json_encode(array("status" => TRUE, "message"=>"FOTO KOSONG"));
          }
      }
    }
  }

  public function update_koordinat_tengah(){
    $lat = strip_tags($this->input->post('lat'));
    $lng = strip_tags($this->input->post('lng'));
    $keterangan = strip_tags($this->input->post('keterangan'));
    $id = strip_tags($this->input->post('tengah_id'));

    $update = array('lat'=>$lat,'lng'=>$lng,'keterangan'=>$keterangan);
    $check = $this->pertanahan_model->_update_titik_tengah($id, $update);
    if($check){
      echo json_encode(array("status" => TRUE));
    }
  }

  public function get_koordinat($id){
    $data = $this->pertanahan_model->get_koordinat_id($id)->row_array();
    echo json_encode($data);
  }

  public function delete_koordinat($id){
    $data = $this->pertanahan_model->get_koordinat_id($id)->row_array();
    unlink('./assets/uploader/patok/'.$data['link_dokumentasi']);
    $check = $this->pertanahan_model->_delete_koordinat_patok($id);
    if($check){
      echo json_encode(array("status" => TRUE));
    }
  }

  public function get_koordinat_tengah($id){
    $data = $this->pertanahan_model->get_koordinat_tengah_id($id)->row_array();
    echo json_encode($data);
  }

  public function list_skt(){
    $desa_id = $this->session->userdata('desa_id');
    $data['title']    = TITLE.'Data Rekomendasi / SuratTanah';
    $data['main_content'] = PERTANAHAN.'list_skt';
    $data['data']         = $this->pertanahan_model->_get_skt()->result();
    $this->load->view('template', $data);
  }

  public function skt_input(){    
      $time = time();
      $id = strip_tags($this->input->post('bap_id'));
      $update = array('time'=>$time, 'status_bap'=>1);
      $this->pertanahan_model->_update_bap($id, $update);
      $img_data = base64_decode($this->input->post('img_data'));
      $img_name = $time.'.png';
      $path = './assets/uploader/polygon/'.$img_name; //buat folder dengan nama assets di root folder
      file_put_contents($path, $img_data);
      $qr_link = $time.'.png';
      $params['data'] = base_url('skt/validasi/').$time;
      $params['level'] = 'M';
      $params['size'] = 10;
      $params['savename'] = './assets/uploader/qr_code/'.$qr_link;
      $this->ciqrcode->generate($params);
      $push = array('id_berita_acara'=>$id,'peta'=>$img_name,'qr_link'=>$qr_link, 'time'=>$time, 'status'=>0);
      $check = $this->pertanahan_model->_push_skt($push);
      if ($check) {
        echo json_encode(array("status" => TRUE));
      }     
  }

}


/* Pertanahan.php || Controller Handler Untuk Modul Pertanahan
 
=========================================================
|    @Author     |      Version     |     Changelog     |
_________________________________________________________
| Veris Juniardi |    1.0.0-alfa    |   November 2017   |
|                |    1.0.0-beta    |   Januari 2018    |
|                |                  |                   |
=========================================================

*/