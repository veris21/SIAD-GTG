<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  public function list($id)
  {
    $data['title']        = TITLE.'Disposisi System';
    $data['main_content'] = DISPOSISI.'list';
    // $data['data']         = ;
    $this->load->view('template', $data);
  }

  public function input()
  {
    $id = $this->input->post('kepada_id');
    $kepada = $this->db->get_where('users', array('id'=>$id))->row_array();
    $dari = $this->session->userdata('jabatan');
    $isi = strip_tags($this->input->post('isi'));
    $perihal = strip_tags($this->input->post('perihal'));
    $pengirim = strip_tags($this->input->post('pengirim'));
    $surat_nomor = strip_tags($this->input->post('surat_nomor'));
    $surat_tgl = strip_tags($this->input->post('surat_tanggal'));
    $arsip_id = strip_tags($this->input->post('arsip_id'));
    $arsip_time = strip_tags($this->input->post('arsip_time'));
    $sekarang = time();
    $to = $kepada['hp'];
    $message = "DISPOSISI : ".$dari."#SURAT: ".$pengirim."#Perihal ".$perihal."#Memo : ".$isi."! (SiDesa Sistem)";
    sms_notifikasi($to, $message);
    $params['data'] = base_url('disposisi/validasi/'.$sekarang);
    $params['level'] = 'M';
    $params['size'] = 10;
    $params['savename'] = FCPATH.'assets/uploader/qr_code/'.$sekarang.'.png';
    $this->ciqrcode->generate($params);
    $qr_link = $sekarang.'.png';
    $post = array(
      'dari_id'=>$this->session->userdata('id'),
      'kepada_id'=>$id,
      'arsip_id'=>$arsip_id,
      'isi_disposisi'=>$isi,
      'time'=>$sekarang,
      'qr_link'=>$qr_link,
      'type'=>0,
      'status'=>0
    );
    $this->disposisi_model->_post_disposisi($post);
    $link = "arsip/".$arsip_time;
    $posting = array(
      'kepada_id'=> $id,
      'hp'=> $to,
      'message'=> $message,
      'link'=> $link,
      'time'=> $sekarang,
      'time_read'=>'-',
      'status'=> 0,
      'type'=> 0
    );
    $this->notifikasi_model->posting_notifikasi($posting);
    echo json_encode(array("status" => TRUE));
  }


  public function tandai_baca($id){
    $baca = array('status'=>1,'time_read'=>time());
    $this->disposisi_model->tandai_telah_baca($id, $baca);
    echo json_encode(array("status" => TRUE));
  }

  public function cetak($id){
    $data['header'] = $this->master_model->_get_desa_id($this->session->userdata('desa_id'))->row_array();
    $data['data'] = $this->arsip_model->get_arsip_one_by($id)->row_array();
    $disposisi = $this->disposisi_model->_get_all_on_arsip_id($id)->result();
    foreach ($disposisi as $d) {
      $dari = $this->master_model->_get_desa_id($this->session->userdata('desa_id'))->row_array();
      if($dari['uid'] == $d->dari_id){
         $data['kades_memo'] = array('dari'=>$d->dari, 'qr_link'=>$d->qr_link,'isi_disposisi'=>$d->isi_disposisi);
      }elseif ($dari['sekdes_uid'] == $d->dari_id) {
        $data['sekdes_memo'] = array('dari'=>$d->dari, 'qr_link'=>$d->qr_link,'isi_disposisi'=>$d->isi_disposisi);
      }
     
    }
    // $this->load->view(DISPOSISI.'print/print_disposisi', $data);
    $html = $this->load->view(DISPOSISI.'print/print_disposisi', $data, true);    
    if($this->pdfgenerator->generate($html, "DISPOSISI (".date('d-M-Y').")")){
      echo json_encode(array("status" => TRUE));
    }
  }

}

/* Disposisi.php || Controller Handler Untuk Modul Disposisi */ 
/*==============================================================
|    @Author     |      Version     |     Changelog     |
_______________________________________________________________
| Veris Juniardi      1.0.0-alfa      November 2017     |
|                |                  |                   |
|                |                  |                   |
================================================================*/