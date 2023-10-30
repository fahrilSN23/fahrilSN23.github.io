<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);

$routes->get('create-db', function() {
    $forge = \Config\Database::forge();

    if ($forge->createDatabase('blogku')) {
        echo 'Database created!';
    }
});

$routes->get('login', 'Auth::login');

$routes->addRedirect('/', 'beranda');

// Logo Web
$routes->get('logo_web', 'Logo::index');
$routes->put('logo/(:num)', 'Logo::update/$1');

// Identitas Website
$routes->get('identitas_web', 'Identitas::index');
$routes->put('identitas_web/(:num)', 'Identitas::update/$1');

// Halaman Baru
$routes->get('halaman_baru', 'Halaman::index');
$routes->get('halaman_baru/add', 'Halaman::create');
$routes->post('halaman_baru', 'Halaman::save');
$routes->get('halaman_baru/edit/(:num)', 'Halaman::edit/$1');
$routes->put('halaman_baru/(:num)', 'Halaman::update/$1');
$routes->get('halaman_baru/hapus/(:num)', 'Halaman::delete/$1');

// Menu Web
$routes->get('menu_web', 'Menu::index');
$routes->post('menu_web', 'Menu::save');
$routes->get('menu_web/(:num)', 'Menu::index/$1');
$routes->put('menu_web/(:num)', 'Menu::update/$1');
$routes->get('menu_web/aktif/(:num)', 'Menu::status/$1');
$routes->get('menu_web/hapus/(:num)', 'Menu::delete/$1');

// Kategori Artikel
$routes->get('kategori', 'Kategori::index');
$routes->get('kategori/add', 'Kategori::create');
$routes->post('kategori', 'Kategori::save');
$routes->get('kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->put('kategori/(:num)', 'Kategori::update/$1');
$routes->get('kategori/hapus/(:segment)', 'Kategori::destroy/$1');

// Artikel
$routes->get('artikel', 'Artikel::index');
$routes->get('artikel/add', 'Artikel::create');
$routes->post('artikel', 'Artikel::save');
$routes->get('artikel/edit/(:num)', 'Artikel::edit/$1');
$routes->put('artikel/(:num)', 'Artikel::update/$1');
$routes->get('artikel/hapus/(:segment)', 'Artikel::destroy/$1');

// Video
$routes->get('video', 'Video::index');
$routes->get('video/add', 'Video::create');
$routes->post('video', 'Video::save');
$routes->get('video/edit/(:num)', 'Video::edit/$1');
$routes->put('video/(:num)', 'Video::update/$1');
$routes->get('video/hapus/(:segment)', 'Video::destroy/$1');

// Agenda
$routes->get('agenda', 'Agenda::index');
$routes->get('agenda/add', 'Agenda::create');
$routes->post('agenda', 'Agenda::save');
$routes->get('agenda/edit/(:num)', 'Agenda::edit/$1');
$routes->put('agenda/(:num)', 'Agenda::update/$1');
$routes->get('agenda/hapus/(:segment)', 'Agenda::destroy/$1');

// Users
$routes->get('users', 'Users::index');
$routes->get('users/add', 'Users::create');
$routes->post('users', 'Users::save');
$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->put('users/(:num)', 'Users::update/$1');
$routes->get('users/hapus/(:segment)', 'Users::destroy/$1');
