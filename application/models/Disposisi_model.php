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
    return $this->db->get_where('disposisi', array('arsip_id'=>$id));
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
