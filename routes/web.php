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

Auth::routes();
Route::view('/', 'welcome');
Route::get('/home', 'ConversationsController@index')->name('home');

Route::get('/conversations','ConversationsController@index')->name('conversations');
Route::get('/conversations/{$id}','ConversationsController@show')->name('conversations.show');

//Route::get('/home', 'HomeController@index')->name('home');

// definition de notre  nouvelle route pour les droits de l'administrateur

Route::middleware('admin')->group	(function	()	{
    Route::name	('orphans.')->prefix('orphans')->group(function(){
                    Route::name	('index')->get	('/','AdminController@orphans');
                    Route::name	('destroy')->delete	('/','AdminController@destroy');

});

Route::middleware('admin')->group (function	()	{
    Route::name('maintenance.')->prefix('maintenance')->group(function(){
        Route::name('index')->get('/','AdminController@edit');
        Route::name('update')->put('/','AdminController@update');


     });
 });
});