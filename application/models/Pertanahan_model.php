<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanahan_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function _get_details_one($id){
    $this->db->select('mohon.*, p.no_nik, p.nama, p.alamat, p.agama, p.tempat_lahir, 
    p.tanggal_lahir, p.pekerjaan, p.status, p.jenis_kelamin, dsn.nama_dusun, d.nama_desa, d.alamat_desa, u.fullname, kec.nama_kecamatan, kab.nama_kabupaten');
    $this->db->from('permohonan_pertanahan mohon, master_data_penduduk_ p, dusun dsn, desa d, users u, kecamatan kec, kabupaten kab');
    $this->db->where('mohon.kependudukan_id=p.id');
    $this->db->where('mohon.dusun_id=dsn.id');
    $this->db->where('dsn.desa_id=d.id');
    $this->db->where('d.uid=u.id');
    $this->db->where('d.kecamatan_id=kec.id');
    $this->db->where('kec.kabupaten_id=kab.id');
    $this->db->where('mohon.time', $id);
    return $this->db->get();
  }

  public function _get_pernyataan_one($id){
    $this->db->select('per.*, mohon.type_yang_disetujui, mohon.lokasi, mohon.utara, mohon.selatan, mohon.timur, mohon.barat, mohon.status_tanah, mohon.peruntukan_tanah, mohon.luas, mohon.tahun_kelola, p.no_nik, p.nama, p.alamat, p.agama, p.tempat_lahir, 
    p.tanggal_lahir, p.pekerjaan, p.status, p.jenis_kelamin, dsn.nama_dusun, d.nama_desa, d.alamat_desa, u.fullname, kec.nama_kecamatan, kab.nama_kabupaten');
    $this->db->from('pernyataan_pertanahan per, permohonan_pertanahan mohon, master_data_penduduk_ p, dusun dsn, desa d, users u, kecamatan kec, kabupaten kab');
    $this->db->where('mohon.id=per.permohonan_id');
    $this->db->where('mohon.kependudukan_id=p.id');
    $this->db->where('mohon.dusun_id=dsn.id');
    $this->db->where('dsn.desa_id=d.id');
    $this->db->where('d.uid=u.id');
    $this->db->where('d.kecamatan_id=kec.id');
    $this->db->where('kec.kabupaten_id=kab.id');
    $this->db->where('per.id', $id);
    return $this->db->get();
  }

  public function _get_permohonan(){
    $this->db->select('mohon.*, p.no_nik, p.nama, p.alamat, p.no_kk');
    $this->db->from('permohonan_pertanahan mohon, master_data_penduduk_ p');
    $this->db->where('mohon.kependudukan_id=p.id');
    return $this->db->get();
  }

  public function _post_permohonan($insert){
    return $this->db->insert('permohonan_pertanahan', $insert);
  }

  public function _post_pernyataan($insert){
    return $this->db->insert('pernyataan_pertanahan', $insert);
  }

  public function _get_pernyataan($id){
    return $this->db->get_where('pernyataan_pertanahan', array('permohonan_id'=>$id));
  }

  public function _setujui_permohonan($id, $setujui){
    $this->db->where('id', $id);
    return $this->db->update('permohonan_pertanahan', $setujui);
  }

  public function _post_berita_acara($insert){
    return $this->db->insert('berita_acara_pertanahan', $insert);
  }

  public function get_bap_list(){
    $this->db->select('bap.* ,desa.nama_desa, mohon.type_yang_disetujui, mohon.lokasi, mohon.luas, p.no_nik, p.nama, p.alamat, p.no_kk');
    $this->db->from('permohonan_pertanahan mohon, master_data_penduduk_ p, berita_acara_pertanahan bap, desa desa');
    $this->db->where('mohon.kependudukan_id=p.id');
    $this->db->where('bap.permohonan_id=mohon.id');
    return $this->db->get();
  }


  public function _get_bap_details($id){
    $query = "SELECT bap.id as id,
      kabupaten.nama_kabupaten as nama_kabupaten, 
      kecamatan.nama_kecamatan as nama_kecamatan, desa.nama_desa as nama_desa,
      dusun.nama_dusun as nama_dusun, penduduk.no_nik as no_nik, penduduk.nama as nama,
      penduduk.alamat as alamat, mohon.lokasi as lokasi, 
      mohon.luas as luas,
      mohon.peruntukan_tanah as peruntukan_tanah,
      mohon.type_yang_disetujui as type_yang_disetujui,
      mohon.status_tanah as status_tanah,
      mohon.lokasi as lokasi,
      mohon.tahun_kelola as tahun_kelola,
      mohon.utara as batas_utara, mohon.selatan as batas_selatan,
      mohon.barat as batas_barat, mohon.timur as batas_timur,
      mohon.time as time_permohonan,
      mohon.scan_link as lampiran_permohonan,
      mohon.pbb as scan_bukti_pbb,
      mohon.ktp as ktp,
      mohon.qr_link as permohonan_qr,
      pernyataan.saksi1_nama as saksi1_nama,
      pernyataan.saksi1_alamat as saksi1_alamat,
      pernyataan.saksi1_pekerjaan as saksi1_pekerjaan,
      pernyataan.saksi2_nama as saksi2_nama,
      pernyataan.saksi2_alamat as saksi2_alamat,
      pernyataan.saksi2_pekerjaan as saksi2_pekerjaan,
      pernyataan.saksi3_nama as saksi3_nama,
      pernyataan.saksi3_alamat as saksi3_alamat,
      pernyataan.saksi3_pekerjaan as saksi3_pekerjaan,
      pernyataan.saksi4_nama as saksi4_nama,
      pernyataan.saksi4_alamat as saksi4_alamat,
      pernyataan.saksi4_pekerjaan as saksi4_pekerjaan,
      pernyataan.time as time_pernyataan,
      pernyataan.qr_link as pernyataan_qr,
      bap.status_bap as status_bap,
      bap.qr_link as bap_qr,
      bap.pemeriksa_1 as ketua_pemeriksa_id,
      bap.pemeriksa_2 as pemeriksa_1_id,
      bap.pemeriksa_3 as pemeriksa_2_id,
      bap.pemeriksa_4 as pemeriksa_3_id,
      bap.pemeriksa_5 as pemeriksa_4_id
     FROM 
      berita_acara_pertanahan as bap, permohonan_pertanahan as mohon,
      pernyataan_pertanahan as pernyataan, master_data_penduduk_ as penduduk,
      dusun as dusun, desa as desa, kecamatan as kecamatan, kabupaten as kabupaten
     WHERE 
      mohon.kependudukan_id = penduduk.id AND 
      bap.permohonan_id = mohon.id AND bap.pernyataan_id = pernyataan.id AND 
      mohon.dusun_id = dusun.id AND
      dusun.desa_id = desa.id AND
      desa.kecamatan_id = kecamatan.id AND 
      kecamatan.kabupaten_id = kabupaten.id AND 
      bap.time_input=$id";
      return $this->db->query($query);
  }

    public function _get_bap_valid($id){
    $query = "SELECT 
      bap.id as id,
      kabupaten.nama_kabupaten as nama_kabupaten, 
      kecamatan.nama_kecamatan as nama_kecamatan, desa.nama_desa as nama_desa,
      dusun.nama_dusun as nama_dusun, penduduk.no_nik as no_nik, penduduk.nama as nama,
      penduduk.alamat as alamat, mohon.lokasi as lokasi, 
      mohon.luas as luas,
      mohon.peruntukan_tanah as peruntukan_tanah,
      mohon.type_yang_disetujui as type_yang_disetujui,
      mohon.status_tanah as status_tanah,
      mohon.lokasi as lokasi,
      mohon.tahun_kelola as tahun_kelola,
      mohon.utara as batas_utara, mohon.selatan as batas_selatan,
      mohon.barat as batas_barat, mohon.timur as batas_timur,
      mohon.time as time_permohonan,
      mohon.scan_link as lampiran_permohonan,
      mohon.pbb as scan_bukti_pbb,
      mohon.ktp as ktp,
      mohon.qr_link as permohonan_qr,
      pernyataan.saksi1_nama as saksi1_nama,
      pernyataan.saksi1_alamat as saksi1_alamat,
      pernyataan.saksi1_pekerjaan as saksi1_pekerjaan,
      pernyataan.saksi2_nama as saksi2_nama,
      pernyataan.saksi2_alamat as saksi2_alamat,
      pernyataan.saksi2_pekerjaan as saksi2_pekerjaan,
      pernyataan.saksi3_nama as saksi3_nama,
      pernyataan.saksi3_alamat as saksi3_alamat,
      pernyataan.saksi3_pekerjaan as saksi3_pekerjaan,
      pernyataan.saksi4_nama as saksi4_nama,
      pernyataan.saksi4_alamat as saksi4_alamat,
      pernyataan.saksi4_pekerjaan as saksi4_pekerjaan,
      pernyataan.time as time_pernyataan,
      pernyataan.qr_link as pernyataan_qr,

      bap.status_bap as status_bap,
      bap.qr_link as bap_qr,
      bap.pemeriksa_1 as ketua_pemeriksa_id,
      bap.pemeriksa_2 as pemeriksa_1_id,
      bap.pemeriksa_3 as pemeriksa_2_id,
      bap.pemeriksa_4 as pemeriksa_3_id,
      bap.pemeriksa_5 as pemeriksa_4_id
     FROM 
      berita_acara_pertanahan as bap, permohonan_pertanahan as mohon,
      pernyataan_pertanahan as pernyataan, master_data_penduduk_ as penduduk,
      dusun as dusun, desa as desa, kecamatan as kecamatan, kabupaten as kabupaten
     WHERE 
      mohon.kependudukan_id = penduduk.id AND 
      bap.permohonan_id = mohon.id AND bap.pernyataan_id = pernyataan.id AND 
      mohon.dusun_id = dusun.id AND
      dusun.desa_id = desa.id AND
      desa.kecamatan_id = kecamatan.id AND 
      kecamatan.kabupaten_id = kabupaten.id AND 
      bap.time = $id";
      return $this->db->query($query);
  }
  public function _update_bap($id, $update){
    $this->db->where('id', $id);
    return $this->db->update('berita_acara_pertanahan', $update);
  }

  public function _get_skt(){
    $this->db->select('skt.* ,bap.time time_bap, mohon.time time_mohon, desa.nama_desa, mohon.type_yang_disetujui, mohon.lokasi, mohon.luas, p.no_nik, p.nama, p.alamat, p.no_kk');
    $this->db->from('permohonan_pertanahan mohon, master_data_penduduk_ p, berita_acara_pertanahan bap, desa desa, data_skt skt');
    $this->db->where('mohon.kependudukan_id=p.id');
    $this->db->where('bap.permohonan_id=mohon.id');
    $this->db->where('skt.id_berita_acara=bap.id');
    return $this->db->get();
  }

  public function _get_skt_data($id){
    $query = "SELECT kabupaten.nama_kabupaten as nama_kabupaten,
    kecamatan.nama_kecamatan as nama_kecamatan,
    desa.nama_desa as nama_desa,
    dusun.nama_dusun as nama_dusun,
    mohon.time as time_permohonan,
    mohon.id as id_mohon,
    mohon.luas as luas,
    mohon.lokasi as lokasi,
    mohon.status_tanah as status_tanah,
    mohon.peruntukan_tanah as peruntukan_tanah,
    mohon.tahun_kelola as tahun_kelola,
    mohon.type_yang_disetujui as type_surat_tanah,
    mohon.scan_link as surat_kadus,
    mohon.ktp as ktp,
    mohon.pbb as bukti_pbb,
    mohon.qr_link as qr_mohon,
    mohon.utara as utara,
    mohon.selatan as selatan,
    mohon.barat as barat,
    mohon.timur as timur,
    mohon.hp as kontak_pemohon,
    pernyataan.id as id_pernyataan,
    pernyataan.time as time_pernyataan,
    pernyataan.qr_link as qr_pernyataan,

    pernyataan.saksi1_nama as saksi1_nama,
    pernyataan.saksi1_alamat as saksi1_alamat,
    pernyataan.saksi1_pekerjaan as saksi1_pekerjaan,

    pernyataan.saksi2_nama as saksi2_nama,
    pernyataan.saksi2_alamat as saksi2_alamat,
    pernyataan.saksi2_pekerjaan as saksi2_pekerjaan,

    pernyataan.saksi3_nama as saksi3_nama,
    pernyataan.saksi3_alamat as saksi3_alamat,
    pernyataan.saksi3_pekerjaan as saksi3_pekerjaan,

    pernyataan.saksi4_nama as saksi4_nama,
    pernyataan.saksi4_alamat as saksi4_alamat,
    pernyataan.saksi4_pekerjaan as saksi4_pekerjaan,

    bap.time as time_bap,
    bap.qr_link as qr_bap,

    bap.pemeriksa_1 as pemeriksa_1,
    bap.pemeriksa_2 as pemeriksa_2,
    bap.pemeriksa_3 as pemeriksa_3,
    bap.pemeriksa_4 as pemeriksa_4,
    bap.pemeriksa_5 as pemeriksa_5,

    skt.id as id,
    skt.qr_link as qr_skt,
    skt.time as time_skt,
    skt.luas_skt as luas_skt,
    skt.peta as peta,
    skt.status as status,

    penduduk.nama as nama_pemohon,
    penduduk.no_nik as nik_pemohon,
    penduduk.alamat as alamat_pemohon,
    penduduk.tempat_lahir as tempat_lahir_pemohon,
    penduduk.tanggal_lahir as tanggal_lahir_pemohon,
    penduduk.agama as agama_pemohon,
    penduduk.pekerjaan as pekerjaan_pemohon,
    penduduk.jenis_kelamin as jenis_kelamin_pemohon,
    penduduk.status as status_pemohon,

    tengah.foto_tanah as foto_tanah,
    tengah.keterangan as tengah_keterangan,
    tengah.id as titik_tengah,
    tengah.lat as lat,
    tengah.lng as lng

    FROM 
    data_skt as skt, permohonan_pertanahan as mohon, 
    pernyataan_pertanahan as pernyataan, berita_acara_pertanahan as bap, data_link as tengah,  master_data_penduduk_ as penduduk, dusun as dusun, desa as desa, kecamatan as kecamatan, kabupaten as kabupaten

    WHERE 
    tengah.tanah_id = bap.id AND
    kecamatan.kabupaten_id = kabupaten.id AND 
    desa.kecamatan_id = kecamatan.id AND
    dusun.desa_id = desa.id AND
    mohon.dusun_id = dusun.id AND 
    mohon.kependudukan_id = penduduk.id AND 
    pernyataan.permohonan_id = mohon.id AND 
    bap.pernyataan_id = pernyataan.id AND  
    skt.id_berita_acara = bap.id AND 
    skt.id = $id";

    return $this->db->query($query);
  }

  public function _push_skt($push){
    return $this->db->insert('data_skt', $push);
  }

  public function _update_skt($id, $update){
    $this->db->where('id', $id);
    return $this->db->update('data_skt', $update);
  }

  public function _permohonan_all(){
    return $this->db->get('permohonan_pertanahan');
  }

  public function _pernyataan_all(){ 
    return $this->db->get('pernyataan_pertanahan');
  }

   public function _berita_acara_all(){
    return $this->db->get('berita_acara_pertanahan');
  }

  public function _get_bap_one($id){
    $query = "SELECT 
    penduduk.nama as nama,
    penduduk.no_nik as no_nik,
    penduduk.jenis_kelamin as jenis_kelamin,
    penduduk.alamat as alamat,
    penduduk.status as status,
    penduduk.pekerjaan as pekerjaan,
    penduduk.tanggal_lahir as tanggal_lahir,
    penduduk.tempat_lahir as tempat_lahir,


    mohon.lokasi as lokasi,
    mohon.luas as luas,
    mohon.utara as utara,
    mohon.selatan as selatan,
    mohon.timur as timur,
    mohon.barat as barat,    

    pernyataan.saksi1_nama as saksi1_nama,
    pernyataan.saksi1_pekerjaan as saksi1_pekerjaan,
    pernyataan.saksi1_alamat as saksi1_alamat,
    pernyataan.saksi2_nama as saksi2_nama,
    pernyataan.saksi2_pekerjaan as saksi2_pekerjaan,
    pernyataan.saksi2_alamat as saksi2_alamat,
    pernyataan.saksi3_nama as saksi3_nama,
    pernyataan.saksi3_pekerjaan as saksi3_pekerjaan,
    pernyataan.saksi3_alamat as saksi3_alamat,
    pernyataan.saksi4_nama as saksi4_nama,
    pernyataan.saksi4_pekerjaan as saksi4_pekerjaan,
    pernyataan.saksi4_alamat as saksi4_alamat,

    dusun.nama_dusun as nama_dusun,
    desa.nama_desa as nama_desa,
    kades.fullname as nama_kades,
    kades.keterangan_jabatan as jabatan_kades,

    desa.alamat_desa as alamat_desa,
    desa.uid as kades_uid,
    kecamatan.nama_kecamatan as nama_kecamatan,
    kabupaten.nama_kabupaten as nama_kabupaten,

    bap.id as id, bap.time as time, bap.pemeriksa_1 as pemeriksa_1, 
    bap.pemeriksa_2 as pemeriksa_2,
    bap.pemeriksa_3 as pemeriksa_3,
    bap.pemeriksa_4 as pemeriksa_4,
    bap.pemeriksa_5 as pemeriksa_5,
    bap.qr_link as qr_link
    FROM berita_acara_pertanahan as bap, pernyataan_pertanahan as pernyataan, permohonan_pertanahan as mohon, 
    kabupaten as kabupaten, kecamatan as kecamatan, desa as desa, dusun as dusun,  master_data_penduduk_ as penduduk, users as kades
    WHERE 
    desa.uid = kades.id AND
    kecamatan.kabupaten_id = kabupaten.id AND
    desa.kecamatan_id = kecamatan.id AND
    dusun.desa_id = desa.id AND
    mohon.dusun_id = dusun.id AND
    bap.pernyataan_id = pernyataan.id AND 
    pernyataan.permohonan_id = mohon.id AND 
    mohon.kependudukan_id = penduduk.id AND bap.id = $id";
    return $this->db->query($query);
  }

  
  /* ===============================================
                  VALIDASI QR CHECK
    ===============================================*/

  public function _get_validasi_skt($id){
    $query = "SELECT 
    penduduk.nama as nama,
    penduduk.no_nik as no_nik,
    penduduk.jenis_kelamin as jenis_kelamin,
    penduduk.alamat as alamat,
    penduduk.status as status,
    penduduk.pekerjaan as pekerjaan,
    penduduk.tanggal_lahir as tanggal_lahir,
    penduduk.tempat_lahir as tempat_lahir,
    penduduk.agama as agama,

    mohon.lokasi as lokasi,
    mohon.status_tanah as status_tanah,
    mohon.peruntukan_tanah as peruntukan_tanah,
    mohon.tahun_kelola as tahun_kelola,
    mohon.time as time_permohonan,
    
    mohon.pbb as pbb,
    mohon.scan_link as surat_kadus,
    mohon.ktp as ktp,

    mohon.utara as utara,
    mohon.selatan as selatan,
    mohon.timur as timur,
    mohon.barat as barat,    

    pernyataan.time as time_pernyataan,

    dusun.nama_dusun as nama_dusun,
    desa.nama_desa as nama_desa,
    kades.fullname as nama_kades,
    kades.keterangan_jabatan as jabatan_kades,

    desa.alamat_desa as alamat_desa,
    desa.uid as kades_uid,
    kecamatan.nama_kecamatan as nama_kecamatan,
    kabupaten.nama_kabupaten as nama_kabupaten,

    bap.time as time_bap,
    bap.id as bap_id,

    skt.qr_link as qr_link,
    skt.peta as peta,
    skt.id as id,
    skt.time as time,
    skt.luas_skt as luas,
    skt.type as type

    FROM data_skt as skt, berita_acara_pertanahan as bap, pernyataan_pertanahan as pernyataan, permohonan_pertanahan as mohon, 
    kabupaten as kabupaten, kecamatan as kecamatan, desa as desa, dusun as dusun,  master_data_penduduk_ as penduduk, users as kades
    WHERE 
    desa.uid = kades.id AND
    kecamatan.kabupaten_id = kabupaten.id AND
    desa.kecamatan_id = kecamatan.id AND
    dusun.desa_id = desa.id AND
    mohon.dusun_id = dusun.id AND
    bap.pernyataan_id = pernyataan.id AND 
    pernyataan.permohonan_id = mohon.id AND 
    skt.id_berita_acara = bap.id AND
    mohon.kependudukan_id = penduduk.id AND skt.time = $id";
    return $this->db->query($query);
  }

  /* ===============================================*/

  public function _get_skt_one($id){
    $query = "SELECT 
    penduduk.nama as nama,
    penduduk.no_nik as no_nik,
    penduduk.jenis_kelamin as jenis_kelamin,
    penduduk.alamat as alamat,
    penduduk.status as status,
    penduduk.pekerjaan as pekerjaan,
    penduduk.tanggal_lahir as tanggal_lahir,
    penduduk.tempat_lahir as tempat_lahir,
    penduduk.agama as agama,

    mohon.lokasi as lokasi,
    mohon.status_tanah as status_tanah,
    mohon.peruntukan_tanah as peruntukan_tanah,
    mohon.tahun_kelola as tahun_kelola,
    mohon.time as time_permohonan,
    
    mohon.pbb as pbb,
    mohon.scan_link as surat_kadus,
    mohon.ktp as ktp,

    mohon.utara as utara,
    mohon.selatan as selatan,
    mohon.timur as timur,
    mohon.barat as barat,    

    pernyataan.time as time_pernyataan,

    dusun.nama_dusun as nama_dusun,
    desa.nama_desa as nama_desa,
    kades.fullname as nama_kades,
    kades.keterangan_jabatan as jabatan_kades,

    desa.alamat_desa as alamat_desa,
    desa.uid as kades_uid,
    kecamatan.nama_kecamatan as nama_kecamatan,
    kabupaten.nama_kabupaten as nama_kabupaten,

    bap.time as time_bap,
    bap.id as bap_id,

    skt.qr_link as qr_link,
    skt.peta as peta,
    skt.id as id,
    skt.time as time,
    skt.luas_skt as luas,
    skt.type as type

    FROM data_skt as skt, berita_acara_pertanahan as bap, pernyataan_pertanahan as pernyataan, permohonan_pertanahan as mohon, 
    kabupaten as kabupaten, kecamatan as kecamatan, desa as desa, dusun as dusun,  master_data_penduduk_ as penduduk, users as kades
    WHERE 
    desa.uid = kades.id AND
    kecamatan.kabupaten_id = kabupaten.id AND
    desa.kecamatan_id = kecamatan.id AND
    dusun.desa_id = desa.id AND
    mohon.dusun_id = dusun.id AND
    bap.pernyataan_id = pernyataan.id AND 
    pernyataan.permohonan_id = mohon.id AND 
    skt.id_berita_acara = bap.id AND
    mohon.kependudukan_id = penduduk.id AND skt.id = $id";
    return $this->db->query($query);
  }
/*==========================================
            Koordinat Data
==========================================*/
  public function _get_titik_tanah_desa($id){
    return $this->db->get_where('data_tanah_administrasi_desa', array('desa_id'=>$id));
  }

  public function _post_titik_tanah_desa($insert){
    return $this->db->insert('data_tanah_administrasi_desa', $insert);
  }

  public function _update_patok($id,$update){
    $this->db->where('id', $id);
    return $this->db->update('data_koordinat', $update);
  }

  public function _delete_koordinat_patok($id){
    $this->db->where('id', $id);
    return $this->db->delete('data_koordinat');
  }

  public function _update_titik_tengah($id, $update){
    $this->db->where('id', $id);
    return $this->db->update('data_link', $update);
  }
  
  public function get_koordinat_id($id){
    return $this->db->get_where('data_koordinat', array('id'=>$id));
  }

  public function get_koordinat_tengah_id($id){
    return $this->db->get_where('data_link', array('id'=>$id));
  }

  public function _get_all_koordinat(){
    return $this->db->get('data_koordinat');
  }

  public function _get_data_patok($id){
    return $this->db->get_where('data_koordinat', array('id_data_link'=>$id));
  }

  public function _get_data_link($id){
    return $this->db->get_where('data_link', array('tanah_id'=>$id));
  }

  public function _post_titik_marker($post){
    return $this->db->insert('data_link', $post);
  }

  public function _post_titik_polygon($post){
    return $this->db->insert('data_koordinat', $post);
  }


/*==========================================*/



}

/* ======================================
            Pertanahan Model 
=========================================*/
