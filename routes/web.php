<?php

use App\Http\Controllers\BooksController;
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
    return view('home' , [
        'categories' => \App\Category::all(),
        'books' => \App\Book::all()
    ]);
})->name('home');

Auth::routes();




Route::get('books/create' , 'BooksController@create');
Route::post('books' , 'BooksController@store');
Route::get('books/{id}' , 'BooksController@show');
Route::post('books/comments/store' , 'CommentsController@storecomment');
Route::get('categories/{category:name}' , 'CategoryController@show');

