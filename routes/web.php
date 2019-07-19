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
    return view('auth.login');
});

Route::resource('projects', 'ProjectController');

//Calendario y Agendamiento
Route::resource('tasks', 'TasksController');

//Rubros
Route::resource('proyrubro', 'PlanRubroProyController');
Route::get('proyrubro/ajax/{state_id?}/cities', 'PlanRubroProyController@rubros');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('projects/{id}/informes', 'ReportController@index');
Route::get('projects/{id}/informes/create', 'ReportController@create');
Route::post('savereport', 'ReportController@store');
Route::get('projects/{id}/informes/{idvisita}', 'ReportController@show');

//Viviendas
Route::get('projects/{id}/informes/{idvisita}/{idvivienda}', 'ViviendaController@index');
Route::post('save_vivienda', 'ViviendaController@store')->name('save_vivienda');

//Fotos
Route::get('image-gallery', 'ImageGalleryController@index');
Route::post('image-gallery', 'ImageGalleryController@upload');
Route::delete('image-gallery/{id}', 'ImageGalleryController@destroy');
