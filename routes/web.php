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

Route::group(['namespace' => 'Auth'], function (){
    Route::get('dang-ky.html','RegisterController@index')->name('get.register');
    Route::post('dang-ky.html','RegisterController@register')->name('get.register');

    Route::get('dang-nhap.html','LoginController@index')->name('get.login');
    Route::post('dang-nhap.html','LoginController@login')->name('get.login');

    Route::get('dang-xuat.html','LoginController@logout')->name('get.logout');
});

Route::group(['namespace' => 'Auth'], function (){
    Route::get('admin/login','AuthAdminController@login')->name('get_admin.login');
    Route::post('admin/login','AuthAdminController@postLogin')->name('post_admin.login');

    Route::get('admin/logout','AuthAdminController@logout')->name('get_admin.logout');
});

Route::group(['namespace' => 'Frontend'], function (){
    Route::get('','HomeController@index')->name('get.home');
});

include 'route_admin.php';
