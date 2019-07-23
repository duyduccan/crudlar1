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
Route::prefix("admin")->group(function(){
    //view liệt kê các bản ghi
    Route::get('/products','Backend\ProductController@index');
    //view tạo mới
    Route::get('/products/create','Backend\ProductController@create');
    //view sửa
    Route::get('/products/edit/{id}','Backend\ProductController@edit');
    // view xóa
    Route::get('/products/delete/{id}','Backend\ProductController@delete');

    // tạo 3 route để thực hiện thêm xóa sửa
    // thêm mới bản ghi
    Route::post('/products','Backend\ProductController@store');
    // sửa bản ghi mới
    Route::post('/products/edit/{id}','Backend\ProductController@update');
})->middleware('auth');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
