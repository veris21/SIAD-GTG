<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

  }

  public function lookup()
  {
    $json = [];
    if(!empty($this->input->get("q"))){
      $this->db->like('no_nik', $this->input->get("q"));
      $this->db->or_like('nama', $this->input->get("q"));
      $query = $this->db->select('id, no_nik as text')
            ->limit(10)
            ->get("sig_data_penduduk_dummy");
      $json = $query->result();
    }
    echo json_encode($json);
  }

  // ======MASTER SYSTEM SETTING =======

  function sms_api()
  {
    $id = 1;
    $data['title']    = TITLE.'Root Master';
    $data['data']     = $this->option_model->sms_opt($id)->row_array();
    $data['main_content']   = MASTER.'sms_api';
    $this->load->view('template', $data);
  }

  // ===================================

  function proses()
  {
    $id = $this->input->post('id');
    $data['title']    = TITLE.'Root Master';
    $data['data']     = $this->master_model->get_proses($id)->row_array();
    $data['main_content']   = MASTER.'proses_form';
    $this->load->view('template', $data);
  }
// =========== Master User ==========
  public function user_add(){
    $uid         = strip_tags($this->input->post('uid'));
    $pass        = strip_tags($this->input->post('pass'));
    $passConfirm = strip_tags($this->input->post('passConfirm'));
    $fullname    = strip_tags($this->input->post('fullname'));
    $jabatan_id  = strip_tags($this->input->post('jabatan_id'));
    $hp          = strip_tags($this->input->post('hp'));
    $desa_id     = strip_tags($this->input->post('desa_id'));
    $type        = strip_tags($this->input->post('type'));
    if($pass == $passConfirm){
      $insert = array('uid'=> $uid,'pass'=>sha1($pass),'fullname'=> $fullname,'jabatan_id'=>$jabatan_id,'hp'=> $hp,'desa_id'=>$desa_id,'type'=>$type,'time'=>time());
      $post = $this->master_model->_post_user($insert);
      if($post){
        echo json_encode(array("status" => TRUE));         
      }
    }
  }
  function user_list()
  {
    if(isset($_POST['tambah'])){
      $uid         = strip_tags($this->input->post('uid'));
      $pass        = strip_tags($this->input->post('pass'));
      $passConfirm = strip_tags($this->input->post('passConfirm'));
      $fullname    = strip_tags($this->input->post('fullname'));
      $jabatan_id  = strip_tags($this->input->post('jabatan_id'));
      $hp          = strip_tags($this->input->post('hp'));
      $desa_id     = strip_tags($this->input->post('desa_id'));
      $type        = strip_tags($this->input->post('type'));
      if($pass == $passConfirm){
        $insert = array('uid'=> $uid,'pass'=>sha1($pass),'fullname'=> $fullname,'jabatan_id'=>$jabatan_id,'hp'=> $hp,'desa_id'=>$desa_id,'type'=>$type,'time'=>time());
        $post = $this->master_model->_post_user($insert);
        if($post){
          redirect('user/list','refresh');
        }
      }
    }else{
    $data['title']    = TITLE.'User Master';
    $data['main_content']   = MASTER.'user_list';
    $data['jabatan']        = $this->master_model->get_jabatan()->result();
    $data['desa']           = $this->master_model->get_desa()->result();
    $data['user_list']      = $this->master_model->get_user_detail()->result();
    $this->load->view('template', $data);
    }
  }

  function administrasi_data(){
    if (isset($_POST['posting_rt'])) {
      $nama_rt = strip_tags($this->input->post('nama_rt'));
      $dusun_id = strip_tags($this->input->post('dusun_id'));
      $post = array('nama_rt'=>$nama_rt, 'dusun_id'=>$dusun_id);
      $push = $this->master_model->_post_rt($post);
      if($push){
        redirect('user/administrasi', 'refresh');
      }
    } elseif(isset($_POST['posting_dusun'])) {
      $nama_dusun = strip_tags($this->input->post('nama_dusun'));
      $desa_id = strip_tags($this->input->post('desa_id'));
      $post = array('nama_dusun'=>$nama_dusun,'desa_id'=>$desa_id);     
      $push = $this->master_model->_post_dusun($post);
      if($push){
        redirect('user/administrasi', 'refresh');
      }
    } elseif(isset($_POST['posting_desa'])){
      $nama_desa = strip_tags($this->input->post('nama_desa'));
      $kecamatan_id = strip_tags($this->input->post('kecamatan_id'));
      $post = array('nama_desa'=>$nama_desa,'kecamatan_id'=>$kecamatan_id);
      $push = $this->master_model->_post_desa($post);
      if($push){
        redirect('user/administrasi', 'refresh');
      }
    }else{
    $data['title']          =  TITLE.'administrasi_data';
    $data['main_content']   =  MASTER.'administrasi_data';
    $data['administrasi']   =  $this->master_model->_get_administrasi_wilayah()->result();
    $data['kecamatan']      =  $this->master_model->kecamatan()->result();
    $data['desa']           =  $this->master_model->_get_desa()->result();
    $data['dusun']          =  $this->master_model->_get_dusun()->result();
    $data['desa_opt']           =  $this->master_model->desa()->result();
    $data['dusun_opt']          =  $this->master_model->dusun()->result();

    $this->load->view('template',$data);
    }
  }
// DATA TABLES Server Processing
  public function adm_json(){
    $list = $this->master_model->get_adm_json()->result();
    $data = array();
    // $no = $_POST['start'];
    foreach($list as $list){
      $row = array();
      $row[] = $list->nama_kabupaten;
      $row[] = $list->nama_kecamatan;
      $row[] = $list->nama_desa;
      $row[] = $list->nama_dusun;
      $row[] = $list->nama_rt;
      $row[] = $list->id;
      $data[] = $row;
    }
    $output = array(
      "draw" => "1",
      "recordsTotal" => $this->master_model->get_adm_json()->num_rows(),
      "recordsFiltered" => 10,
      "data" => $data,
    );
    echo json_encode($output);
  }
  public function posting_klasifikasi_arsip(){
    $data = array(
      'kode'=>strip_tags($this->input->post('kode')),
      'klasifikasi'=>strip_tags($this->input->post('klasifikasi')),
      'tipe'=>0
      );
      $this->master_model->_post_klasifikasi_surat($data);
      echo json_encode(array("status" => TRUE)); 
  }

  public function update_klasifikasi(){
    $id = strip_tags($this->input->post('id'));
    $data = array(
      'kode'=>strip_tags($this->input->post('kode')),
      'klasifikasi'=>strip_tags($this->input->post('klasifikasi')),
      'tipe'=>0
      );
    $this->master_model->_update_klasifikasi_surat($id, $data);
    echo json_encode(array("status" => TRUE));
  }

  public function delete_klasifikasi($id){
    $this->master_model->_delete_klasifikasi_surat($id);
    echo json_encode(array("status" => TRUE));
  }

  public function get_klasifikasi_one($id){
    $data = $this->master_model->_get_klasifikasi_one($id)->row_array();
    echo json_encode($data);
  }
  function klasifikasi_arsip(){
     
      $data['title']          =  TITLE.'administrasi_data';
      $data['main_content']   =  MASTER.'klasifikasi_surat';
      $data['data']           = $this->master_model->_get_klasifikasi_surat()->result();
      $this->load->view('template',$data);
  }
 
  // Master CI_Controller
  /*
    ================================================================
        Changelog   |       @author              |       date
    ================================================================
    adding/create   |   Veris Juniardi          | November, 04 2017
  */
}
