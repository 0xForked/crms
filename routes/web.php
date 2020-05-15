<?php

use Illuminate\Support\Facades\Auth;
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

// test
Route::view('/test', 'templates.invoices.invoice1');
// when open resource_url '/' user will redirect to /login
Route::get('/', 'RedirectionController@login');
// when open resource_url '/dashboard' user will redirect to /dashboard/generals (default)
Route::get('/dashboard', 'RedirectionController@dashboard');
// route for initialize laravel authentication
Auth::routes(['register' => false, 'verify' => false]);

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth']
], function () {
    Route::get('/dashboard/generals', 'DashboardController@generals');
    Route::get('/dashboard/analytics', 'DashboardController@analytics');
    Route::get('/dashboard/transactions', 'DashboardController@transactions');

    Route::resource('media', 'MediaController')->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]); // end of media routes

    Route::resource('articles', 'ArticleController')->only([
        'index', 'create', 'edit', 'store', 'update', 'destroy', 'status', 'restore'
    ]); // end of articles route

    Route::resource('customers', 'CustomerController')->only([
        'index', 'store', 'show', 'update', 'restore', 'destroy'
    ]); // end of customers route

    Route::resource('projects', 'ProjectController')->only([
        'index', 'create', 'edit', 'store', 'update', 'destroy', 'status', 'restore'
    ]); // end of projects route

    Route::resource('categories', 'CategoryController')->only([
        'index', 'show', 'store', 'update', 'destroy'
    ]); // end of categories routes

    Route::resource('invoices', 'InvoiceController')->only([
        'index', 'create'
    ]); // end of invoices routes

    // settings routes
    Route::get('/settings', 'SettingController@index');
    Route::put('/settings/general', 'SettingController@general');
    Route::get('/settings/database/backup', 'SettingController@backup');
    Route::get('/settings/database/download/{file_name}', 'SettingController@download');
    Route::get('/settings/database/delete/{file_name}', 'SettingController@delete');
    Route::put('/settings/database/restore', 'SettingController@restore');
    // end of settings routes

    // account routes
    Route::get('/accounts', 'AccountController@index');
    Route::put('/accounts/basic', 'AccountController@basic');
    Route::put('/accounts/password', 'AccountController@password');
    // end of account routes
});

// local api
Route::group([
    'prefix' => 'api',
    'namespace' => 'Api\Local',
    'middleware' => ['local_api_auth']
], function () {
    Route::get('/media', 'MediaController@index');
    Route::get('/customers', 'CustomerController@index');
});
