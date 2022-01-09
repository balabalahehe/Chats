<?php

use Illuminate\Support\Facades\Route;

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
    return view('Chats.loginRegister');
});
// Đăng kí và đăng nhập và đăng xuất 
Route::post('/register', 'UserController@register')->name('clientRegister');
Route::post('/login', 'UserController@login')->name('clientLogin');
Route::get('/logout', 'UserController@logout');

// Xác nhận mail đăng kí  
Route::get('/confirm/{hash}', 'UserController@confirm');
Route::get('/confirmed', 'sendMailController@viewConfirmed')->name('confirmed');

// Chat 
Route::get('/chat', 'ChatController@index')->name('viewChat');
Route::post('/chat', 'ChatController@createChat'); 
// Route::get('/view', 'ChatController@views');
Route::get('/load', 'ChatController@load');



