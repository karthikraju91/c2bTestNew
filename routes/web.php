<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckRole;

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

Route::get('customers/list', 'CustomerController@index')->name('customers_list')->middleware(CheckRole::class);

Route::get('videos/list', 'VideoController@index')->name('video_list')->middleware(CheckRole::class);

Route::get('videos/add', 'VideoController@add')->name('video_add')->middleware(CheckRole::class);

Route::post('videos/save_data', 'VideoController@save_data')->name('video_save')->middleware(CheckRole::class);

Route::post('videos/edit_data', 'VideoController@edit_data')->name('video_edit')->middleware(CheckRole::class);

Route::get('videos/edit/{id}', 'VideoController@edit')->name('video_edit')->middleware(CheckRole::class);

Route::get('videos/delete/{id}', 'VideoController@delete')->name('video_delete')->middleware(CheckRole::class);

Route::get('videos/view/{id}', 'VideoController@show')->name('video_show')->middleware(CheckRole::class);

Route::get('users/video_list', 'VideoController@user_show')->name('user_video_show');

Route::get('users/view/{id}', 'VideoController@user_view')->name('user_view');

Route::get("video/wmark","VideoController@setWaterMark");

