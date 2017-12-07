<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapenduduk extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function cari_nik($nik){
        $data = $this->datapenduduk_model->_get_data_nik($nik)->row_array();
        // $data = array('no_nik'=>'no nik', 'no_kk'=>'123456789', 'nama'=>'veris');
        echo json_encode($data);

        // echo json_encode(array("status" => TRUE));
    }
    
    public function mutasi_data()
    {
        
    }

    public function data_penduduk()
    {
       if(isset($_POST['import'])){
        if (!empty($_FILES['import_xls'])) {
            $config['upload_path'] = './assets/uploader/import/'; //buat folder dengan nama assets di root folder
            $config['allowed_types'] = 'xls|xlsx';
            $this->load->library('upload');
            $this->upload->initialize($config);
            if(! $this->upload->do_upload('import_xls') ){
              $this->upload->display_errors();
            }else {
              // $data = array('upload_data' => $this->upload->data());
              $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
              $filename = $upload_data['file_name'];
              $this->datapenduduk_model->upload_data($filename);
              unlink('./assets/uploader/import/'.$filename);
              redirect('data_penduduk','refresh');
            }
          }
       }else{
        //    $this->load->model('datapenduduk_model');
           $data['title']                   =   TITLE.'Import Master Data';
           $data['main_content']            =   PENDUDUK.'data_penduduk';
           $data['data']                    =   $this->datapenduduk_model->_get_data();
           $this->load->view('template', $data);
       }
    }

}
/* End of file DataPenduduk.php */