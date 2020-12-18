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

Route::get('/', function () {
    return view('welcome');
});

// Accounts start
Route::get('/account', 'ReporterController@index')
    ->name('reporter.crud');
Route::get('/account/edit', 'ReporterController@index')
    ->name('reporter.edit');
Route::get('/account/upload', 'ReporterController@uploadView')
    ->name('reporter.upload.view');
Route::post('/account/upload', 'ReporterController@upload')
    ->name('reporter.upload');
// Accounts end