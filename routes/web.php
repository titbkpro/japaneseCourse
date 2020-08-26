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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/course', 'CourseController@course')->name('course');
Route::get('/news', 'NavigationController@news')->name('news');
Route::get('/opinion', 'NavigationController@opinion')->name('opinion');
Route::get('/contact', 'NavigationController@contact')->name('contact');
Route::get('/support', 'NavigationController@support')->name('support');

// Admin
Route::get('/course-manage', 'Admin\CourseManageController@courseManage')->name('courseManage');
