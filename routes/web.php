<?php

use Illuminate\Support\Facades\Route;
use App\Courses;

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
])->middleware('guest');

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

    Route::get('class/{code}', [
        'uses' => 'CoursesController@index',
        'as' => 'course_view'
    ]);

    Route::get('create', [
        'uses' => 'HomeController@create_class',
        'as' => 'create_class'
    ]);

    Route::post('create', [
        'uses' => 'CoursesController@create',
        'as' => 'course_create'
    ]);

    Route::post('join', [
        'uses' => 'CoursesController@join',
        'as' => 'course_join'
    ]);

    Route::post('chapter', [
        'uses' => 'ChaptersController@create',
        'as' => 'chapter_add'
    ]);

    Route::post('chapter/complete', [
        'uses' => 'ChaptersController@complete',
        'as' => 'chapter_complete'
    ]);

    Route::post('material', [
        'uses' => 'MaterialController@upload',
        'as' => 'material_upload'
    ]);
});