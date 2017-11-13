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
/*
Auth::routes();*/


Route::group(['middleware' => 'preventBackHistory'],function(){
	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/admin', 'Admin\AdminController@index')->name('home.admin');
	Route::get('/super', 'Super\SuperAdminController@index')->name('home.super');
	Route::get('/officer', 'Officer\OfficerController@index')->name('home.officer');
	
});

/*Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
 Route::get('/','adminController@index');
});*/

/*Route::group(['middleware' => 'checkrole'],function(){
	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/', 'Admin\AdminController@index')->name('home.admin');
});*/