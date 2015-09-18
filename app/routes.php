<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/event', 'CalendarEventController@getLocation');
Route::get('/event/create', 'CalendarEventController@create');
Route::get('/home', 'CalendarEventController@index');
Route::get('/', 'CalendarEventController@index');
Route::get('/event/{id?}', 'CalendarEventController@show');
Route::post('/event/store', 'CalendarEventController@store');
Route::delete('/event/{id?}/delete', 'CalendarEventController@destroy');

Route::get('/location', 'LocationController@getLocation');
Route::get('/home', 'LocationController@index');
Route::get('/location/create', 'LocationController@create');
Route::get('/location', 'LocationController@getLocation');
Route::post('/location/store', 'LocationController@store');


Route::post('/login' , 'HomeController@doLogin');
Route::post('/logout' , 'HomeController@doLogout');
Route::get('/event/list', 'HomeController@getEvent');
Route::get('/user/register' , 'HomeController@registerUser');
Route::post('/user/store' , 'HomeController@storeUser');




