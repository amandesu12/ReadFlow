<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'home::index');
$routes->get('bookmark', 'Bookmark::index', ['filter' => 'auth']);
$routes->post('bookmark/tambah/(:num)', 'Bookmark::tambah/$1', ['filter' => 'auth']);

$routes->get('/about', 'home::about');
$routes->get('/developer', 'home::developer');


$routes->get('/login', 'Auth::login');
$routes->post('/login-post', 'Auth::loginPost');
$routes->get('/register', 'Auth::register');
$routes->post('/register-post', 'Auth::registerPost');
$routes->get('/logout', 'Auth::logout');

$routes->get('/upload', 'Tugas::upload', ['filter' => 'auth']);
$routes->post('/upload', 'Tugas::uploadPost', ['filter' => 'auth']);

$routes->get('galeri', 'Galeri::index');
$routes->get('tugas/(:num)', 'Galeri::detail/$1');

$routes->get('galeri/cari', 'Galeri::cari');

$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1', ['filter' => 'auth']);
$routes->post('/tugas/update/(:num)', 'Tugas::update/$1', ['filter' => 'auth']);
$routes->get('/tugas/delete/(:num)', 'Tugas::delete/$1', ['filter' => 'auth']);

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->post('bookmark/tambah/(:num)', 'Bookmark::tambah/$1', ['filter' => 'auth']);
$routes->get('bookmark', 'Bookmark::index', ['filter' => 'auth']);
$routes->post('bookmark/hapus/(:num)', 'Bookmark::hapus/$1', ['filter' => 'auth']);

$routes->get('profil', 'Profil::index', ['filter' => 'auth']);
$routes->post('profil/update', 'Profil::update', ['filter' => 'auth']);
$routes->get('/profil/edit', 'Profil::edit');   // Halaman edit profil

$routes->get('search', 'Galeri::search');
$routes->get('galeri/cari', 'Galeri::cari');


