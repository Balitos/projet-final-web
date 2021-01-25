<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/dashboard', 'DashboardController');
    Route::resource('/games', 'GamesController');
});

Route::namespace('Member')->prefix('member')->name('member.')->group(function(){
    Route::get('profil/indexCredit', 'ProfilController@indexCredit')->name('profil.indexCredit');
    Route::post('profil/updateCredit', 'ProfilController@updateCredit')->name('profil.updateCredit');
    Route::resource('/profil', 'ProfilController');
    Route::resource('/cart', 'CartController');


});

