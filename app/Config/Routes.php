<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Login::index');
$routes->post('/login', 'Login::auth');
$routes->get('/logout', 'Login::logout');


$routes->get('/Dashboard', 'Pages::index');


$routes->get('/Profile', 'Profile::profile');
$routes->get('/Profile/save', 'Profile::save');
$routes->get('/Profile/edit', 'Profile::edit');


$routes->get('/Pendapatan', 'Pendapatan::pendapatan');
$routes->get('/Pendapatan/save', 'Pendapatan::save');
$routes->get('/Pendapatan/delete', 'Pendapatan::delete');
$routes->get('/Pendapatan/edit', 'Pendapatan::edit');


$routes->get('/Pengeluaran', 'Pengeluaran::pengeluaran');
$routes->get('/Pengeluaran/save', 'Pengeluaran::save');
$routes->get('/Pengeluaran/delete', 'Pengeluaran::delete');
$routes->get('/Pengeluaran/edit', 'Pengeluaran::edit');


$routes->get('/Karyawan', 'Karyawan::karyawan');
$routes->get('/Karyawan/save', 'Karyawan::save');
$routes->get('/Karyawan/delete', 'Karyawan::delete');
$routes->get('/Karyawan/edit', 'Karyawan::edit');

$routes->get('/Laporan', 'Laporan::laporan');
$routes->get('/exportPendapatan', 'Cetak::index');
$routes->get('/exportPengeluaran', 'Cetak::keluar');

// $routes->get('/[namafile]', '[namafolder]\[namacontrollers]::[namamethod]');
// $routes->get('/Users', 'Admin\Users::index');