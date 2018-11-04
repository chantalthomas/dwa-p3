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

Route::get('/', 'LandingPageController');

Route::get('/calculate', 'CalculationController@index');

Route::get('/calculate-process/', 'CalculationController@mifflinEquation'); # <-- NEW 2 of 2



