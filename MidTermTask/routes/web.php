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

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verify');

Route::get('/user', 'DashboardController@index')->name('dashboard');

Route::get('/logout', 'LogoutController@index')->name('logout');
Route::get('/create', 'RegistrationController@index')->name('register');
Route::post('/create', 'RegistrationController@verify');