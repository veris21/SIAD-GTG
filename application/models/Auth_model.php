<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function auth($uid, $pass){
      $query = "SELECT u.id as id,
       u.fullname as fullname, 
       u.hp as hp, 
       u.time as last_login,
       u.avatar as avatar,
       u.desa_id as desa_id,
       j.jabatan as jabatan
       FROM users as u, jabatan as j
       WHERE u.jabatan_id = j.id AND u.uid = '".$uid."' AND u.pass = '".$pass."'";
      return $this->db->query($query);      
  }

}