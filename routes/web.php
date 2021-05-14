<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace'=>'Admin\Modules','middleware' => 'auth'],function(){
	Route::get('dashboard','Dashboard\DeshboardController@index')->name('admin.dashboard');

	// Company Routs...
	Route::get('mnage-company','Company\CompanyController@index')->name('manage.company');
	Route::get('add-company','Company\CompanyController@create')->name('add.company');
	Route::post('store-company','Company\CompanyController@store')->name('store.company');
	Route::get('edit-company/{id?}','Company\CompanyController@edit')->name('edit.company');
	Route::get('delete-company/{id?}','Company\CompanyController@destroy')->name('delete.company');

	// Employee Routs..
	Route::get('mnage-employee','Employee\EmployeeController@index')->name('manage.employee');
	Route::get('add-employee','Employee\EmployeeController@create')->name('add.employee');
	Route::post('store-employee','Employee\EmployeeController@store')->name('store.employee');
	Route::get('edit-employee/{id?}','Employee\EmployeeController@edit')->name('edit.employee');
	Route::get('delete-employee/{id?}','Employee\EmployeeController@destroy')->name('delete.employee');
});

 