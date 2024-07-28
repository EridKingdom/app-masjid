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
$routes->get('/donasi/(:num)', 'donasi::donasi/$1');
$routes->get('/bukti-donasi', 'donasi::uploadbuktiDonasi');
$routes->post('/upload-bukti-transfer', 'Donasi::uploadBuktiTransfer');
$routes->post('/donasi-store', 'Donasi::storeDonasi');
$routes->post('/donasi-zakat-store', 'Donasi::storeDonasiZakat');
$routes->get('/verifikasiDonasi/(:num)', 'verifikasiDonasi::index/$1');
$routes->get('/verifikasi-donasi-zakat/(:num)', 'verifikasiDonasi::VerifikasiZakat/$1');
$routes->get('/donasi/verifikasi/all', 'verifikasiDonasi::verifyAllDonasi');
$routes->get('/donasi/unverifikasi/all', 'verifikasiDonasi::unverifyAllDonasi');
$routes->get('/donasi/verifikasi/(:num)', 'verifikasiDonasi::verifyDonasi/$1');
$routes->get('/donasi/unverifikasi/(:num)', 'verifikasiDonasi::unverifyDonasi/$1');
$routes->get('/donasi-zakat/verifikasi/all', 'verifikasiDonasi::verifyAllDonasiZakat');
$routes->get('/donasi-zakat/unverifikasi/all', 'verifikasiDonasi::unverifyAllDonasiZakat');
$routes->get('/donasi-zakat/verifikasi/(:num)', 'verifikasiDonasi::verifyDonasiZakat/$1');
$routes->get('/donasi-zakat/unverifikasi/(:num)', 'verifikasiDonasi::unverifyDonasiZakat/$1');
$routes->get('/donasi-zakat/(:num)', 'Donasi::donasiZakat/$1');
$routes->get('/konfigurasi-zakat/(:num)', 'Donasi::konfigurasiZakat/$1');
$routes->post('/donasi/handleFormData/(:num)', 'Donasi::handleFormData/$1');
$routes->post('/donasi/updateFormData/(:num)', 'Donasi::updateFormData/$1');
$routes->get('/donasi/deleteFormData/(:num)', 'Donasi::deleteFormData/$1');
$routes->get('/TbMasjid', 'TbMasjid::index');
$routes->post('/block', 'TbMasjid::block');
$routes->get('/TbMasjid/(:segment)', 'TbMasjid::details/$1');
$routes->get('/Daftar-Masjid', 'TbMasjid::daftarmasjid');

$routes->get('/zakat', 'Pages::zakat');
$routes->get('/masjid', 'Pages::masjid');
$routes->get('/infakyatim', 'Pages::infakyatim');
$routes->get('profile/(:num)', 'Profile::index/$1');
$routes->get('profile', 'Profile::index');
$routes->get('profil', 'Profil::index');
$routes->get('/profil/(:num)', 'Profil::index/$1');
$routes->get('/profil-super/(:num)', 'Profil::superP/$1');
$routes->get('waktusholat', 'Profil::waktusholat');
$routes->get('/waktusholat/(:num)', 'Profil::waktusholat/$1');
$routes->post('uang/handleFormData/(:num)', 'Uang::handleFormData/$1');
$routes->get('/uangkas', 'Uang::index');
$routes->get('/uangkas/(:num)', 'Uang::index/$1');
$routes->post('uang/handleFormData', 'Uang::handleFormData');
$routes->get('/viewkasmasjid/(:num)', 'Uang::viewkasmasjid/$1');
$routes->get('/view-kasmasjid-super/(:num)', 'Uang::superkasmasjid/$1');
$routes->get('/viewzakat/(:num)', 'Zakat2::viewzakat/$1');
$routes->get('/view-zakat-super/(:num)', 'Zakat2::superzakat/$1');
$routes->get('/viewyatim/(:num)', 'Yatim::viewyatim/$1');
$routes->get('/view-yatim-super/(:num)', 'Yatim::superyatim/$1');
$routes->get('/biodata-pengurus/(:num)', 'Profil::biodataP/$1');
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
$routes->get('/edit-data-pengurus', 'editP::editDataPengurus');
$routes->post('/edit-data-pengurus/submit', 'editP::submitDataPengurus');
$routes->post('/laporan/getData', 'Laporan::getData');
$routes->get('/verifikasiDonasi', 'verifikasiDonasi::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/lupa-password', 'Lupa::index');
$routes->post('/lupa-password/submit', 'Lupa::forgotPasswordRequest');
$routes->post('/lupa-password/ubah', 'Lupa::ubah');
$routes->get('/reset-password/(:num)', 'Lupa::lupa/$1');
$routes->get('/reset-password/(:num)/(:any)', 'Lupa::lupa/$1/$2');
$routes->get('/resetter-password', 'Lupa::resseter');
$routes->get('/dashboardSuper', 'dashboardSuper::index');

$routes->get('/buat-postingan', 'Posting::create');
$routes->get('/edit-postingan/(:num)', 'Posting::update/$1');
$routes->post('/store-postingan', 'Posting::store');
$routes->post('/edit-postingan/(:num)', 'Posting::edit/$1');
$routes->get('/delete-postingan/(:num)', 'Posting::delete/$1');

$routes->get('profile/(:segment)', 'Profile::details/$1');


$routes->get('/validasi-pendaftaran', 'Pendaftaran::pendaftaran');
$routes->post('/validasi-pendaftaran/aksi', 'Pendaftaran::userRegisterAction');
$routes->get('/pengajuan-perubahan', 'Pendaftaran::pengajuan');
$routes->post('/pengajuan-perubahan/aksi', 'Pendaftaran::perubahanDataAction');
$routes->post('/tambah-agenda/(:num)', 'profile::tambahAgenda/$1');
$routes->post('/hapus-agenda', 'profile::hapusAgenda');
$routes->get('/tutor-donasi', 'Tutordek::index');



$routes->get('errors/custom_error', function () {
    return view('errors/custom_error', ['message' => 'ID masjid tidak ditemukan dalam sesi']);
});

$routes->setAutoRoute(true);
