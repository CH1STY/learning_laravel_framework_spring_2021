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
})->name('root');


Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verify');

Route::get('/user', 'DashboardController@index')->name('dashboard')->middleware('sess');

Route::get('/logout', 'LogoutController@index')->name('logout');
Route::get('/create', 'RegistrationController@index')->name('register');
Route::post('/create', 'RegistrationController@verify');
Route::group(['middleware'=>'adminSess'],function(){

    Route::get('/system/sales', 'SalesController@index')->name('sales');
    
    Route::get('/system/sales/physical_store', 'SalesController@physical')->name('sales.physical');
    Route::post('/system/sales/physical_store', 'SalesController@physicalVerify');
    
    Route::get('/system/sales/physical_store/sales_log', 'SalesController@physicalLogs')->name('sales.physical.logs');
    Route::post('/system/sales/physical_store/sales_log', 'SalesController@physicalLogsStore');
    Route::get('/system/sales/ecommerce_store', 'SalesController@ecommerce')->name('sales.ecommerce');
    Route::get('/system/sales/social_media_store', 'SalesController@social')->name('sales.social');
    
    Route::get('/system/sales/physical_store/sales_log/download/reportSold','SalesController@physicalLogsSold')->name('sales.physical.logs.download.sold');
    Route::get('/system/sales/physical_store/sales_log/download/reportPending','SalesController@physicalLogsPending')->name('sales.physical.logs.download.pending');

    Route::get('/system/product_management','ProductController@index')->name('product');

    Route::get('/system/product_management/existing_products','ProductController@existing')->name('product.existing');
    Route::get('/system/product_management/upcoming_products','ProductController@upcoming')->name('product.upcoming');
    Route::get('/system/product_management/add_product','ProductController@add')->name('product.adding');


});


