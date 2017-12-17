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
  public function _post_klasifikasi_surat($data){
    return $this->db->insert('klasifikasi_surat', $data);
  }

  public function _update_klasifikasi_surat($id, $data){
    $this->db->where('id', $id);
    return $this->db->update('klasifikasi_surat', $data);
  }

  public function _delete_klasifikasi_surat($id){
    $this->db->where('id', $id);
    return $this->db->delete('klasifikasi_surat');
  }
  
  public function _get_klasifikasi_one($id){
    return $this->db->get_where('klasifikasi_surat', array('id'=>$id));
  }

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
    $query = "SELECT u.id as id, u.uid as uid, u.type as type, u.fullname as fullname, u.time as time, u.hp as hp, d.nama_desa as nama_desa, j.jabatan as jabatan
    FROM users as u, jabatan as j , desa as d WHERE j.id = u.jabatan_id AND d.id = u.desa_id";
    return $this->db->query($query);
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

  public function _get_desa_details($id){
    $query = "SELECT d.id as id, d.nama_desa as nama_desa, d.alamat_desa as alamat_desa,
    kades.fullname as fullname_kades, 
    sekdes.fullname as fullname_sekdes,
    pertanahan.fullname as fullname_pertanahan
     FROM desa as d, 
     users as kades, 
     users as sekdes , 
     users as pertanahan
     WHERE d.uid = kades.id AND d.pertanahan_uid = pertanahan.id AND d.sekdes_uid = sekdes.id AND d.id = $id";
    return $this->db->query($query);
  }
  // 
  public function _get_desa_id($id){
    $this->db->select('de.*, k.nama_kecamatan, kab.nama_kabupaten');
    $this->db->from('desa de, kecamatan k, kabupaten kab');
    $this->db->where('de.kecamatan_id=k.id');
    $this->db->where('k.kabupaten_id=kab.id');
    $this->db->where('de.id', $id);
    return $this->db->get();
  }
  // 
  public function get_adm_json(){
    $query = "SELECT rt.nama_rt as nama_rt, dusun.nama_dusun as nama_dusun,
    desa.nama_desa as nama_desa, kecamatan.nama_kecamatan as nama_kecamatan, 
    kabupaten.nama_kabupaten as nama_kabupaten, users.fullname as fullname,
    users.hp as hp, rt.id as id
    FROM rt as rt, dusun as dusun, desa as desa,  kecamatan as kecamatan, 
    kabupaten as kabupaten, users as users
    WHERE rt.uid = users.id AND rt.dusun_id = dusun.id AND 
    dusun.desa_id = desa.id AND
    desa.kecamatan_id = kecamatan.id AND kecamatan.kabupaten_id = kabupaten.id";
    return $this->db->query($query);
  }
  public function _get_administrasi_wilayah(){
    $this->db->select('r.*, d.nama_dusun, de.nama_desa, k.nama_kecamatan, kab.nama_kabupaten, u.fullname, u.hp');
    $this->db->from('rt r, dusun d, desa de, kecamatan k, kabupaten kab, users u');
    $this->db->where('r.dusun_id=d.id');
    $this->db->where('d.desa_id=de.id');
    $this->db->where('de.kecamatan_id=k.id');
    $this->db->where('k.kabupaten_id=kab.id');
    $this->db->where('r.uid=u.id');
    return $this->db->get();
  }
  public function _get_dusun(){
    $this->db->select('d.*, de.nama_desa, k.nama_kecamatan, kab.nama_kabupaten, u.fullname, u.hp');
    $this->db->from('dusun d, desa de, kecamatan k, kabupaten kab, users u');
    $this->db->where('d.desa_id=de.id');
    $this->db->where('de.kecamatan_id=k.id');
    $this->db->where('k.kabupaten_id=kab.id');
    $this->db->where('d.uid=u.id');

    return $this->db->get();
  }

  public function dusun_on($desa_id){
    return $this->db->get_where('dusun', array('desa_id'=>$desa_id));
  }
  public function dusun(){
    return $this->db->get('dusun');
  }

  public function get_desa(){
    return $this->db->get('desa');
  }

  public function desa(){
    return $this->db->get('desa');
  }
  public function kecamatan(){
    return $this->db->get('kecamatan');
  }

  public function _get_desa(){
    $this->db->select('de.*, k.nama_kecamatan, kab.nama_kabupaten, u.fullname, u.hp');
    $this->db->from('desa de, kecamatan k, kabupaten kab, users u');
    $this->db->where('de.kecamatan_id=k.id');
    $this->db->where('k.kabupaten_id=kab.id');
    $this->db->where('de.uid=u.id');
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
