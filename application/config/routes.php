<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'office';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/*
| -------------------------------------------------------------------------
|  REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
/*
| -------------------------------------------------------------------------
| -------------------------------------------------------------------------
*/

$route['login']                     = 'auth/login';
$route['logout']                    = 'auth/logout';
$route['setting/akun']              = 'auth/setting';
$route['get/uid/(:any)']            = 'auth/_get_uid/$1';
$route['auth']                      = 'auth/validate';

/* -----------------------------------------------------------------------
                       PUBLIC ROUTE
 ----------------------------------------------------------------------- */

$route['public']                    = 'stream';
$route['public/details/(:any)']     = 'stream/details/$1';

/* -----------------------------------------------------------------------
                       Validasi Check ROUTE
 ----------------------------------------------------------------------- */
$route['skt/validasi/(:any)']       = 'stream/cek_validasi/$1';


/* -----------------------------------------------------------------------
                        RESET DATABASE ROUTE
 ----------------------------------------------------------------------- */
$route['reset/database']            = 'master/reset';
$route['reset/pertanahan']          = 'master/reset_pertanahan';
$route['reset/arsip']               = 'master/reset_arsip';
$route['reset/notifikasi']          = 'master/reset_notifikasi';
$route['reset/session']             = 'master/reset_session';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */


/* -----------------------------------------------------------------------
                        SMS SISTEM ROUTE
 ----------------------------------------------------------------------- */

$route['sms/blast']                 = 'office/sms_blast';
$route['sms/undangan']              = 'office/sms_undangan';
$route['sms/kirim']                 = 'office/sms_kirim';
$route['sms/setting']               = 'master/sms_setting';
$route['sms/aktif/(:any)']          = 'master/sms_aktif/$1';
$route['sms/nonaktif/(:any)']       = 'master/sms_nonaktif/$1';
$route['sms/get/(:any)']            = 'master/sms_get/$1';
$route['sms/api/input']             = 'master/sms_api_input';
$route['sms/api/update']            = 'master/sms_api_update';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

 /* -----------------------------------------------------------------------
                        USER ROUTE
 ----------------------------------------------------------------------- */
$route['user/list']                 = 'master/user_list'; 
$route['user/administrasi']         = 'master/administrasi_data';
$route['user/input']                = 'master/user_input';
$route['user/update']               = 'master/user_update';
$route['user/get/(:any)']           = 'master/user_get/$1';
$route['user/delete/(:any)']        = 'master/user_delete/$1';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

/* -----------------------------------------------------------------------
                        ADMINISTRASI DESA ROUTE
 ----------------------------------------------------------------------- */
$route['details/desa/(:any)']       = 'master/detail_pejabat_desa/$1';
$route['desa/input']                = 'master/desa_input';
$route['desa/update']               = 'master/desa_update';

$route['dusun/get/(:any)']          = 'master/get_dusun/$1';
$route['rt/get/(:any)']             = 'master/get_rt/$1';
$route['dusun/input']               = 'master/input_dusun';
$route['dusun/update']              = 'master/update_dusun';
$route['dusun/delete/(:any)']       = 'master/delete_dusun/$1';
$route['rt/input']                  = 'master/input_rt';
$route['rt/update']                 = 'master/update_rt';
$route['rt/delete/(:any)']          = 'master/delete_rt/$1';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

/* -----------------------------------------------------------------------
                        ARSIP DATABASE ROUTE
 ----------------------------------------------------------------------- */
$route['arsip/klasifikasi']         = 'master/klasifikasi_arsip';
$route['klasifikasi/posting']       = 'master/posting_klasifikasi_arsip';
$route['klasifikasi/get/(:any)']    = 'master/get_klasifikasi_one/$1';
$route['klasifikasi/edit']          = 'master/update_klasifikasi';
$route['klasifikasi/delete/(:any)'] = 'master/delete_klasifikasi/$1';
$route['adm/json']                  = 'master/adm_json';

$route['arsip']                         = 'arsip/arsip';
$route['arsip/cari']                    = 'arsip/arsip_cari';
$route['arsip/cari_data']               = 'arsip/arsip_cari_data';
$route['arsip/input']                   = 'arsip/arsip_input';
$route['arsip/details/(:any)']          = 'arsip/arsip_detail/$1';
$route['arsip/balasan']                 = 'arsip/balasan_arsip';
$route['arsip/balasan/setujui/(:any)']  = 'arsip/balasan_setujui/$1'; 

$route['disposisi/tandai/baca/(:any)']  = 'disposisi/tandai_baca/$1';
$route['disposisi/post']                = 'disposisi/input';
$route['disposisi/cetak/']              = 'disposisi/cetak/$1';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */


/* -----------------------------------------------------------------------
                       NOTIFIKASI ROUTE
 ----------------------------------------------------------------------- */

$route['notifikasi/list']           = 'office/notifikasi_list';
$route['notifikasi/baca/(:any)']    = 'office/notifikasi_baca/$1';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

 /* -----------------------------------------------------------------------
                        PERTANAHAN SISTEM ROUTE
 ----------------------------------------------------------------------- */
$route['pertanahan/data']                 = 'pertanahan/data_view';
$route['pertanahan/permohonan']           = 'pertanahan/permohonan';
$route['pertanahan/berita_acara']         = 'pertanahan/berita_acara';
$route['pertanahan/surat_tanah']          = 'pertanahan/list_skt';
$route['pertanahan/aset_tanah_desa']      = 'pertanahan/tanah_desa_list';

$route['permohonan/setuju']              = 'pertanahan/permohonan_setuju';

$route['permohonan/input']                = 'pertanahan/permohonan_input';
$route['pernyataan/input']                = 'pertanahan/pernyataan_input';
$route['berita_acara/input']              = 'pertanahan/berita_acara_input';

$route['permohonan/view/(:any)']          = 'pertanahan/permohonan_view/$1';
$route['berita_acara/view/(:any)']        = 'pertanahan/berita_acara_view/$1';
$route['surat_tanah/details/(:any)']      = 'pertanahan/skt_view_one/$1';


/* -----------------------------------------------------------------------
                       PRINT / CETAK PDF ROUTE
 ----------------------------------------------------------------------- */
$route['cetak/permohonan/(:any)']         = 'pertanahan/permohonan_print_alternatif/$1';
$route['cetak/pernyataan/(:any)']         = 'pertanahan/pernyataan_print_alternatif/$1';
$route['permohonan/cetak/(:any)']         = 'pertanahan/permohonan_print/$1';
$route['pernyataan/cetak/(:any)']         = 'pertanahan/pernyataan_print/$1';
$route['berita_acara/cetak/(:any)']       = 'pertanahan/cetak_bap/$1';
$route['final/cetak/(:any)']              = 'pertanahan/cetak_skt/$1';
$route['denah/cetak/(:any)']              = 'pertanahan/cetak_denah_skt/$1';
$route['patok/cetak/(:any)']              = 'pertanahan/cetak_patok_skt/$1';
$route['lampiran/cetak/(:any)']           = 'pertanahan/cetak_lampiran_skt/$1';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

/* -----------------------------------------------------------------------
                      CARI DATA FORM ROUTE
 ----------------------------------------------------------------------- */
$route['cari/nik/(:any)']           = 'datapenduduk/cari_nik/$1';
$route['cari/skt/(:any)']           = 'pertanahan/cari_skt/$1';
$route['get/kecamatan/(:any)']      = 'datapenduduk/get_kecamatan/$1';
$route['get/desa/(:any)']           = 'datapenduduk/get_desa/$1';
$route['get/dusun/(:any)']          = 'datapenduduk/get_dusun/$1';
$route['get/rt/(:any)']             = 'datapenduduk/get_rt/$1';
/* -----------------------------------------------------------------------
                       ADMINISTRASI PENDUDUK ROUTE
 ----------------------------------------------------------------------- */
$route['data_penduduk']             = 'datapenduduk/data_penduduk';
$route['data_penduduk/input']       = 'datapenduduk/input_penduduk';
$route['import/data']               = 'datapenduduk/import';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */

 /* -----------------------------------------------------------------------
                                MAP DATA ROUTE
 ----------------------------------------------------------------------- */
// KOORDINAT ROUTE
$route['koordinat/tengah']                  = 'pertanahan/input_koordinat_tengah';
$route['get/koordinat/tengah/(:any)']       = 'pertanahan/get_koordinat_tengah/$1';
$route['update/koordinat/tengah']           = 'pertanahan/update_koordinat_tengah';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */
$route['koordinat/tanah']                   = 'pertanahan/input_koordinat';
$route['get/koordinat/tanah/(:any)']        = 'pertanahan/get_koordinat/$1';
$route['update/koordinat']                  = 'pertanahan/update_koordinat';
$route['delete/koordinat/(:any)']           = 'pertanahan/delete_koordinat/$1';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */
// DATA KOORDINAT DIPUSH ke SKT
$route['polygon/push']                      = 'pertanahan/skt_input';
$route['aktivasi/download']                 = 'pertanahan/skt_update';
/* -----------------------------------------------------------------------
 ----------------------------------------------------------------------- */
// GEO JSON 
$route['geojson/input']                     = 'pertanahan/geojson_input';

/* ===================================================================== */
/* -----------------------------------------------------------------------
|                           MASTER ROUTE SYSTEM                           |
|                           @Author     Veris Juniardi                    |
|                           @veris_juniardi                               |
|                           veris.juniardi@gmail.com                      |
|                           +6282281469926                                |
 ----------------------------------------------------------------------- */
/* ===================================================================== */