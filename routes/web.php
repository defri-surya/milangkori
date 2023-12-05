<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontController@landingPage');
Route::get('/welcome', 'FrontController@homepage')->name('welcome');

Route::get('/lang', 'LangController@index');

Route::get('/halamanpaket', 'FrontController@halamanpaket')->name('halamanpaket');

Route::get('/tentangkami', 'FrontController@tentangkami')->name('tentangkami');
Route::get('/kerjasama', 'FrontController@kerjasama')->name('kerjasama');
Route::get('/artikelwisata', 'FrontController@artikelwisata')->name('artikelwisata');
Route::get('/detailartikelwisata/{id}', 'FrontController@detailartikelwisata')->name('detailartikelwisata');

// Paket Wisata 
Route::get('/detailpaketwisata/{id}', 'FrontController@detailpaketwisata')->name('detailpaketwisata');

// CART
Route::post('cart', 'TransaksiController@addToCart')->name('front.cart');
Route::put('/updatecart/update', 'TransaksiController@Updatecart')->name('update_Cart');
Route::get('listkeranjangbelanja', 'TransaksiController@listkeranjangbeli')->name('listkeranjangbelanja');
Route::get('hapuscart/{key}', 'TransaksiController@hapuscart')->name('hapus.cart');
Route::post('prosesordertuku', 'TransaksiController@Ordertuku')->name('proses.ordertuku');
Route::get('invoice', 'TransaksiController@invoice')->name('invoice');
Route::get('print-invoice', 'TransaksiController@print_invoice')->name('printInvoice');

// Ratting
Route::get('rating', 'TransaksiController@ratting')->name('ratting');
Route::post('rating-save', 'TransaksiController@rattingStore')->name('rattingStore');

// Payment Midtrans
Route::get('payment', 'TransaksiController@payment')->name('payment');

// multiple search
Route::get('/search', 'FrontController@search')->name('search');
Route::get('/searchpaket', 'FrontController@searchpaket')->name('searchpaket');

// view from Kategori
Route::get('/ByKategori', 'Kategori\KategoriController@viewKategori')->name('viewKategori');

Route::get('/kategori/{slug}', 'Kategori\KategoriController@kategoriSlug')->name('kategori');

// Profile Guide
Route::get('/profileGuide/{slug}', 'FrontController@profileGuide')->name('profileGuide');

// single search
Route::get('/searchByKategori', 'FrontController@searchByKategori')->name('searchByKategori');
Route::get('/searchByKategorihalaman', 'FrontController@searchByKategorihalaman')->name('searchByKategorihalaman');
Route::get('/searchByKategoripaketwisata', 'FrontController@searchByKategoripaketwisata')->name('searchByKategoripaketwisata');

Route::get('login', function () {
    return view('auth.login');
});

Route::get('register/pengelolawisata', 'FrontController@register_pengelolawisata')->name('register.pengelolawisata');
Route::get('register/customer', 'FrontController@register_customer')->name('register.customer');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth' => 'CekRole:admin']], function () {
    Route::namespace('Admin')->group(function () {
        Route::resource('kategoripaketwisata', 'KategoripaketwisataController');
        Route::resource('datacustomer', 'DatacustomerController');
        Route::resource('dataartikelwisata', 'ArtikelwisataController');
        Route::resource('datapaketwisata', 'DatapaketwisataController');
        Route::get('datapengelolawisata', 'DatapengelolawisataController@index')->name('datapengelolawisata.index');
        Route::get('datapengelolawisata/{id}', 'DatapengelolawisataController@show')->name('datapengelolawisata.show');
        Route::put('datapengelolawisata/verifikasi/{id}', 'DatapengelolawisataController@verifikasi')->name('verifikasi');
        Route::get('datatransaksi', 'DatatransaksiController@index')->name('datatransaksi.index');

        Route::delete('deletetransaksi/{id}', 'DatatransaksiController@destroy')->name('deletetransaksi.delete');

        Route::get('list-transaksi/detail/{id}', 'DataTransaksiController@show')->name('showTransaksiAdmin');
        Route::get('print-invoice/{id}', 'DataTransaksiController@printInvoice')->name('printInvoiceAdmin');

        // Withdraw
        Route::get('reqwithdrawAdmin', 'WithdrawAdminController@index')->name('reqwithdrawAdmin');
        Route::put('konfirmwithdraw/{id}', 'WithdrawAdminController@update')->name('konfirmwithdraw');
    });
});

Route::group(['middleware' => ['auth' => 'CekRole:customer']], function () {
    Route::namespace('Customer')->group(function () {
        Route::get('infocv', 'CustomerController@index')->name('infocv');
        Route::get('settingcustomer', 'CustomerController@create')->name('settingcustomer');
        Route::post('savecustomer', 'CustomerController@store')->name('savecustomer');
        Route::get('editcustomer/{id}', 'CustomerController@edit')->name('editcustomer');
        Route::put('updatecustomer/{id}', 'CustomerController@update')->name('updatecustomer');
        Route::get('detailpaket/{id}', 'CustomerController@show')->name('detailpaket');
        // Data Transaksi
        Route::get('riwayat-customer', 'DataTransaksiCustomerController@index')->name('indexTransaksiCustomer');
        Route::get('riwayat-customer/detail/{id}', 'DataTransaksiCustomerController@show')->name('showTransaksiCustomer');
        Route::get('print-invoice-customer/{id}', 'DataTransaksiCustomerController@printInvoiceCustomer')->name('printInvoiceCustomer');
    });
});

Route::group(['middleware' => ['auth' => 'CekRole:pengelolawisata']], function () {
    Route::namespace('Pengelolawisata')->group(function () {
        Route::get('profilepengelolawisata', 'PengelolawisataController@profile')->name('profilepengelolawisata');
        Route::get('settingprofilepengelola', 'PengelolawisataController@create')->name('settingprofilepengelola');
        Route::post('saveprofilpengelola', 'PengelolawisataController@store')->name('saveprofilpengelola');
        Route::get('editprofilepengelola/{id}', 'PengelolawisataController@edit')->name('editprofilepengelola');
        Route::put('updateprofilepengelola/{id}', 'PengelolawisataController@update')->name('updateprofilepengelola');
        Route::get('buatpaketwisata', 'BuatpaketwisataController@create')->name('buatpaketwisata');
        Route::post('savebuatpaket', 'BuatpaketwisataController@store')->name('savebuatpaket');
        Route::get('editpaketwisata/{id}', 'BuatpaketwisataController@edit')->name('editpaketwisata');
        Route::put('updatepaketwisata/{id}', 'BuatpaketwisataController@update')->name('updatepaketwisata');
        Route::delete('deletepaketwisata/{id}', 'BuatpaketwisataController@destroy')->name('deletepaketwisata');

        // Data Transaksi
        Route::get('riwayat-pengelola', 'DataTransaksiController@index')->name('indexTransaksi');
        Route::get('riwayat-pengelola/{id}', 'DataTransaksiController@show')->name('showTransaksi');
        Route::get('riwayat-pengelola/print/{id}', 'DataTransaksiController@print')->name('printTransaksi');
        Route::put('riwayat-pengelola/finish/{id}', 'DataTransaksiController@finish')->name('finishTransaksi');
        Route::put('riwayat-pengelola/konfirmpayment/{id}', 'DataTransaksiController@konfirmbayar')->name('konfirmbayarTransaksi');

        // Withdraw
        Route::get('withdraw', 'WithdrawController@index')->name('withdraw');
        Route::get('detailwithdraw/{kode}', 'WithdrawController@show')->name('detailwd');
        Route::get('addwithdraw', 'WithdrawController@create')->name('addwithdraw');
        Route::post('storewithdraw', 'WithdrawController@store')->name('storewithdraw');
        Route::put('cancelwithdraw/{id}', 'WithdrawController@update')->name('cancelwithdraw');
    });
});
