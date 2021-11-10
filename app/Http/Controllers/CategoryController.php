<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public  function show(Category $category){
        return view('home' , [
            'books' => $category->books()->get(),
            'categories' => Category::all()
        ]);
    }
}
