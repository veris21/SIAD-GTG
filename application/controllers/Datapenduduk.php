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
        echo json_encode($data);
    }
    
    public function mutasi_data()
    {
        echo json_encode(array("status" => TRUE));
    }

    public function import(){
        if (!empty($_FILES['import_xls'])) {
            $fileName = time()."-".$_FILES['import_xls']['name'];
            $config['upload_path'] = './assets/uploader/import/'; //buat folder dengan nama assets di root folder
            $config['allowed_types'] = 'xls|xlsx';
            $config['file_name'] = $fileName;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if(! $this->upload->do_upload('import_xls') );
              $this->datapenduduk_model->upload_data($fileName);
              unlink('./assets/uploader/import/'.$fileName);
              echo json_encode(array("status" => TRUE));            
          }
    }

    public function data_penduduk()
    {
        if(isset($_POST['upload'])){
            if (!empty($_FILES['import_xls'])) {
                $fileName = time()."-".$_FILES['import_xls']['name'];
                $config['upload_path'] = './assets/uploader/import/'; //buat folder dengan nama assets di root folder
                $config['allowed_types'] = 'xls|xlsx';
                $config['file_name'] = $fileName;
                $this->load->library('upload');
                $this->upload->initialize($config);
                if(! $this->upload->do_upload('import_xls') );
                  $this->datapenduduk_model->upload_data($fileName);
                  unlink('./assets/uploader/import/'.$fileName);
                  redirect('data_penduduk','refresh');
              }
        }else{
            $data['title']                   =   TITLE.'Import Master Data';
            $data['main_content']            =   PENDUDUK.'data_penduduk';
            $data['data']                    =   $this->datapenduduk_model->_get_data();
            $this->load->view('template', $data);
        }           
    }

}
/* End of file DataPenduduk.php */