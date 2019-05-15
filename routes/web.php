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



// Migrate to home controller later
Route::get('/', 'TopicsController@index')->name('home'); 

//Topics
Route::resource('topics','TopicsController')->except([
    'show'
]);
Route::get('/topic/{topic}/{slug}', 'TopicsController@show')->name('show-topic');

// Threads
Route::resource('threads','ThreadController')->except([
    'show', 'create', 'store'
]);
Route::get('/{topic}/{slug}/create-thread', 'ThreadController@create')->name('create-thread');
Route::get('/{topic}/{slug}/{thread}/{threadslug}', 'ThreadController@show')->name('show-thread');
Route::put('/{topic}', 'ThreadController@store');

//Comments
Route::post('/comment/{thread}', 'CommentController@store');

// Auth and Dashboard
Auth::routes();
Route::get('/dashboard', 'DashboardController@index');
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('profile', function ()    {
        // Matches The "/dashboard/profile" URL
    });
});