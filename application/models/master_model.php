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


  // ============ NEW DATABASE SYSTEM ========
  public function _get_klasifikasi_surat(){
    return $this->db->get('klasifikasi_surat');
  }
  public function _get_user_list()
  {
    return $this->db->get('users');
  }

  public function _post_user($insert)
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

  public function get_desa(){
    return $this->db->get('desa');
  }

  public function _get_administrasi_wilayah(){
    $this->db->select('*');
    $this->db->from('rt');
    $this->db->join('dusun', 'dusun.id=rt.dusun_id');
    $this->db->join('desa', 'desa.id=dusun.desa_id');
    $this->db->join('kecamatan', 'kecamatan.id=desa.kecamatan_id');
    $this->db->join('kabupaten', 'kabupaten.id=kecamatan.kabupaten_id');
    return $this->db->get();
  }
  public function _get_dusun(){
    $this->db->select('*');
    $this->db->from('dusun');
    $this->db->join('desa', 'desa.id=dusun.desa_id');
    $this->db->join('kecamatan', 'kecamatan.id=desa.kecamatan_id');
    $this->db->join('kabupaten', 'kabupaten.id=kecamatan.kabupaten_id');
    return $this->db->get();
  }

  public function dusun(){
    return $this->db->get('dusun');
  }

  public function desa(){
    return $this->db->get('desa');
  }
  public function kecamatan(){
    return $this->db->get('kecamatan');
  }

  public function _get_desa(){
    $this->db->select('*');
    $this->db->from('desa');
    $this->db->join('kecamatan', 'kecamatan.id=desa.kecamatan_id');
    $this->db->join('kabupaten', 'kabupaten.id=kecamatan.kabupaten_id');
    return $this->db->get();
  }

  public function _get_kecamatan(){
    $this->db->select('*');
    $this->db->from('kecamatan');
    $this->db->join('kabupaten', 'kabupaten.id=kecamatan.kabupaten_id');
    return $this->db->get();
  }

  public function _post_rt($post){
    return $this->db->insert('rt', $post);
  }
  public function _post_dusun($post){
    return $this->db->insert('dusun', $post);
  }
  public function _post_desa($post){
    return $this->db->insert('desa', $post);
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

  public function get_dusun_desa($desa_id)
  {
    return $this->db->get_where('dusun', array('desa_id'=>$desa_id));
  }

  public function sms_opt()
  {
    return $this->db->get_where('sms_setting', array('status'=>1));
  }


  // =========================================
}
