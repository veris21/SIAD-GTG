<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    cek_login();
  }

  function index()
  {
    $data['title']    = TITLE . 'Office SIA-Desa';
    $data['main_content']   = 'dashboard';
    $this->load->view('template', $data);
  }

}
