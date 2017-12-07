<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanahan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('html2pdf');
  }

  function data_view()
  {
    $data['title']  = TITLE.'Data Pertanahan';
    $data['main_content'] = PERTANAHAN.'view';
    $this->load->view('template', $data);
  }

}
