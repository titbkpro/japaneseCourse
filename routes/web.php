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

Route::get('/', 'HomeController@index')->name('index');

Route::get('/course', 'User\CourseController@course')->name('course');
Route::get('/single-course', 'User\CourseController@singleCourse')->name('single-course');
Route::get('/combo-course', 'User\CourseController@comboCourse')->name('combo-course');
Route::get('/news', 'User\NewsPostsController@news')->name('news');
Route::get('/feedbacks', 'User\FeedbacksController@feedback')->name('opinion');
Route::get('/contact', 'User\ContactsController@contact')->name('contact');
Route::post('/contact', 'User\ContactsController@storeContact')->name('contact_store');
Route::get('/support', 'User\SupportsController@support')->name('support');

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::resource('single-course-management', 'Admin\SingleCourseManageController');
    Route::resource('combo-course-management', 'Admin\ComboCourseManageController');

    Route::post('unit-management/import-unit', 'Admin\UnitManageController@import')->name('unit-management.import');
    Route::resource('unit-management', 'Admin\UnitManageController');

    Route::resource('lesson-management', 'Admin\LessonManageController');
    Route::get('/exercise-management/lesson/{lesson_id}', 'Admin\ExerciseManageController@exercise')->name('exercise-management.exercise');
    Route::resource('exercise-management', 'Admin\ExerciseManageController');

    Route::get('/question-management/exercise/{exercise_id}', 'Admin\QuestionManageController@question')->name('question-management.question');
    Route::resource('question-management', 'Admin\QuestionManageController');

    Route::get('/answer-management/question/{question_id}', 'Admin\AnswerManageController@answer')->name('answer-management.answer');
    Route::resource('answer-management', 'Admin\AnswerManageController');

    Route::resource('informations', 'Admin\InformationController');
    Route::resource('information-details', 'Admin\InformationDetailsController');
    Route::resource('contacts', 'Admin\ContactsController');
    Route::resource('student_contacts', 'Admin\StudentContactsController');
    Route::resource('news_categories', 'Admin\NewsCategoriesController');
    Route::resource('news_posts', 'Admin\NewsPostsController');
    Route::resource('payment_infos', 'Admin\PaymentInfosController');
    Route::resource('feedbacks', 'Admin\FeedbacksController');
});
