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

Route::get('contact', function () {
    return view('contact');
});

Route::get('executives', function () {
    return view('executives');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('blogs', 'BlogController');
Route::resource('events', 'EventController');
Route::resource('showcases', 'ShowcaseController');
