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
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/test', function () {
        return view('admin.main');
    });

    Route::get('/institutions', [
        'uses' => 'InstitutionsController@index',
        'as' => 'institutions.index'
    ]);

    Route::post('/institutions/{institution}', [
        'uses' => 'InstitutionsController@update',
        'as' => 'institutions.update'
    ]);

});


Route::get('/home', 'HomeController@index')->name('home');
