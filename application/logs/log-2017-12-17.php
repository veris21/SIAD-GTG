<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-12-17 23:50:20 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT *
FROM `users`
JOIN `jabatan` ON `jabatan`.`id`=`users`.`jabatan_id`
JOIN `desa` ON `desa`.`id`=`users`.`desa_id`
WHERE `id` = ''
ERROR - 2017-12-17 23:51:26 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT *
FROM `users`
JOIN `jabatan` ON `jabatan`.`id`=`users`.`jabatan_id`
JOIN `desa` ON `desa`.`id`=`users`.`desa_id`
WHERE `id` = ''
ERROR - 2017-12-17 23:54:38 --> Severity: Notice --> Undefined property: Pertanahan::$auth_model C:\wampp\apache2\htdocs\SIA-GTG.github\application\controllers\Pertanahan.php 290
ERROR - 2017-12-17 23:54:38 --> Severity: error --> Exception: Call to a member function get_user_id() on null C:\wampp\apache2\htdocs\SIA-GTG.github\application\controllers\Pertanahan.php 290
ERROR - 2017-12-17 23:55:46 --> Query error: Column 'pemeriksa_1' cannot be null - Invalid query: INSERT INTO `berita_acara_pertanahan` (`permohonan_id`, `pernyataan_id`, `pemeriksa_1`, `pemeriksa_2`, `pemeriksa_3`, `pemeriksa_4`, `pemeriksa_5`, `time_input`, `status_bap`) VALUES ('', '', NULL, '', '', '', '', 1513529746, 0)
