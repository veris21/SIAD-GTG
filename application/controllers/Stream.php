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

  public function cek_validasi_bap($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    $data['data']  = $this->pertanahan_model->_get_bap_valid($id)->row_array();
    $data['ketua_pemeriksa'] = $this->auth_model->get_user_id($data['data']['ketua_pemeriksa_id'])->row_array();
    $data['pemeriksa_1'] = $this->auth_model->get_user_id($data['data']['pemeriksa_1_id'])->row_array();
    $data['pemeriksa_2'] = $this->auth_model->get_user_id($data['data']['pemeriksa_2_id'])->row_array();
    $data['pemeriksa_3'] = $this->auth_model->get_user_id($data['data']['pemeriksa_3_id'])->row_array();
    $data['pemeriksa_4'] = $this->auth_model->get_user_id($data['data']['pemeriksa_4_id'])->row_array();
    $data['titik_tengah'] = $this->pertanahan_model->_get_data_link($data['data']['id'])->row_array();
    $data['patok']        = $this->pertanahan_model->_get_data_patok($data['titik_tengah']['id'])->result();
    $data['main_content']   = UMUM.'cek_qr_bap';
    $this->load->view(UMUM. 'public_stream', $data);
  }

  public function cek_validasi_pernyataan($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    // Data Pernyataan

    $data['main_content']   = UMUM.'cek_qr_pernyataan';
    $this->load->view(UMUM. 'public_stream', $data);
  }

  public function cek_validasi_permohonan($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    // Data Permohonan

    $data['main_content']   = UMUM.'cek_qr_permohonan';
    $this->load->view(UMUM. 'public_stream', $data);
  }

  public function cek_validasi_disposisi($id){
    $data['title']          = TITLE . 'Open Data Pertanahan Publik';
    // Data Disposisi
    
    $data['main_content']   = UMUM.'cek_qr_disposisi';
    $this->load->view(UMUM. 'public_stream', $data);
  }



  /*========================= STREAM DATA TANAH VIEW PUBLIC ======================= */
  public function get_one_marker($key){
    $data['results'] = $this->pertanahan_model->get_marker($key)->row_array();
    echo json_encode($data);
  }
  public function cari_data_per_desa($key){
    $data['results'] = $this->pertanahan_model->cari_data_tanah_desa($key)->result();
    echo json_encode($data);
  }

  public function get_asset_desa($key){
    $data['results'] = $this->pertanahan_model->cari_aset_tanah_desa($key)->result();
    echo json_encode($data);
  }

  public function cari_data_per_dusun($key){
    echo json_encode($data);
  }

  public function cari_data_per_nama($key){
    echo json_encode($data);
  }

  /*===============================================================================*/

}

/* Stream.php || Controller Handler Untuk Modul Stream */ 
/*==============================================================
|    @Author     |      Version     |     Changelog     |
_______________________________________________________________
| Veris Juniardi      1.0.0-alfa      November 2017     |
|                |                  |                   |
|                |                  |                   |
================================================================*/
