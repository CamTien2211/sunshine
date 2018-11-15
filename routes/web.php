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
Route::get('/danhsachloai','LoaiController@index')->name('danhsachloai.index');
Route::get('/danhsachloai/create','LoaiController@create')->name('danhsachloai.create');
Route::post('/danhsachloai/create','LoaiController@store')->name('danhsachloai.store');
Route::get('/danhsachchude','ChuDeController@index');
Route::get('/danhsachsanpham','SanPhamController@index')->name('danhsachsanpham.index');
