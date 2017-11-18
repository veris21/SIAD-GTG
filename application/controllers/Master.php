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
    $data['map']  = array('js'=>'');

    $id = 1;
    $data['title']    = TITLE.'Root Master';
    $data['data']     = $this->option_model->sms_opt($id)->row_array();
    $data['main_content']   = MASTER.'sms_api';
    $this->load->view('template', $data);
  }

  // ===================================

  function proses()
  {
    $data['map']  = array('js'=>'');

    $id = $this->input->post('id');
    $data['title']    = TITLE.'Root Master';
    $data['data']     = $this->master_model->get_proses($id)->row_array();
    $data['main_content']   = MASTER.'proses_form';
    $this->load->view('template', $data);
  }

  function koordinat_list()
  {
    $data['map']  = array('js'=>'');

    $data['title']    = TITLE.'Root Master';
    $data['main_content']   = MASTER.'koordinat_list';
    $data['koordinat']      = $this->tanah_model->list_koordinat()->result();
    $this->load->view('template', $data);
  }
  function koordinat_input()
  {
    $data['map']  = array('js'=>'');

    if (isset($_POST['simpan'])) {
      $keterangan = strip_tags($this->input->post('keterangan'));
      $save = array(
        'keterangan' => $keterangan
      );
      $check = $this->tanah_model->input_koordinat($save);
      if ($check) {
        redirect('koordinat');
        exit;
      }
      exit;
    }else {
      $data['title']    = TITLE.'Root Master';
      $data['main_content']   = MASTER.'koordinat_input';
      $this->load->view('template', $data);
    }
  }

  function koordinat_edit($id)
  {
    $data['map']  = array('js'=>'');

    if (isset($_POST['simpan'])) {






    }else {
      $data['title']    = TITLE.'Root Master';
      $data['main_content']   = MASTER.'koordinat_edit';
      $data['koordinat']      = $this->tanah_model->get_data_koordinat($id)->row_array();
      $this->load->view('template', $data);
    }
  }

  function user_list()
  {
    $data['map']  = array('js'=>'');

    $data['title']    = TITLE.'Root Master';
    $data['main_content']   = MASTER.'user_list';
    $data['user_list']      = $this->master_model->list_user()->result();
    $this->load->view('template', $data);
  }

  function user_view($id)
  {
    $data['map']  = array('js'=>'');

    $data['title']    = TITLE.'Root Master';
    $data['main_content']   = MASTER.'user_view';
    $data['user']           = $this->master_model->user_one($id)->row_array();
    $this->load->view('template', $data);
  }

  function user_edit($id)
  {
    $data['map']  = array('js'=>'');

    if (isset($_POST['simpan'])) {
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
      $user_uid      = strip_tags($this->input->post('user_uid'));
      $user_fullname = strip_tags($this->input->post('user_fullname'));
      $hp = strip_tags($this->input->post('hp'));
      $user_status = strip_tags($this->input->post('user_status'));
      $type = strip_tags($this->input->post('type'));
      $desa_uid = strip_tags($this->input->post('desa_uid'));
      if ($user_pass == $user_pass_confirm) {
        $input_user_data = array(
          'user_uid'=>$user_uid,
          'user_pass'=>sha1($user_pass),
          'user_fullname'=>$user_fullname,
          'user_status'=>$user_status,
          'hp'=>$hp,
          'avatar'=>$fileName,
          'desa_uid'=>$desa_uid,
          'type'=>$type
        );
        $check = $this->master_model->update_user($input_user_data, $id);
        if ($check) {
          redirect('user/lihat/'.$id);
          exit;
        }else {
          echo "Gagal Update User";
        }
        die;
      }
      die;
    }else {
      $data['title']    = TITLE.'Root Master';
      $data['main_content']   = MASTER.'user_edit';
      $data['desa']           = $this->master_model->get_desa()->result();
      $data['user']           = $this->master_model->user_one($id)->row_array();
      $this->load->view('template', $data);
    }
  }

  function user_input()
  {
    if (isset($_POST['simpan'])) {
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
      $user_uid      = strip_tags($this->input->post('user_uid'));
      $user_pass    = strip_tags($this->input->post('user_pass'));
      $user_pass_confirm    = strip_tags($this->input->post('user_pass_confirm'));
      $user_fullname = strip_tags($this->input->post('user_fullname'));
      $hp = strip_tags($this->input->post('hp'));
      $user_status = strip_tags($this->input->post('user_status'));
      $type = strip_tags($this->input->post('type'));
      $desa_uid = strip_tags($this->input->post('desa_uid'));
      if ($user_pass == $user_pass_confirm) {
        $input_user_data = array(
          'user_uid'=>$user_uid,
          'user_pass'=>sha1($user_pass),
          'user_fullname'=>$user_fullname,
          'user_status'=>$user_status,
          'hp'=>$hp,
          'avatar'=>$fileName,
          'desa_uid'=>$desa_uid,
          'type'=>$type
        );
        $check = $this->master_model->insert_user($input_user_data);
        if ($check) {
          redirect('master/user');
          exit;
        }else {
          echo "Gagal Input User";
        }
        die;
      }
      die;
    }else {
      $data['title']          = TITLE.'Root Master';
      $data['desa']           = $this->master_model->get_desa()->result();
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

      $input_desa = array(
        'desa_uid'=>$desa_uid,
        'desa_nama'=>$desa_nama,
        'desa_alamat'=>$desa_alamat,
        'desa_kepala_uid'=>$desa_kepala_uid,
        'kecamatan_uid'=>$kecamatan_uid,
        'data_map_uid'=>$koordinat
      );
        $check_desa_input = $this->master_model->input_desa($input_desa);
        if ($check_desa_input) {
          redirect('master/desa');
        }else {
          echo "Gagal Input Data Desa";
          die;
        }
      die;
    }else {
      $data['title']          = TITLE.'Root Master';
      $data['koordinat']      = $this->master_model->list_koordinat()->result();
      $data['pj']             = $this->master_model->get_user_1()->result();
      $data['kecamatan']      = $this->master_model->get_kecamatan()->result();
      $data['main_content']   = MASTER.'desa_input';
      $this->load->view('template', $data);
    }
  }
  function desa_edit($id)
  {
    if (isset($_POST['simpan'])) {
      $kecamatan_uid        = strip_tags($this->input->post('kecamatan_uid'));
      $desa_nama            = strip_tags($this->input->post('desa_nama'));
      $desa_uid            = strip_tags($this->input->post('desa_uid'));
      $desa_alamat            = strip_tags($this->input->post('desa_alamat'));
      $desa_kepala_uid            = strip_tags($this->input->post('desa_kepala_uid'));
      $desa_nama            = strip_tags($this->input->post('desa_nama'));

      $koordinat            = strip_tags($this->input->post('koordinat'));
      $input_desa = array(
        'desa_uid'=>$desa_uid,
        'desa_nama'=>$desa_nama,
        'desa_alamat'=>$desa_alamat,
        'desa_kepala_uid'=>$desa_kepala_uid,
        'kecamatan_uid'=>$kecamatan_uid,
        'data_map_uid'=> $koordinat
      );
        $check_desa_input = $this->master_model->update_desa($input_desa, $id);
        if ($check_desa_input) {
          redirect('master/desa');
        }else {
          echo "Gagal Input Data Desa";
          die;
        }
      die;
    }else {
      $data['title']          = TITLE.'Root Master';
      $data['koordinat']      = $this->tanah_model->list_koordinat()->result();
      $data['pj']             = $this->master_model->get_user_1()->result();
      $data['desa']           = $this->db->get_where('sig_desa', array('id'=>$id))->row_array();
      $data['kecamatan']      = $this->master_model->get_kecamatan()->result();
      $data['main_content']   = MASTER.'desa_edit';
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

      $input_k = array(
        'kecamatan_uid'=>$kecamatan_uid,
        'kecamatan_nama'=>$kecamatan_nama,
        'kecamatan_alamat'=>$kecamatan_alamat,
        'kecamatan_kepala_uid'=>$kecamatan_kepala_uid,
        'data_map_uid'=>$koordinat
      );

        $check_kecamatan_input = $this->master_model->input_kecamatan($input_k);
        if ($check_kecamatan_input) {
          redirect('master/desa');
        }else {
          echo "Gagal Input Data Kecamatan";
          die;
        }
        die;
    }else {
      $data['title']          = TITLE.'Root Master';
      $data['koordinat']      = $this->tanah_model->list_koordinat()->result();
      $data['pj']             = $this->master_model->get_user_1()->result();
      $data['main_content']   = MASTER.'kecamatan_input';
      $this->load->view('template', $data);
    }
  }

  function kecamatan_edit($id)
  {
    if (isset($_POST['simpan'])) {
      $kecamatan_nama            = strip_tags($this->input->post('kecamatan_nama'));
      $kecamatan_uid            = strip_tags($this->input->post('kecamatan_uid'));
      $kecamatan_alamat            = strip_tags($this->input->post('kecamatan_alamat'));
      $kecamatan_kepala_uid            = strip_tags($this->input->post('kecamatan_kepala_uid'));
      $kecamatan_nama            = strip_tags($this->input->post('kecamatan_nama'));

      $koordinat            = strip_tags($this->input->post('koordinat'));
      $input_kecamatan = array(
        'kecamatan_uid'=>$kecamatan_uid,
        'kecamatan_nama'=>$kecamatan_nama,
        'kecamatan_alamat'=>$kecamatan_alamat,
        'kecamatan_kepala_uid'=>$kecamatan_kepala_uid,
        'data_map_uid'=> $koordinat
      );
        $check_kecamatan_input = $this->master_model->update_kecamatan($input_kecamatan, $id);
        if ($check_kecamatan_input) {
          redirect('master/desa');
        }else {
          echo "Gagal Input Data Desa";
          die;
        }
      die;
    }else {
      $data['title']          = TITLE.'Root Master';
      $data['kecamatan']       = $this->db->get_where('sig_kecamatan', array('id'=>$id))->row_array();
      $data['koordinat']      = $this->tanah_model->list_koordinat()->result();
      $data['pj']             = $this->master_model->get_user_1()->result();
      $data['main_content']   = MASTER.'kecamatan_edit';
      $this->load->view('template', $data);
    }
  }

  function patok_list()
  {
    $data['title']          = TITLE.'List Patok';
    $data['patok']          = $this->tanah_model->list_patok()->result();
    $data['main_content']   = MAPS.'patok_tabel';
    $this->load->view('template', $data);
  }

  function patok_input($id)
  {
    if (isset($_POST['simpanDataPatok'])) {
      if(!empty($_FILES['patok_foto'])){
        $fileName = time().$_FILES['patok_foto']['name'];
        $config['upload_path'] = './assets/uploader/patok/';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = 10000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('patok_foto') )
        $this->upload->display_errors();
      }

      $patok_lat = strip_tags($this->input->post('patok_lat'));
      $patok_lng = strip_tags($this->input->post('patok_lng'));

      $data_patok = array('data_map_uid'=>$id, 'patok_foto'=>$fileName, 'patok_lat'=>$patok_lat, 'patok_lng'=>$patok_lng);

      $pool = $this->tanah_model->get_data_koordinat($id)->row_array();

      $post_patok = $this->tanah_model->insert_patok($data_patok);
      if ($post_patok) {
        $updatePool = array('koordinat' => $pool['koordinat']." ".$patok_lat.",".$patok_lng);
        $updateMap_pool = $this->tanah_model->update_data_maps($id, $updatePool);
        redirect('patok/input/'.$id);
        exit;
      }
    }else {
      $data['title']          = TITLE.'Detail Patok';
      $data['patok']          = $this->tanah_model->get_data_patok($id)->result();
      $data['main_content']   = MAPS.'patok_input';
      $this->load->view('template', $data);
    }
  }

  function patok_details($id)
  {
    $data['title']          = TITLE.'Detail Patok';
    $data['patok']          = '';
    $data['main_content']   = MAPS.'patok_details';
    $this->load->view('template', $data);
  }
  // Master CI_Controller
  /*
    ================================================================
        Changelog   |       @author              |       date
    ================================================================
    adding/create   |   Veris Juniardi          | November, 04 2017
  */
}
