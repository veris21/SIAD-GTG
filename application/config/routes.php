<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// TODO: Route AUTH
$route['login']                     = 'auth/login';
$route['logout']                    = 'auth/logout';
$route['profile']                   = 'auth/profile';


// TODO: Route Office
$route['pernyataan/list']           = 'office/pernyataan_list';
$route['penyataan/input']           = 'office/pernyataan_input';
$route['pernyataan/edit/(:num)']    = 'office/pernyataan_edit/$1';
$route['pernyataan/view/(:num)']    = 'office/pernyataan_view/$1';

$route['berita_acara/list']           = 'office/berita_acara_list';
$route['berita_acara/input']          = 'office/berita_acara_input';
$route['berita_acara/edit/(:num)']    = 'office/berita_acara_edit/$1';
$route['berita_acara/view/(:num)']    = 'office/berita_acara_view/$1';

$route['pra_keterangan_tanah/list']           = 'office/pra_keterangan_tanah_list';
$route['pra_keterangan_tanah/input']          = 'office/pra_keterangan_tanah_input';
$route['pra_keterangan_tanah/edit/(:num)']    = 'office/pra_keterangan_tanah_edit/$1';
$route['pra_keterangan_tanah/view/(:num)']    = 'office/pra_keterangan_tanah_view/$1';

$route['surat_keterangan_tanah/list']           = 'office/surat_keterangan_tanah_list';
$route['surat_keterangan_tanah/input']          = 'office/surat_keterangan_tanah_input';
$route['surat_keterangan_tanah/edit/(:num)']    = 'office/surat_keterangan_tanah_edit/$1';
$route['surat_keterangan_tanah/view/(:num)']    = 'office/surat_keterangan_tanah_view/$1';

// TODO: Route SMS
$route['notifikasi/kirim/[:num]']               = 'sms/kirim/$1';

// TODO:
$route['print/pernyataan/(:num)']               = 'print/pernyataan/$1';
$route['print/berita_acara/(:num)']             = 'print/berita_acara/$1';
$route['print/pra_keterangan_tanah/(:num)']     = 'print/pra_keterangan_tanah/$1';
