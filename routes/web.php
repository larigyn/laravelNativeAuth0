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

/*Route::view('/welcome', 'welcome');*/

// Auth::routes();


Route::group(['middleware' => 'preventBackHistory'],function(){
	Auth::routes();
	Route::get('/admin/{slug?}', 'Admin\AdminController@index')->name('admin.index');
	Route::get('/super/{slug?}', 'Super\SuperAdminController@index')->name('super.index');
	Route::get('/officer/{slug?}', 'Officer\OfficerController@index')->name('officer.index');
	Route::get('/guest', 'Guest\GuestController@index')->name('guest.index');
	Route::get('/home', 'HomeController@index')->name('home');	
	
});

/*Route::group(['middleware' => ['web']], function () {
    //
});*/