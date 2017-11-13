<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function data_penduduk(){
    return $this->db->get('sig_data_penduduk');
  }

  public function arsip_data($simpan_data)
  {
    return $this->db->insert('sig_surat_arsip', $simpan_data);
  }

  public function get_arsip_list()
  {
    return $this->db->get('sig_surat_arsip');
  }

  public function get_arsip_image($id)
  {
    return $this->db->get_where('sig_surat_arsip', array('surat_path_scan'=> $id));
  }

  public function get_arsip_one($id)
  {
    return $this->db->get_where('sig_surat_arsip', array('id'=> $id));
  }

  public function get_user_disposisi()
  {
    return $this->db->get_where('sig_users', array('type'=>1));
  }

  public function post_disposisi($post)
  {
    return $this->db->insert('sig_timeline_disposisi', $post);
  }
  public function get_timeline()
  {
    return $this->db->get('sig_timeline_disposisi');
  }
  public function get_timeline_user($id,$status)
  {
    $this->db->where('kepada_id',$id);
    $this->db->where('status', $status);
    return $this->db->get('sig_timeline_disposisi');
  }
  public function get_timeline_notif($id)
  {
    $query = "SELECT timeline.id as id, timeline.disposisi_tgl as disposisi_tgl,
    timeline.status as status, timeline.type as type,
    timeline.memo as memo, d.user_fullname as dari,
    k.user_fullname as kepada, arsip.surat_path_scan as surat_path_scan,
    arsip.nomor as nomor, arsip.surat_tgl as surat_tgl, arsip.surat_pengirim as surat_pengirim, arsip.surat_perihal as surat_perihal FROM sig_timeline_disposisi as timeline, sig_surat_arsip as arsip, sig_users as d, sig_users as k WHERE arsip.id = timeline.id_arsip AND d.id = timeline.dari_id AND k.id = timeline.kepada_id AND timeline.kepada_id = $id";
    return $this->db->query($query);
  }

  public function get_arsip_view($id)
  {
    $query = "SELECT timeline.id as id, timeline.disposisi_tgl as disposisi_tgl,
    timeline.status as status, timeline.type as type,
    timeline.memo as memo, d.user_fullname as dari,
    k.user_fullname as kepada, arsip.surat_path_scan as surat_path_scan,
    arsip.nomor as nomor, arsip.surat_tgl as surat_tgl, arsip.surat_pengirim as surat_pengirim, arsip.surat_perihal as surat_perihal FROM sig_timeline_disposisi as timeline, sig_surat_arsip as arsip, sig_users as d, sig_users as k WHERE arsip.id = timeline.id_arsip AND d.id = timeline.dari_id AND k.id = timeline.kepada_id AND timeline.id_arsip = $id";
    return $this->db->query($query);
  }

  public function get_all_user()
  {
    return $this->db->get('sig_users');
  }

  public function get_arsip_disposisi($id)
  {
    $query = "SELECT a.surat_path_scan as surat_path_scan, t.disposisi_tgl as disposisi_tgl FROM sig_timeline_disposisi as t, sig_surat_arsip as a WHERE t.id_arsip = a.id AND t.id = $id";
    return $this->db->query($query);
  }

  public function diposisi_terus_input($insert)
  {
    return $this->db->insert('sig_timeline_disposisi',$insert);
  }

}
