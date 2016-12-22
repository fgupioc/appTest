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
Route::get('admin/categoria',['as'=>'categoriaHome','uses'=>'CategoryController@index']);
Route::get('admin/categoria/crear',['as'=>'categoriaCrear','uses'=>'CategoryController@create']);
Route::post('admin/categoria/store',['as'=>'categoriaStore','uses'=>'CategoryController@store']);
Route::get('admin/categoria/actualizar/{id}',['as'=>'categoriaActualizar','uses'=>'CategoryController@edit']);
Route::post('admin/categoria/update/{id}',['as'=>'categoriaUpdate','uses'=>'CategoryController@update']);
Route::get('admin/categoria/destroy/{id}',['as'=>'categoriaDestroy','uses'=>'CategoryController@destroy']);

//articulo
Route::get('admin/articulo',['as'=>'articuloHome','uses'=>'ArticleController@index']);
Route::get('admin/articulo/crear',['as'=>'articuloCrear','uses'=>'ArticleController@create']);
Route::post('admin/articulo/store',['as'=>'articuloStore','uses'=>'ArticleController@store']);
Route::get('admin/articulo/actualizar/{id}',['as'=>'articuloActualizar','uses'=>'ArticleController@edit']);
Route::post('admin/articulo/update/{id}',['as'=>'articuloUpdate','uses'=>'ArticleController@update']);
Route::get('admin/articulo/destroy/{id}',['as'=>'articuloDestroy','uses'=>'ArticleController@destroy']);

//ciente
Route::get('admin/cliente',['as'=>'clienteHome','uses'=>'CustomerController@index']);
Route::get('admin/cliente/crear',['as'=>'clienteCrear','uses'=>'CustomerController@create']);
Route::post('admin/cliente/store',['as'=>'clienteStore','uses'=>'CustomerController@store']);
Route::get('admin/cliente/actualizar/{id}',['as'=>'clienteActualizar','uses'=>'CustomerController@edit']);
Route::post('admin/cliente/update/{id}',['as'=>'clienteUpdate','uses'=>'CustomerController@update']);
Route::get('admin/cliente/destroy/{id}',['as'=>'clienteDestroy','uses'=>'CustomerController@destroy']);
 
 //proveedor
Route::get('admin/proveedor',['as'=>'proveedorHome','uses'=>'SupplierController@index']);
Route::get('admin/proveedor/crear',['as'=>'proveedorCrear','uses'=>'SupplierController@create']);
Route::post('admin/proveedor/store',['as'=>'proveedorStore','uses'=>'SupplierController@store']);
Route::get('admin/proveedor/actualizar/{id}',['as'=>'proveedorActualizar','uses'=>'SupplierController@edit']);
Route::post('admin/proveedor/update/{id}',['as'=>'proveedorUpdate','uses'=>'SupplierController@update']);
Route::get('admin/proveedor/destroy/{id}',['as'=>'proveedorDestroy','uses'=>'SupplierController@destroy']);

//ingreso
Route::get('admin/ingreso',['as'=>'ingresoHome','uses'=>'EntryController@index']);
Route::get('admin/ingreso/crear',['as'=>'ingresoCrear','uses'=>'EntryController@create']);
Route::post('admin/ingreso/store',['as'=>'ingresoStore','uses'=>'EntryController@store']);
Route::get('admin/ingreso/actualizar/{id}',['as'=>'ingresoActualizar','uses'=>'EntryController@edit']);
Route::get('admin/ingreso/detalle/{id}',['as'=>'ingresoMostrar','uses'=>'EntryController@show']);
Route::post('admin/ingreso/update/{id}',['as'=>'ingresoUpdate','uses'=>'EntryController@update']);
Route::get('admin/ingreso/destroy/{id}',['as'=>'ingresoDestroy','uses'=>'EntryController@destroy']);

//venta
Route::get('admin/venta',['as'=>'ventaHome','uses'=>'SaleController@index']);
Route::get('admin/venta/crear',['as'=>'ventaCrear','uses'=>'SaleController@create']);
Route::post('admin/venta/store',['as'=>'ventaStore','uses'=>'SaleController@store']);
Route::get('admin/venta/actualizar/{id}',['as'=>'ventaActualizar','uses'=>'SaleController@edit']);
Route::get('admin/venta/detalle/{id}',['as'=>'ventaMostrar','uses'=>'SaleController@show']);
Route::post('admin/venta/update/{id}',['as'=>'ventaUpdate','uses'=>'SaleController@update']);
Route::get('admin/venta/destroy/{id}',['as'=>'ventaDestroy','uses'=>'SaleController@destroy']);