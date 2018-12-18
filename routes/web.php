<?php

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
//tencontroller@action
Route::get('/admin/danhsachloai','LoaiController@index')->name('danhsachloai.index');
Route::get('/admin/danhsachloai/create','LoaiController@create')->name('danhsachloai.create');
Route::post('/admin/danhsachloai/create','LoaiController@store')->name('danhsachloai.store');
Route::get('/admin/danhsachchude','ChuDeController@index');

Route::get('/admin/danhsachloai/{id}','LoaiController@edit')->name('danhsachloai.edit');
Route::put('/admin/danhsachloai/{id}','LoaiController@update')->name('danhsachloai.update');
Route::delete('/admin/danhsachloai/{id}','LoaiController@destroy')->name('danhsachloai.destroy');

//san pham
Route::get('/admin/danhsachsanpham/excel', 'SanPhamController@excel')->name('danhsachsanpham.excel');
Route::get('/admin/danhsachsanpham/pdf', 'SanPhamController@pdf')->name('danhsachsanpham.pdf');
Route::get('/admin/danhsachsanpham/print', 'SanPhamController@print')->name('danhsachsanpham.print');
Route::resource('/admin/danhsachsanpham','SanPhamController');

Route::get('/','FrontendController@index')->name('frontend.home');
//Giao dien trang gioi thieu about
Route::get('/gioi-thieu', 'FrontendController@about')->name('frontend.about');
//giao dien trang lien he
Route::get('/lien-he', 'FrontendController@contact')->name('frontend.contact');
//route send mail
Route::post('/lien-he/goi-loi-nhan', 'FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');

Route::get('/san-pham/{id}', 'FrontendController@productDetail')->name('frontend.productDetail');
//tao don hang va gui mail xac nhan
Route::get('/gio-hang', 'FrontendController@cart')->name('frontend.cart');
Route::post('/dat-hang', 'FrontendController@order')->name('frontend.order');
Route::get('/dat-hang/hoan-tat', 'FrontendController@orderFinish')->name('frontend.orderFinish');

//checkout
Route::get('/gio-hang', 'FrontendController@cart')->name('frontend.cart');