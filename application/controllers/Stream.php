<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author Veris Juniardi <veris.juniardi@gmail.com>
 */
class Stream extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
      $data['title']          = TITLE . 'Open Data Pertanahan Publik';
      $data['desa']           = $this->master_model->desa()->result();
      $data['main_content']   = UMUM.'public';
      $this->load->view(UMUM. 'public_stream', $data);
  }

  function details($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    $data['data']           = array('id'=>$id);
    $data['main_content']   = UMUM.'details';
    $this->load->view(UMUM. 'public_stream', $data);
  }


  public function cek_validasi($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    $data['data']           = $this->pertanahan_model->_get_validasi_skt($id)->row_array();
    $data['main_content']   = UMUM.'cek_qr_skt';
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
