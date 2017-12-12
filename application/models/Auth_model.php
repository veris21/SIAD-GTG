<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function auth($uid, $pass){
      $this->db->select('u.*, j.jabatan, d.nama_desa');
      $this->db->from('users u, jabatan j, desa d');
      $this->db->where('u.uid', $uid);
      $this->db->where('u.pass', $pass);
      $this->db->where('u.jabatan_id=j.id');
      return $this->db->get();
  }

}