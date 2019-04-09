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
Route::resource('/endroit','EndroitsController');
Route::get('upload','MenusController@index');

Route::resource('/menu','MenusController');
Route::get('/import_excel', 'ImportsExcelController@index');
Route::post('/import_excel/import', 'ImportsExcelController@import');
route::get('/categorie',function(){
    return view('');
});
Route::get('importExportView', 'ImportsController@importExportView');
route::resource('/categories','CategoriesController');
route::resource('/partenaire','PartenairesController');
Route::post('import', 'ImportsController@import')->name('import');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
