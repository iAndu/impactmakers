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
Auth::routes();

Route::get('/', function () {
    return view('index');
})->name('index');


Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/test', function () {
        return view('admin.main');
    });

    Route::get('/institution-types', 'InstitutionTypeController@index')->name('institution-types-index');
    Route::get('/institution-types/create', 'InstitutionTypeController@create')
    ->name('institution-types-create');
    Route::post('/institution-types/store', 'InstitutionTypeController@store')
    ->name('institution-types-store');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map', ['as'=>'map', 'uses'=>'MapController@index']);
