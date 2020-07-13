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
Route::get('/', 'LinkController@home')->name('link.create');

Route::prefix('service')->group(function () {
    Route::get('/', 'LinkController@createLink')->name('link.create');
    Route::post('/link', 'LinkController@storeLink')->name('link.store');
});

Route::get('/{linkCode}', 'LinkVisitController@visitLink')->name('link.visit');


