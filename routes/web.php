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

Auth::routes();//これなんだ

// Route::group(['prefix' => 'interviewee'], function() {
//   Route::get('login', 'Interviewee\Auth\LoginController@showLoginForm')->name('interviewee.login');
//   Route::post('login', 'Interviewee\Auth\LoginController@login')->name('interviewee.login');
//   Route::get('logout', 'Interviewee\Auth\LoginController@logout')->name('interviewee.logout');
  
//   Route::get('register', 'Interviewee\Auth\RegisterController@showRegisterForm')->name('interviewee.register');
//   Route::post('register', 'Interviewee\Auth\RegisterController@register')->name('interviewee.register');
 
//   Route::get('home', 'Interviewee\HomeController@index')->name('interviewee.home');
// });

// Route::group(['prefix' => 'interviewee','middleware' => 'auth:interviewee'], function() {
//   Route::get('logout', 'Interviewee\Auth\LoginController@logout')->name('interviewee.logout');
//   Route::get('home', 'Interviewee\HomeController@index')->name('interviewee.home');
// });

// Route::group(['prefix' => 'interviewee','middleware' => 'guest:interviewee'], function() {
//   Route::get('login', 'Interviewee\Auth\LoginController@showLoginForm')->name('interviewee.login');
//   Route::post('login', 'Interviewee\Auth\LoginController@login')->name('interviewee.login');
//   Route::get('register', 'Interviewee\Auth\RegisterController@showRegisterForm')->name('interviewee.register');
//   Route::post('register', 'Interviewee\Auth\RegisterController@register')->name('interviewee.register');
// });

// Route::group(['middleware' => 'guest'], function() {
//   Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//   Route::post('login', 'Auth\LoginController@login')->name('login');
//   Route::get('register', 'Auth\RegisterController@showRegisterForm')->name('register');
//   Route::post('register', 'Auth\RegisterController@register')->name('register');
// });

// Route::group(['middleware' => 'auth:users'], function() {
  
// });
Route::resource('users', 'CorpsController');
Route::resource('corps', 'CorpsController');

Route::get('/home', 'HomeController@index')->name('home');
