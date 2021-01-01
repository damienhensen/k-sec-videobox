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
Route::prefix('/u')->group(function () {
    Route::get('/', 'ReporterController@index')
        ->name('reporter.crud');
    Route::get('/edit', 'ReporterController@index')
        ->name('reporter.edit');
    Route::get('/upload', 'ReporterController@uploadView')
        ->name('reporter.upload.view');
    Route::post('/upload', 'ReporterController@upload')
        ->name('reporter.upload');
    Route::get('/{video}/edit', 'ReporterController@videoEditView')
        ->name('reporter.videoEdit.view');
    Route::post('/{video}/edit', 'ReporterController@videoEdit')
        ->name('reporter.videoEdit');
});
// Accounts end