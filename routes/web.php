<?php
use Illuminate\Http\Request;
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

Route::group(['middleware' => 'web'], function () {
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
    Route::get('jobs/browse/search', 'Front\JobsController@postSearchJobs')->name('job.browse-search');
    Route::get('job/{name}/{id?}', 'Front\JobsController@getSingleJobDetail')->name('job.single')->where(['name' => '[a-z_0-9-]+', 'id' => '[0-9]+']);

    Route::get('local/{name}/{id?}', 'Front\JobsController@getCategoryJobs')->name('category.jobs')->where(['name' => '[a-z-_]+', 'id' => '[0-9]+']);


});

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
    Route::get('/dashboard','Client\ClientController@dashboard')->name('client.dashboard');
    Route::get('/','Client\ClientController@dashboard')->name('client.main');

    Route::get('/post-job','Client\ClientController@getJobPost')->name('client.job-post');
    Route::get('/open-jobs','Client\ClientController@getOpenJobs')->name('client.open-jobs');
    Route::get('/completed-jobs','Client\ClientController@getClosedJobs')->name('client.closed-jobs');
    Route::get('/inprogress-jobs','Client\ClientController@getOnGoingJobs')->name('client.jobs-in-progress');
    Route::post('/post-job','Client\ClientController@postJobPost')->name('client.post-job-post');

    Route::get('/job/delete/{id}','Client\ClientController@getDeleteJob')->name('client.delete-job');
    Route::get('/job/edit/{id}','Client\ClientController@getEditJob')->name('client.edit-job');
    Route::put('/job/edit/{id}/update','Client\ClientController@postUpdateJob')->name('client.update-job');

    Route::get('/job/{id}/proposals','Client\ClientController@getJobProposals')->name('client.job-proposal');
    Route::get('/job/{id}/proposals/delete','Client\ClientController@getJobProposalDelete')->name('client.job-proposal-delete');
    Route::get('/job/{id}/proposal/{proposal_id}', 'Client\ClientController@getProposalSingleView')->name('client.view-proposal');

    Route::get('/job/{id}/proposal/{proposal_id}/accept', 'Client\ClientController@getJobProposalAccept')->name('client.proposal.accept');
    Route::get('/job/{id}/proposal/{slug}/award','Client\ClientController@getJobProposalAward')->name('client.job-proposal-award');
    Route::get('/job/{id}/proposal/{slug}/reject','Client\ClientController@getJobProposalReject')->name('client.job-proposal-reject');

    Route::get('/job/{id}/contract','Client\ClientController@getJobContract')->name('client.job-contract');
    Route::get('/job/{id}/complete/{contract_id}','Client\ClientController@getJobComplete')->name('client.job.complete');




    Route::get('password/reset', 'Auth\ClientForgotPasswordController@showLinkRequestForm')->name('client.password.request');
    Route::post('password/email', 'Auth\ClientForgotPasswordController@sendRequestLinkEmail')->name('client.password.request');

});


Route::prefix('provider')->group(function() {

    Route::get('/login', 'Auth\ProviderLoginController@showLoginForm')->name('provider.login');
    Route::post('/login', 'Auth\ProviderLoginController@login')->name('provider.login.submit');
    Route::get('/logout', 'Auth\ProviderLoginController@logout')->name('provider.logout');

    Route::get('/dashboard','Provider\ProviderController@getDashboardPage')->name('provider.dashboard');
    Route::get('/','Provider\ProviderController@getDashboardPage')->name('provider.main');

    Route::get('/completed-jobs','Provider\ProviderController@getCompletedJobs')->name('provider.completed-jobs');
    Route::get('/inprogress-jobs','Provider\ProviderController@getOnGoingJobs')->name('provider.jobs-in-progress');
    Route::get('/qued-jobs','Provider\ProviderController@getQuedJobs')->name('provider.qued-jobs');
    Route::get('/job/proposal/{id}/delete','Provider\ProviderController@getDeleteQuedJob')->name('provider.delete-qued-job');
    Route::get('/job/report/{id}/contract','Provider\ProviderController@getJobContract')->name('provider.job-contract');

    // Provider Pick job
    Route::get('pick/{id}/job', 'Provider\ProviderController@getPickJob')->name('provider.pick-job');
    Route::post('pick/{id}/job', 'Provider\ProviderController@postPickJob')->name('provider.pick-job-post');

});