<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    // cek_login();
  }

  function index()
  {
    $data['title']          = TITLE . 'Dashboard';
    $data['main_content']   = OFFICE . 'dashboard';
    $this->load->view('template', $data);
  }
  // TODO: Controller Handler Database Kependudukan
  function data_penduduk(){
    $data['title']          = TITLE . 'Data Penduduk';
    $data['main_content']   = OFFICE . 'data_penduduk';
    $data['data_penduduk']  = $this->office_model->data_penduduk();
    $this->load->view('template', $data);
  }
  // TODO: Controller Handler Database Disposisi Surat
  function timeline_list(){
    $data['title']          = TITLE . 'Data Penduduk';
    $data['main_content']   = OFFICE . 'timeline_task';
    $id = $this->session->userdata('id');
    $data['item']           = $this->office_model->get_timeline_notif($id)->result();
    $this->load->view('template', $data);
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
      $type       = strip_tags($this->input->post('type'));
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
        $config['allowed_types'] = 'pdf|png|jpg|jpeg';
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
        $surat_tgl_terima = strip_tags($this->input->post('surat_tgl_terima'));
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
  // TODO: Controller Handler Database History List Surat Keluar
  function surat_history(){

  }
  // TODO: Controller Handler Database Permohonan Layanan SKT
  function permohonan_list(){
    $data['title']          = TITLE. 'Data Permohonana Layanan Tanah';
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
