<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('login',['filter' => 'ceklogin'], function(RouteCollection $routes){
    $routes->get('lupa', 'KaryawanController::viewLupaPassword');
    $routes->get('/', 'KaryawanController::viewLogin');
    $routes->post('/', 'KaryawanController::Login');
    $routes->patch('/', 'KaryawanController::LupaPassword');
});
$routes->delete('login', 'KaryawanController::Logout');

$routes->group('karyawan',['filter' => 'auth'], function(RouteCollection $routes){
    $routes->get('/', 'KaryawanController::index');
    $routes->post('/', 'KaryawanController::store');
    $routes->patch('/', 'KaryawanController::update');
    $routes->delete('/', 'KaryawanController::delete');
    $routes->get('(:num)', 'KaryawanController::show/$1');
    $routes->get('all', 'KaryawanController::all');
});

$routes->group('pelanggan', function(RouteCollection $routes){
    $routes->get('/', 'PelangganController::index');
    $routes->post('/', 'PelangganController::store');
    $routes->patch('/', 'PelangganController::update');
    $routes->delete('/', 'PelangganController::delete');
    $routes->get('(:num)', 'PelangganController::show/$1');
    $routes->get('all', 'PelangganController::all');
});

$routes->group('jeniskendaraan', function(RouteCollection $routes){
    $routes->get('/', 'JenisKendaraanController::index');
    $routes->post('/', 'JenisKendaraanController::store');
    $routes->patch('/', 'JenisKendaraanController::update');
    $routes->delete('/', 'JenisKendaraanController::delete');
    $routes->get('(:num)', 'JenisKendaraanController::show/$1');
    $routes->get('all', 'JenisKendaraanController::all');
});

$routes->group('warnakendaraan', function(RouteCollection $routes){
    $routes->get('/', 'WarnaKendaraanController::index');
    $routes->post('/', 'WarnaKendaraanController::store');
    $routes->patch('/', 'WarnaKendaraanController::update');
    $routes->delete('/', 'WarnaKendaraanController::delete');
    $routes->get('(:num)', 'WarnaKendaraanController::show/$1');
    $routes->get('all', 'WarnaKendaraanController::all');
});

$routes->group('statuspemeriksaan', function(RouteCollection $routes){
    $routes->get('/', 'StatuspemeriksaanController::index');
    $routes->post('/', 'StatuspemeriksaanController::store');
    $routes->patch('/', 'StatuspemeriksaanController::update');
    $routes->delete('/', 'StatuspemeriksaanController::delete');
    $routes->get('(:num)', 'StatuspemeriksaanController::show/$1');
    $routes->get('all', 'StatuspemeriksaanController::all');
});

$routes->group('kendaraan', function(RouteCollection $routes){
    $routes->get('/', 'KendaraanController::index');
    $routes->post('/', 'KendaraanController::store');
    $routes->patch('/', 'KendaraanController::update');
    $routes->delete('/', 'KendaraanController::delete');
    $routes->get('(:num)', 'KendaraanController::show/$1');
    $routes->get('all', 'KendaraanController::all');
});

$routes->group('karyawan', function(RouteCollection $routes){
    $routes->get('/', 'KaryawanController::index');
    $routes->post('/', 'KaryawanController::store');
    $routes->patch('/', 'KaryawanController::update');
    $routes->delete('/', 'KaryawanController::delete');
    $routes->get('(:num)/berkas.png', 'KaryawanController::berkas/$1');
    $routes->get('(:num)', 'KaryawanController::show/$1');
    $routes->get('all', 'KaryawanController::all');
});

$routes->group('pemeriksaan', function(RouteCollection $routes){
    $routes->get('/', 'PemeriksaanController::index');
    $routes->post('/', 'PemeriksaanController::store');
    $routes->patch('/', 'PemeriksaanController::update');
    $routes->delete('/', 'PemeriksaanController::delete');
    $routes->get('(:num)', 'PemeriksaanController::show/$1');
    $routes->get('all', 'PemeriksaanController::all');
});

$routes->group('metodebayar', function(RouteCollection $routes){
    $routes->get('/', 'metodebayarController::index');
    $routes->post('/', 'metodebayarController::store');
    $routes->patch('/', 'metodebayarController::update');
    $routes->delete('/', 'metodebayarController::delete');
    $routes->get('(:num)', 'metodebayarController::show/$1');
    $routes->get('all', 'metodebayarController::all');
});

$routes->group('unitsatuan', function(RouteCollection $routes){
    $routes->get('/', 'unitsatuanController::index');
    $routes->post('/', 'unitsatuanController::store');
    $routes->patch('/', 'unitsatuanController::update');
    $routes->delete('/', 'unitsatuanController::delete');
    $routes->get('(:num)', 'unitsatuanController::show/$1');
    $routes->get('all', 'unitsatuanController::all');
});

$routes->group('barangjasa', function(RouteCollection $routes){
    $routes->get('/', 'BarangjasaController::index');
    $routes->post('/', 'BarangjasaController::store');
    $routes->patch('/', 'BarangjasaController::update');
    $routes->delete('/', 'BarangjasaController::delete');
    $routes->get('(:num)', 'BarangjasaController::show/$1');
    $routes->get('all', 'BarangjasaController::all');
});

$routes->group('barangjasapemeriksaan', function(RouteCollection $routes){
    $routes->get('/', 'BarangjasapemeriksaanController::index');
    $routes->post('/', 'BarangjasapemeriksaanController::store');
    $routes->patch('/', 'BarangjasapemeriksaanController::update');
    $routes->delete('/', 'BarangjasapemeriksaanController::delete');
    $routes->get('(:num)', 'BarangjasapemeriksaanController::show/$1');
    $routes->get('all', 'BarangjasapemeriksaanController::all');
});

$routes->group('pembayaran', function(RouteCollection $routes){
    $routes->get('/', 'PembayaranController::index');
    $routes->post('/', 'PembayaranController::store');
    $routes->patch('/', 'PembayaranController::update');
    $routes->delete('/', 'PembayaranController::delete');
    $routes->get('(:num)', 'PembayaranController::show/$1');
    $routes->get('all', 'PembayaranController::all');
});

$routes->group('dashboard', function(RouteCollection $routes){
    $routes->get('/', 'DashboardController::index');
    $routes->post('/', 'DashboardController::store');
    $routes->patch('/', 'DashboardController::update');
    $routes->delete('/', 'DashboardController::delete');
    $routes->get('(:num)', 'DashboardController::show/$1');
    $routes->get('all', 'DashboardController::all');
});
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
