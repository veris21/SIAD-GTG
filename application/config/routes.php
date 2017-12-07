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
$route['data_penduduk']             = 'DataPenduduk/data_penduduk';
$route['user/list']                 = 'master/user_list'; 
$route['user/administrasi']         = 'master/administrasi_data';
$route['arsip/klasifikasi']         = 'master/klasifikasi_arsip';
$route['klasifikasi/posting']       = 'master/posting_klasifikasi_arsip';
$route['klasifikasi/get/(:any)']    = 'master/get_klasifikasi_one/$1';
$route['klasifikasi/edit']          = 'master/update_klasifikasi';
$route['klasifikasi/delete/(:any)'] = 'master/delete_klasifikasi/$1';

$route['arsip']                     = 'office/arsip';
$route['arsip/input']               = 'office/arsip_input';
$route['arsip/details/(:any)']      = 'office/arsip_detail/$1';

$route['disposisi/post']            = 'disposisi/input';

$route['notifikasi/list']           = 'office/notifikasi_list';
$route['notifikasi/baca/(:any)']    = 'office/notifikasi_baca/$1';

$route['pertanahan/data']           = 'pertanahan/data_view';

// AUTOFILL
$route['cari/nik/(:any)']           = 'DataPenduduk/cari_nik/$1';