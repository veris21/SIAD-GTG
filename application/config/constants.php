<?php
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
define('TITLE',            "Si Desa | ");
define('SCHEMA',            ( @$_SERVER["HTTPS"] == "on" ) ? "https://" : "http://");
define('BASE_URL',          SCHEMA . $_SERVER["SERVER_NAME"] . '/SIA-GTG.github/');
define('ROOTPATH',          rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/');

define('APPS',            BASE_URL . 'assets/apps/');
define('THEME',           BASE_URL . 'assets/theme/');
define('UPLOADER',        BASE_URL . 'assets/uploader/');
define('KTP',             UPLOADER . 'ktp/');
define('PATOK',           UPLOADER . 'patok/');
define('SCAN_ARSIP',      UPLOADER . 'arsip/');
define('QRCODE',          UPLOADER . 'qr_code/');

define('PRINT',           'print/');
define('MASTER',          'master/');
define('MAPS',            'peta/');

define('UMUM',            'public/');
define('ARSIP',           'arsip_layout/');
define('DISPOSISI',       'disposisi_layout/');
define('PERTANAHAN',      'pertanahan_layout/');
define('PENDUDUK',        'penduduk_layout/');


/*-------------------------------*/
/*|
  |This Code Wrote By
  |=================================
  |@author : By Veris Juniardi
  |Provided For Desa Gantung
  |Email : Veris.juniardi@gmail.com
  |=================================
  |*/
/*----------------------------------*/
