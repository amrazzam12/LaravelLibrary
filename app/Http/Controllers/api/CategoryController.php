<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return Category::all();
    }

    public function show(Category $category){
        return $category;
    }


    public function store(Request $request){
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return $category;
    }

    public function update(Request $request , Category $category){

        $category->name = $request->name;

        $category->save();

        return $category;
    }


    public function destroy(Category $category){
        $category->delete();
        return Category::all();
    }
}
