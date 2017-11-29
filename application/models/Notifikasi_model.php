<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_notifikasi_user($id,$status)
  {
    $this->db->limit('10');
    return $this->db->get_where('notifikasi', array('kepada_id'=>$id, 'status'=>$status));
  }

  public function reminder_get()
  {
    return $this->db->get_where('notifikasi', array('status'=>0));
  }

  public function update_status_kirim($id)
  {
    $this->db->where('id', $id);
    return $this->db->update('notifikasi', array('status'=>1));
  }

  public function posting($posting)
  {
    $posting = $this->db->insert('notifikasi', $posting);
    if ($posting) {
      $to = $posting['kepada_hp'];
      $message = $posting['message'];
      sms_notifikasi($to, $message);
    }
    return ;
  }

  public function lihat($id)
  {
    return $this->db->get_where('notifikasi', array(''=>$id));
  }

}
