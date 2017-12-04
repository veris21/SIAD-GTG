<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'office';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

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
$route['notifikasi/list']           = 'office/notifikasi_list';
$route['notifikasi/baca/(:any)']    = 'office/notifikasi_baca/$1';