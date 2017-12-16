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
// TODO: Route AUTH
$route['login']                     = 'auth/login';
$route['logout']                    = 'auth/logout';
$route['setting/akun']              = 'auth/setting';

$route['public']                    = 'stream';

$route['user/list']                 = 'master/user_list'; 
$route['user/administrasi']         = 'master/administrasi_data';
$route['details/desa/(:any)']    = 'master/detail_pejabat_desa/$1';

$route['arsip/klasifikasi']         = 'master/klasifikasi_arsip';
$route['klasifikasi/posting']       = 'master/posting_klasifikasi_arsip';
$route['klasifikasi/get/(:any)']    = 'master/get_klasifikasi_one/$1';
$route['klasifikasi/edit']          = 'master/update_klasifikasi';
$route['klasifikasi/delete/(:any)'] = 'master/delete_klasifikasi/$1';
$route['adm/json']                  = 'master/adm_json';

$route['arsip']                     = 'arsip/arsip';
$route['arsip/input']               = 'arsip/arsip_input';
$route['arsip/details/(:any)']      = 'arsip/arsip_detail/$1';
 

$route['disposisi/tandai/baca/(:any)']  = 'disposisi/tandai_baca/$1';
$route['disposisi/post']                = 'disposisi/input';
$route['disposisi/cetak/']              = 'disposisi/cetak/$1';

$route['notifikasi/list']           = 'office/notifikasi_list';
$route['notifikasi/baca/(:any)']    = 'office/notifikasi_baca/$1';

$route['pertanahan/data']                 = 'pertanahan/data_view';
$route['pertanahan/permohonan']           = 'pertanahan/permohonan';
$route['pertanahan/berita_acara']         = 'pertanahan/berita_acara';

$route['permohonan/input']                = 'pertanahan/permohonan_input';
$route['permohonan/view/(:any)']          = 'pertanahan/permohonan_view/$1';
$route['permohonan/cetak/(:any)']         = 'pertanahan/permohonan_print/$1';
$route['permohonan/setujui/(:any)']       = 'pertanahan/permohonan_setujui/$1';

$route['pernyataan/input']                = 'pertanahan/pernyataan_input';
$route['pernyataan/cetak/(:any)']         = 'pertanahan/pernyataan_print/$1';

$route['berita_acara/input']              = 'pertanahan/berita_acara_input';
$route['berita_acara/view/(:any)']        = 'pertanahan/berita_acara_view/$1';
$route['berita_acara/cetak/(:any)']       = 'pertanahan/berita_acara_print/$1';

// AUTOFILL
$route['cari/nik/(:any)']           = 'datapenduduk/cari_nik/$1';

$route['cari/skt/(:any)']           = 'pertanahan/cari_skt/$1';



$route['data_penduduk']             = 'datapenduduk/data_penduduk';
$route['import/data']               = 'datapenduduk/import';