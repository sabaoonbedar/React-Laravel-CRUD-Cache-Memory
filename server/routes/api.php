<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//route to the EmployeeController index function
//names are for the purpose if you want to use laravel builtin views
Route::get('/list','EmployeeController@index')->name('index');
Route::post('/employeeRegister','EmployeeController@create')->name('employee.create');
Route::DELETE('/delete/{id}','EmployeeController@destroy')->name('employee.delete');
Route::PUT('/update/{id}','EmployeeController@update')->name('employee.update');



