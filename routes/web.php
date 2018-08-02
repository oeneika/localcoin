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
    return view('auth.login');
});

Route::get('/register','Auth.RegisterController@vista');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

#Transaction routes/Rutas de Transacciones
Route::get('/createBuy','TransactionsController@createBuy')->name('createBuy');
Route::post('/storeBuy','TransactionsController@storeBuy')->name('storeBuy');

Route::get('/createSell','TransactionsController@createSell')->name('createSell');
Route::post('/storeSell','TransactionsController@storeSell')->name('storeSell');
