<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

  public function permohonan_input(){
    if(isset($_FILES['foto'])){
      $foto = time()."-".$_FILES['foto']['name'];
      $config['upload_path'] = './assets/uploader/foto_pemohon/'; //buat folder dengan nama assets di root folder
      $config['allowed_types'] = 'png|jpg|jpeg';
      $config['max_size'] = 10000;
      $config['file_name'] = $foto;
      $this->load->library('upload');
      $this->upload->initialize($config);
      if(! $this->upload->do_upload('foto') );
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
      $config['upload_path'] = './assets/uploader/ktp/'; //buat folder dengan nama assets di root folder
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
        'foto'=>$foto,
        'pbb'=>$pbb,
        'status_proses'=>0
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
      $params['data'] = BASE_URL.'permohonan/validasi/'.$sekarang;
      $params['level'] = 'M';
      $params['size'] = 10;
      $params['savename'] = FCPATH.'assets/uploader/qr_code/'.$sekarang.'.png';
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
    $pemohon =  strip_tags($this->input->post('pemohon'));
    $lokasi =  strip_tags($this->input->post('lokasi'));
    $luas =  strip_tags($this->input->post('luas'));

    // $kontak_pemohon =  strip_tags($this->input->post('kontak_pemohon'));

    $sekarang = time();

    // SMS NOTIFIKASI INPUT MASUK =====> PAK KADES/SEKDES 
    // ==============================

    $desa_id = $this->session->userdata('desa_id');
    $hp_pertanahan = $this->notifikasi_model->_get_data_kasi_pertanahan($desa_id)->row_array();
    $kepada_id = $hp_pertanahan['id'];
    $jabatan = $hp_pertanahan['jabatan'];
    $nama_desa = $hp_pertanahan['nama_desa'];
    $message = 'NOTIFIKASI : Yth. '.$jabatan.' '.$nama_desa.' Pernyataan SKT '.$pemohon.', Lokasi : '.$lokasi.', Luas : '.$luas.' meter persegi Telah disetujui dan menunggu Data Tim Verifikasi (SiDesa Sistem)';
    $to = $hp_kades['hp'];
    sms_notifikasi($to, $message);

      // ==============================
      // QRCODE GENERATE
      $params['data'] = BASE_URL.'pernyataan/validasi/'.$sekarang;
      $params['level'] = 'M';
      $params['size'] = 10;
      $params['savename'] = FCPATH.'assets/uploader/qr_code/'.$sekarang.'.png';
      $this->ciqrcode->generate($params);
      // +===============+

      // +===============+
      $link = "pernyataan/".$sekarang;
      $posting = array(
        'kepada_id'=> $kepada_id,
        'hp'=> $to,
        'message'=> $message,
        'link'=> $link,
        'time'=> time(),
        'status'=> 0,
        'type'=> 0
      );

      $setujui = array('status_proses'=>1);
      $up = $this->pertanahan_model->_setujui_permohonan($id, $setujui);
      $this->notifikasi_model->posting_notifikasi($posting);
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


  public function permohonan_setujui($id){
    $setujui = array('status_proses'=>2);
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
    $data['patok']       = $this->pertanahan_model->_get_data_patok($data['data']['id']); 
    $data['main_content'] = PERTANAHAN.'detail_berita_acara';
    $this->load->view('template', $data);
  }

  public function berita_acara_print($id){
    $data['title'] = TITLE.'Cetak Berita Acara';
    $data['data']  = $this->pertanahan_model->_get_pernyataan_one($id)->row_array();
    // $this->load->view(PERTANAHAN.'print/berita_acara', $data);
    $html = $this->load->view(PERTANAHAN.'print/berita_acara', $data, TRUE);
    if($this->pdfgenerator->generate($html, $data['data']['nama']." - Berita Acara Pemeriksaan (".date('d - M - Y').")")){
      echo json_encode(array("status" => TRUE));
    }
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


}


/* Pertanahan.php || Controller Handler Untuk Modul Pertanahan
 
=========================================================
|    @Author     |      Version     |     Changelog     |
_________________________________________________________
| Veris Juniardi |    1.0.0-alfa    |   November 2017   |
|                |                  |                   |
|                |                  |                   |
=========================================================

*/