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

Route::get('product/card/{nama_product}','ProductCtontroller@card');

Route::post('product/card/{nama_product}/detail','ProductCtontroller@tamabahSession')
;


// snap token terbaru 
Route::post('product/card/{nama_product}/detail2','ProductCtontroller@keranjang');
Route::get('product/card/{nama_product}/snaptoken/{harga}/{namaPenerima}/{emailPenerima}/{phonePenerima}','ProductCtontroller@token');
Route::post('product/card/{nama_product}/snapfinish','ProductCtontroller@finish');

Route::get('register','atuhController@index');

Route::get('hapuskeranjang', 'ProductCtontroller@hapuskeranjang');
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
Route::get('register/seller','AuthSellerController@index');
Route::get('getkabupaten/{idprov}','GetController@index');
Route::get('getkecamatan/{idkab}','GetController@getKec');
Route::post('daftar','AuthSellerController@daftar');
Route::get('seller/login','AuthSellerController@login');
Route::post('cek/seller','AuthSellerController@store');

// Dashbord seller
Route::get('seller','SellerController@index');
Route::get('seller/upload-product','SellerController@upload');
// ->middleware('Ceksession');