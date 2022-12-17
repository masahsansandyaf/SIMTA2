<?php

namespace Config;

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
//route CRUD Dosen
$routes->get('/', 'Home::index');

$routes->get('/dosen', 'DosenController::index');
// $routes->get('/dosen/add', 'DosenController::create');
$routes->post('/dosen', 'DosenController::create');
// $routes->add('/dosen', 'DosenController::create');
$routes->add('/dosen/edit/(:segment)', 'DosenController::edit/$1');
$routes->resource('dosen');

//route API
$routes->get('/', 'Home::index');
$routes->get('/API/dosen', 'DosenAPIController::index');
$routes->post('/API/dosen', 'DosenAPIController::create');
$routes->put('/API/dosen/(:segment)', 'DosenAPIController::update/$1');
$routes->get('/API/dosen/(:segment)', 'DosenAPIController::show/$1');
$routes->resource('dosen');

//ROute CRUD Mahasiswa
$routes->get('/', 'Home::index');
$routes->get ('/mahasiswa', 'MahasiswaController::index');
$routes->add('/mahasiswa', 'MahasiswaController::create');
$routes->add('/mahasiswa/edit/(:segment)', 'MahasiswaController::edit/$1');

//ROute CRUD Revisi
$routes->get('/', 'Home::index');
$routes->get ('/revision', 'RevisiController::index');
$routes->post('/revision', 'RevisiController::create');
$routes->add('/revision/edit/(:segment)', 'MahasiswaController::edit/$1');
$routes->resource('revision');

//Route API Revision
$routes->get('/', 'Home::index');
$routes->get ('/API/revision', 'RevisionController::index');
$routes->post('/API/revision', 'RevisionController::create');
$routes->put('/API/revision/(:segment)', 'RevisionController::update/$1');
$routes->delete('/API/revision/(:segment)', 'RevisionController::delete/$1');
$routes->get('/API/revision/(:segment)', 'RevisionController::show/$1');

// $routes->group('', ['filter' => 'login'], function($routes){
//     $routes->get('dashboard', 'Home::dashboard');
//     $routes->get('contact', 'ContactController::index');
//     $routes->add('contact', 'ContactController::create');
//     $routes->add('contact/edit/(:segment)', 'ContactController::edit/$1');
// });

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
