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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::resource('user', 'UsersController')->only([
        'edit', 'show', 'update'
    ]);
    Route::resource('changepass', 'ChangePassWord')->only([
        'edit', 'update'
    ]);
    Route::resource('wallet', 'WalletController')->only([
        'show', 'destroy', 'create', 'store'
    ]);
    Route::resource('transaction', 'TransactionController')->only([
        'show', 'create', 'store'
    ]);
    Route::resource('category', 'CategoryController')->only([
        'show', 'create', 'store'
    ]);
    Route::get('export', 'ExportController@export')->name('export');
    Route::post('searchtransaction', 'TransactionController@search')->name('search');
});
