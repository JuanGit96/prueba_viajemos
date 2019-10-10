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

#date_default_timezone_set('America/Bogota');

use App\City;

Route::get('/', function () {

    $cities = City::all();

    return view('welcome',compact('cities'));
});

Route::post('viewmap','mapController@index')->name('viewmap');

Route::get('queries','mapController@queries')->name('queries');
