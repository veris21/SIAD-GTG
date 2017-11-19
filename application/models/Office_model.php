<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  // TODO: Permohonan Data Tanah
  public function get_permohonan()
  {
    $this->db->select('*');
    $this->db->order_by('sig_skt_mohon.id', 'DESC');
    $this->db->from('sig_data_penduduk_dummy');
    $this->db->join('sig_skt_mohon', 'sig_skt_mohon.nik_id = sig_data_penduduk_dummy.id');
    return $this->db->get();
  }
  public function posting_permohonan($insert)
  {
    return $this->db->insert('sig_skt_mohon', $insert);
  }


  // TODO: Data Penduduk
  public function data_penduduk(){
    return $this->db->get('sig_data_penduduk_dummy');
  }

  public function get_nik_one($id)
  {
    return $this->db->get_where('sig_data_penduduk_dummy', array('id'=>$id));
  }

  public function upload_data($filename)
  {
    ini_set('memory_limit', '-1');
    $inputFileName = './assets/uploader/import/'.$filename;
    // $inputFileName = '1509736090contoh.xlsx';
    try {
    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
    } catch(Exception $e) {
    die('Error loading file :' . $e->getMessage());
    }

    $worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    $numRows = count($worksheet);

    for ($i=1; $i < ($numRows+1) ; $i++) {
      $ins = array(
          'no_kk'             => $worksheet[$i]['A'],
          'no_nik'            => $worksheet[$i]['B'],
          'nama'              => $worksheet[$i]['C'],
          'jenis_kelamin'     => $worksheet[$i]['D'],
          'tempat_lahir'      => $worksheet[$i]['E'],
          'tanggal_lahir'     => $worksheet[$i]['F'],
          'agama'             => $worksheet[$i]['G'],
          'status'            => $worksheet[$i]['H'],
          'shdk'              => $worksheet[$i]['I'],
          'shdrt'             => $worksheet[$i]['J'],
          'pddk_akhir'        => $worksheet[$i]['K'],
          'pekerjaan'  => $worksheet[$i]['L'],
          'nama_ibu'         => $worksheet[$i]['M'],
          'nama_ayah'          => $worksheet[$i]['N'],
          'alamat'         => $worksheet[$i]['O'],
          'no_rt'            => $worksheet[$i]['P'],
          'dusun'             => $worksheet[$i]['Q']
           );

      $this->db->insert('sig_data_penduduk_dummy', $ins);
    }
  }
  // =================================================

  public function arsip_data($simpan_data)
  {
    return $this->db->insert('sig_surat_arsip', $simpan_data);
  }

  public function get_arsip_list()
  {
    $this->db->order_by('id', 'desc');
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

  public function get_user_all_disposisi()
  {
    return $this->db->get('sig_users');
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
    $this->db->order_by('id', 'desc');
    $this->db->where('kepada_id',$id);
    $this->db->where('status', $status);
    return $this->db->get('sig_timeline_disposisi');
  }
  public function get_timeline_notif($id)
  {
    $query = "SELECT timeline.id as id,
    timeline.disposisi_tgl as disposisi_tgl,
    timeline.status as status,
    timeline.type as is_type,
    timeline.memo as memo,
    d.user_fullname as dari,
    d.user_status as dari_status,
    k.user_fullname as kepada,
    k.hp as kepada_hp,
    arsip.surat_path_scan as surat_path_scan,
    arsip.nomor as nomor, arsip.surat_tgl as surat_tgl, arsip.surat_pengirim as surat_pengirim, arsip.surat_perihal as surat_perihal FROM sig_timeline_disposisi as timeline, sig_surat_arsip as arsip, sig_users as d, sig_users as k WHERE arsip.id = timeline.id_arsip AND d.id = timeline.dari_id AND k.id = timeline.kepada_id AND timeline.kepada_id = $id ORDER BY timeline.id DESC LIMIT 25";
    return $this->db->query($query);
  }

  public function get_timeline_notif_dismiss($id)
  {
    $query = "SELECT timeline.id as id,
    timeline.disposisi_tgl as disposisi_tgl,
    timeline.type as is_type,
    timeline.memo as memo,
    timeline.id_arsip as id_arsip,
    d.user_fullname as dari,
    d.user_status as dari_status,
    k.user_fullname as kepada,
    k.hp as kepada_hp,
    arsip.surat_path_scan as surat_path_scan,
    arsip.nomor as nomor, arsip.surat_tgl as surat_tgl,
    arsip.surat_pengirim as surat_pengirim,
    arsip.surat_perihal as surat_perihal
    FROM sig_timeline_disposisi as timeline, sig_surat_arsip as arsip, sig_users as d, sig_users as k
    WHERE arsip.id = timeline.id_arsip AND d.id = timeline.dari_id AND
    k.id = timeline.kepada_id AND timeline.kepada_id = $id AND timeline.status = 0
    ORDER BY timeline.id DESC LIMIT 25";
    return $this->db->query($query);
  }

  public function get_timeline_one($id)
  {
    $query = "SELECT timeline.id as id,
    timeline.disposisi_tgl as disposisi_tgl,
    timeline.status as status,
    timeline.type as is_type,
    timeline.memo as memo,
    timeline.id_arsip as id_arsip,
    d.user_fullname as dari,
    k.user_fullname as kepada,
    k.hp as kepada_hp,
    arsip.surat_path_scan as surat_path_scan,
    arsip.nomor as nomor,
    arsip.surat_tgl as surat_tgl,
    arsip.surat_tgl_terima as surat_tgl_terima,
    arsip.surat_pengirim as surat_pengirim,
    arsip.surat_penerima as surat_penerima,
    arsip.surat_perihal as surat_perihal
    FROM sig_timeline_disposisi as timeline,
    sig_surat_arsip as arsip, sig_users as d,
    sig_users as k
    WHERE arsip.id = timeline.id_arsip
    AND d.id = timeline.dari_id
    AND k.id = timeline.kepada_id
    AND timeline.id = $id";
    return $this->db->query($query);
  }

  public function get_arsip_view($id)
  {
    $query = "SELECT timeline.id as id, timeline.disposisi_tgl as disposisi_tgl,
    timeline.status as status, timeline.type as type,
    timeline.memo as memo, d.user_fullname as dari,
    k.user_fullname as kepada, k.hp as kepada_hp, arsip.surat_path_scan as surat_path_scan,
    arsip.nomor as nomor, arsip.surat_tgl as surat_tgl, arsip.surat_pengirim as surat_pengirim, arsip.surat_perihal as surat_perihal FROM sig_timeline_disposisi as timeline, sig_surat_arsip as arsip, sig_users as d, sig_users as k WHERE arsip.id = timeline.id_arsip AND d.id = timeline.dari_id AND k.id = timeline.kepada_id AND timeline.id_arsip = $id";
    return $this->db->query($query);
  }

  public function get_all_user()
  {
    return $this->db->get('sig_users');
  }

  public function get_arsip_disposisi($id)
  {
    return $this->db->get_where('sig_surat_arsip', array('id'=>$id));
  }

  public function diposisi_terus_input($insert)
  {
    return $this->db->insert('sig_timeline_disposisi',$insert);
  }

}
