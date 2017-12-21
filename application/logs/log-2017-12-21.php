<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-12-21 12:31:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM desa as d, 
     users as kades, 
     users as sekdes, 
     users as p' at line 32 - Invalid query: SELECT d.id as id, d.nama_desa as nama_desa, d.alamat_desa as alamat_desa,
    kades.id as kades_id,
    kades.fullname as fullname_kades, 
    kades.keterangan_jabatan as kades_keterangan_jabatan,
    sekdes.fullname as fullname_sekdes,
    sekdes.id as sekdes_id,
    sekdes.keterangan_jabatan as sekdes_keterangan_jabatan,
    pemerintahan.keterangan_jabatan as pemerintahan_keterangan_jabatan,
    pembangunan.keterangan_jabatan as pembangunan_keterangan_jabatan,
    pemberdayaan.keterangan_jabatan as pemberdayaan_keterangan_jabatan,
    umum.keterangan_jabatan as umum_keterangan_jabatan,
    pelayanan.keterangan_jabatan as pelayanan_keterangan_jabatan,
    keuangan.keterangan_jabatan as keuangan_keterangan_jabatan,
    bendahara.keterangan_jabatan as bendahara_keterangan_jabatan,
    pertanahan.keterangan_jabatan as pertanahan_keterangan_jabatan,
    pertanahan.fullname as fullname_pertanahan,
    pertanahan.id as pertanahan_id,
    pemerintahan.fullname as fullname_pemerintahan,
    pemerintahan.id as pemerintahan_id,
    pembangunan.fullname as fullname_pembangunan,
    pembangunan.id as pembangunan_id,
    pemberdayaan.fullname as fullname_pemberdayaan,
    pemberdayaan.id as pemberdayaan_id,
    umum.fullname as fullname_umum,
    umum.id as umum_id,
    pelayanan.fullname as fullname_pelayanan,
    pelayanan.id as pelayanan_id,
    keuangan.fullname as fullname_keuangan,
    keuangan.id as keuangan_id,
    bendahara.fullname as fullname_bendahara,
    bendahara.id as bendahara_id,
     FROM desa as d, 
     users as kades, 
     users as sekdes, 
     users as pertanahan,
     users as pemerintahan,
     users as pembangunan,
     users as pemberdayaan,
     users as umum,
     users as pelayanan,
     users as keuangan,
     users as bendahara
     WHERE 
     d.uid = kades.id AND
     d.pertanahan_uid = pertanahan.id AND 
     d.kasi_pemerintahan = pemerintahan.id AND 
     d.kasi_pembangunan = pembangunan.id AND 
     d.kasi_pemberdayaan = pemberdayaan.id AND
     d.kaur_umum = umum.id AND
     d.kaur_pelayanan = pelayanan.id AND
     d.kaur_keuangan = keuangan.id AND 
     d.bendahara = bendahara.id AND
     d.sekdes_uid = sekdes.id AND d.id = 1
ERROR - 2017-12-21 12:31:23 --> Severity: error --> Exception: Call to a member function row_array() on boolean C:\wampp\apache2\htdocs\SIA-GTG.github\application\controllers\Master.php 186
ERROR - 2017-12-21 12:31:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM desa as d, 
     users as kades, 
     users as sekdes, 
     users as p' at line 32 - Invalid query: SELECT d.id as id, d.nama_desa as nama_desa, d.alamat_desa as alamat_desa,
    kades.id as kades_id,
    kades.fullname as fullname_kades, 
    kades.keterangan_jabatan as kades_keterangan_jabatan,
    sekdes.fullname as fullname_sekdes,
    sekdes.id as sekdes_id,
    sekdes.keterangan_jabatan as sekdes_keterangan_jabatan,
    pemerintahan.keterangan_jabatan as pemerintahan_keterangan_jabatan,
    pembangunan.keterangan_jabatan as pembangunan_keterangan_jabatan,
    pemberdayaan.keterangan_jabatan as pemberdayaan_keterangan_jabatan,
    umum.keterangan_jabatan as umum_keterangan_jabatan,
    pelayanan.keterangan_jabatan as pelayanan_keterangan_jabatan,
    keuangan.keterangan_jabatan as keuangan_keterangan_jabatan,
    bendahara.keterangan_jabatan as bendahara_keterangan_jabatan,
    pertanahan.keterangan_jabatan as pertanahan_keterangan_jabatan,
    pertanahan.fullname as fullname_pertanahan,
    pertanahan.id as pertanahan_id,
    pemerintahan.fullname as fullname_pemerintahan,
    pemerintahan.id as pemerintahan_id,
    pembangunan.fullname as fullname_pembangunan,
    pembangunan.id as pembangunan_id,
    pemberdayaan.fullname as fullname_pemberdayaan,
    pemberdayaan.id as pemberdayaan_id,
    umum.fullname as fullname_umum,
    umum.id as umum_id,
    pelayanan.fullname as fullname_pelayanan,
    pelayanan.id as pelayanan_id,
    keuangan.fullname as fullname_keuangan,
    keuangan.id as keuangan_id,
    bendahara.fullname as fullname_bendahara,
    bendahara.id as bendahara_id,
     FROM desa as d, 
     users as kades, 
     users as sekdes, 
     users as pertanahan,
     users as pemerintahan,
     users as pembangunan,
     users as pemberdayaan,
     users as umum,
     users as pelayanan,
     users as keuangan,
     users as bendahara
     WHERE 
     d.uid = kades.id AND
     d.pertanahan_uid = pertanahan.id AND 
     d.kasi_pemerintahan = pemerintahan.id AND 
     d.kasi_pembangunan = pembangunan.id AND 
     d.kasi_pemberdayaan = pemberdayaan.id AND
     d.kaur_umum = umum.id AND
     d.kaur_pelayanan = pelayanan.id AND
     d.kaur_keuangan = keuangan.id AND 
     d.bendahara = bendahara.id AND
     d.sekdes_uid = sekdes.id AND d.id = 1
ERROR - 2017-12-21 12:31:26 --> Severity: error --> Exception: Call to a member function row_array() on boolean C:\wampp\apache2\htdocs\SIA-GTG.github\application\controllers\Master.php 186
ERROR - 2017-12-21 12:31:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM desa as d, 
     users as kades, 
     users as sekdes, 
     users as p' at line 32 - Invalid query: SELECT d.id as id, d.nama_desa as nama_desa, d.alamat_desa as alamat_desa,
    kades.id as kades_id,
    kades.fullname as fullname_kades, 
    kades.keterangan_jabatan as kades_keterangan_jabatan,
    sekdes.fullname as fullname_sekdes,
    sekdes.id as sekdes_id,
    sekdes.keterangan_jabatan as sekdes_keterangan_jabatan,
    pemerintahan.keterangan_jabatan as pemerintahan_keterangan_jabatan,
    pembangunan.keterangan_jabatan as pembangunan_keterangan_jabatan,
    pemberdayaan.keterangan_jabatan as pemberdayaan_keterangan_jabatan,
    umum.keterangan_jabatan as umum_keterangan_jabatan,
    pelayanan.keterangan_jabatan as pelayanan_keterangan_jabatan,
    keuangan.keterangan_jabatan as keuangan_keterangan_jabatan,
    bendahara.keterangan_jabatan as bendahara_keterangan_jabatan,
    pertanahan.keterangan_jabatan as pertanahan_keterangan_jabatan,
    pertanahan.fullname as fullname_pertanahan,
    pertanahan.id as pertanahan_id,
    pemerintahan.fullname as fullname_pemerintahan,
    pemerintahan.id as pemerintahan_id,
    pembangunan.fullname as fullname_pembangunan,
    pembangunan.id as pembangunan_id,
    pemberdayaan.fullname as fullname_pemberdayaan,
    pemberdayaan.id as pemberdayaan_id,
    umum.fullname as fullname_umum,
    umum.id as umum_id,
    pelayanan.fullname as fullname_pelayanan,
    pelayanan.id as pelayanan_id,
    keuangan.fullname as fullname_keuangan,
    keuangan.id as keuangan_id,
    bendahara.fullname as fullname_bendahara,
    bendahara.id as bendahara_id,
     FROM desa as d, 
     users as kades, 
     users as sekdes, 
     users as pertanahan,
     users as pemerintahan,
     users as pembangunan,
     users as pemberdayaan,
     users as umum,
     users as pelayanan,
     users as keuangan,
     users as bendahara
     WHERE 
     d.uid = kades.id AND
     d.pertanahan_uid = pertanahan.id AND 
     d.kasi_pemerintahan = pemerintahan.id AND 
     d.kasi_pembangunan = pembangunan.id AND 
     d.kasi_pemberdayaan = pemberdayaan.id AND
     d.kaur_umum = umum.id AND
     d.kaur_pelayanan = pelayanan.id AND
     d.kaur_keuangan = keuangan.id AND 
     d.bendahara = bendahara.id AND
     d.sekdes_uid = sekdes.id AND d.id = 1
ERROR - 2017-12-21 12:31:29 --> Severity: error --> Exception: Call to a member function row_array() on boolean C:\wampp\apache2\htdocs\SIA-GTG.github\application\controllers\Master.php 186
ERROR - 2017-12-21 14:37:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'WHERE 
     d.uid = kades.id AND
     d.ketua_bpd = bpd.id AND
     d.pertana' at line 60 - Invalid query: SELECT 
    d.id as id, d.nama_desa as nama_desa, d.alamat_desa as alamat_desa,

    kades.id as kades_id,
    kades.fullname as fullname_kades, 
    kades.keterangan_jabatan as kades_keterangan_jabatan,

    sekdes.fullname as fullname_sekdes,
    sekdes.id as sekdes_id,
    sekdes.keterangan_jabatan as sekdes_keterangan_jabatan,

    pertanahan.keterangan_jabatan as pertanahan_keterangan_jabatan,
    pertanahan.fullname as fullname_pertanahan,
    pertanahan.id as pertanahan_id,

    pemerintahan.fullname as fullname_pemerintahan,
    pemerintahan.id as pemerintahan_id,
    pemerintahan.keterangan_jabatan as pemerintahan_keterangan_jabatan,

    pembangunan.fullname as fullname_pembangunan,
    pembangunan.keterangan_jabatan as pembangunan_keterangan_jabatan,
    pembangunan.id as pembangunan_id,

    pemberdayaan.fullname as fullname_pemberdayaan,
    pemberdayaan.id as pemberdayaan_id,
    pemberdayaan.keterangan_jabatan as pemberdayaan_keterangan_jabatan,

    umum.fullname as fullname_umum,
    umum.id as umum_id,
    umum.keterangan_jabatan as umum_keterangan_jabatan,

    pelayanan.fullname as fullname_pelayanan,
    pelayanan.id as pelayanan_id,
    pelayanan.keterangan_jabatan as pelayanan_keterangan_jabatan,

    keuangan.fullname as fullname_keuangan,
    keuangan.id as keuangan_id,
    keuangan.keterangan_jabatan as keuangan_keterangan_jabatan,

    bendahara.fullname as fullname_bendahara,
    bendahara.id as bendahara_id,
    bendahara.keterangan_jabatan as bendahara_keterangan_jabatan,

    bpd.fullname as fullname_bpd,
    bpd.id as bpd_id,
    bpd.keterangan_jabatan as bpd_keterangan_jabatan

     FROM desa as d, 
     users as kades, 
     users as sekdes, 
     users as pertanahan,
     users as pemerintahan,
     users as pembangunan,
     users as pemberdayaan,
     users as umum,
     users as pelayanan,
     users as keuangan,
     users as bendahara,
     users as bpd,
     WHERE 
     d.uid = kades.id AND
     d.ketua_bpd = bpd.id AND
     d.pertanahan_uid = pertanahan.id AND 
     d.kasi_pemerintahan = pemerintahan.id AND 
     d.kasi_pembangunan = pembangunan.id AND 
     d.kasi_pemberdayaan = pemberdayaan.id AND
     d.kaur_umum = umum.id AND
     d.kaur_pelayanan = pelayanan.id AND
     d.kaur_keuangan = keuangan.id AND 
     d.bendahara = bendahara.id AND
     d.sekdes_uid = sekdes.id AND d.id = 1
ERROR - 2017-12-21 14:37:31 --> Severity: error --> Exception: Call to a member function row_array() on boolean C:\wampp\apache2\htdocs\SIA-GTG.github\application\controllers\Master.php 186
ERROR - 2017-12-21 14:46:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'WHERE 
     d.uid = kades.id AND
     d.ketua_bpd = bpd.id AND
     d.pertana' at line 60 - Invalid query: SELECT 
    d.id as id, d.nama_desa as nama_desa, d.alamat_desa as alamat_desa,

    kades.id as kades_id,
    kades.fullname as fullname_kades, 
    kades.keterangan_jabatan as kades_keterangan_jabatan,

    sekdes.fullname as fullname_sekdes,
    sekdes.id as sekdes_id,
    sekdes.keterangan_jabatan as sekdes_keterangan_jabatan,

    pertanahan.keterangan_jabatan as pertanahan_keterangan_jabatan,
    pertanahan.fullname as fullname_pertanahan,
    pertanahan.id as pertanahan_id,

    pemerintahan.fullname as fullname_pemerintahan,
    pemerintahan.id as pemerintahan_id,
    pemerintahan.keterangan_jabatan as pemerintahan_keterangan_jabatan,

    pembangunan.fullname as fullname_pembangunan,
    pembangunan.keterangan_jabatan as pembangunan_keterangan_jabatan,
    pembangunan.id as pembangunan_id,

    pemberdayaan.fullname as fullname_pemberdayaan,
    pemberdayaan.id as pemberdayaan_id,
    pemberdayaan.keterangan_jabatan as pemberdayaan_keterangan_jabatan,

    umum.fullname as fullname_umum,
    umum.id as umum_id,
    umum.keterangan_jabatan as umum_keterangan_jabatan,

    pelayanan.fullname as fullname_pelayanan,
    pelayanan.id as pelayanan_id,
    pelayanan.keterangan_jabatan as pelayanan_keterangan_jabatan,

    keuangan.fullname as fullname_keuangan,
    keuangan.id as keuangan_id,
    keuangan.keterangan_jabatan as keuangan_keterangan_jabatan,

    bendahara.fullname as fullname_bendahara,
    bendahara.id as bendahara_id,
    bendahara.keterangan_jabatan as bendahara_keterangan_jabatan,

    bpd.fullname as fullname_bpd,
    bpd.id as bpd_id,
    bpd.keterangan_jabatan as bpd_keterangan_jabatan

     FROM desa as d, 
     users as kades, 
     users as sekdes, 
     users as pertanahan,
     users as pemerintahan,
     users as pembangunan,
     users as pemberdayaan,
     users as umum,
     users as pelayanan,
     users as keuangan,
     users as bendahara,
     users as bpd,
     WHERE 
     d.uid = kades.id AND
     d.ketua_bpd = bpd.id AND
     d.pertanahan_uid = pertanahan.id AND 
     d.kasi_pemerintahan = pemerintahan.id AND 
     d.kasi_pembangunan = pembangunan.id AND 
     d.kasi_pemberdayaan = pemberdayaan.id AND
     d.kaur_umum = umum.id AND
     d.kaur_pelayanan = pelayanan.id AND
     d.kaur_keuangan = keuangan.id AND 
     d.bendahara = bendahara.id AND
     d.sekdes_uid = sekdes.id AND d.id = 1
ERROR - 2017-12-21 14:46:43 --> Severity: error --> Exception: Call to a member function row_array() on boolean C:\wampp\apache2\htdocs\SIA-GTG.github\application\controllers\Master.php 186
ERROR - 2017-12-21 14:55:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'WHERE 
     d.uid = kades.id AND
     d.ketua_bpd = bpd.id AND
     d.pertana' at line 60 - Invalid query: SELECT 
    d.id as id, d.nama_desa as nama_desa, d.alamat_desa as alamat_desa,

    kades.id as kades_id,
    kades.fullname as fullname_kades, 
    kades.keterangan_jabatan as kades_keterangan_jabatan,

    sekdes.fullname as fullname_sekdes,
    sekdes.id as sekdes_id,
    sekdes.keterangan_jabatan as sekdes_keterangan_jabatan,

    pertanahan.keterangan_jabatan as pertanahan_keterangan_jabatan,
    pertanahan.fullname as fullname_pertanahan,
    pertanahan.id as pertanahan_id,

    pemerintahan.fullname as fullname_pemerintahan,
    pemerintahan.id as pemerintahan_id,
    pemerintahan.keterangan_jabatan as pemerintahan_keterangan_jabatan,

    pembangunan.fullname as fullname_pembangunan,
    pembangunan.keterangan_jabatan as pembangunan_keterangan_jabatan,
    pembangunan.id as pembangunan_id,

    pemberdayaan.fullname as fullname_pemberdayaan,
    pemberdayaan.id as pemberdayaan_id,
    pemberdayaan.keterangan_jabatan as pemberdayaan_keterangan_jabatan,

    umum.fullname as fullname_umum,
    umum.id as umum_id,
    umum.keterangan_jabatan as umum_keterangan_jabatan,

    pelayanan.fullname as fullname_pelayanan,
    pelayanan.id as pelayanan_id,
    pelayanan.keterangan_jabatan as pelayanan_keterangan_jabatan,

    keuangan.fullname as fullname_keuangan,
    keuangan.id as keuangan_id,
    keuangan.keterangan_jabatan as keuangan_keterangan_jabatan,

    bendahara.fullname as fullname_bendahara,
    bendahara.id as bendahara_id,
    bendahara.keterangan_jabatan as bendahara_keterangan_jabatan,

    bpd.fullname as fullname_bpd,
    bpd.id as bpd_id,
    bpd.keterangan_jabatan as bpd_keterangan_jabatan

     FROM desa as d, 
     users as kades, 
     users as sekdes, 
     users as pertanahan,
     users as pemerintahan,
     users as pembangunan,
     users as pemberdayaan,
     users as umum,
     users as pelayanan,
     users as keuangan,
     users as bendahara,
     users as bpd,
     WHERE 
     d.uid = kades.id AND
     d.ketua_bpd = bpd.id AND
     d.pertanahan_uid = pertanahan.id AND 
     d.kasi_pemerintahan = pemerintahan.id AND 
     d.kasi_pembangunan = pembangunan.id AND 
     d.kasi_pemberdayaan = pemberdayaan.id AND
     d.kaur_umum = umum.id AND
     d.kaur_pelayanan = pelayanan.id AND
     d.kaur_keuangan = keuangan.id AND 
     d.bendahara = bendahara.id AND
     d.sekdes_uid = sekdes.id AND d.id = 1
ERROR - 2017-12-21 14:55:39 --> Severity: error --> Exception: Call to a member function row_array() on boolean C:\wampp\apache2\htdocs\SIA-GTG.github\application\controllers\Master.php 186
ERROR - 2017-12-21 14:55:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'WHERE 
     d.uid = kades.id AND
     d.ketua_bpd = bpd.id AND
     d.pertana' at line 60 - Invalid query: SELECT 
    d.id as id, d.nama_desa as nama_desa, d.alamat_desa as alamat_desa,

    kades.id as kades_id,
    kades.fullname as fullname_kades, 
    kades.keterangan_jabatan as kades_keterangan_jabatan,

    sekdes.fullname as fullname_sekdes,
    sekdes.id as sekdes_id,
    sekdes.keterangan_jabatan as sekdes_keterangan_jabatan,

    pertanahan.keterangan_jabatan as pertanahan_keterangan_jabatan,
    pertanahan.fullname as fullname_pertanahan,
    pertanahan.id as pertanahan_id,

    pemerintahan.fullname as fullname_pemerintahan,
    pemerintahan.id as pemerintahan_id,
    pemerintahan.keterangan_jabatan as pemerintahan_keterangan_jabatan,

    pembangunan.fullname as fullname_pembangunan,
    pembangunan.keterangan_jabatan as pembangunan_keterangan_jabatan,
    pembangunan.id as pembangunan_id,

    pemberdayaan.fullname as fullname_pemberdayaan,
    pemberdayaan.id as pemberdayaan_id,
    pemberdayaan.keterangan_jabatan as pemberdayaan_keterangan_jabatan,

    umum.fullname as fullname_umum,
    umum.id as umum_id,
    umum.keterangan_jabatan as umum_keterangan_jabatan,

    pelayanan.fullname as fullname_pelayanan,
    pelayanan.id as pelayanan_id,
    pelayanan.keterangan_jabatan as pelayanan_keterangan_jabatan,

    keuangan.fullname as fullname_keuangan,
    keuangan.id as keuangan_id,
    keuangan.keterangan_jabatan as keuangan_keterangan_jabatan,

    bendahara.fullname as fullname_bendahara,
    bendahara.id as bendahara_id,
    bendahara.keterangan_jabatan as bendahara_keterangan_jabatan,

    bpd.fullname as fullname_bpd,
    bpd.id as bpd_id,
    bpd.keterangan_jabatan as bpd_keterangan_jabatan

     FROM desa as d, 
     users as kades, 
     users as sekdes, 
     users as pertanahan,
     users as pemerintahan,
     users as pembangunan,
     users as pemberdayaan,
     users as umum,
     users as pelayanan,
     users as keuangan,
     users as bendahara,
     users as bpd,
     WHERE 
     d.uid = kades.id AND
     d.ketua_bpd = bpd.id AND
     d.pertanahan_uid = pertanahan.id AND 
     d.kasi_pemerintahan = pemerintahan.id AND 
     d.kasi_pembangunan = pembangunan.id AND 
     d.kasi_pemberdayaan = pemberdayaan.id AND
     d.kaur_umum = umum.id AND
     d.kaur_pelayanan = pelayanan.id AND
     d.kaur_keuangan = keuangan.id AND 
     d.bendahara = bendahara.id AND
     d.sekdes_uid = sekdes.id AND d.id = 1
ERROR - 2017-12-21 14:55:47 --> Severity: error --> Exception: Call to a member function row_array() on boolean C:\wampp\apache2\htdocs\SIA-GTG.github\application\controllers\Master.php 186
