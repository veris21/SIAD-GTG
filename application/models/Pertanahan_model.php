<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanahan_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function _get_details_one($id){
    $this->db->select('mohon.*, p.no_nik, p.nama, p.alamat, p.agama, p.tempat_lahir, 
    p.tanggal_lahir, p.pekerjaan, p.status, p.jenis_kelamin, dsn.nama_dusun, d.nama_desa, d.alamat_desa, u.fullname, kec.nama_kecamatan, kab.nama_kabupaten');
    $this->db->from('permohonan_pertanahan mohon, master_data_penduduk_ p, dusun dsn, desa d, users u, kecamatan kec, kabupaten kab');
    $this->db->where('mohon.kependudukan_id=p.id');
    $this->db->where('mohon.dusun_id=dsn.id');
    $this->db->where('dsn.desa_id=d.id');
    $this->db->where('d.uid=u.id');
    $this->db->where('d.kecamatan_id=kec.id');
    $this->db->where('kec.kabupaten_id=kab.id');
    $this->db->where('mohon.time', $id);
    return $this->db->get();
  }

  public function _get_pernyataan_one($id){
    $this->db->select('per.*, mohon.lokasi, mohon.utara, mohon.selatan, mohon.timur, mohon.barat, mohon.status_tanah, mohon.peruntukan_tanah, mohon.luas, mohon.tahun_kelola, p.no_nik, p.nama, p.alamat, p.agama, p.tempat_lahir, 
    p.tanggal_lahir, p.pekerjaan, p.status, p.jenis_kelamin, dsn.nama_dusun, d.nama_desa, d.alamat_desa, u.fullname, kec.nama_kecamatan, kab.nama_kabupaten');
    $this->db->from('pernyataan_pertanahan per, permohonan_pertanahan mohon, master_data_penduduk_ p, dusun dsn, desa d, users u, kecamatan kec, kabupaten kab');
    $this->db->where('mohon.id=per.permohonan_id');
    $this->db->where('mohon.kependudukan_id=p.id');
    $this->db->where('mohon.dusun_id=dsn.id');
    $this->db->where('dsn.desa_id=d.id');
    $this->db->where('d.uid=u.id');
    $this->db->where('d.kecamatan_id=kec.id');
    $this->db->where('kec.kabupaten_id=kab.id');
    $this->db->where('per.id', $id);
    return $this->db->get();
  }

  public function _get_permohonan(){
    $this->db->select('mohon.*, p.no_nik, p.nama, p.alamat, p.no_kk');
    $this->db->from('permohonan_pertanahan mohon, master_data_penduduk_ p');
    $this->db->where('mohon.kependudukan_id=p.id');
    return $this->db->get();
  }

  public function _post_permohonan($insert){
    return $this->db->insert('permohonan_pertanahan', $insert);
  }

  public function _post_pernyataan($insert){
    return $this->db->insert('pernyataan_pertanahan', $insert);
  }

  public function _get_pernyataan($id){
    return $this->db->get_where('pernyataan_pertanahan', array('permohonan_id'=>$id));
  }

  public function _setujui_permohonan($id, $setujui){
    $this->db->where('id', $id);
    return $this->db->update('permohonan_pertanahan', $setujui);
  }

  public function _post_berita_acara($insert){
    return $this->db->insert('berita_acara_pertanahan', $insert);
  }

  
}
