<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', ['as'=>'home','uses'=>'HomeController@index']);
Route::post('guardar',['as'=>'guardarNoticia','uses'=>'NoticiaController@store']);
Route::get('lista',['as'=>'listaNoticia','uses'=>'NoticiaController@lista']);
Route::get('modificar/{id}',['as'=>'modificarNoticia','uses'=>'NoticiaController@modificar']);
Route::post('update/{id}',['as'=>'updateNoticia','uses'=>'NoticiaController@update']);
Route::get('eliminar/{id}',['as'=>'eliminarNoticia','uses'=>'NoticiaController@eliminar']);

//web
Route::get('admin/categoria/lista',['as'=>'categoriaHome','uses'=>'CategoryController@index']);
Route::get('admin/categoria/crear',['as'=>'categoriaCrear','uses'=>'CategoryController@create']);
Route::post('admin/categoria/store',['as'=>'categoriaStore','uses'=>'CategoryController@store']);
Route::get('admin/categoria/actualizar/{id}',['as'=>'categoriaActualizar','uses'=>'CategoryController@edit']);
Route::post('admin/categoria/update/{id}',['as'=>'categoriaUpdate','uses'=>'CategoryController@update']);
Route::get('admin/categoria/destroy/{id}',['as'=>'categoriaDestroy','uses'=>'CategoryController@destroy']);

//articulo
Route::get('admin/articulo/lista',['as'=>'articuloHome','uses'=>'ArticleController@index']);
Route::get('admin/articulo/crear',['as'=>'articuloCrear','uses'=>'ArticleController@create']);
Route::post('admin/articulo/store',['as'=>'articuloStore','uses'=>'ArticleController@store']);
Route::get('admin/articulo/actualizar/{id}',['as'=>'articuloActualizar','uses'=>'ArticleController@edit']);
Route::post('admin/articulo/update/{id}',['as'=>'articuloUpdate','uses'=>'ArticleController@update']);
Route::get('admin/articulo/destroy/{id}',['as'=>'articuloDestroy','uses'=>'ArticleController@destroy']);
