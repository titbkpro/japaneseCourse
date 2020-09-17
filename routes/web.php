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
Route::group(['prefix' => 'admin'], function () {
    Route::resource('single-course-management', 'Admin\SingleCourseManageController');
    Route::resource('combo-course-management', 'Admin\ComboCourseManageController');
    Route::resource('informations', 'Admin\InformationController');
    Route::resource('information-details', 'Admin\InformationDetailsController');
    Route::resource('contacts', 'Admin\ContactsController');
    Route::resource('student_contacts', 'Admin\StudentContactsController');
    Route::resource('news_categories', 'Admin\NewsCategoriesController');
    Route::resource('news_posts', 'Admin\NewsPostsController');
    Route::resource('payment_infos', 'Admin\PaymentInfosController');
});
