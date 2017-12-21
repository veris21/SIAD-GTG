<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

  }

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
  public function user_input(){
    $uid         = strip_tags($this->input->post('uid'));
    $pass        = strip_tags($this->input->post('pass'));
    $passConfirm = strip_tags($this->input->post('passConfirm'));
    $fullname    = strip_tags($this->input->post('fullname'));
    $jabatan_id  = strip_tags($this->input->post('jabatan_id'));
    $keterangan_jabatan  = strip_tags($this->input->post('keterangan_jabatan'));
    $hp          = strip_tags($this->input->post('hp'));
    $desa_id     = strip_tags($this->input->post('desa_id'));
    $type        = 0;
    if($pass == $passConfirm){
      $insert = array('uid'=> $uid,'pass'=>sha1($pass),
      'fullname'=> $fullname,'jabatan_id'=>$jabatan_id,
      'hp'=> $hp,'desa_id'=>$desa_id,'type'=>$type,
      'keterangan_jabatan'=>$keterangan_jabatan,
      'time'=>time());
      $post = $this->master_model->_post_user($insert);
      if($post){
        echo json_encode(array("status" => TRUE));         
      }
    }
  }

  public function user_update(){
    $id          = $this->input->post('id');
    $update = array('uid'=> $this->input->post('uid'),
      'fullname'=> $this->input->post('fullname'),
      'hp'=> $this->input->post('hp'),
      'keterangan_jabatan'=>$this->input->post('keterangan_jabatan')
      );
      $check = $this->master_model->_update_user($id, $update);
      if($check){
        echo json_encode(array("status" => TRUE));         
      }
  }

  public function user_get($id){
    $data = $this->master_model->_get_user_id($id)->row_array();
    echo json_encode($data);
  }

  function user_delete($id){
    $check = $this->master_model->_delete_user($id);
    if($check){
      echo json_encode(array("status" => TRUE));         
    }
  }

  function user_list()
  {
   
    $data['title']    = TITLE.'User Master';
    $data['main_content']   = MASTER.'user_list';
    $data['jabatan']        = $this->master_model->get_jabatan()->result();
    $data['desa']           = $this->master_model->get_desa()->result();
    $data['user_list']      = $this->master_model->get_user_detail()->result();
    $this->load->view('template', $data);
    
  }

  public function administrasi_data(){
    $data['title']          =  TITLE.'administrasi_data';
    $data['main_content']   =  MASTER.'administrasi_data';
    $data['kecamatan']      =  $this->master_model->kecamatan()->result();
    $data['desa']           =  $this->master_model->_get_desa()->result();
    $data['users']          = $this->master_model->get_user_detail()->result();
    $data['pertanahan']     = $this->master_model->get_user_detail()->result();
    $data['sekdes']         = $this->master_model->get_user_detail()->result();
    $data['kasi_pemerintahan']  = $this->master_model->get_user_detail()->result();
    $data['kabupaten']      = $this->master_model->_get_kabupaten()->result();
    $this->load->view('template',$data);    
  }

  public function desa_input(){
    $uid = strip_tags($this->input->post('uid'));
    $kabupaten_id = strip_tags($this->input->post('kabupaten_id'));
    $kecamatan_id = strip_tags($this->input->post('kecamatan_id'));
    $nama_desa = strip_tags($this->input->post('nama_desa'));
    $alamat_desa = strip_tags($this->input->post('alamat_desa'));
    $sekdes =  strip_tags($this->input->post('sekdes_uid'));
    $kasi_pemerintahan =  strip_tags($this->input->post('kasi_pemerintahan'));
    $pertanahan_uid =  strip_tags($this->input->post('pertanahan_uid'));
    
    $post = array('uid'=>$uid, 
    'nama_desa'=>$nama_desa, 
    'alamat_desa'=>$alamat_desa,
    'kabupaten_id'=>$kabupaten_id,'kecamatan_id'=>$kecamatan_id,
    'status_desa'=>0,
    'sekdes_uid'=>$sekdes_uid,
    'kasi_pemerintahan'=>$kasi_pemerintahan,
    'pertanahan_uid'=>$pertanahan_uid
  );

  $check = $this->master_model->_post_desa($post);
    if($check){
      echo json_encode(array("status" => TRUE)); 
    }      
  }

  public function desa_update(){
    $id = strip_tags($this->input->post('desa_id'));
    $uid = strip_tags($this->input->post('kepala_desa'));
    $nama_desa = strip_tags($this->input->post('nama_desa'));
    $alamat_desa = strip_tags($this->input->post('alamat_desa'));
    $sekdes =  strip_tags($this->input->post('sekretaris_desa'));
    $kasi_pemerintahan =  strip_tags($this->input->post('kasi_pemerintahan'));
    $kasi_pembangunan =  strip_tags($this->input->post('kasi_pembangunan'));
    $kasi_pemberdayaan =  strip_tags($this->input->post('kasi_pemberdayaan'));
    $kaur_umum =  strip_tags($this->input->post('kaur_umum'));
    $kaur_pelayanan =  strip_tags($this->input->post('kaur_pelayanan'));
    $kaur_keuangan =  strip_tags($this->input->post('kaur_keuangan'));
    $pertanahan =  strip_tags($this->input->post('pertanahan'));
    $bendahara =  strip_tags($this->input->post('bendahara'));
    // $ketua_bpd =  strip_tags($this->input->post('ketua_bpd'));
    
    $update = array(
    'uid'=>$uid, 
    'nama_desa'=>$nama_desa, 
    'alamat_desa'=>$alamat_desa,
    'sekdes_uid'=>$sekdes,
    'kasi_pemerintahan'=>$kasi_pemerintahan,
    'kasi_pembangunan'=>$kasi_pembangunan,
    'kasi_pemberdayaan'=>$kasi_pemberdayaan,
    'kaur_umum'=>$kaur_umum,
    'kaur_pelayanan'=>$kaur_pelayanan,
    'kaur_keuangan'=>$kaur_keuangan,
    'bendahara'=>$bendahara,
    // 'ketua_bpd'=>$ketua_bpd,
    'pertanahan_uid'=>$pertanahan
  );

  $check = $this->master_model->_update_desa($id, $update);
    if($check){
      echo json_encode(array("status" => TRUE)); 
    }      
  }


  public function detail_pejabat_desa($id){
    $data['title'] = TITLE.'Detail &amp; Lengkapi Data Desa';
    $data['main_content']   =  MASTER.'data_desa';
    $data['kades']          = $this->master_model->get_user_on($id)->result();
    $data['sekdes']          = $this->master_model->get_user_on($id)->result();
    $data['kasi_pemerintahan']          = $this->master_model->get_user_on($id)->result();
    $data['kasi_pembangunan']          = $this->master_model->get_user_on($id)->result();
    $data['kasi_pemberdayaan']          = $this->master_model->get_user_on($id)->result();
    $data['kaur_umum']          = $this->master_model->get_user_on($id)->result();
    $data['kaur_pelayanan']          = $this->master_model->get_user_on($id)->result();
    $data['kaur_keuangan']          = $this->master_model->get_user_on($id)->result();
    $data['bendahara']          = $this->master_model->get_user_on($id)->result();
    $data['pertanahan']          = $this->master_model->get_user_on($id)->result();
    $data['bpd']          = $this->master_model->get_user_on($id)->result();
    $data['kadus']          = $this->master_model->get_user_on($id)->result();
    $data['ketua_rt']          = $this->master_model->get_user_on($id)->result();
    $data['dusun']          =  $this->master_model->_get_dusun()->result();
    $data['dusun_id']          =  $this->master_model->_get_dusun()->result();
    $data['administrasi']   =  $this->master_model->_get_administrasi_wilayah()->result();
    $data['data']           = $this->master_model->_get_desa_details($id)->row_array();
    $this->load->view('template',$data);
  }

  public function get_dusun($id){
    $data = $this->master_model->get_dusun_id($id)->row_array();
    echo json_encode($data);
  }

  public function input_dusun(){
    $desa_id = strip_tags($this->input->post('desa_id'));
    $nama_dusun =strip_tags($this->input->post('nama_dusun'));
    $alamat_dusun =strip_tags($this->input->post('alamat_dusun'));
    $uid =strip_tags($this->input->post('dusun_uid'));
    $post = array('desa_id'=>$desa_id,'nama_dusun'=>$nama_dusun, 'alamat_dusun'=>$alamat_dusun, 'uid'=>$uid);
    $check = $this->master_model->_post_dusun($post);
    if($check){
      echo json_encode(array("status" => TRUE));
    }   
  }

  public function update_dusun(){
    $id = strip_tags($this->input->post('dusun_id'));
    $desa_id = strip_tags($this->input->post('desa_id'));
    $nama_dusun =strip_tags($this->input->post('nama_dusun'));
    $alamat_dusun =strip_tags($this->input->post('alamat_dusun'));
    $uid =strip_tags($this->input->post('dusun_uid'));
    $post = array('desa_id'=>$desa_id,'nama_dusun'=>$nama_dusun, 'alamat_dusun'=>$alamat_dusun, 'uid'=>$uid);
    $check = $this->master_model->_update_dusun($id, $post);
    if($check){
      echo json_encode(array("status" => TRUE)); 
    }       
  }

  public function delete_dusun($id){
    $check = $this->master_model->_delete_dusun($id);
    if($check){
      echo json_encode(array("status" => TRUE));
    }
  }

  public function input_rt(){
    $dusun_id = strip_tags($this->input->post('dusun_id'));
    $nama_rt = strip_tags($this->input->post('nama_rt'));
    $rt_uid = strip_tags($this->input->post('rt_uid'));
    $post = array('dusun_id'=>$dusun_id,'nama_rt'=>$nama_rt,'uid'=>$rt_uid);
    $check = $this->master_model->_post_rt($post);
    if($check){
      echo json_encode(array("status" => TRUE));
    }    
  }
    
  public function update_rt(){
    $id = strip_tags($this->input->post('rt_id'));
    $dusun_id = strip_tags($this->input->post('dusun_id'));
    $nama_rt = strip_tags($this->input->post('nama_rt'));
    $rt_uid = strip_tags($this->input->post('rt_uid'));
    $post = array('dusun_id'=>$dusun_id,'nama_rt'=>$nama_rt,'uid'=>$rt_uid);
    $check = $this->master_model->_update_rt($id, $post);
    if($check){
      echo json_encode(array("status" => TRUE));
    }    
  }

  public function delete_rt($id){
    $check = $this->master_model->_delete_rt($id);
    if($check){
      echo json_encode(array("status" => TRUE));
    }
  }

  public function get_rt($id){
    $data = $this->master_model->get_rt_id($id)->row_array();
    echo json_encode($data);
  }

  // ==========================
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
