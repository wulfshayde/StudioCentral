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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
//    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
//    Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
//    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
//    Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
//    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
//    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
//    Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);

    Route::prefix('studios')->group(function(){
        Route::get('', ['as' => 'studios.list', 'uses' => 'StudioController@list']);
        Route::get('view/{id}',['as' => 'studios.view', 'uses' => 'StudioController@view']);
    });
    Route::prefix('projects')->group(function(){
        Route::get('', ['as' => 'projects.list', 'uses' => 'ProjectController@list']);
        Route::get('view/{id}',['as' => 'projects.view', 'uses' => 'ProjectController@view']);
    });
    Route::prefix('bands')->group(function(){
        Route::get('', ['as' => 'bands.list', 'uses' => 'BandController@list']);
        Route::get('view/{id}',['as' => 'bands.view', 'uses' => 'BandController@view']);
    });
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
