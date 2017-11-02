<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title']          = TITLE . '| Selamat Datang';
    $data['main_content']   = 'welcome';
    $this->load->view('template_login', $data);  }

  public function login()
  {
    $data['title']          = TITLE . 'SIG Login';
    $data['main_content']   = 'login';
    $this->load->view('template_login', $data);
  }

  public function logout()
  {
    $this->session_destroy();
    redirect(BASE_URL);
    die;
  }

  function profile()
  {

  }

}
