<?php

use App\User;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// User Functions Apis
Route::get('users' , 'api\UserController@index' );
Route::get('users/{user}' , 'api\UserController@show');
Route::post('users' , 'api\UserController@store');
Route::put('users/{user}' , 'api\UserController@update');
Route::delete('users/{user}' , 'api\UserController@destroy');
// User Functions Apis

// Book Functions Apis
Route::get('books' , 'api\BookController@index');
Route::get('books/{book}' , 'api\BookController@show');
Route::post('books' , 'api\BookController@store');
Route::put('books/{book}' , 'api\BookController@update');
Route::delete('books/{book}' , 'api\BookController@destroy');

// Book Functions Apis

// Category Functions Apis

Route::get('categories' , 'api\CategoryController@index');
Route::get('categories/{category}' , 'api\CategoryController@show');
Route::post('categories' , 'api\CategoryController@store');
Route::put('categories/{category}' , 'api\CategoryController@update');
Route::delete('categories/{category}' , 'api\CategoryController@destroy');

// Category Functions Apis


// Comment Functions Apis

Route::get('comments' , 'api\CommentController@index');
Route::get('comments/{comment}' , 'api\CommentController@show');
Route::post('comments' , 'api\CommentController@store');
Route::put('comments/{comment}' , 'api\CommentController@update');
Route::delete('comments/{comment}' , 'api\CommentController@destroy');

// Comment Functions Apis
