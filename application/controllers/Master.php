<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function user_list()
  {
    $data['title']    = TITLE.'Root Master';
    $data['main_content']   = MASTER.'user_list';
    $data['user_list']      = $this->master_model->list_user()->result();
    $this->load->view('template', $data);
  }

  function user_view($id)
  {
    $data['title']    = TITLE.'Root Master';
    $data['main_content']   = MASTER.'user_view';
    $data['user']           = $this->master_model->user_one($id)->row_array();
    $this->load->view('template', $data);
  }

  function user_edit($id)
  {
    if (isset($_POST['simpan'])) {
      if($_FILES['avatar']!=''){

      }

    }else {
      $data['title']    = TITLE.'Root Master';
      $data['main_content']   = MASTER.'user_edit';
      $data['user']           = $this->master_model->user_one($id)->row_array();
      $this->load->view('template', $data);
    }
  }

  function user_input()
  {
    if (isset($_POST['simpan'])) {
      if($_FILES['avatar']!=''){

      }

    }else {
      $data['title']          = TITLE.'Root Master';
      $data['main_content']   = MASTER.'user_input';
      $this->load->view('template', $data);
    }
  }

  function list_desa()
  {
    $data['title']          = TITLE.'Root Master';
    $data['main_content']   = MASTER.'master_desa';
    $data['desa']           = $this->master_model->get_desa()->result();
    $data['kecamatan']      = $this->master_model->get_kecamatan()->result();
    $this->load->view('template', $data);
  }

  function desa_input()
  {
    if (isset($_POST['simpan'])) {
      $kecamatan_uid        = strip_tags($this->input->post('kecamatan_uid'));
      $desa_nama            = strip_tags($this->input->post('desa_nama'));
      $desa_uid            = strip_tags($this->input->post('desa_uid'));
      $desa_alamat            = strip_tags($this->input->post('desa_alamat'));
      $desa_kepala_uid            = strip_tags($this->input->post('desa_kepala_uid'));
      $desa_nama            = strip_tags($this->input->post('desa_nama'));

      $koordinat            = strip_tags($this->input->post('koordinat'));
      $keterangan           = strip_tags($this->input->post('keterangan'));
      $luas                 = strip_tags($this->input->post('luas'));


      $input_koor = array('koordinat'=>$koordinat,'keterangan'=>$keterangan, 'luas'=>$luas);
      $input_desa = array(
        'desa_uid'=>$desa_uid,
        'desa_nama'=>$desa_nama,
        'desa_alamat'=>$desa_alamat,
        'desa_kepala_uid'=>$desa_kepala_uid,
        'kecamatan_uid'=>$kecamatan_uid
      );
      $check_koor_input = $this->master_model->input_koor($input_koor);
      if ($check_koor_input) {
        $check_desa_input = $this->master_model->input_desa($input_desa);
        if ($check_desa_input) {
          redirect('master/desa');
        }else {
          echo "Gagal Input Data Kecamatan";
          die;
        }
      }else {
        echo "Gagal Input Data Koordinat Kecamatan";
        die;
      }

    }else {
      $data['title']          = TITLE.'Root Master';
      $data['pj']             = $this->master_model->get_user_1()->result();
      $data['kecamatan']      = $this->master_model->get_kecamatan()->result();
      $data['main_content']   = MASTER.'desa_input';
      $this->load->view('template', $data);
    }
  }

  function kecamatan_input()
  {
    if (isset($_POST['simpan'])) {
      $kecamatan_uid        = strip_tags($this->input->post('kecamatan_uid'));
      $kecamatan_nama       = strip_tags($this->input->post('kecamatan_nama'));
      $kecamatan_alamat     = strip_tags($this->input->post('kecamatan_alamat'));
      $kecamatan_kepala_uid = strip_tags($this->input->post('kecamatan_kepala_uid'));

      $koordinat            = strip_tags($this->input->post('koordinat'));
      $keterangan           = strip_tags($this->input->post('keterangan'));
      $luas                 = strip_tags($this->input->post('luas'));

      $input_k = array(
        'kecamatan_uid'=>$kecamatan_uid,
        'kecamatan_nama'=>$kecamatan_nama,
        'kecamatan_alamat'=>$kecamatan_alamat,
        'kecamatan_kepala_uid'=>$kecamatan_kepala_uid
      );
      $input_koor = array('koordinat'=>$koordinat,'keterangan'=>$keterangan, 'luas'=>$luas);

      $check_koor_input = $this->master_model->input_koor($input_koor);
      if ($check_koor_input) {
        $check_kecamatan_input = $this->master_model->input_kecamatan($input_k);
        if ($check_kecamatan_input) {
          redirect('master/desa');
        }else {
          echo "Gagal Input Data Kecamatan";
        }
      }else {
        echo "Gagal Input Data Koordinat Kecamatan";
      }
    }else {
      $data['title']          = TITLE.'Root Master';
      $data['pj']             = $this->master_model->get_user_1()->result();
      $data['main_content']   = MASTER.'kecamatan_input';
      $this->load->view('template', $data);
    }
  }
  // Master CI_Controller
  /*
    ================================================================
        Changelog   |       @author              |       date
    ================================================================
    adding/create   |   Veris Juniardi          | November, 04 2017
  */
}
