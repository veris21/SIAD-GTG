<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    // $this->load->library("PHPExcel");
    // cek_login();
  }

  function index()
  {
      $data['title']          = TITLE . 'Dashboard';
      $data['main_content']   = 'dashboard';
      $data['arsip']          = $this->arsip_model->arsip_masuk()->num_rows();
      $data['pelayanan']      = 0;
      $data['surat']          = 0;
      $data['tanah']          = 0;
      $this->load->view('template', $data);
  }

  function notifikasi_list(){
    $id = $this->session->userdata('id');
    $data['title']              = TITLE . 'Notifikasi List';
    $data['notifikasi']         = $this->notifikasi_model->get_notifikasi_user($id, 0)->result();
    $data['history_notifikasi'] = $this->notifikasi_model->get_notifikasi_user($id, 1)->result();
    $data['main_content']       = DISPOSISI . 'notifikasi_list';
    $this->load->view('template', $data);
  }

  

  public function notifikasi_baca($id){
    $update = array(
      'time_read'=>time(),
      'status'=>1
    );
    $check = $this->notifikasi_model->tandai_baca($id, $update);
    if ($check) {
      echo json_encode(array("status" => TRUE));
    }
  }

}
