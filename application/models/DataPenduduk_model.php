<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapenduduk_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function _get_data_nik($nik){
    $this->db->select('*')
    ->from('master_data_penduduk_')
    ->where('no_nik', $nik)
    ->or_where('nama', $nik);
    return $this->db->get();
    // return $this->db->get_where('master_data_penduduk_', array('no_nik'=>$nik));
  }

  public function _post_timeline($post){
    return $this->db->insert('timeline_data_penduduk_', $post);
  }

  public function _get_data()
  {
    return $this->db->get('master_data_penduduk_');
  }

  public function edit($id, $update)
  {
    $this->db->where('id', $id);
    return $this->db->update('master_data_penduduk_', $update);
  }
  
  public function input($insert)
  {
    return $this->db->insert('master_data_penduduk_', $insert);
  }

  public function upload_data($filename)
  {
    ini_set('memory_limit', '-1');
    $inputFileName = './assets/uploader/import/'.$filename;
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
          'pekerjaan'         => $worksheet[$i]['L'],
          'nama_ibu'          => $worksheet[$i]['M'],
          'nama_ayah'         => $worksheet[$i]['N'],
          'alamat'            => $worksheet[$i]['O'],
          'no_rt'             => $worksheet[$i]['P'],
          'dusun'             => $worksheet[$i]['Q']
           );

      $this->db->insert('master_data_penduduk_', $ins);
    }
  }


}