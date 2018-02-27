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

//Auth Routes
Route::get('auth/login',['as'=>'login','uses'=>'Auth\LoginController@showLoginForm']);
Route::post('auth/login','Auth\LoginController@login');
Route::get('auth/logout',['as'=>'logout','uses'=>'Auth\LoginController@logout']);


//Registration Routes
Route::get('auth/register','Auth\RegisterController@showRegistrationForm');
Route::post('auth/register','Auth\RegisterController@register');

//Password Reset Routes
Route::get('password/reset','Auth\ResetPasswordController@showResetForm');//
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm');
Route::post('password/reset','Auth\ResetPasswordController@reset');

Route::resource('categories','CategoryController',['except' =>['create']]);

Route::resource('timelasts','TimelastController',['except' =>['create']]);



Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle']);
//Route::get('blog/{slug}','BlogController@getSingle');
Route::get('blog',['uses' => 'BlogController@getIndex','as' =>'blog.Index']);
Route::get('contact','PagesController@getContact');

Route::post('contact','PagesController@postContact');

Route::get('/about', 'PagesController@getAbout');
Route::get('/','PagesController@getIndex');
//Route::any('/index', 'PagesController@index');
Route::get('blog',array('uses'=>'BlogController@getIndex','as'=>'blog.index'));
//
//Route::any('posts/add', 'PostController@add');
Route::resource('posts', 'PostController');
//Route::get('/deric', function () {
//    return view('startbootstrap-clean-blog-gh-pages/about');
//});

//Route::get('/contact', function () {
//    return view('contact');
//});



