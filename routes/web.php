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

// Password Routes
Route::get('/password/email', 'PasswordController@index');
Route::post('/password/email', 'PasswordController@checkAndSendToken');
Route::get('/password/email/resend', 'PasswordController@resendResetLink');
Route::get('/password/verifyToken', 'PasswordController@verifyToken');
Route::get('/password/reset', 'PasswordController@viewResetForm');
Route::post('/password/reset', 'PasswordController@reset');

// Validate and check links

Route::get('/url', 'Controller@url')->name('url');

// News Route
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('index');

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/sports', 'HomeController@sports')->name('sports');

Route::get('/tech', 'HomeController@tech')->name('tech');

Route::get('/contact', function () {
    return view('news.contact');
})->name('contact');

Route::get('/business', 'HomeController@business')->name('business');

Route::get('/gist', 'HomeController@gist')->name('gist');

Route::get('/entertainment', 'HomeController@entertainment')->name('entertainment');

Route::get('/campus', 'HomeController@campus')->name('campus');


Route::get('/classifieds', function () { 
    // return view('news.classifieds');
    return view('admin.special.link');
})->name('classifieds');

Route::get('/politics', 'HomeController@politics')->name('politics');

Route::get('/blogs', 'HomeController@blogs')->name('blogs');


Route::get('/single', function () {
    // return view('news.single');
    return view('admin.special.link');
})->name('single');


// Subscribe Route
Route::get('/subscribe', 'ProfileController@subscribe');

// Search Routes
Route::get('/search', 'HomeController@search')->name('search');

// Profile Routes
Route::middleware('auth')->get('/profile/{id}/edit', 'ProfileController@edit');
Route::middleware('auth')->get('/profile/{id}/follow', 'ProfileController@follow');
Route::middleware('auth')->patch('/profile/edit/picture', 'ProfileController@storeAvatar');
Route::middleware('auth')->patch('/profile/edit', 'ProfileController@updateInfo');
Route::middleware('auth')->get('/profile/edit/username/{temp?}', 'ProfileController@updateUsername');
Route::get('/profile/{id}','ProfileController@index');

Route::middleware('auth')->get('/notification', 'NotificationController@index')->name('notification');
Route::middleware('auth')->get('/notification/{id}/mark', 'NotificationController@mark');
Route::middleware('auth')->get('/notification/{id}/ajaxMark', 'NotificationController@ajaxMark');

// Posts Routes
Route::middleware('admin')->get('/post/new', 'PostController@index');
Route::middleware('admin')->post('/post/store', 'PostController@store');
Route::middleware('auth')->get('/post/{id}/like', 'PostController@likePost');
Route::middleware('admin')->get('/post/{id}/edit', 'PostController@viewUpdate');
Route::middleware('admin')->get('/post/{id}/delete', 'PostController@delete');
Route::middleware('admin')->patch('/post/{id}/edit', 'PostController@update');

// About Us
Route::middleware('admin')->get('/about/edit', 'HomeController@editAbout');
Route::middleware('admin')->post('/about/store', 'HomeController@storeAbout');


// Admins
Route::middleware('superadmin')->get('/admin', 'ProfileController@admin');
Route::middleware('superadmin')->get('/admin/action/{id}', 'ProfileController@actionAdmin');
Route::middleware('superadmin')->get('/admin/{id}', 'ProfileController@fetchAdmin');



// Comments Routes
Route::middleware('auth')->post('/comment/{id}', 'CommentController@store');
Route::middleware('auth')->get('/comment/{id}/delete', 'CommentController@delete');


// View Post Custom Route 
Route::get('/{custom_id}', 'PostController@show');