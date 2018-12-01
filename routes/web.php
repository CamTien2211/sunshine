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
Route::get('/admin/danhsachsanpham/print', 'SanPhamController@print')->name('danhsachsanpham.print');
Route::resource('/admin/danhsachsanpham','SanPhamController');
