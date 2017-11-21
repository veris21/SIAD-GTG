<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stream extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
      $data['title']          = TITLE . 'Stream Data Maps';
      $this->load->view(UMUM.'public_stream', $data);
  }

}
