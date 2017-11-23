<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    require_once (APPPATH.'controllers/Notifikasi.php');
    $notifikasi = new Notifikasi();
  }

  function index()
  {

  }

}
