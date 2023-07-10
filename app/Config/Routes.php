<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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

$routes->post('/api/register', 'Register::index');
$routes->post('/api/login', 'Login::index');
$routes->post('/api/me/', 'Me::index', ['filter' => 'auth']);


$routes->group('api', ['filter' => 'cors'], function ($routes) {
    // notes
    $routes->get('list-note', 'NoteController::listNotes');
    $routes->get('note/(.*)', 'NoteController::getNoteById/$1', ['filter' => 'auth']);
    $routes->post('create-note', 'NoteController::createNote');
    $routes->post('update-note/(.*)', 'NoteController::updateNote/$1', ['filter' => 'auth']);
    $routes->post('delete-note/(.*)', 'NoteController::deleteNote/$1', ['filter' => 'auth']);
    // barang 
    $routes->get('barang', 'BarangController::listBarang');
    $routes->get('barang/(:num)', 'BarangController::getBarangById/$1');
    $routes->post('barang', 'BarangController::createBarang');
    $routes->post('update-barang/(:num)', 'BarangController::updateBarang/$1');
    $routes->post('delete-barang/(:num)', 'BarangController::deleteBarang/$1');
});




// tumpukan
$routes->get('/api/tumpukan', 'TumpukanController::listTumpukan', ['filter' => 'auth']);
$routes->post('/api/tumpukan', 'TumpukanController::createTumpukan', ['filter' => 'auth']);

// signatue
$routes->get('/api/signature', 'SignatureController::listSignature', ['filter' => 'auth']);
$routes->post('/api/signature', 'SignatureController::signatureNote', ['filter' => 'auth']);


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
