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

 
 /*

Route::group(['prefix' => 'admin'], function() {

	Route::resource('tipo_media', 'TipoMediaController');
    
 
});

*/
Route::get('/admin', 'HomeAdminController@index');
Route::resource('tipo_media', 'TipoMediaController')->middleware('auth');
Route::resource('categoria_media', 'CategoriaMediaController')->middleware('auth');
Route::resource('multimedia', 'MultimediaController')->middleware('auth');
Route::get('/pagina_multimedia', 'MultimediaController@paginaMultimedia'); 

Route::resource('usuario', 'UsuarioController')->middleware('auth');
Route::resource('rol', 'RolController')->middleware('auth');

Route::resource('estatus', 'EstatusController')->middleware('auth');

/*
Route::resource('login','Auth\LoginController');
Route::get('logout','Auth\LoginController@logout');*/
Auth::routes();

Route::get('home', function(){
 return View::make('sitio.home');
});

//home.blade.php
Route::get('/', function(){
 return View::make('sitio.home');
});


Route::get('/mitrabajo', function(){
 return View::make('sitio.mitrabajo');
});


Route::get('/proyectos', 'ProyectosController@index');
/*
Route::get('/proyectos', function(){
 return View::make('sitio.proyectos');
});*/

Route::get('/contacto', function(){
 return View::make('sitio.contacto');
});
