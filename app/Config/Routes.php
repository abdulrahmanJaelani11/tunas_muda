<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
// $routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
// $routes->setTranslateURIDashes(false);
// $routes->set404Override();
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'App\Controllers\Home::index');
$routes->get('login', 'App\Controllers\Back\Auth::login');
$routes->post('login', 'App\Controllers\Back\Auth::ProsesLogin');
$routes->get('logout', 'App\Controllers\Back\Auth::logout');

// Beranda
$routes->group('beranda', ['namespace' => 'App\Controllers\Back'], function ($routes) {
    $routes->get('/', 'Beranda::index');
    $routes->get('anggota', 'Anggota::index');
});
// Anggota
$routes->group('anggota', ['namespace' => 'App\Controllers\Back'], function ($routes) {
    $routes->get('/', 'Anggota::index');
    $routes->post('get', 'Anggota::getData');
    $routes->post('lists', 'Anggota::lists');
    $routes->get('form', 'Anggota::form');
    $routes->post('form', 'Anggota::simpan');
    $routes->get('edit/(:any)', 'Anggota::form/$1');
    $routes->get('hapus/(:any)', 'Anggota::hapus/$1');
});
// Berita
$routes->group('berita', ['namespace' => 'App\Controllers\Back'], function ($routes) {
    $routes->get('/', 'Berita::index');
    $routes->post('get', 'Berita::getData');
    $routes->post('lists', 'Berita::lists');
    $routes->get('form', 'Berita::form');
    $routes->post('form', 'Berita::simpan');
    $routes->get('edit/(:any)', 'Berita::form/$1');
    $routes->get('hapus/(:any)', 'Berita::hapus/$1');
    $routes->get('detail/(:any)', 'Berita::detail/$1');
});
// Setting
$routes->group('setting', ['namespace' => 'App\Controllers\Back'], function ($routes) {
    // situs
    $routes->get('situs', 'Setting::situs');
    $routes->get('situs/(:any)', 'Setting::situs/$1');
    $routes->post('situs/save', 'Setting::save_situs');
    // slider
    $routes->get('slider', 'Setting::slider');
    $routes->post('slider/lists', 'Setting::lists_slider');
    $routes->get('slider/form', 'Setting::form_slider');
    $routes->post('slider/save', 'Setting::save_slider');
    $routes->get('slider/edit/(:any)', 'Setting::form_slider/$1');
    $routes->get('hapus/(:any)', 'Setting::hapus/$1');
});
// Jurusan
$routes->group('jurusan', ['namespace' => 'App\Controllers\Back'], function ($routes) {
    // situs
    $routes->get('/', 'Jurusan::index');
    $routes->post('lists', 'Jurusan::lists');
    // slider
    $routes->get('', 'Jurusan::slider');
    $routes->get('form', 'Jurusan::form');
    $routes->post('form', 'Jurusan::simpan');
    $routes->get('edit/(:any)', 'Jurusan::form/$1');
    $routes->get('hapus/(:any)', 'Jurusan::hapus/$1');
});
// Fasilitas
$routes->group('fasilitas', ['namespace' => 'App\Controllers\Back'], function ($routes) {
    // situs
    $routes->get('/', 'Fasilitas::index');
    $routes->post('lists', 'Fasilitas::lists');
    // slider
    $routes->get('', 'Fasilitas::slider');
    $routes->get('form', 'Fasilitas::form');
    $routes->post('form', 'Fasilitas::simpan');
    $routes->get('edit/(:any)', 'Fasilitas::form/$1');
    $routes->get('hapus/(:any)', 'Fasilitas::hapus/$1');
});

// =======================================================================================

// Front Berita
$routes->group('front', ['namespace' => 'App\Controllers\Back'], function ($routes) {

    $routes->group('berita', ['namespace' => 'App\Controllers\Back'], function ($routes) {
        $routes->get('detail/(:any)', 'Berita::detail/$1');
    });

    $routes->group('sejarah', ['namespace' => 'App\Controllers\Back'], function ($routes) {
        $routes->get('/', 'Setting::sejarah');
    });

    $routes->group('sambutan_kepsek', ['namespace' => 'App\Controllers\Back'], function ($routes) {
        $routes->get('/', 'Setting::sambutan_kepsek');
    });

    $routes->group('visi_misi', ['namespace' => 'App\Controllers\Back'], function ($routes) {
        $routes->get('/', 'Setting::visi_misi');
    });
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
