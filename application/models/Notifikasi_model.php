<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

     
  public function get_notifikasi_count(){
    return $this->db->get('notifikasi')->num_rows();
  }


  public function tandai_baca($id, $update){
    $this->db->where('id', $id);
    return $this->db->update('notifikasi', $update);
  }
  public function get_notifikasi_user($id, $status)
  {
    // $this->db->limit('10');
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

  public function posting_notifikasi($posting)
  {
    return $this->db->insert('notifikasi', $posting);
  }

  public function lihat($id)
  {
    return $this->db->get_where('notifikasi', array(''=>$id));
  }

  public function _get_data_kades($desa_id){
    $query = "SELECT u.id as id,
    u.hp as hp,
    d.id as desa_id,
    d.nama_desa as nama_desa,
    u.fullname as fullname,
    j.jabatan as jabatan
    FROM desa as d, users as u, jabatan as j
    WHERE u.id = d.uid AND j.id = u.jabatan_id AND d.id = $desa_id";
    return $this->db->query($query);
  }

  public function _get_data_sekdes($desa_id){
    $query = "SELECT u.id as id,
    u.hp as hp,
    d.id as desa_id,
    d.nama_desa as nama_desa,
    u.fullname as fullname,
    j.jabatan as jabatan
    FROM desa as d, users as u, jabatan as j
    WHERE u.id = d.sekdes_uid AND j.id = u.jabatan_id AND d.id = $desa_id";
    return $this->db->query($query);
  }

  public function _get_data_petugas_pertanahan($id){
    $query = "SELECT u.id as id,
    u.hp as hp,
    d.id as desa_id,
    d.nama_desa as nama_desa,
    u.fullname as fullname,
    j.jabatan as jabatan
    FROM desa as d, users as u, jabatan as j
    WHERE u.id = d.pertanahan_uid AND j.id = u.jabatan_id AND d.id = $desa_id";
    return $this->db->query($query);
  }

  public function _get_data_kasi_pemerintahan($desa_id){
    $query = "SELECT u.id as id,
    u.hp as hp,
    d.id as desa_id,
    d.nama_desa as nama_desa,
    u.fullname as fullname,
    j.jabatan as jabatan
    FROM desa as d, users as u, jabatan as j
    WHERE u.id = d.kasi_pemerintahan AND j.id = u.jabatan_id AND d.id = $desa_id";
    return $this->db->query($query);
  }
}
