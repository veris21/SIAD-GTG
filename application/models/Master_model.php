<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  // ============ FAST SEARCH
  public function get_proses($id)
  {
    return $this->db->get_where('sig_data_penduduk_dummy', array('id'=>$id));
  }
  // ================================
  public function insert_user($input_user_data)
  {
    return $this->db->insert('sig_users', $input_user_data);
  }

  public function update_user($input_user_data, $id)
  {
    $this->db->where('id', $id);
    return $this->db->update('sig_users', $input_user_data);
  }
  public function get_user_1()
  {
    $this->db->where('type', '1');
    return $this->db->get('sig_users');
  }
  public function input_kecamatan($input_k)
  {
    return $this->db->insert('sig_kecamatan', $input_k);
  }

  public function update_kecamatan($input_kecamatan, $id)
  {
    $this->db->where('id', $id);
    return $this->db->update('sig_kecamatan', $input_kecamatan);
  }

  public function input_desa($input_desa)
  {
    return $this->db->insert('sig_desa', $input_desa);
  }

  public function update_desa($input_desa, $id)
  {
    $this->db->where('id', $id);
    return $this->db->update('sig_desa', $input_desa);
  }

  public function get_kecamatan()
  {
    return $this->db->get('sig_kecamatan');
  }
  public function get_desa()
  {
    return $this->db->get('sig_desa');
  }
  public function list_user()
  {
    return $this->db->get('sig_users');
  }
  public function user_one($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('sig_users');
  }

}
