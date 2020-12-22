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

Route::get('/', 'PagesController@showHome')->name('home');
Route::get('/about', 'PagesController@showAbout')->name('about');
Route::get('/list', 'PagesController@showlist')->name('list');


Route::prefix('/admin')->middleware('auth')->group(function () {
//
////    Route::get('/reviews', 'ReviewController@index')->name('review.list');
////    Route::get('/review/create', 'ReviewController@create')->name('review.add');
////    Route::post('/review/create', 'ReviewController@store')->name('review.store');
////    Route::get('/review/{id}', 'ReviewController@details')->name('review.details');
////    Route::delete('/review/{id}', 'ReviewController@destroy')->name('review.destroy');
////
////    Route::get('/videos', 'VideoPostController@index')->name('video.list');
////    Route::get('/video/create', 'VideoPostController@create')->name('video.add');
////    Route::post('/video/create', 'VideoPostController@store')->name('video.store');
////    Route::get('/video/{id}', 'VideoPostController@details')->name('video.details');
//
//
});
Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
