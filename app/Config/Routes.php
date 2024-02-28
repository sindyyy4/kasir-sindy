<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'User::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->post('/dashboard', 'Home::dashboard');
$routes->post('/login', 'User::login');

$routes->get('/daftar', 'Dasboard::registrasi');

$routes->get('/page-login', 'User::logout');


$routes->get('/data-pengguna', 'User::tampilPengguna');
$routes->get('/tambah-pengguna', 'User::tambahPengguna');
$routes->get('/hapus-pengguna/(:num)', 'User::hapusUser/$1');
$routes->get('/edit-pengguna/(:num)', 'User::editUser/$1');
$routes->post('/update-pengguna', 'User::updateUser');
$routes->post('/simpan-pengguna', 'User::simpanPengguna');

$routes->get('/data-produk', 'Produk::tampilProduk');
$routes->get('/tambah-produk', 'Produk::tambahProduk');
$routes->post('/simpan-produk', 'Produk::simpanProduk');
$routes->get('/hapus-produk/(:num)', 'Produk::hapusProduk/$1');
$routes->get('/edit-produk/(:num)', 'Produk::editProduk/$1');
$routes->post('/update-produk', 'Produk::updateProduk');

$routes->get('/data-kategori', 'Kategori::tampilKategori');
$routes->get('/tambah-kategori', 'Kategori::tambahKategori');
$routes->post('/simpan-kategori', 'Kategori::simpanKategori');
$routes->get('/hapus-kategori/(:num)', 'Kategori::hapusKategori/$1');
$routes->get('/edit-kategori/(:num)', 'Kategori::editKategori/$1');
$routes->post('/update-kategori', 'Kategori::simpanEditKategori');

$routes->get('/data-satuan', 'Satuan::tampilSatuan');
$routes->get('/tambah-satuan', 'Satuan::tambahSatuan');
$routes->post('/simpan-satuan', 'Satuan::simpanSatuan');
$routes->get('/hapus-satuan/(:num)', 'Satuan::hapusSatuan/$1');
$routes->get('/edit-satuan/(:num)', 'Satuan::editSatuan/$1');
$routes->post('/update-satuan', 'Satuan::simpanEditSatuan');

$routes->get('/form-penjualan','Penjualan::lihatPenjualan');
$routes->post('/form-penjualan','Penjualan::savePenjualan');
$routes->get('/form-bayar','Penjualan::simpanPembayaran');
$routes->post('/form-penjualan/savePembayaran','Penjualan::savePembayaran');
$routes->get('/hapus-barang/(:num)', 'Penjualan::hapus/$1');

$routes->get('/laporan', 'Laporan::tampilLaporan');
$routes->get('/pdf_view', 'PdfController::index');
$routes->get('/pdf/generate', 'PdfController::generate');