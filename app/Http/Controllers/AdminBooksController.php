<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class AdminBooksController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('admin.books.index' , [
            'books' => $books
        ]);
    }


    public function create()
    {
        return view('admin.books.create');
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('books.show' , [
            'book' => Book::find($id)
        ]);
    }


    public function edit($id)
    {
        return view('admin.books.edit' , [
           'categories' => Category::all(),
           'book' => Book::find($id)
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20',
            'author' => 'required|max:20',
            'info' => 'required',
            'category' => 'required|exists:categories,id',
        ]);

        $book = Book::find($id);
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->info = $request->input('info');
        $book->category_id = $request->input('category');
        $book->save();

        return redirect('admin/books');
    }


    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->back();
    }
}
