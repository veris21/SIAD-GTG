<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanah_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  // public function desa()
  // {
  //   return $this->db->get('sig_desa');
  // }
  // public function desa_map($id)
  // {
  //   return $this->db->get_where('sig_skt_patok_data', array('data_map_uid'=>$id));
  // }
  //
  // public function list_tanah_permohonan()
  // {
  //   $this->db->get('sig_skt_mohon');
  //   return ;
  // }
  // public function list_tanah_bap()
  // {
  //   $this->db->get('sig_skt_bap');
  //   return ;
  // }
  // public function list_tanah_pra()
  // {
  //   $this->db->get('sig_skt_bap');
  //   return ;
  // }
  // public function list_tanah_skt()
  // {
  //   $this->db->get('sig_skt_final');
  //   return ;
  // }
  //
  //
  // public function input_koordinat($save)
  // {
  //   return $this->db->insert('sig_data_map', $save);
  // }
  //
  // public function list_koordinat()
  // {
  //   return $this->db->get('sig_data_map');
  // }
  //
  // public function get_data_koordinat_all()
  // {
  //   return $this->db->get('sig_data_map');
  // }
  // public function get_data_koordinat($id)
  // {
  //   return $this->db->get_where('sig_data_map', array('id'=>$id));
  // }
  //
  // public function list_patok()
  // {
  //   return $this->db->get('sig_skt_patok_data');
  // }
  //
  // public function get_data_patok($id)
  // {
  //   return $this->db->get_where('sig_skt_patok_data', array('data_map_uid'=>$id));
  // }
  //
  // public function insert_patok($data_patok)
  // {
  //  return $this->db->insert('sig_skt_patok_data', $data_patok);
  // }
  //
  // public function update_data_maps($id, $updatePool)
  // {
  //   $this->db->where('id', $id);
  //   return $this->db->update('sig_data_map', $updatePool);
  // }

}
