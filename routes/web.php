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
Route::get('/', 'EmployeeController@index');
Route::get('/employees/all', 'EmployeeController@getAll');
Route::get('/employees/{id}', 'EmployeeController@getSubordinatesByManagerId');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/main', 'EmployeeController@main');
    Route::get('/detailed-with-hierarchy', 'EmployeeController@detailedWithHierarchy');
});
