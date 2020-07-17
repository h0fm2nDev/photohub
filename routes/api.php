<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//auth

Route::post('/auth/login', 'LoginController');
Route::post('/auth/register/{town}', 'RegisterController');

//users

Route::get('/users', 'GetUsersController');

//portfolio

Route::get('/portfolio', 'PortfolioController@index');
Route::get('/portfolio/{portfolio}', 'PortfolioController@show');
Route::post('/portfolio', 'PortfolioController@store');

//category

Route::get('/category', 'CategoryController@index');
Route::post('/category', 'CategoryController@store');

//project

Route::post('/project', 'ProjectController@index');
Route::post('/project/{category}/{portfolio}', 'ProjectController@store');

//towns

Route::get('/town', 'TownController@index');
Route::post('/town', 'TownController@store');
Route::delete('/town/{town}', 'TownController@destroy');

//ads

Route::get('/ad', 'AdController@index');
Route::post('/ad/{category}', 'AdController@store');
Route::get('/ad/{id}', 'AdController@show');
Route::patch('/ad/{id}', 'AdController@update');
Route::delete('/ad/{ad}', 'AdController@destroy');

//comments

Route::get('/comments', 'CommentController@index');
Route::post('/comments/{ad}', 'CommentController@store');

//follow and unfollow

Route::post('/follow/{user}', 'FollowController@followUser');
Route::get('/followers', 'FollowController@followersCount');
Route::get('/following', 'FollowController@followingCount');

//search

Route::post('/search', 'SearchController');

//gallery
Route::post('/gallery', 'GalleryController@store');



