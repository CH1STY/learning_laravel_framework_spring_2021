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
    //return view('welcome');
    echo "welcome";
});


Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@verify');
Route::get('/logout', 'LogoutController@index');


Route::group(['middleware'=>'sess'],function(){

    Route::get('/home', 'HomeController@index')->middleware('sess');
    Route::get('/home/userlist', 'HomeController@userlist');
    
    Route::group(['middleware'=>'typeCheck'],function()
    {
        
        Route::get('/home/create', 'HomeController@create');
        Route::post('/home/create', 'HomeController@store');
        Route::get('/home/edit/{id}', 'HomeController@edit');
        Route::post('/home/edit/{id}', 'HomeController@update');
        Route::get('/home/delete/{id}', 'HomeController@delete');
        Route::post('/home/delete/{id}', 'HomeController@destroy');
    });


});

