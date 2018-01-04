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

Route::get('/carrito', 'HomeController@carrito')->name('carrito');


Route::get('/condiciones', 'HomeController@condiciones')->name('condiciones');

Route::get('/nosotros', 'HomeController@nosotros')->name('nosotros');

Route::get('/intranet','HomeController@intranet')->name('intranet');

Route::prefix('intranet')->group(function()
{
    Route::get('agregar_categoria', 'IntranetController@show_agregar_categoria')->name('intranet.agregar_categoria');
    Route::get('agregar_marca', 'IntranetController@show_agregar_marca')->name('intranet.agregar_marca');
    Route::get('agregar_modelo', 'IntranetController@show_agregar_modelo')->name('intranet.agregar_modelo');
    Route::get('agregar_articulo', 'IntranetController@show_agregar_articulo')->name('intranet.agregar_articulo');
    Route::get('agregar_administrador', 'IntranetController@show_agregar_administrador')->name('intranet.agregar_administrador');

});

Route::prefix('perfil')->group(function()
{
    Route::get('', 'HomeController@perfil')->name('perfil');

});


Route::get('/intranet','HomeController@intranet')->name('intranet');

Route::get('/{categoria?}', 'HomeController@index')->name('index');

