<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  // // ============ FAST SEARCH
  // public function get_proses($id)
  // {
  //   return $this->db->get_where('sig_data_penduduk_dummy', array('id'=>$id));
  // }
  // // ================================
  // public function insert_user($input_user_data)
  // {
  //   return $this->db->insert('sig_users', $input_user_data);
  // }
  //
  // public function update_user($input_user_data, $id)
  // {
  //   $this->db->where('id', $id);
  //   return $this->db->update('sig_users', $input_user_data);
  // }
  // public function get_user_1()
  // {
  //   $this->db->where('type', '1');
  //   return $this->db->get('sig_users');
  // }
  // public function input_kecamatan($input_k)
  // {
  //   return $this->db->insert('sig_kecamatan', $input_k);
  // }
  //
  // public function update_kecamatan($input_kecamatan, $id)
  // {
  //   $this->db->where('id', $id);
  //   return $this->db->update('sig_kecamatan', $input_kecamatan);
  // }
  //
  // public function input_desa($input_desa)
  // {
  //   return $this->db->insert('sig_desa', $input_desa);
  // }
  //
  // public function update_desa($input_desa, $id)
  // {
  //   $this->db->where('id', $id);
  //   return $this->db->update('sig_desa', $input_desa);
  // }
  //
  // public function get_kecamatan()
  // {
  //   return $this->db->get('sig_kecamatan');
  // }
  // public function get_desa()
  // {
  //   return $this->db->get('sig_desa');
  // }
  // public function list_user()
  // {
  //   return $this->db->get('sig_users');
  // }
  // public function user_one($id)
  // {
  //   $this->db->where('id', $id);
  //   return $this->db->get('sig_users');
  // }



  // ============ NEW DATABASE SYSTEM ========
  public function get_user()
  {
    return $this->db->get('users');
  }

  public function insert_user($insert)
  {
    return $this->db->insert('users', $insert);
  }

  public function update_user($id, $update)
  {
    $this->db->where('id', $id);
    return $this->db->update('users', $update);
  }

  public function get_user_detail()
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('jabatan','jabatan.id=users.jabatan_id');
    $this->db->join('desa', 'desa.id=users.desa_id');
    return $this->db->get();
  }

  public function get_user_one($id)
  {
    $this->db->select('*');
    $this->db->where('id', $id);
    $this->db->from('users');
    $this->db->join('jabatan','jabatan.id=users.jabatan_id');
    $this->db->join('desa', 'desa.id=users.desa_id');
    return $this->db->get();
  }

  public function get_jabatan()
  {
    return $this->db->get('jabatan');
  }

  public function update_jabatan($id, $update)
  {
    $this->db->where('id', $id);
    return $this->db->update('jabatan', $update);
  }

  public function insert_jabatan($insert)
  {
    return $this->db->insert('jabatan', $insert);
  }

  public function get_dusun($desa_id)
  {
    return $this->db->get_where('dusun', array('desa_id'=>$desa_id));
  }

  public function sms_opt()
  {
    return $this->db->get_where('sms_setting', array('status'=>1));
  }


  // =========================================
}
