<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stream extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
      $data['title']          = TITLE . 'Open Data Pertanahan Publik';
      $this->load->view(UMUM. 'public_stream', $data);
  }

}

/* Stream.php || Controller Handler Untuk Modul Stream */ 
/*==============================================================
|    @Author     |      Version     |     Changelog     |
_______________________________________________________________
| Veris Juniardi      1.0.0-alfa      November 2017     |
|                |                  |                   |
|                |                  |                   |
================================================================*/
