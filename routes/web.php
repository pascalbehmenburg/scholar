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

Route::get('/home', 'HomeController@home');
Route::get('/', 'HomeController@index');
Route::group(['middleware' => ['auth']], static function() {
    Route::get('logout', 'Auth\LoginController@logout');
    Route::resource('profile', 'ProfileController');
    Route::group(['middleware' => ['permission:user-email']], static function() {Route::post('/profile/email', 'ProfileController@email');});
    Route::group(['middleware' => ['permission:user-password']], static function() {Route::post('/profile/password', 'ProfileController@password');});
    Route::group(['middleware' => ['permission:user-edit']], static function() {Route::post('/profile/edit', 'ProfileController@edit');});
    Route::group(['middleware' => ['permission:user-administrate']], static function() {Route::get('/users', 'UsersController@index');});
    Route::group(['middleware' => ['permission:user-administrate']], static function() {Route::get('/users/data', 'UsersController@anyData');});

    Route::get('schedule/{scheduleId}', 'ScheduleController@index');
    Route::get('replacement-schedule', 'ReplacementScheduleController@index');
    Route::group(['middleware' => ['permission:schedule-update']], static function(){Route::post('schedule/update', 'ScheduleController@update');});
    Route::group(['middleware' => ['permission:replacement-schedule-update']], static function(){Route::post('replacement-schedule/update', 'ReplacementScheduleController@update');});
});