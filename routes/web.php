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

Auth::routes();

Route::get('/', 'FrontPagesController@index')->name('main');

Route::get('level/{level}', 'FrontPagesController@getProductsByLevels')->name('products.list');
Route::get('product/{product}', 'FrontPagesController@getSingleProduct')->name('product.single');


Route::get('/home', 'UserController@index')->name('home');





Route::prefix('admin')->group(function () {

    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});