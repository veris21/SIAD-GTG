<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function _post_arsip($insert){
    $this->db->insert('arsip_masuk', $insert);
    return;
  }
  
  public function _get_sekdes_same_desa($desa_id){
    $this->db->select('u.*, j.jabatan');
    $this->db->from('users u, jabatan j');
    $this->db->where('u.jabatan_id=j.id');
    $this->db->where('j.jabatan','SEKDES');
    $this->db->where('u.desa_id', $desa_id);
    return $this->db->get();
  }
  public function _get_user_same_desa($desa_id){
    $this->db->select('u.*, j.jabatan');
    $this->db->from('users u, jabatan j');
    $this->db->where('u.jabatan_id=j.id');
    $this->db->where('u.desa_id', $desa_id);
    return $this->db->get();
    // return $this->db->get_where('users', array('desa_id'=>$desa_id));
  }

  public function arsip_masuk(){
    $this->db->select('*');
    $this->db->from('arsip_masuk');
    $this->db->join('klasifikasi_surat','klasifikasi_surat.id=arsip_masuk.klasifikasi_id');
    return $this->db->get();
  }

  public function get_arsip_one($id){
    $query = "SELECT 
    arsip.id as id,
    klasifikasi.kode as kode,
    klasifikasi.klasifikasi as klasifikasi, 
    arsip.pengirim as pengirim,
    arsip.nomor_surat as nomor_surat,
    arsip.sifat as sifat,
    arsip.perihal as perihal,
    arsip.tanggal_surat as tanggal_surat,
    arsip.time as time,
    arsip.scan_link as scan_link,
    arsip.scan_balasan as scan_balasan,
    arsip.time_balasan as time_balasan,
    arsip.id_pembalas as id_pembalas,
    arsip.status as status
     FROM arsip_masuk as arsip, klasifikasi_surat as klasifikasi 
     WHERE klasifikasi.id = arsip.klasifikasi_id AND arsip.time=$id";
    return $this->db->query($query);
  }

  public function get_arsip_one_by($id){
    $query = "SELECT
    arsip.id as id,
    klasifikasi.kode as kode,
    klasifikasi.klasifikasi as klasifikasi, 
    arsip.pengirim as pengirim,
    arsip.nomor_surat as nomor_surat,
    arsip.sifat as sifat,
    users.fullname as penerima,
    arsip.perihal as perihal,
    arsip.tanggal_surat as tanggal_surat,
    arsip.time as time,
    arsip.scan_link as scan_link,
    arsip.scan_balasan as scan_balasan,
    arsip.time_balasan as time_balasan,
    arsip.id_pembalas as id_pembalas,
    arsip.status as status
     FROM arsip_masuk as arsip, klasifikasi_surat as klasifikasi , users as users
     WHERE klasifikasi.id = arsip.klasifikasi_id AND users.id = arsip.penerima_id AND arsip.id = $id";
    return $this->db->query($query);
  }


  public function _post_arsip_balasan($id, $insert){
    $this->db->where('id', $id);
    return $this->db->update('arsip_masuk', $insert);
  }

  public function cari_data($id){
    $this->db->like('pengirim', $id);
    $this->db->or_like('nomor_surat', $id);
    $this->db->or_like('perihal', $id);
    $this->db->or_like('sifat', $id);
    return $this->db->get('arsip_masuk');
  }
}
