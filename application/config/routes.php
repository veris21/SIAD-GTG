<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'office';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['lookup']                            = 'master/lookup';
$route['proses']                            = 'master/proses';

// TODO: root system master
$route['master']                             = 'master';
$route['master/sms']                         = 'master/sms_api';
$route['master/sms/edit/(:num)']             = 'master/sms_api_edit/$1';
$route['master/sms/input']                   = 'master/sms_api_input';
$route['master/user']                        = 'master/user_list';
$route['user/input']                         = 'master/user_input';
$route['user/lihat/(:num)']                  = 'master/user_view/$1';
$route['user/edit/(:num)']                   = 'master/user_edit/$1';
$route['master/desa']                        = 'master/list_desa';
$route['desa/input']                         = 'master/desa_input';
$route['desa/edit/(:num)']                   = 'master/desa_edit/$1';
$route['kecamatan/input']                    = 'master/kecamatan_input';
$route['kecamatan/edit/(:num)']              = 'master/kecamatan_edit/$1';


// TODO: Koordinat route
$route['koordinat']                 = 'master/koordinat_list';
$route['koordinat/input']           = 'master/koordinat_input';
$route['koordinat/edit/(:num)']     = 'master/koordinat_edit/$1';
$route['patok/list']                = 'master/patok_list';
$route['patok/details/(:num)']      = 'master/patok_details/$1';
$route['patok/input/(:num)']        = 'master/patok_input/$1';

// TODO: OFFICE PELAYANAN
$route['pelayanan']                 = 'office/pelayanan_dashboard';
$route['data_penduduk']             = 'office/data_penduduk';
$route['public']                    = 'public_c';
$route['timeline']                  = 'office/timeline_list';
$route['timeline/details/(:num)']   = 'office/timeline_view/$1';

// TODO: Route Arsip
$route['arsip']                     = 'office/arsip_list';
$route['arsip/input']               = 'office/arsip_input';
$route['arsip/lihat/(:num)']        = 'office/arsip_view/$1';
$route['arsip/edit/(:num)']         = 'office/arsip_edit/$1';


// TODO: Disposisi
$route['disposisi']                 = 'office/disposisi_list';
$route['disposisi/input/(:any)']    = 'office/disposisi_input/$1';
$route['disposisi/teruskan/(:num)'] = 'office/disposisi_teruskan/$1';

// TODO: SMS SETTING
$route['debug']                     = 'master/debug';
$route['test_sms']                  = 'sms/notifikasi_cek';

// TODO: Route AUTH
$route['login']                     = 'auth/login';
$route['logout']                    = 'auth/logout';
$route['setting/akun']              = 'auth/setting';

// TODO: Route Layanan SKT
$route['permohonan']                = 'office/permohonan_list';
$route['permohonan/input/(:num)']   = 'office/permohonan_input/$1';
$route['permohonan/edit/(:num)']    = 'office/permohonan_edit/$1';
$route['permohonan/view/(:num)']    = 'office/permohonan_view/$1';

$route['berita_acara']                = 'office/berita_acara_list';
$route['berita_acara/input']          = 'office/berita_acara_input';
$route['berita_acara/edit/(:num)']    = 'office/berita_acara_edit/$1';
$route['berita_acara/view/(:num)']    = 'office/berita_acara_view/$1';

$route['pra_skt']                = 'office/pra_skt_list';
$route['pra_skt/input']          = 'office/pra_skt_input';
$route['pra_skt/edit/(:num)']    = 'office/pra_skt_edit/$1';
$route['pra_skt/view/(:num)']    = 'office/pra_skt_view/$1';

$route['skt_release']                = 'office/skt_release_list';
$route['skt_release/input']          = 'office/skt_release_input';
$route['skt_release/edit/(:num)']    = 'office/skt_release_edit/$1';
$route['skt_release/view/(:num)']    = 'office/skt_release_view/$1';

// TODO:
$route['print/pernyataan/(:num)']               = 'print/pernyataan/$1';
$route['print/berita_acara/(:num)']             = 'print/berita_acara/$1';
$route['print/pra_skt/(:num)']                  = 'print/pra_skt/$1';
$route['print/skt_release/(:num)']              = 'print/skt_release/$1';
$route['print/skt_lampiran/(:num)']             = 'print/skt_lampiran/$1';
