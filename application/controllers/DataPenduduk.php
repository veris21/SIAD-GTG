<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author Veris Juniardi <veris.juniardi@gmail.com>
 */
class Datapenduduk extends CI_Controller {    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function get_kecamatan($id){
        $kec = $this->master_model->_kecamatan_on($id);
        $data['hasil'] = "<option value=''>-- Pilih Kecamatan --</option>";
        if($kec->num_rows() != 0){    
            foreach ($kec->result() as $k) {
                  $data['hasil'] .= "<option value='".$k->id."'>".$k->nama_kecamatan."</option>";
            }
            $data['status'] = TRUE;
        }else{
            $data['status'] = FALSE;
        }  
        echo json_encode($data);
    }

    public function get_desa($id){
       $kec = $this->master_model->_desa_on($id);
        $data['hasil'] = "<option value=''>-- Pilih desa --</option>";
        if($kec->num_rows() != 0){    
            foreach ($kec->result() as $k) {
                  $data['hasil'] .= "<option value='".$k->id."'>".$k->nama_desa."</option>";
            }
            $data['status'] = TRUE;
        }else{
            $data['status'] = FALSE;
        }  
        echo json_encode($data);
    }

    public function get_dusun($id){
        $dusun = $this->master_model->_dusun_on($id);
        $data['hasil'] = "<option value=''>-- Pilih dusun --</option>";
        if($dusun->num_rows() != 0){    
            foreach ($dusun->result() as $k) {
                  $data['hasil'] .= "<option value='".$k->id."'>".$k->nama_dusun."</option>";
            }
            $data['status'] = TRUE;
        }else{
            $data['status'] = FALSE;
        }  
        echo json_encode($data);
    }

    public function get_rt($id){
        $rt = $this->master_model->_rt_on($id);
        $data['hasil'] = "<option value=''>-- Pilih rt --</option>";
        if($rt->num_rows() != 0){    
            foreach ($rt->result() as $k) {
                  $data['hasil'] .= "<option value='".$k->id."'>".$k->nama_rt."</option>";
            }
            $data['status'] = TRUE;
        }else{
            $data['status'] = FALSE;
        }  
        echo json_encode($data);
    }

    public function input_penduduk(){
        if(isset($_FILES['ktp'])){
        
        $nama = strip_tags($this->input->post('nama'));
        $no_kk = strip_tags($this->input->post('no_kk'));
        $no_nik = strip_tags($this->input->post('no_nik'));
        $jenis_kelamin = strip_tags($this->input->post('jenis_kelamin'));
        $tempat_lahir = strip_tags($this->input->post('tempat_lahir'));
        $tanggal_lahir = strip_tags($this->input->post('tanggal_lahir'));
        $agama = strip_tags($this->input->post('agama'));
        $pekerjaan = strip_tags($this->input->post('pekerjaan'));
        $shdk = strip_tags($this->input->post('shdk'));
        $status = strip_tags($this->input->post('status'));
        $shdrt = strip_tags($this->input->post('shdrt'));
        $pddk_akhir = strip_tags($this->input->post('pddk_akhir'));
        $nama_ayah = strip_tags($this->input->post('nama_ayah'));
        $nama_ibu = strip_tags($this->input->post('nama_ibu'));
        $kabupaten = strip_tags($this->input->post('kabupaten'));
        $kecamatan = strip_tags($this->input->post('kecamatan'));
        $desa = strip_tags($this->input->post('desa'));
        $dusun = strip_tags($this->input->post('dusun'));
        $rt = strip_tags($this->input->post('rt'));
        $alamat = strip_tags($this->input->post('alamat'));

        $keterangan = strip_tags($this->input->post('keterangan'));

        $ktp = time()."-".$_FILES['ktp']['name'];
        $config['upload_path'] = './assets/uploader/ktp/'; //buat folder dengan nama assets di root folder
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = 10000;
        $config['file_name'] = $ktp;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('ktp') );
        $post = array('keterangan'=>$keterangan,'scan_ktp_or_kk'=>$ktp,'time'=>time(),'type'=>0,'nik'=>$no_nik,'status'=>1);
        $this->datapenduduk_model->_post_timeline($post);
        $no_rt = $this->master_model->get_rt_id($rt)->row_array();
        $insert = array(
            'nama'=>$nama,
            'jenis_kelamin'=>$jenis_kelamin,
            'no_kk'=>$no_kk,
            'no_nik'=>$no_nik,
            'tempat_lahir'=>$tempat_lahir,
            'tanggal_lahir'=>$tanggal_lahir,
            'pekerjaan'=>$pekerjaan,
            'shdk'=>$shdk,
            'shdrt'=>$shdrt,
            'status'=>$status,
            'agama'=>$agama,
            'id_kabupaten'=>$kabupaten,
            'id_kecamatan'=>$kecamatan,
            'id_desa'=>$desa,
            'id_dusun'=>$dusun,
            'no_rt'=>$no_rt['nama_rt'],
            'pddk_akhir'=>$pddk_akhir,
            'alamat'=>$alamat,
            'nama_ayah'=>$nama_ayah,
            'nama_ibu'=>$nama_ibu
        );        
        $check = $this->datapenduduk_model->input_penduduk($insert);
            if ($check) {
                echo json_encode(array("status" => TRUE));
            }
        }
        
    }

    public function get_penduduk($nik){
        $data['results'] = $this->datapenduduk_model->_get_data_nik($nik)->row_array();
        $data['status'] = TRUE;
        echo json_encode($data);
    }
    
    public function update_penduduk(){
        echo json_encode(array("status" => TRUE));
    }

    public function cari_nik($nik){
        $data = $this->datapenduduk_model->_get_data_nik($nik)->row_array();
        echo json_encode($data);
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
            $data['kabupaten']               = $this->master_model->_kabupaten_all()->result();
            $data['main_content']            =   PENDUDUK.'data_penduduk';
            $data['data']                    =   $this->datapenduduk_model->_get_data();
            $this->load->view('template', $data);
        }           
    }

}
/* End of file DataPenduduk.php */

/* Datapenduduk.php || Controller Handler Untuk Modul Datapenduduk */ 
/*==============================================================
|    @Author     |      Version     |     Changelog     |
_______________________________________________________________
| Veris Juniardi      1.0.0-alfa      November 2017     |
|                |                  |                   |
|                |                  |                   |
================================================================*/