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

Route::get('/', 'HomeController@index');

Route::namespace('Auth')->name('auth.')->group(function() {
    Route::get('login', 'LoginController@form')->name('login');
    Route::post('login', 'LoginController@login')->name('login');

   Route::get('admin/logout', 'LogoutController@admin')->name('auth.logout.admin');
   Route::get('subadmin/logout', 'LogoutController@subadmin')->name('auth.logout.subadmin');
   Route::get('account/logout', 'LogoutController@account')->name('auth.logout.account');
});
Route::namespace('Admin')->prefix('admin')->middleware('admin')->name('admin.')->group(function() {

    Route::get('', 'DashboardController@index')->name('dashboard.index');
});
Route::namespace('Subadmin')->prefix('subadmin')->middleware('subadmin')->name('subadmin.')->group(function() {

    Route::get('', 'DashboardController@index')->name('dashboard.index');
});
Route::namespace('Account')->prefix('account')->middleware('account')->name('account.')->group(function() {

    Route::get('', 'DashboardController@index')->name('dashboard.index');
});
