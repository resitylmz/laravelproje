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
/* Admin kısmı rotasyonları */
Route::group(['middleware' => 'auth'], function()
{
   Route::get('/home', 'HomeController@index')->name('home');
   Route::resource('Musteri', 'MusteriController');
   Route::post('/store', 'MusteriController@store');
   Route::post('/update', 'MusteriController@update');
   Route::post('/destroy', 'MusteriController@destroy');
   Route::post('/getUser','OdemelerController@getUser');

});
Auth::routes();
