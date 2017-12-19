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

Auth::routes();

Route::get('/{categoria?}', 'HomeController@index')->name('index');

Route::get('/condiciones', 'HomeController@condiciones')->name('condiciones');

Route::get('/nosotros', 'HomeController@nosotros')->name('nosotros');

Route::prefix('perfil')->group(function()
{
    Route::get('', 'HomeController@perfil')->name('perfil');

});