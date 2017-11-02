<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }

    public function upload(){
      if (isset($_POST['import'])) {
        # code...

        $fileName = time().$_FILES['file']['name'];

        $config['upload_path'] = './assets/uploader/import/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();

        $media = $this->upload->data('file');
        $inputFileName = './assets/uploader/import/'.$media['file_name'];

        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);

                //Sesuaikan sama nama kolom tabel di database
                 $data = array(
                    "id"=> $rowData[0][0],
                    "lat"=> $rowData[0][1],
                    "lng"=> $rowData[0][2],
                    "date"=> $rowData[0][3]
                );

                //sesuaikan nama dengan nama tabel
                $insert = $this->db->insert("excel_import", $data);
                delete_files($media['file_path']);

            }
        redirect('office');
      }else{
        $data['title']  = TITLE . 'Import Master Data';
        $data['main_content']   = 'master/form_master_import';
        $this->load->view('template', $data);
      }
    }
}
