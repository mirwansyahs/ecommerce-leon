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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/produk-detail/(:any)', 'Home::detail/$1');
$routes->post('/addCart', 'Home::addCart');
$routes->get('/keranjang', 'Home::cart');
$routes->post('/checkout', 'Home::checkout');
$routes->post('/checkoutProsses', 'Home::checkoutProsses');
$routes->delete('/deleteItem/(:any)', 'Home::deleteItem/$1');
$routes->get('/changeAddress', 'Home::changeAddress');
$routes->put('/sendChangeAddress/(:any)', 'Home::sendChangeAddress/$1');
$routes->get('/akun-saya/(:any)', 'Home::profile/$1');
$routes->put('/simpan-akun-saya/(:any)', 'Home::saveProfile/$1');
$routes->get('/ubah-alamat/(:any)', 'Home::address/$1');
$routes->put('/simpan-ubah-alamat/(:any)', 'Home::saveAddress/$1');
$routes->get('/pesanan-saya', 'Home::myOrder');
$routes->get('/pesanan-dikirim', 'Home::orderSent');
$routes->put('/orderSentUpdate/(:any)', 'Home::orderSentUpdate/$1');
$routes->get('/pesanan-diterima', 'Home::orderAccepted');

// Auth
$routes->get('/pay', 'Payment::index');
$routes->get('/masuk', 'Auth::index');
$routes->post('/login', 'Auth::proccess');
$routes->get('/daftar', 'Auth::register');
$routes->post('/register', 'Auth::save');
$routes->get('/lupa-kata-sandi', 'Auth::forgotPassword');
$routes->post('/forgotpassword', 'Auth::forgotPasswordProccess');
$routes->get('/setel-ulang-kata-sandi', 'Auth::resetPassword');
$routes->post('/resetPassword', 'Auth::resetPasswordProccess');
$routes->get('/keluar', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/kategori', 'Category::index');
$routes->get('/tambah-kategori', 'Category::add');
$routes->post('/savecategory', 'Category::save');
$routes->get('/edit-kategori/(:num)', 'Category::edit/$1');
$routes->put('/updatecategory/(:any)', 'Category::update/$1');
$routes->delete('/hapus-kategori/(:segment)', 'Category::delete/$1');

$routes->get('/ukuran', 'Size::index');
$routes->get('/tambah-ukuran', 'Size::add');
$routes->post('/savesize', 'Size::save');
$routes->get('/edit-ukuran/(:num)', 'Size::edit/$1');
$routes->put('/updatesize/(:any)', 'Size::update/$1');
$routes->delete('/hapus-ukuran/(:segment)', 'Size::delete/$1');

$routes->get('/warna', 'Color::index');
$routes->get('/tambah-warna', 'Color::add');
$routes->post('/savecolor', 'Color::save');
$routes->get('/edit-warna/(:num)', 'Color::edit/$1');
$routes->put('/updatecolor/(:any)', 'Color::update/$1');
$routes->delete('/hapus-warna/(:segment)', 'Color::delete/$1');

$routes->get('/brand', 'Brand::index');
$routes->get('/tambah-brand', 'Brand::add');
$routes->post('/savebrand', 'Brand::save');
$routes->get('/edit-brand/(:num)', 'Brand::edit/$1');
$routes->put('/updatebrand/(:any)', 'Brand::update/$1');
$routes->delete('/hapus-brand/(:segment)', 'Brand::delete/$1');

$routes->get('/diskon', 'Discount::index');
$routes->get('/tambah-diskon', 'Discount::add');
$routes->post('/savediscount', 'Discount::save');
$routes->get('/edit-diskon/(:num)', 'Discount::edit/$1');
$routes->put('/updatediscount/(:any)', 'Discount::update/$1');
$routes->delete('/hapus-diskon/(:segment)', 'Discount::delete/$1');

$routes->get('/jasa-pengiriman', 'Delivery::index');
$routes->get('/tambah-jasa-pengiriman', 'Delivery::add');
$routes->post('/savedelivery', 'Delivery::save');
$routes->get('/edit-jasa-pengiriman/(:num)', 'Delivery::edit/$1');
$routes->put('/updatedelivery/(:any)', 'Delivery::update/$1');
$routes->delete('/hapus-jasa-pengiriman/(:segment)', 'Delivery::delete/$1');

$routes->get('/produk', 'Product::index');
$routes->get('/tambah-produk', 'Product::add');
$routes->post('/saveproduct', 'Product::save');
$routes->get('/edit-produk/(:num)', 'Product::edit/$1');
$routes->put('/updateproduct/(:any)', 'Product::update/$1');
$routes->delete('/hapus-produk/(:segment)', 'Product::delete/$1');
$routes->get('/tambah-warna-produk/(:num)', 'Product::addColor/$1');


$routes->get('/orderan-masuk', 'Order::index');
$routes->get('/detail-orderan-masuk/(:num)', 'Order::detailOrderIn/$1');
$routes->get('/konfiramsi-pengiriman', 'Order::viewSendResi');
$routes->put('/sendResi/(:any)', 'Order::sendResi/$1');
$routes->get('/orderan-dikirim', 'Order::orderDelivery');
$routes->put('/simpan-orderan-diterima/(:any)', 'Order::saveOrderCompleted/$1');
$routes->get('/detail-orderan-dikirim/(:num)', 'Order::detailOrderDelivery/$1');
$routes->get('/orderan-diterima', 'Order::orderCompleted');
$routes->get('/detail-orderan-diterima/(:num)', 'Order::detailOrderCompleted/$1');
$routes->get('/orderan-print/(:num)', 'Order::print/$1');

$routes->get('/pelanggan', 'Costumer::index');

$routes->get('/chat', 'Chat::index');
$routes->get('/list', 'Chat::list');
$routes->post('/send', 'Chat::send');
$routes->post('/markAllAsRead', 'Chat::markAllAsRead');

$routes->get('/laporan', 'Report::index');
$routes->post('/printReport', 'Report::printReport');

$routes->get('/profil', 'Profile::index');
$routes->post('/save', 'Profile::save');

$routes->get('/ubah-kata-sandi', 'ChangePassword::index');
$routes->post('/changepassword', 'ChangePassword::save');

$routes->get('/pengaturan', 'Setting::index');
$routes->post('/savesetting', 'Setting::save');

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
