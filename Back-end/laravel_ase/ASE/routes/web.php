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
    return view('welcome');
});
Route::get('/home', [
    'uses' => 'HomeConroller@homeView'
]);
Auth::routes();

Route::get('/grouppage/{id}', 'HomeController@index');
Route::resource('groups', 'GroupController');
Route::resource('conversations', 'ConversationController');
Route::resource('announcement', 'announcementController');

Route::get('/group/join/{id}', 'GroupJoinController@join');