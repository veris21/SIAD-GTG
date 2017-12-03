<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function auth($uid, $pass){
      $this->db->select('*');
      $this->db->where('uid', $uid);
      $this->db->where('pass', $pass);
      $this->db->from('users');
      $this->db->join('jabatan', 'jabatan.id=users.jabatan_id');
      return $this->db->get();      
  }

}