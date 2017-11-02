<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    cek_login();
  }

  function cek_sms()
  {

  }

  // TODO: TEst API max 10sms/hari
  public function notifikasi_cek()
  {
    $nama = "Veris Juniardi";
    $typeSurat = "Keterangan Tidak Mampu";
    $nomorSurat = "001/KD-GTG.KET/XI/2017";
    $to = "082281469926";
    $message = "SIA-Desa GTG info : Permintaan Surat ".$typeSurat." nomor:".$nomorSurat." atas nama ".$nama." berhasil diproses (SMS DARI CONTROLLER SMS)";
    sms_helper($to, $message);
  }
}
