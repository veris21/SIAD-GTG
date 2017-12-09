<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('html2pdf');
    // require_once (APPPATH.'controllers/Notifikasi.php');
    // $notifikasi = new Notifikasi();
    // $this->load->model('master_model');
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
    $message = "DISPOSISI : ".$dari."#SURAT: ".$pengirim."#Perihal ".$perihal."#Memo : ".$isi."! (Si-Desa Gantung)";
    sms_notifikasi($to, $message);
    $post = array(
      'dari_id'=>$this->session->userdata('id'),
      'kepada_id'=>$id,
      'arsip_id'=>$arsip_id,
      'isi_disposisi'=>$isi,
      'time'=>$sekarang,
      'type'=>0,
      'status'=>0
    );
    $this->disposisi_model->_post_disposisi($post);
    $link = "disposisi/".$arsip_time;
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
    $baca = array('status'=>1);
    $this->disposisi_model->tandai_telah_baca($id, $baca);
    echo json_encode(array("status" => TRUE));
  }

  public function cetak($id){
    $data['data'] = $this->disposisi_model->_get_all_on_arsip_id($id)->result();   
    $this->load->library('html2pdf');
    $this->html2pdf->folder('./assets/pdfs/');
    $this->html2pdf->filename($id.time().'.pdf');
    $this->html2pdf->paper('legal', 'portrait');
    $this->html2pdf->html($this->load->view(DISPOSISI.'print/print_disposisi', $data, true));
    if($this->html2pdf->create('download')) {
      echo json_encode(array("status" => TRUE));
    }
  }

}
