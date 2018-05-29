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

Route::get('clima', 'SOAPController@index');


Route::get('borraEmpresario/{id_empresario}', 'EmpresariosController@borraEmpresario');
Route::get('desactivar/{id_empresario}', 'EmpresariosController@desactivar');
Route::resource('empresarios','EmpresariosController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
