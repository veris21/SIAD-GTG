<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Print extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

  }
  // TODO: Routing untuk convert PDF Surat Pernyataan SKT
  function pernyataan($id){

    $data['data'] = $this->print_model->pernyataan_data($id)->row_array();
    // $this->load->view('print_template/pernyataan', $data);
    $html = $this->load->view('print/pernyataan', $data, true);
    $this->pdfGenerator->generate($html, $data['data']['nama']." - SURAT PERNYATAAN (".date('d-M-Y').")");
  }
  // TODO: Routing untuk convert PDF Surat Berita Acara Pemeriksaan
  function berita_acara($id)
  {

  }
  // TODO: Routing untuk convert PDF Surat Main SKT
  function surat_keterangan_tanah($id)
  {

  }
  // TODO: Routing untuk convert PDF Lampiran SKT (Denah Peta)
  function lampiran_peta($id)
  {

  }
  // TODO: Routing untuk convert PDF Surat DIsposisi
  function disposisi($id)
  {

  }
  // TODO: Routing untuk convert PDF Surat Keterangan
  function surat_keterangan($id)
  {

  }
  // TODO: Routing untuk convert PDF Surat Pengantar
  function surat_pengantar($id)
  {

  }

}
