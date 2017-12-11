<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanahan_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function _get_permohonan(){
    $this->db->select('mohon.*, p.no_nik, p.nama, p.alamat, p.no_kk');
    $this->db->from('permohonan_pertanahan mohon, master_data_penduduk_ p');
    $this->db->where('mohon.kependudukan_id=p.id');
    return $this->db->get();
  }

  public function _post_permohonan($insert){
    return $this->db->insert('permohonan_pertanahan', $insert);
  }
}
