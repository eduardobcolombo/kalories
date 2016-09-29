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
    return redirect()->route('login');
});

//
Route::group(['prefix'=>'admin', 'middleware'=>'auth.checkrole:admin', 'as'=>'admin.'],function() {

    Route::get('calories', ['as' => 'calories.index', 'uses' => 'CaloriesController@index']);
    Route::get('calories/create', ['as' => 'calories.create', 'uses' => 'CaloriesController@create']);
    Route::get('calories/edit/{id}', ['as' => 'calories.edit', 'uses' => 'CaloriesController@edit']);
    Route::post('calories/update/{id}', ['as' => 'calories.update', 'uses' => 'CaloriesController@update']);
    Route::post('calories/store', ['as' => 'calories.store', 'uses' => 'CaloriesController@store']);
    Route::get('calories/destroy/{id}', ['as' => 'calories.destroy', 'uses' => 'CaloriesController@destroy']);
    Route::post('calories', ['as' => 'calories.filter', 'uses' => 'CaloriesController@filter']);

});

Auth::routes();

Route::get('/home', function() {
    return redirect()->route('admin.calories.index');
});
