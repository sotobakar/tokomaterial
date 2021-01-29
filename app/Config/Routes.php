<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', '\Myth\Auth\Controllers\AuthController::login');


$routes->group('dashboard', ['filter' => 'login'], function ($routes) {
	$routes->get('/', 'Dashboard::index');
	$routes->get('profile', 'Profile::show');
	$routes->get('profile/create', 'Profile::create');
	$routes->post('profile/create', 'Profile::store');
	$routes->get('profile/edit', 'Profile::edit');
	$routes->post('profile/edit', 'Profile::update');
	$routes->get('barang', 'Barang::index');
	$routes->get('barang/create', 'Barang::create', ['filter' => 'role:admin']);
	$routes->post('barang/create', 'Barang::store', ['filter' => 'role:admin']);
	$routes->get('barang/edit/(:num)', 'Barang::edit/$1', ['filter' => 'role:admin']);
	$routes->post('barang/edit/(:num)', 'Barang::update/$1', ['filter' => 'role:admin']);
	$routes->get('barang/delete/(:num)', 'Barang::delete/$1', ['filter' => 'role:admin']);
	$routes->get('penjualan', 'Penjualan::index');
	$routes->post('penjualan/create', 'Penjualan::store', ['filter' => 'role:admin']);
	$routes->get('penjualan/create', 'Penjualan::create', ['filter' => 'role:admin']);
});


$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
});

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
