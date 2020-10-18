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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','FrontendController@home')->name('homepage');
Route::get('contact','ContactController@contact')->name('contactpage');
Route::get('course', 'FrontendController@course')->name('coursepage');

// For CourseDetail
Route::get('coursedetail/{id}', 'FrontendController@coursedetail')->name('coursedetailpage');
Route::get('courseview/{id}', 'FrontendController@courseview')->name('courseviewpage');

// For Enroll
Route::get('courseenroll/{id}', 'EnrollmentController@courseenroll')->name('courseenroll');

// Lecturer
Route::get('signup', 'FrontendController@signup')->name('signuppage');
Route::post('signup', 'FrontendController@createLecturer')->name('createLecturer');
Route::get('signin', 'FrontendController@signin')->name('signinpage');
Route::post('signin', 'FrontendController@loginLecturer')->name('signinpage');
// Route::get('dashboard', 'BackendController@dashboard')->name('dashboard');
Route::get('/files/{id}','FrontendController@show');
Route::get('/file/{id}','FrontendController@showvideo');
// For Enroll
Route::post('enrollment','EnrollmentController@store')->name('enrollment.store');
// Admin
Route::middleware(['auth','role:lecturer'])->group(function () {
	Route::get('dashboard', 'BackendController@dashboard')->name('dashboard');
	Route::resource('universities','UniversityController');
	Route::resource('majors','MajorController');
	Route::resource('subjects','SubjectController');
	Route::resource('courses','CourseController');
	Route::resource('coursedetails','CourseDetailController');
	Route::get('getSubjects/{id}','BackendController@getSubjects')->name('getSubjects');
	Route::get('getWeeks/{id}','BackendController@getWeeks')->name('getWeeks');

});

Auth::routes(); // login, register

Route::get('/home', 'HomeController@index')->name('home');