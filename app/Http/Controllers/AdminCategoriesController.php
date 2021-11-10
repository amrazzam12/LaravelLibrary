<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminCategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index' , [
            'categories' => $categories
        ]);
    }


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required' , Rule::unique('categories' , 'name')]
        ] , [
            'name.unique' => 'Category Already Exists'
        ]);

        $cat = new Category;
        $cat->name = $request->input('name');
        $cat->save();

        return redirect('admin/categories');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('admin.categories.edit' , [
           'category' => Category::find($id)
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required' , Rule::unique('categories' , 'name')->ignore($id)]
        ]);

        $cat = Category::find($id);
        $cat->name = $request->input('name');
        $cat->save();

        return redirect('admin/categories');

    }


    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
}
