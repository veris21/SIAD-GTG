<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cron extends CI_Controller{
  //
  // public function __construct()
  // {
  //   parent::__construct();
  //   //Codeigniter : Write Less Do More
  // }
  //
  function index()
  {
    if($this->input->is_cli_request()){
      $server = BASE_URL;
      $datestring = '%d %M %Y - %h:%i %a';
      $time = time();
      $sekarang = mdate($datestring, $time);
      $to = '082281469926';
      $message = 'Ini Pesan Dari $server Cron Job jalan pada : $sekarang';
      sms_notifikasi($to, $message);
    }else {
      echo "This script can only be accessed via the command line" . PHP_EOL;
      return;
    }
  }

}
