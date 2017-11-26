<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('html2pdf');
    // require_once (APPPATH.'controllers/Notifikasi.php');
    // $notifikasi = new Notifikasi();
  }

  public function list($id)
  {
    $data['title']        = TITLE.'Disposisi System';
    $data['main_content'] = DISPOSISI.'list';
    $data['data']         = ;
    $this->load->view('template', $data);
  }

  public function input($id)
  {
    if (isset($_POST['input'])) {
      // ATRIBUT INPUT
      $kepada = strip_tags($this->input->post('kepada'));
      $dari = $this->session->userdata('full_name')."/".$this->session->userdata('jabatan');
      $memo = strip_tags($this->input->post('memo'));
      $datestring = '%d %M %Y - %h:%i %a';
      $time = time();
      $sekarang = mdate($datestring, $time);
      $disposisi_tgl = $sekarang;

      // ATRIBUT NOTIFIKASI
      $surat_no = '';
      $surat_tgl ='';
      $surat_dari = '';
      $surat_perihal = '';

      $to = "";
      $message = "DISPOSISI dari $dari Perihal $surat_perihal Surat dr $surat_dari No. $surat_no/$surat_tgl Memo : ' $memo ' --Sistem Si-Desa Gantung--";
      sms_notifikasi($to, $message);
    }else {
      # code...
    }
  }

  public function lanjut($id)
  {
    $to = "";
    $message = "--Sistem Si-Desa Gantung--";
    sms_notifikasi($to, $message);
  }

}
