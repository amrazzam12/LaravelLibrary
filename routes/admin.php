
<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;


Route::group(['roles' => 'admin'] , function () {
// GET The Dashboard Home
Route::get('/' , 'AdminBooksController@index');

// GET Users Controllers
Route::resource('users' , 'AdminUsersController');

// GET Categories Controllers
Route::resource('categories' , 'AdminCategoriesController');

// GET Books Controller
Route::resource('books' , 'AdminBooksController');
});



