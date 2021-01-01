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

Route::get('/', 'PagesController@showHome')->name('homepage');
Route::get('/list', 'PagesController@showlist')->name('list');


Route::prefix('/admin')->middleware('auth')->group(function () {

    Route::get('/melding', 'PagesController@showMelding')->name('melding');
    Route::get('/about', 'PagesController@showAbout')->name('about');
    Route::get('/logout', 'PagesController@showLogout')->name('logout');
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
Auth::routes();
