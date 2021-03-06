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

Route::get('/wel', function () {
    return view('welcome');
});
//testing git

Auth::routes();

Route::get('/', 'HomeController@index');
Route::resource('/companies', 'CompanyController');
Route::resource('/employees', 'EmployeesController');
Route::get('/comp_delete/{id}', 'CompanyController@destroy')->name('comp_delete');
Route::get('/emp_delete/{id}', 'EmployeesController@destroy')->name('emp_delete');
// Route::Post('/companies/update/{$id}', 'CompanyController@update')->name('update');
//Route for companies import export file .................
Route::get('export', 'HomeController@export')->name('exp');
Route::post('import', 'HomeController@import')->name('emp');

//Route for Employies import export file .................
Route::get('empExport', 'EmployeesController@export')->name('empExport');
Route::post('empImport', 'EmployeesController@import')->name('empImport');


Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');


});


