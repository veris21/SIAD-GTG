<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $data['data']   = array('nama'=>'VERIS JUNIARDI');
    $this->load->view('pertanahan_layout/print/lampiran_i', $data);
  }
  public function print()
  {
    $data['data']   = array('nama'=>'VERIS JUNIARDI');
    $this->load->view('pertanahan_layout/print/lampiran_i', $data);

    // $data['data']['nama']." - DENAH (".date('d-M-Y').")";
  }

}
