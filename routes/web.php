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

Route::get('/', 'HomeController@index');

Route::get('/register','Auth.RegisterController@vista');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

#Transaction routes/Rutas de Transacciones
Route::get('/myBuys','TransactionsController@myBuys')->name('myBuys');
Route::get('/createBuy','TransactionsController@createBuy')->name('createBuy');
Route::post('/storeBuy','TransactionsController@storeBuy')->name('storeBuy');
Route::put('/updateBuy','TransactionsController@updateBuy')->name('updateBuy');


Route::get('/mySells','TransactionsController@mySells')->name('mySells');
Route::get('/createSell','TransactionsController@createSell')->name('createSell');
Route::post('/storeSell','TransactionsController@storeSell')->name('storeSell');
Route::put('/updateSell','TransactionsController@updateSell')->name('updateSell');

//Transactions on queue for aproval/Transacciones en espera de aprovacion
Route::get('/onHold','TransactionsController@onHold')->name('onHold')->middleware('role');
Route::put('/approveTrasaction/{id}','TransactionsController@approveTransaction')->name('approveTransaction');


Route::get('/completedTransactions','TransactionsController@completedTransactions')->name('completedTransactions');

//Route::delete('/delete/{id}','TransactionsController@destroy')->name('deleteTransaction');

Route::put('/makeTransaction','TransactionsController@make')->name('makeTransaction');

#Profile route
Route::get('myProfile','ProfilesController@show')->name('myProfile');
Route::put('editUser/{id}','ProfilesController@edit')->name('editUser');

#Bank Accounts Routes
Route::post('storeBankAccount','BankAccountsController@store')->name('storeBankAccount');
Route::delete('/deleteBankAccount/{id}','BankAccountsController@destroy')->name('deleteBankAccount');

#Wallet Routes
Route::post('storeWallet','WalletController@store')->name('storeWallet');

#Users

//User detail/Detalles de usuarios
Route::get('/showUser/{id}','UsersController@show')->name('showUser');

//List of users/Listado de usuarios
Route::get('/users','UsersController@showUsers')->name('showUsers')->middleware('role');

//Rank an user reputation/Puntuar la reputacion de un usuario
Route::post('/rank','UsersController@rank')->name('rankUser');