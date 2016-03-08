<?php
use Illuminate\Support\Facades\Input;
/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('index');
});

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['prefix'=>'employees'], function() {

    Route::get('index', 'Employees@index');

    Route::post('store', 'Employees@store');

    Route::post('delete/{id}', 'Employees@destroy');

    Route::post('edit/{id}', 'Employees@show');

    Route::post('update/{id}', 'Employees@update');
});
