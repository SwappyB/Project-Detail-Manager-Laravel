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

Route::get('/','pagesController@index');

Route::get('addMember/{id}',"AddController@index")->name('addMember.index');
Route::get('addMember/{id}/add',"AddController@create");
Route::post('addMember/{id}/add',"AddController@store");
Route::get('addMember/{id}/{pid}',"AddController@edit")->name('addMember.edit');
Route::put('addMember/{id}/{pid}',"AddController@update")->name('addMember.update');
Route::delete('addMember/{id}/{pid}',"AddController@destroy")->name('addMember.destroy');

Route::resource('project', 'projectsController');

Route::resource('customer', 'CustomersController');

Route::resource('member', 'MembersController');

// Route::resource('report', 'ReportsController');
Route::get('report',"ReportsController@index")->name('report.index');
Route::post('report/view',"ReportsController@view")->name('report.view');
// Route::get('report/view',"ReportsController@view")->name('report.view');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
