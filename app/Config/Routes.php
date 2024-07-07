<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\Login;
use App\Controllers\TbMasjid;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('delails/(:segment)', 'Pages::details/$1');



$routes->get('/login', 'Login::index');
$routes->get('/registrasi', 'Login::registrasi');
$routes->get('/donasi', 'Login::donasi');
$routes->get('/bukti-donasi', 'Login::uploadbuktiDonasi');
$routes->post('/upload-bukti-transfer', 'Login::uploadBuktiTransfer');
$routes->post('/donasi-store', 'Login::storeDonasi');
$routes->get('/donasi/verifikasi/all', 'verifikasiDonasi::verifyAllDonasi');
$routes->get('/donasi/unverifikasi/all', 'verifikasiDonasi::unverifyAllDonasi');
$routes->get('/donasi/verifikasi/(:num)', 'verifikasiDonasi::verifyDonasi/$1');
$routes->get('/donasi/unverifikasi/(:num)', 'verifikasiDonasi::unverifyDonasi/$1');
$routes->get('/TbMasjid', 'TbMasjid::index');
$routes->get('/TbMasjid/(:segment)', 'TbMasjid::details/$1');
$routes->get('/zakat', 'Pages::zakat');
$routes->get('/masjid', 'Pages::masjid');
$routes->get('/infakyatim', 'Pages::infakyatim');
$routes->get('profile/(:num)', 'Profile::index/$1');
$routes->get('profile', 'Profile::index');
$routes->get('profil', 'Profil::index');
$routes->get('/profil/(:num)', 'Profil::index/$1');
$routes->get('waktusholat', 'Profil::waktusholat');
$routes->get('/waktusholat/(:num)', 'Profil::waktusholat/$1');
$routes->post('uang/handleFormData/(:num)', 'Uang::handleFormData/$1');
$routes->get('/uangkas', 'Uang::index');
$routes->get('/uangkas/(:num)', 'Uang::index/$1');
$routes->post('uang/handleFormData', 'Uang::handleFormData');
$routes->get('/viewkasmasjid/(:num)', 'Uang::viewkasmasjid/$1');
$routes->get('/viewzakat/(:num)', 'Zakat2::viewzakat/$1');
$routes->get('/viewyatim/(:num)', 'Yatim::viewyatim/$1');
$routes->get('/zakat2', 'zakat2::index');
$routes->get('/zakat2/(:num)', 'zakat2::index/$1');
$routes->get('/zakatview', 'zakat2::viewzakat');
$routes->get('/yatim', 'yatim::index');
$routes->get('/yatim/(:num)', 'yatim::index/$1');
$routes->get('/laporan', 'laporan::index');
$routes->get('/laporan/filter/(:num)/(:any)', 'laporan::laporanFilter/$1/$2');
$routes->get('/laporan/filter/(:num)/(:any)/(:any)?/(:any)?', 'laporan::laporanFilter/$1/$2/$3/$4');
$routes->get('/laporan/(:num)', 'laporan::index/$1');
$routes->get('/editProfile', 'editP::index');
$routes->post('/laporan/getData', 'Laporan::getData');
$routes->get('/verifikasiDonasi', 'verifikasiDonasi::index');
$routes->post('/login/auth', 'Login::auth');

$routes->get('/buat-postingan', 'Posting::create');
$routes->get('/edit-postingan/(:num)', 'Posting::update/$1');
$routes->post('/store-postingan', 'Posting::store');
$routes->post('/edit-postingan/(:num)', 'Posting::edit/$1');
$routes->get('/delete-postingan/(:num)', 'Posting::delete/$1');

$routes->get('profile/(:segment)', 'Profile::details/$1');

$routes->get('errors/custom_error', function () {
    return view('errors/custom_error', ['message' => 'ID masjid tidak ditemukan dalam sesi']);
});

$routes->setAutoRoute(true);
