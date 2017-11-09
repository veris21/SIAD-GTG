<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library("Excelfile");
    $this->load->library("PHPExcel");
    $this->load->model("master_model");
  }

  function index()
  {
    $data['title']          = MASTER . 'MASTER PAGE';
    $data['navbar']         = MASTER . 'navbar';
    $data['main_content']   = MASTER . 'dashboard';
    $this->load->view('template', $data);
  }
  function debug(){
    $file = "./assets/uploader/contoh.xlsx";
    $obj = PHPExcel_IOFactory::load($file);
    $cell = $obj->getActiveSheet()->getCellCollection();
    // START FOREACH PER ROW
    foreach($cell as $cl){
      $column = $obj->getActiveSheet()->getCell($cl)->getColumn();
      $row = $obj->getActiveSheet()->getCell($cl)->getRow();
      $data_value= $obj->getActiveSheet()->getCell($cl)->getValue();
      if($row !=  1){
        $header[$row][$column]    = $data_value;
      }else{
        $arr_data[$row][$column]  = $data_value;
      }
    }
    $data['header']=$header;
    $data['values']=$arr_data;
    $data['title']          = MASTER . 'debug PAGE';
    $data['navbar']         = MASTER . 'navbar';
    $data['main_content']   = MASTER . 'debug';
    $this->load->view('template', $data);
  }

  function data_penduduk(){
    if (isset($_POST['import'])) {
      if (!empty($_FILES['master_kk'])) {
        $fileName = time().$_FILES['master_kk']['name'];
        $config['upload_path'] = './assets/uploader/import/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if(! $this->upload->do_upload('master_kk') )
        $this->upload->display_errors();
        $media = $this->upload->data('master_kk');
        $file = $media['file_name'];
        $this->master_model->upload_data($file);
        unlink('./assets/uploader/import/'.$file);
        redirect('sysadmin/list/data_penduduk');
        }
    }else{
      $data['title']          = MASTER . 'MASTER PAGE';
      $data['navbar']         = MASTER . 'navbar';
      $data['master']         = $this->db->get('import_excel')->result();
      $data['main_content']   = MASTER . 'data_master_kk';
      $this->load->view('template', $data);
    }
  }

  function import_excel()
  {

  }

  // Master CI_Controller
  /*
    ================================================================
        Changelog   |       @author              |       date
    ================================================================
    adding/create   |   Veris Juniardi          | November, 04 2017
  */
}
