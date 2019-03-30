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
route::resource('/endroit','EndroitsController');
route::get('upload','MenusController@index');
route::post('upload','MenusController@store');
route::resource('/menu','MenusController');
Route::get('/import_excel', 'ImportsExcelController@index');
Route::post('/import_excel/import', 'ImportsExcelController@import');
route::get('/categorie',function(){
    return view('');
});
Route::get('importExportView', 'ImportsController@importExportView');

Route::post('import', 'ImportsController@import')->name('import');