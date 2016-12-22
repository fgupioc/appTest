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
Route::group(['middleware' => ['admin','auth'],'prefix'=>'admin/'],function(){

	Route::get('categoria',['as'=>'categoriaHome','uses'=>'CategoryController@index']);
	Route::get('categoria/crear',['as'=>'categoriaCrear','uses'=>'CategoryController@create']);
	Route::post('categoria/store',['as'=>'categoriaStore','uses'=>'CategoryController@store']);
	Route::get('categoria/actualizar/{id}',['as'=>'categoriaActualizar','uses'=>'CategoryController@edit']);
	Route::post('categoria/update/{id}',['as'=>'categoriaUpdate','uses'=>'CategoryController@update']);
	Route::get('categoria/destroy/{id}',['as'=>'categoriaDestroy','uses'=>'CategoryController@destroy']); 

	//articulo
	Route::get('articulo',['as'=>'articuloHome','uses'=>'ArticleController@index']);
	Route::get('articulo/crear',['as'=>'articuloCrear','uses'=>'ArticleController@create']);
	Route::post('articulo/store',['as'=>'articuloStore','uses'=>'ArticleController@store']);
	Route::get('articulo/actualizar/{id}',['as'=>'articuloActualizar','uses'=>'ArticleController@edit']);
	Route::post('articulo/update/{id}',['as'=>'articuloUpdate','uses'=>'ArticleController@update']);
	Route::get('articulo/destroy/{id}',['as'=>'articuloDestroy','uses'=>'ArticleController@destroy']);

	//ciente
	Route::get('cliente',['as'=>'clienteHome','uses'=>'CustomerController@index']);
	Route::get('cliente/crear',['as'=>'clienteCrear','uses'=>'CustomerController@create']);
	Route::post('cliente/store',['as'=>'clienteStore','uses'=>'CustomerController@store']);
	Route::get('cliente/actualizar/{id}',['as'=>'clienteActualizar','uses'=>'CustomerController@edit']);
	Route::post('cliente/update/{id}',['as'=>'clienteUpdate','uses'=>'CustomerController@update']);
	Route::get('cliente/destroy/{id}',['as'=>'clienteDestroy','uses'=>'CustomerController@destroy']);
	 
	 //proveedor
	Route::get('proveedor',['as'=>'proveedorHome','uses'=>'SupplierController@index']);
	Route::get('proveedor/crear',['as'=>'proveedorCrear','uses'=>'SupplierController@create']);
	Route::post('proveedor/store',['as'=>'proveedorStore','uses'=>'SupplierController@store']);
	Route::get('proveedor/actualizar/{id}',['as'=>'proveedorActualizar','uses'=>'SupplierController@edit']);
	Route::post('proveedor/update/{id}',['as'=>'proveedorUpdate','uses'=>'SupplierController@update']);
	Route::get('proveedor/destroy/{id}',['as'=>'proveedorDestroy','uses'=>'SupplierController@destroy']);

	//ingreso
	Route::get('ingreso',['as'=>'ingresoHome','uses'=>'EntryController@index']);
	Route::get('ingreso/crear',['as'=>'ingresoCrear','uses'=>'EntryController@create']);
	Route::post('ingreso/store',['as'=>'ingresoStore','uses'=>'EntryController@store']);
	Route::get('ingreso/actualizar/{id}',['as'=>'ingresoActualizar','uses'=>'EntryController@edit']);
	Route::get('ingreso/detalle/{id}',['as'=>'ingresoMostrar','uses'=>'EntryController@show']);
	Route::post('ingreso/update/{id}',['as'=>'ingresoUpdate','uses'=>'EntryController@update']);
	Route::get('ingreso/destroy/{id}',['as'=>'ingresoDestroy','uses'=>'EntryController@destroy']);

	//venta
	Route::get('venta',['as'=>'ventaHome','uses'=>'SaleController@index']);
	Route::get('venta/crear',['as'=>'ventaCrear','uses'=>'SaleController@create']);
	Route::post('venta/store',['as'=>'ventaStore','uses'=>'SaleController@store']);
	Route::get('venta/actualizar/{id}',['as'=>'ventaActualizar','uses'=>'SaleController@edit']);
	Route::get('venta/detalle/{id}',['as'=>'ventaMostrar','uses'=>'SaleController@show']);
	Route::post('venta/update/{id}',['as'=>'ventaUpdate','uses'=>'SaleController@update']);
	Route::get('venta/destroy/{id}',['as'=>'ventaDestroy','uses'=>'SaleController@destroy']);

});