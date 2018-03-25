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

Route::get('/', 'WelcomeController@index');

Route::get('/creategroup', function () {
    return view('creategroup');
});

Route::post('/creategroup', "CreateGroupController@index");

Route::get('/home', [
    'uses' => 'HomeController@homeView'
]);
Auth::routes();

Route::get('/grouppage/{id}', 'HomeController@index');
Route::resource('groups', 'GroupController');
Route::resource('conversations', 'ConversationController');
Route::resource('announcement', 'announcementController');

Route::get('/group/join/{id}', 'GroupJoinController@join');
Route::get('/search', 'GroupSearchController@index');
Route::post('/search', 'GroupSearchController@post');