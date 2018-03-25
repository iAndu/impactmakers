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

Route::get('/', ['as'=>'index', 'uses'=>'HomeController@index']);

Route::post('/feedbacks', [
    'uses' => 'FeedbacksController@store',
    'as' => 'feedbacks.store'
]);

Route::get('/feedbacks', [
    'uses' => 'FeedbacksController@index',
    'as' => 'feedbacks.index'
]);

Route::get('/getInstitutions', [
    'uses' => 'InstitutionsController@getInstitutions',
    'as' => 'institutions.getInstitutions'
]);

Route::post('/institutions/rate/{institution}', [
    'uses' => 'InstitutionsController@rate',
    'as' => 'institutions.rate'
]);

Route::post('/institutions', [
    'uses' => 'InstitutionsController@store',
    'as' => 'institutions.store'
]);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/admin/institutions', [
        'uses' => 'InstitutionsController@index',
        'as' => 'institutions.index'
    ]);

    Route::put('/institutions/{institution}', [
        'uses' => 'InstitutionsController@update',
        'as' => 'institutions.update'
    ]);

    Route::put('/institutions/change-status/{institution}', [
        'uses' => 'InstitutionsController@changeStatus',
        'as' => 'institutions.changeStatus'
    ]);

    Route::delete('/instiutions/{institution}', [
        'uses' => 'InstitutionsController@delete',
        'as' => 'institutions.delete'
    ]);

    Route::get('/admin/institution-types', 'InstitutionTypeController@index')->name('institution-types-index');
    Route::get('/institution-types/create', 'InstitutionTypeController@create')
    ->name('institution-types-create');
    Route::post('/institution-types/store', 'InstitutionTypeController@store')
    ->name('institution-types-store');
    Route::get('/institution-types/{id}/delete', 'InstitutionTypeController@delete');

});


//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map', ['as'=>'map', 'uses'=>'MapController@index']);
