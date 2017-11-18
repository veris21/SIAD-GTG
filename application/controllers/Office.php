<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library("PHPExcel");
  }

  function index()
  {
      // MAPS
          $data['title']          = TITLE . 'Dashboard';
          $data['main_content']   = OFFICE . 'dashboard';
          $this->load->view('template', $data);
  }
  // TODO: Controller Handler Database Kependudukan
  function data_penduduk(){
    
    if (isset($_POST['import'])) {
      if (!empty($_FILES['import_xls'])) {
        $config['upload_path'] = './assets/uploader/import/'; //buat folder dengan nama assets di root folder
        $config['allowed_types'] = 'xls|xlsx';
        $this->load->library('upload');
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('import_xls') ){
          $this->upload->display_errors();
        }else {
          // $data = array('upload_data' => $this->upload->data());
          $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
          $filename = $upload_data['file_name'];
          $this->office_model->upload_data($filename);
          unlink('./assets/uploader/import/'.$filename);
          redirect('data_penduduk','refresh');
        }
      }
    }else {
      $data['title']          = TITLE . 'Data Penduduk';
      $data['main_content']   = OFFICE . 'data_penduduk';
      $data['data_penduduk']  = $this->office_model->data_penduduk();
      $this->load->view('template', $data);
    }
  }
  // TODO: Controller Handler Database Disposisi Surat
  function timeline_list(){
    
    $data['title']          = TITLE . 'Data Penduduk';
    $data['main_content']   = OFFICE . 'timeline_task';
    $id = $this->session->userdata('id');
    $data['item']           = $this->office_model->get_timeline_notif_dismiss($id)->result();
    $this->load->view('template', $data);
  }

  function timeline_view($id)
  {
    $this->db->where('id',$id);
    $check = $this->db->update('sig_timeline_disposisi', array('status'=>1));
    if ($check) {
      $data['title']          = TITLE . 'Data Penduduk';
      $data['main_content']   = OFFICE . 'timeline_view';
      $data['item']           = $this->office_model->get_timeline_one($id)->row_array();
      $this->load->view('template', $data);
    }
  }

  function disposisi_list(){
    
    $data['title']          = TITLE . 'History Disposisi';
    $data['main_content']   = OFFICE . 'disposisi_history';
    $data['history']   = $this->office_model->get_timeline()->result();
    $this->load->view('template', $data);
  }

  function disposisi_input($id){
    if(isset($_POST['diposisikan'])){
      $id_arsip   = strip_tags($this->input->post('id_arsip'));
      $type       = 1; //DISPOSISI KEY = 1, PERINTAH LANGSUNG = 0
      $kepada_id  = strip_tags($this->input->post('kepada_id'));
      $memo       = strip_tags($this->input->post('memo'));
      $dari_id    = $this->session->userdata('id');
      $status     = 0;
      $datestring = '%d %M %Y - %h:%i %a';
      $time = time();
      $sekarang = mdate($datestring, $time);
      $disposisi_tgl = $sekarang;

      $post = array(
        'id_arsip'=>$id_arsip,
        'kepada_id'=>$kepada_id,
        'dari_id'=>$dari_id,
        'memo'=>$memo,
        'disposisi_tgl'=>$disposisi_tgl,
        'status'=>$status,
        'type'=>$type
      );
      $check = $this->office_model->post_disposisi($post);
      if ($check) {
        // =================SMS Notifikasi Push====================
        $disposisi = ($type == 0 ? 'Perintah Langsung' : 'Disposisi');
        $kepada = $this->db->get_where('sig_users', array('id'=>$kepada_id))->row_array();
        $dari = $this->session->userdata('full_name');
        $to = $kepada['hp'];
        $message = $disposisi." Dari :".$dari." Memo :".$memo."(SMS Ini dari Si-Desa System)";
        sms_notifikasi($to, $message);
        // ========================================================
        redirect('disposisi');

        exit;
      }
      return;
    }else{
      
      $data['title']          = TITLE . 'Disposisi';
      $data['kepada']         = $this->office_model->get_user_disposisi()->result();
      $data['arsip']          = $this->office_model->get_arsip_image($id)->row_array();
      $data['main_content']   = OFFICE . 'disposisi_task_input';
      $this->load->view('template', $data);
    }
  }

  function disposisi_teruskan($id){
    if(isset($_POST['teruskan'])){
      $datestring = '%d %M %Y - %h:%i %a';
      $time = time();
      $sekarang = mdate($datestring, $time);
      $disposisi_tgl = $sekarang;
      $dari_id = $this->session->userdata('id');
      $kepada_id = strip_tags($this->input->post('kepada_id'));
      $memo = strip_tags($this->input->post('memo'));
      $type = strip_tags($this->input->post('type'));
      $status = 0;

      $insert = array(
        'id_arsip' => $id,
        'kepada_id' => $kepada_id,
        'dari_id' => $dari_id,
        'memo' => $memo,
        'disposisi_tgl' => $disposisi_tgl,
        'type' => $type,
        'status' => $status
      );
      // =================SMS Notifikasi Push====================
      $disposisi = ($type==0 ? 'Perintah Langsung' : 'Disposisi');
      $kepada = $this->db->get_where('sig_users', array('id'=>$kepada_id))->row_array();
      $dari = $this->session->userdata('full_name');
      $to = $kepada['hp'];
      $message = $disposisi." Dari :".$dari." Memo :".$memo."(SMS Ini dari Si-Desa System)";
      sms_notifikasi($to, $message);
      // ========================================================
      $check = $this->office_model->diposisi_terus_input($insert);
      if ($check) {

        echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <i class='icon fa fa-bell'></i> Disposisi Terkirim!
        </div>";
        redirect('timeline');
        die;
      }
      die;
    }else{
      
      $data['title']          = TITLE. 'Teruskan Disposisi';
      $data['kepada']         = $this->office_model->get_all_user()->result();
      $data['data']           = $this->office_model->get_arsip_disposisi($id)->row_array();
      $data['main_content']   = OFFICE.'disposisi_terus_input';
      $this->load->view('template', $data);
    }
  }

  function arsip_list(){
      
      $data['title']          = TITLE . 'Arsip Surat';
      $data['main_content']   = OFFICE . 'arsip_list';
      $data['arsip_surat']    = $this->office_model->get_arsip_list();
      $this->load->view('template', $data);
  }

  function arsip_view($id)
  {

    
    $data['title']          = TITLE . 'Arsip Surat';
    $data['main_content']   = OFFICE . 'arsip_view';
    $data['arsip_surat']    = $this->office_model->get_arsip_one($id)->row_array();
    $this->load->view('template', $data);
  }
  function arsip_input(){
    
    if (isset($_POST['upload'])) {
      if (!empty($_FILES['arsip_surat'])) {
        $fileName = time().$_FILES['arsip_surat']['name'];
        $config['upload_path'] = './assets/uploader/arsip/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = 10000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('arsip_surat') )
        $this->upload->display_errors();
        $media = $this->upload->data('arsip_surat');
        $nomor = strip_tags($this->input->post('nomor'));
        $surat_pengirim = strip_tags($this->input->post('surat_pengirim'));
        $surat_penerima = $this->session->userdata('full_name');
        $surat_tgl = strip_tags($this->input->post('surat_tgl'));
        $datestring = '%d %M %Y - %h:%i %a';
        $time = time();
        $sekarang = mdate($datestring, $time);
        $surat_tgl_terima = $sekarang;
        $surat_perihal = strip_tags($this->input->post('surat_perihal'));
        $surat_disposisi_type = strip_tags($this->input->post('surat_disposisi_type'));
        $simpan_data = array(
          'surat_path_scan'  => $fileName,
          'nomor'            => $nomor,
          'surat_pengirim'   => $surat_pengirim,
          'surat_penerima'   => $surat_penerima,
          'surat_tgl'        => $surat_tgl,
          'surat_tgl_terima' => $surat_tgl_terima,
          'surat_perihal'    => $surat_perihal,
          'surat_disposisi_type'=> $surat_disposisi_type
         );
        $check = $this->office_model->arsip_data($simpan_data);
        if ($check) {
          if ($surat_disposisi_type==1) {
            redirect('disposisi/input/'.$fileName);
          }else {
            redirect('arsip');
          }
        }
        return;
        }
        exit;
    }else {
      $data['title']          = TITLE . 'Input Arsip';
      $data['main_content']   = OFFICE . 'arsip_input_form';
      // $data['arsip_surat']    = $this->office_model->get_arsip_list();
      $this->load->view('template', $data);
    }
  }
  // TODO: Controller Handler input Permohonan
  function permohonan_input($id){
    
    if (isset($_POST['simpan'])) {
      if(!empty($_FILES['ktp'])){
        $fileName = time().$_FILES['ktp']['name'];
        $config['upload_path'] = './assets/uploader/ktp/';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = 10000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('ktp') )
        $this->upload->display_errors();
      }

      $datestring = '%d %M %Y';
      $time = time();
      $sekarang = mdate($datestring, $time);

      $desa_uid = strip_tags($this->input->post('desa_uid'));
      $skt_mohon_saksi1 = strip_tags($this->input->post('skt_mohon_saksi1'));
      $skt_mohon_saksi2 = strip_tags($this->input->post('skt_mohon_saksi2'));
      $skt_mohon_saksi3 = strip_tags($this->input->post('skt_mohon_saksi3'));
      $skt_mohon_saksi4 = strip_tags($this->input->post('skt_mohon_saksi4'));
      $skt_mohon_lokasi = strip_tags($this->input->post('skt_mohon_lokasi'));
      $skt_mohon_dusun_id = strip_tags($this->input->post('skt_mohon_dusun_id'));
      $skt_mohon_peruntukan = strip_tags($this->input->post('skt_mohon_peruntukan'));
      $skt_mohon_status_tanah = strip_tags($this->input->post('skt_mohon_status_tanah'));
      $skt_mohon_ket = strip_tags($this->input->post('skt_mohon_ket'));
      $skt_mohon_panjang = strip_tags($this->input->post('skt_mohon_panjang'));
      $skt_mohon_lebar = strip_tags($this->input->post('skt_mohon_lebar'));

      $insert = array(
        'nik_id'=>$id,
        'skt_mohon_tgl'=>$sekarang,
        'skt_mohon_saksi1'=>$skt_mohon_saksi1,
        'skt_mohon_saksi2'=>$skt_mohon_saksi2,
        'skt_mohon_saksi3'=>$skt_mohon_saksi3,
        'skt_mohon_saksi4'=>$skt_mohon_saksi4,
        'skt_mohon_lokasi'=>$skt_mohon_lokasi,
        'skt_mohon_dusun_id'=>$skt_mohon_dusun_id,
        'skt_mohon_peruntukan'=>$skt_mohon_peruntukan,
        'skt_mohon_status_tanah'=>$skt_mohon_status_tanah,
        'skt_mohon_ket'=>$skt_mohon_ket,
        'skt_mohon_panjang'=>$skt_mohon_panjang,
        'skt_mohon_lebar'=>$skt_mohon_lebar,
        'desa_uid'=>$desa_uid,
        'ktp_path'=>$fileName,
        'type'=>0
      );
      $push_data = $this->office_model->posting_permohonan($insert);
      if ($push_data) {
        redirect('permohonan');
      }
    }else{
      $data['title']          = TITLE. 'Permohonana Layanan Tanah';
      $data['dusun']          = $this->db->get('sig_dusun')->result();
      $data['data']           = $this->office_model->get_nik_one($id)->row_array();
      $data['main_content']   = OFFICE . 'form_permohonan';
      $this->load->view('template', $data);
    }
  }

  function permohonan_view($id)
  {
    
    $data['title']          = TITLE. 'View Data Permohonana';
    $data['dusun']          = $this->db->get('sig_dusun')->result();
    $data['data']           = $this->office_model->get_nik_one($id)->row_array();
    $data['main_content']   = OFFICE . 'view_permohonan';
    $this->load->view('template', $data);
  }
  // TODO: Controller Handler Database Permohonan Layanan SKT
  function permohonan_list(){
    
    $data['title']          = TITLE. 'Data Permohonana Layanan Tanah';
    $data['data']           = $this->office_model->get_permohonan()->result();
    $data['main_content']   = OFFICE . 'list_permohonan';
    $this->load->view('template', $data);
  }
  // TODO: Controller Handler Database BAP Layanan SKT
  function berita_acara_list(){
    

    $data['title']          = TITLE. 'Data Berita Acara Layanan Tanah';
    $data['main_content']   = OFFICE . 'list_berita_acara';
    $this->load->view('template', $data);
  }
  // TODO: Controller Handler Database Pra Layanan SKT
  function pra_skt_list(){
    

    $data['title']          = TITLE. 'Data Pra SKT Layanan Tanah';
    $data['main_content']   = OFFICE . 'list_pra_skt';
    $this->load->view('template', $data);
  }
  // TODO: Controller Handler Database Release Final Layanan SKT
  function skt_release_list(){
    

    $data['title']          = TITLE. 'Data Release Layanan Tanah';
    $data['main_content']   = OFFICE . 'list_skt';
    $this->load->view('template', $data);
  }

}
