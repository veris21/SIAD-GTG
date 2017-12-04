<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }


  public function arsip_masuk(){
    $this->db->select('*');
    $this->db->from('arsip_masuk');
    $this->db->join('klasifikasi_surat','klasifikasi_surat.id=arsip_masuk.klasifikasi_id');
    return $this->db->get();
  }

}
