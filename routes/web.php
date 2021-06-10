<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/','EbungaController@index');
Route::view('select2','select2');

Route::get('product/{slug}','ProductCtontroller@index');

Route::get('product/card/{slug_product}/{slug}','ProductCtontroller@card');

Route::post('product/card/{nama_product}/detail','ProductCtontroller@tamabahSession')
;


// snap token terbaru 
Route::post('product/card/{nama_product}/detail2','ProductCtontroller@keranjang');
Route::get('product/card/{nama_product}/snaptoken/{harga}/{namaPenerima}/{emailPenerima}/{phonePenerima}','ProductCtontroller@token');
Route::post('product/card/{nama_product}/snapfinish','ProductCtontroller@finish');
Route::get('hapuskeranjang', 'ProductCtontroller@hapuskeranjang');

// Route::get('register','atuhController@index');

Route::get('ebunga/register','AuthUserController@register');
Route::get('ebunga/login','AuthUserController@index');
Route::post('ebunga/creat-register','AuthUserController@creat');
Route::post('ebunga/ceklogin','AuthUserController@cek_login');
Route::post('ebunga/ceklogin-shop', 'AuthUserController@cek_loginshop');
Route::get('ebunga/logout', 'AuthUserController@logout');
Route::get('ebunga/aktivasi/{kode_buyer}', 'AuthUserController@aktivasi');



// end snap token terbaru 



Route::get('product/{nama_product}/detail','ProductCtontroller@cart');

// Route::get('product/{nama_product}/detail','ProductCtontroller@card');

Route::get('product/card/{nama_product}/Checkout','BayarController@render');





// Route::get('product/card/{nama_product}/snaptoken','ProductCtontroller@token');

// route midtrans 3
Route::get('snap','SnapController@snap');
Route::get('snap/snaptoken','SnapController@token');
Route::post('snap/snapfinish','SnapController@finish');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// route send email

Route::get('email','sendEmailController@index')->name('email');
Route::post('email/send', 'sendEmailController@send');


//route seller
Route::get('seller/register','AuthSellerController@index');
Route::get('seller/login','AuthSellerController@login');
Route::get('getkabupaten/{idprov}','GetController@index');
Route::get('getkecamatan/{idkab}','GetController@getKec');
Route::post('daftar','AuthSellerController@daftar');
Route::post('cek/seller','AuthSellerController@store');
Route::get('seller/logout','AuthSellerController@logout');


// Dashbord seller
Route::get('seller','SellerController@index')->middleware('Ceksession');
Route::get('seller/upload-product','SellerController@upload')->middleware('Ceksession');
Route::post('upload/','SellerController@uploadproduct')->middleware('Ceksession');
Route::get('seller/set-zona', 'SellerController@setzona')->middleware('Ceksession');
Route::get('seller/listkelurahan/{id}', 'SellerController@listkeluarahan')->middleware('Ceksession');
Route::post('seller/creat-zona', 'SellerController@inputzona')->middleware('Ceksession');
Route::get('seller/list-zona', 'SellerController@list_zona')->middleware('Ceksession');
Route::get('seller/list-product', 'SellerController@list_product')->middleware('Ceksession');
Route::get('seller/order', 'SellerController@list_order')->middleware('Ceksession');
Route::get('seller/detail-order/{id_order}', 'SellerController@detail_order')->middleware('Ceksession');



// route kirim emial
Route::get('/kirimemail','KirimEmailController@index');
// verifkasi akun seller
Route::get('seller/aktivasi/{seller}', 'AuthSellerController@aktivasi');

// ->middleware('Ceksession');]




