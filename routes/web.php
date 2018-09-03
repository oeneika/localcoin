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

Route::get('/usuarios','UsersController@showUsuarios')->name('usuarios');

Route::get('/mySells','TransactionsController@mySells')->name('mySells');
Route::get('/createSell','TransactionsController@createSell')->name('createSell');
Route::post('/storeSell','TransactionsController@storeSell')->name('storeSell');
Route::put('/updateSell','TransactionsController@updateSell')->name('updateSell');

Route::get('/completedTransactions','TransactionsController@completedTransactions')->name('completedTransactions');

Route::delete('/delete/{id}','TransactionsController@destroy')->name('deleteTransaction');

Route::put('/makeTransaction','TransactionsController@make')->name('makeTransaction');

#Profile route
Route::get('myProfile','ProfilesController@show')->name('myProfile');
Route::put('editUser/{id}','ProfilesController@edit')->name('editUser');

#Bank Accounts Routes
Route::post('storeBankAccount','BankAccountsController@store')->name('storeBankAccount');
Route::delete('/deleteBankAccount/{id}','BankAccountsController@destroy')->name('deleteBankAccount');

#User detail
Route::get('/showUser/{id}','UsersController@show')->name('showUser');