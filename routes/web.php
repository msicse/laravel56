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

Route::get('/', 'HomeController@index')->name('home');
Route::post('contacts', 'HomeController@sendMessage')->name('contacts.sendmessage');
Route::post('reserved', 'ReserveController@postReserved')->name('reserved');

Auth::routes();


Route::group(['prefix' => 'admin','middleware' => 'auth','namespace' => 'admin' ],function () {
	Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
	Route::resource('slider','SliderController');
	Route::resource('categories','CategoriesController');
	Route::resource('items','ItemsController');
	Route::get('reservations','ReservationController@index')->name('reservation.index');
	Route::post('reservation/{id}','ReservationController@postStatus')->name('reservation.status');
	Route::post('reservations/{id}','ReservationController@destroy')->name('reservation.destroy');
	Route::get('contacts','ContactController@index')->name('contacts.index');
	Route::get('contacts/{id}','ContactController@view')->name('contacts.view');
	Route::post('contacts/{id}','ContactController@destroy')->name('contacts.destroy');
});