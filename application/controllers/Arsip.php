<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function arsip(){
    $data['title']          = TITLE . 'Arsip Data';
    $data['arsip_masuk']    = $this->arsip_model->arsip_masuk()->result();
    $data['klasifikasi']    = $this->master_model->_get_klasifikasi_surat()->result();
    $data['main_content']   = ARSIP . 'arsip';
    $this->load->view('template', $data);
}

public function arsip_detail($id){
  $desa_id = $this->session->userdata('desa_id');
  $data['title']          = TITLE . 'Arsip Data';
  $data['data']           = $this->arsip_model->get_arsip_one($id)->row_array();
  $data['kepada']         = $this->arsip_model->_get_user_same_desa($desa_id)->result();
  $data['main_content']   = ARSIP . 'arsip_details';
  $this->load->view('template', $data);
}

public function arsip_input(){
  if(isset($_FILES['scan_link'])){
        $fileName = time()."-".$_FILES['scan_link']['name'];
        $config['upload_path'] = './assets/uploader/arsip/'; //buat folder dengan nama assets di root folder
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = 10000;
        $config['file_name'] = $fileName;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('scan_link') );
        $media = $this->upload->data('scan_link'); 
        $sekarang = time();
        $tanggal_surat = str_replace("/","-", strip_tags($this->input->post('tanggal_surat')));
        $pengirim = strip_tags($this->input->post('pengirim'));
        $perihal = strip_tags($this->input->post('perihal'));
        $sifat = strip_tags($this->input->post('sifat_surat'));
        $insert = array(
                'klasifikasi_id'=>strip_tags($this->input->post('klasifikasi_id')),
                'nomor_surat'=>strip_tags($this->input->post('nomor_surat')),
                'pengirim'=> $pengirim,
                'tanggal_surat'=> $tanggal_surat,
                'perihal'=> $perihal,
                'sifat'=> $sifat,
                'scan_link'=> $fileName,
                'time'=> $sekarang,
                'penerima_id'=> $this->session->userdata("id"),
                'status'=> 0 );
          $desa_id = $this->session->userdata('desa_id');
          $hp_kades = $this->notifikasi_model->_get_data_kades($desa_id)->row_array();
          $kepada_id = $hp_kades['id'];
          $jabatan = $hp_kades['jabatan'];
          $nama_desa = $hp_kades['nama_desa'];
          $message = 'NOTIFIKASI ARSIP : Yth. '.$jabatan.' '.$nama_desa.' SUrat dari '.$pengirim.', Sifat Surat : '.$sifat.', Perihal : '.$perihal.' --( Si-Desa SMS Sistem )--';
          $to = $hp_kades['hp'];
          sms_notifikasi($to, $message); 
          $link = "arsip/".$sekarang;
          $posting = array(
            'kepada_id'=> $kepada_id,
            'hp'=> $to,
            'message'=> $message,
            'link'=> $link,
            'time'=> time(),
            'status'=> 0,
            'type'=> 0
          );
          $this->notifikasi_model->posting_notifikasi($posting);
          $check = $this->office_model->_post_arsip($insert);
          if($check){                           
            echo json_encode(array("status" => TRUE));             
          }
        }
}

}
