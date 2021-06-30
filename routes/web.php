<?php

use App\Http\Controllers\HpController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','HpController@index')->name('hp.index');
Route::get('/hp/create','HpController@create')->name('hp.create');
Route::post('/hp/store','HpController@store')->name('hp.store');
Route::delete('/hp/{id}','HpController@destroy')->name('hp.destroy');
Route::get('/hp/{id}/edit','HpController@edit')->name('hp.edit');
Route::put('/hp/{id}','HpController@update')->name('hp.update');
Route::get('/cetak','HpController@cetak')->name('hp.cetak');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
