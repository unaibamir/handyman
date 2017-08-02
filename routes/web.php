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

Route::get('/', 'Front\PagesController@getHomepage')->name('homepage');
Route::get('/home', 'Front\HomeController@index')->name('home');

Auth::routes();

Route::get('login', 'Front\PagesController@getLoginMain')->name('login.main');
Route::get('register', 'Front\PagesController@getSignupMain');

Route::get('signup', 'Front\PagesController@getSignupMain')->name('signup-link');
Route::get('signup/handyman', 'Front\PagesController@getSignupHandyman')->name('signup-handyman');
Route::post('signup/handyman', 'Front\PagesController@postSignupHandyman')->name('signup-handyman-post');


Route::get('signup/homeowner', 'Front\PagesController@getSignupHomeowner')->name('signup-homeowner');
Route::post('signup/homeowner', 'Front\PagesController@postSignupHomeowner')->name('signup-homeowner-post');

Route::get('jobs/browse', 'Front\JobsController@getBrowseJobsSimple')->name('job.browse');
Route::get('jobs/{name}/{id?}', 'Front\JobsController@getSingleJobDetail')->name('job.single')->where(['name' => '[a-z_]+', 'id' => '[0-9]+']);

Route::get('local/{name}/{id?}', 'Front\JobsController@getCategoryJobs')->name('category.jobs')->where(['name' => '[a-z-_]+', 'id' => '[0-9]+']);

/*
 * Admin Routes
 * */

Route::prefix('admin')->group(function() {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/','Admin\AdminController@dashboard')->name('admin.dashboard');

    /**
    *  Admin Client Routes
     */
    Route::resource('client', 'Admin\ClientController', [
        'names' => [
            'store'     => 'admin.client.store',
            'index'     => 'admin.client.index',
            'create'    => 'admin.client.create',
            'destroy'   => 'admin.client.destroy',
            'update'    => 'admin.client.update',
            'edit'      => 'admin.client.edit',
            'show'      => 'admin.client.show',
        ]
    ]);
    Route::post('client/filter', 'Admin\ClientController@filter_client')->name('admin.client.filter');
    Route::get('client/activate/{id}', 'Admin\ClientController@getClientActivate')->name('admin.client.activate');
    Route::get('client/deactivate/{id}', 'Admin\ClientController@getClientDeactivate')->name('admin.client.deactivate');
    Route::get('client/approve/{id}', 'Admin\ClientController@getClientApprove')->name('admin.client.approve');


    /**
     * Admin Provider/Handyman Routes
    */
    Route::resource('handyman', 'Admin\ProviderController', [
        'except' => ['show'],
        'names' => [
            'store'     => 'admin.handyman.store',
            'index'     => 'admin.handyman.index',
            'create'    => 'admin.handyman.create',
            'destroy'   => 'admin.handyman.destroy',
            'update'    => 'admin.handyman.update',
            'edit'      => 'admin.handyman.edit',
        ]
    ]);
    Route::get('handyman/delete/{id}', 'Admin\ProviderController@delete')->name('admin.handyman.delete');
    Route::post('handyman/filter', 'Admin\ProviderController@getFilterProvider')->name('admin.handyman.filter');
    Route::get('handyman/activate/{id}', 'Admin\ProviderController@getProviderActivate')->name('admin.handyman.activate');
    Route::get('handyman/deactivate/{id}', 'Admin\ProviderController@getProviderDeactivate')->name('admin.handyman.deactivate');
    Route::get('handyman/approve/{id}', 'Admin\ProviderController@getProviderApprove')->name('admin.handyman.approve');

    /* Admin Category Routes */
    Route::resource('category', 'Admin\CategoryController', [
        'except' => ['show'],
        'names' => [
            'store'     => 'admin.category.store',
            'index'     => 'admin.category.index',
            'create'    => 'admin.category.create',
            'destroy'   => 'admin.category.destroy',
            'update'    => 'admin.category.update',
            'edit'      => 'admin.category.edit',
        ]
    ]);
    Route::get('category/delete/{id}', 'Admin\CategoryController@delete')->name('admin.category.delete');
    Route::get('category/activate/{id}', 'Admin\CategoryController@getCategoryActivate')->name('admin.category.activate');
    Route::get('category/deactivate/{id}', 'Admin\CategoryController@getCategoryDeactivate')->name('admin.category.deactivate');

});

Route::prefix('client')->group(function() {

    Route::get('/login', 'Auth\ClientLoginController@showLoginForm')->name('client.login');
    Route::post('/login', 'Auth\ClientLoginController@login')->name('client.login.submit');
    Route::get('/logout', 'Auth\ClientLoginController@logout')->name('client.logout');
    Route::get('/','ClientController@dashboard')->name('client.dashboard');


    Route::get('password/reset', 'Auth\ClientForgotPasswordController@showLinkRequestForm')->name('client.password.request');
    Route::post('password/email', 'Auth\ClientForgotPasswordController@sendRequestLinkEmail')->name('client.password.request');

});


Route::prefix('provider')->group(function() {

    Route::get('/login', 'Auth\ProviderLoginController@showLoginForm')->name('provider.login');
    Route::post('/login', 'Auth\ProviderLoginController@login')->name('provider.login.submit');
    Route::get('/logout', 'Auth\ProviderLoginController@logout')->name('provider.logout');
    Route::get('/','Provider\ProviderController@dashboard')->name('provider.dashboard');

});