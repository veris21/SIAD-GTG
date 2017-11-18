<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  // ============ FAST SEARCH
  public function get_proses($id)
  {
    return $this->db->get_where('sig_data_penduduk_dummy', array('id'=>$id));
  }
  // ================================
  public function insert_user($input_user_data)
  {
    return $this->db->insert('sig_users', $input_user_data);
  }

  public function update_user($input_user_data, $id)
  {
    $this->db->where('id', $id);
    return $this->db->update('sig_users', $input_user_data);
  }
  public function get_user_1()
  {
    $this->db->where('type', '1');
    return $this->db->get('sig_users');
  }
  public function input_kecamatan($input_k)
  {
    return $this->db->insert('sig_kecamatan', $input_k);
  }

  public function update_kecamatan($input_kecamatan, $id)
  {
    $this->db->where('id', $id);
    return $this->db->update('sig_kecamatan', $input_kecamatan);
  }

  public function input_desa($input_desa)
  {
    return $this->db->insert('sig_desa', $input_desa);
  }

  public function update_desa($input_desa, $id)
  {
    $this->db->where('id', $id);
    return $this->db->update('sig_desa', $input_desa);
  }

  public function get_kecamatan()
  {
    return $this->db->get('sig_kecamatan');
  }
  public function get_desa()
  {
    return $this->db->get('sig_desa');
  }
  public function list_user()
  {
    return $this->db->get('sig_users');
  }
  public function user_one($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('sig_users');
  }

  public function upload_data($file){
          ini_set('memory_limit', '-1');
          $inputFileName = './assets/uploader/import/'.$file;
          try {
          $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
          } catch(Exception $e) {
          die('Error loading file :' . $e->getMessage());
          }

          $worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
          $numRows = count($worksheet);

          for ($i=1; $i < ($numRows+1) ; $i++) {
              $tgl_asli = str_replace('/', '-', $worksheet[$i]['B']);
              $exp_tgl_asli = explode('-', $tgl_asli);
              $exp_tahun = explode(' ', $exp_tgl_asli[2]);
              $tgl_sql = $exp_tahun[0].'-'.$exp_tgl_asli[0].'-'.$exp_tgl_asli[1].' '.$exp_tahun[1];

              $ins = array(
                      "nik"     =>  $worksheet[$i]["A"],
                      "nama"    =>  $worksheet[$i]["B"],
                      "alamat"  =>  $worksheet[$i]["C"]
                     );

              $this->db->insert('import_excel', $ins);
          }
      }

      public function insert($insert)
      {
        return $this->db->insert('import_excel', $insert);
      }
}
