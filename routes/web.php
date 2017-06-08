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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function() {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/','AdminController@dashboard')->name('admin.dashboard');

});

Route::prefix('client')->group(function() {

    Route::get('/login', 'Auth\ClientLoginController@showLoginForm')->name('client.login');
    Route::post('/login', 'Auth\ClientLoginController@login')->name('client.login.submit');
    Route::get('/logout', 'Auth\ClientLoginController@logout')->name('client.logout');
    Route::get('/','ClientController@dashboard')->name('client.dashboard');

});


Route::prefix('provider')->group(function() {

    Route::get('/login', 'Auth\ProviderLoginController@showLoginForm')->name('provider.login');
    Route::post('/login', 'Auth\ProviderLoginController@login')->name('provider.login.submit');
    Route::get('/logout', 'Auth\ProviderLoginController@logout')->name('provider.logout');
    Route::get('/','ProviderController@dashboard')->name('provider.dashboard');

});