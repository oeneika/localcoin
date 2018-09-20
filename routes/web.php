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
Route::get('/myBuysTrade','TransactionsController@myBuys')->name('myBuysTrade');
Route::get('/createBuy','TransactionsController@createBuy')->name('createBuy');
Route::post('/storeBuy','TransactionsController@storeBuy')->name('storeBuy');

Route::get('/mySellsTrade','TransactionsController@mySells')->name('mySellsTrade');
Route::get('/createSell','TransactionsController@createSell')->name('createSell');
Route::post('/storeSell','TransactionsController@storeSell')->name('storeSell');

//Transactions on queue for aproval/Transacciones en espera de aprovacion
Route::get('/onHold','TransactionsController@onHold')->name('onHold')->middleware('role');
Route::put('/approvePayment/{id}','TransactionsController@approvePayment')->name('approvePayment');
Route::put('/approveReceipt/{id}','TransactionsController@approveReceipt')->name('approveReceipt');


Route::get('/completedTransactions','TransactionsController@completedTransactions')->name('completedTransactions');

//Route::delete('/delete/{id}','TransactionsController@destroy')->name('deleteTransaction');


Route::get('/buyTrade/{id}','TransactionsController@buy')->name('buy');
Route::put('/makeTransaction/{id}','TransactionsController@make')->name('makeTransaction');

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

#Exchange
Route::get('/exchange','ExchangeController@index')->name('exchange');

#Trade routes
Route::get('/trade','TradeController@index')->name('trade');
Route::get('/tradeProfile','ProfilesController@showProfileTrade')->name('tradeProfile');

#Messages routes
Route::get('/messagesBuy/{id}','MessagesController@buy')->name('messagesBuy')->middleware('belongs_to_transaction');
Route::get('/messagesSell/{id}','MessagesController@sell')->name('messagesSell')->middleware('belongs_to_transaction');;
Route::post('/sendMessage','MessagesController@send')->name('sendMessage');