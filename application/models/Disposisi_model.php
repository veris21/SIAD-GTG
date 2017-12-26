<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function tandai_telah_baca($id, $baca){
    $this->db->where('time', $id);
    return $this->db->update('disposisi', $baca);
  }

  public function _get_all_on_arsip_id($id){
    $query = "SELECT dari.fullname as dari, darijab.jabatan as dari_jabatan,
    kepada.fullname as kepada, kepadajab.jabatan as kepada_jabatan,
    d.time as time, d.time_read as time_read, d.status as status,
    d.id as id, d.qr_link as qr_link,
    d.dari_id as dari_id,
    d.isi_disposisi as isi_disposisi
    FROM disposisi as d, users as dari,
    users as kepada, jabatan as darijab, jabatan as kepadajab 
    WHERE d.dari_id = dari.id AND 
    d.kepada_id = kepada.id AND
    darijab.id = dari.jabatan_id AND
    kepadajab.id = kepada.jabatan_id 
    AND d.arsip_id = $id";
    return $this->db->query($query);
  }

  public function _post_disposisi($post){
    return $this->db->insert('disposisi', $post);
  }
  public function _get_all($desa)
  {
    # code...
  }
  public function _get_all_one($id)
  {
    # code...
  }


}
