<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('bookmark', 'Home::bookmark');
$routes->get('forum', 'Home::forum');
$routes->get('kategori', 'Home::kategori');
$routes->get('about', 'Home::about');
$routes->get('contact', 'Home::contact');
$routes->get('login', 'Home::login');
