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


Auth::routes();
// Route::get('/', function () {       //// login get
//     return view('auth.login');
// });
Route::get('/', function () {       //// login get
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');      // after login - dashboard
Route::get('logout', 'Auth\LoginController@logout');            // logout

// Route::resource('books', 'BookController')->middleware('auth');
Route::resource('books', 'BookController');
Route::resource('memberRegistrations', 'MemberRegistrationController');
Route::resource('memberDefaults', 'MemberDefaultsController');
Route::resource('issue', 'IssueController');

Route::get('issue-checkAccessionNo', 'IssueController@checkAccessionNo');
Route::get('issue-checkRegistrationNo', 'IssueController@checkRegistrationNo');