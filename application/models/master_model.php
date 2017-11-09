<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
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
