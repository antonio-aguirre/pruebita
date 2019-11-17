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
    return redirect('/productos');
});


// me lleva a un controlador de tipo resource: aquel que viene predefinido los principales métodos
Route::resource('/productos','Products\ControllerProducts');

Route::resource('/categorias','Categories\ControllerCategories');

Route::resource('/companias','Companies\ControllerCompanies');
