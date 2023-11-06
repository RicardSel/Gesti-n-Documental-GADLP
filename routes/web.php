<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    return view('auth.login');
})->name('inicio');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    // USUARIOS
    Route::get('users', 'UserController@index')->name('users.index');

    Route::get('users/create', 'UserController@create')->name('users.create');

    Route::post('users/store', 'UserController@store')->name('users.store');

    Route::get('users/edit/{usuario}', 'UserController@edit')->name('users.edit');

    Route::put('users/update/{usuario}', 'UserController@update')->name('users.update');

    Route::delete('users/destroy/{user}', 'UserController@destroy')->name('users.destroy');

    // Configuración de cuenta
    Route::GET('users/configurar/cuenta/{user}', 'UserController@config')->name('users.config');

    // contraseña
    Route::PUT('users/configurar/cuenta/update/{user}', 'UserController@cuenta_update')->name('users.config_update');

    // foto de perfil
    Route::POST('users/configurar/cuenta/update/foto/{user}', 'UserController@cuenta_update_foto')->name('users.config_update_foto');

    // AREAS
    Route::get('areas', 'AreaController@index')->name('areas.index');

    Route::get('areas/create', 'AreaController@create')->name('areas.create');

    Route::post('areas/store', 'AreaController@store')->name('areas.store');

    Route::get('areas/edit/{area}', 'AreaController@edit')->name('areas.edit');

    Route::put('areas/update/{area}', 'AreaController@update')->name('areas.update');

    Route::delete('areas/destroy/{area}', 'AreaController@destroy')->name('areas.destroy');

    // INSTITUCION
    Route::get('institucions', 'InstitucionController@index')->name('institucions.index');

    Route::get('institucions/create', 'InstitucionController@create')->name('institucions.create');

    Route::post('institucions/store', 'InstitucionController@store')->name('institucions.store');

    Route::get('institucions/edit/{institucion}', 'InstitucionController@edit')->name('institucions.edit');

    Route::put('institucions/update/{institucion}', 'InstitucionController@update')->name('institucions.update');

    Route::delete('institucions/destroy/{institucion}', 'InstitucionController@destroy')->name('institucions.destroy');

    // CLASIFICACION DE DOCUMENTOS
    Route::get('clasificacion_documentos', 'ClasificacionDocumentoController@index')->name('clasificacion_documentos.index');

    Route::get('clasificacion_documentos/create', 'ClasificacionDocumentoController@create')->name('clasificacion_documentos.create');

    Route::post('clasificacion_documentos/store', 'ClasificacionDocumentoController@store')->name('clasificacion_documentos.store');

    Route::get('clasificacion_documentos/edit/{clasificacion_documento}', 'ClasificacionDocumentoController@edit')->name('clasificacion_documentos.edit');

    Route::put('clasificacion_documentos/update/{clasificacion_documento}', 'ClasificacionDocumentoController@update')->name('clasificacion_documentos.update');

    Route::delete('clasificacion_documentos/destroy/{clasificacion_documento}', 'ClasificacionDocumentoController@destroy')->name('clasificacion_documentos.destroy');

    // RECEPCION DE DOCUMENTOS
    Route::get('recepcion_documentos', 'RecepcionDocumentoController@index')->name('recepcion_documentos.index');

    Route::get('recepcion_documentos/create', 'RecepcionDocumentoController@create')->name('recepcion_documentos.create');

    Route::post('recepcion_documentos/store', 'RecepcionDocumentoController@store')->name('recepcion_documentos.store');

    Route::get('recepcion_documentos/edit/{recepcion_documento}', 'RecepcionDocumentoController@edit')->name('recepcion_documentos.edit');

    Route::put('recepcion_documentos/update/{recepcion_documento}', 'RecepcionDocumentoController@update')->name('recepcion_documentos.update');

    Route::delete('recepcion_documentos/destroy/{recepcion_documento}', 'RecepcionDocumentoController@destroy')->name('recepcion_documentos.destroy');

    Route::get('busqueda/pdfQR/{recepcion_documento}', 'RecepcionDocumentoController@pdfQR')->name('recepcion_documentos.pdfQR');

    Route::get('busqueda', 'RecepcionDocumentoController@busqueda')->name('recepcion_documentos.busqueda');

    Route::get('busqueda/getInfoBusqueda', 'RecepcionDocumentoController@getInfoBusqueda')->name('recepcion_documentos.getInfoBusqueda');
    
    // DERIVAR DOCUMENTOS
    Route::get('derivar_documentos', 'DerivarDocumentoController@index')->name('derivar_documentos.index');

    Route::get('derivar_documentos/create', 'DerivarDocumentoController@create')->name('derivar_documentos.create');

    Route::post('derivar_documentos/store', 'DerivarDocumentoController@store')->name('derivar_documentos.store');

    Route::get('derivar_documentos/edit/{derivar_documento}', 'DerivarDocumentoController@edit')->name('derivar_documentos.edit');

    Route::put('derivar_documentos/update/{derivar_documento}', 'DerivarDocumentoController@update')->name('derivar_documentos.update');

    Route::delete('derivar_documentos/destroy/{derivar_documento}', 'DerivarDocumentoController@destroy')->name('derivar_documentos.destroy');

    // DOCUMENTO ARCHIVOS
    Route::delete('documento_archivos/destroy/{archivo}', 'DocumentoArchivoController@destroy')->name('documento_archivos.destroy');

    Route::get('documento_archivos/descargar/{archivo}', 'DocumentoArchivoController@descargar')->name('documento_archivos.descargar');

    Route::get('documento_archivos/descargar_todo', 'DocumentoArchivoController@descargar_todo')->name('documento_archivos.descargar_todo');

    // DERIVACION ARCHIVOS
    Route::delete('derivacion_archivos/destroy/{archivo}', 'DerivacionArchivoController@destroy')->name('derivacion_archivos.destroy');

    Route::get('derivacion_archivos/descargar/{archivo}', 'DerivacionArchivoController@descargar')->name('derivacion_archivos.descargar');

    Route::get('derivacion_archivos/descargar_todo', 'DerivacionArchivoController@descargar_todo')->name('derivacion_archivos.descargar_todo');

    // DERIVAR DOCUMENTOS
    Route::get('salida_documentos', 'SalidaDocumentoController@index')->name('salida_documentos.index');

    Route::get('salida_documentos/create', 'SalidaDocumentoController@create')->name('salida_documentos.create');

    Route::post('salida_documentos/store', 'SalidaDocumentoController@store')->name('salida_documentos.store');

    Route::get('salida_documentos/edit/{salida_documento}', 'SalidaDocumentoController@edit')->name('salida_documentos.edit');

    Route::put('salida_documentos/update/{salida_documento}', 'SalidaDocumentoController@update')->name('salida_documentos.update');

    Route::delete('salida_documentos/destroy/{salida_documento}', 'SalidaDocumentoController@destroy')->name('salida_documentos.destroy');

    // RAZON SOCIAL
    Route::get('razon_social/index', 'RazonSocialController@index')->name('razon_social.index');

    Route::get('razon_social/edit/{razon_social}', 'RazonSocialController@edit')->name('razon_social.edit');

    Route::put('razon_social/update/{razon_social}', 'RazonSocialController@update')->name('razon_social.update');

    // REPORTES
    Route::get('reportes', 'ReporteController@index')->name('reportes.index');
    
    Route::get('reportes/usuarios', 'ReporteController@usuarios')->name('reportes.usuarios');
    
    Route::get('reportes/recepcion_documentos', 'ReporteController@recepcion_documentos')->name('reportes.recepcion_documentos');

    Route::get('reportes/seguimiento_documentos', 'ReporteController@seguimiento_documentos')->name('reportes.seguimiento_documentos');

    Route::get('reportes/cantidad_documentos', 'ReporteController@cantidad_documentos')->name('reportes.cantidad_documentos');
});
