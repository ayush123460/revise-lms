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

Route::get('/', [
    'uses' => 'PagesController@index',
    'as' => 'login'
]);

Route::get('login', [
    'uses' => 'PagesController@login',
    'as' => 'doLogin'
]);

Route::get('logout', [
    'uses' => 'PagesController@logout',
    'as' => 'logout'
])->middleware('auth');

Route::get('auth/callback', [
    'uses' => 'PagesController@callback',
    'as' => 'callback'
]);

Route::middleware('auth')->get('home', [
    'uses' => 'HomeController@index',
    'as' => 'auth_home'
]);

Route::prefix('/classes')->middleware('auth')->group(function() {
    Route::get('create', [
        'uses' => 'HomeController@create_class',
        'as' => 'create_class'
    ]);

    Route::post('create', [
        'uses' => 'CoursesController@create',
        'as' => 'course_create'
    ]);
});