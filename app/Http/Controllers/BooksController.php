<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        return view('books.create' , [
            'categories' => Category::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|max:20',
           'author' => 'required|max:20',
            'info' => 'required',
            'category' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bookpdf' => 'required|mimes:pdf'
        ]);

        if ($request->hasFile('image')){
            $imgExt = $request->file('image')->getClientOriginalExtension();
            $imgName = time() . $imgExt;
            $request->file('image')->storeAs('public/books/' , $imgName);
        }

        if ($request->hasFile('bookpdf')){
            $bookExt = $request->file('bookpdf')->getClientOriginalExtension();
            $bookName = time() . $bookExt;
            $request->file('bookpdf')->storeAs('public/booksFiles/' , $bookName);
        }


        $book = new Book;
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->info = $request->input('info');
        $book->category_id = $request->input('category');
        $book->image = $imgName;
        $book->bookpdf = $bookName;

        $book->user_id = auth()->id();
        $book->save();



        return redirect()->route('home');




    }

    public function show($id)
    {
        return view('books.show' , [
            'book' => Book::find($id),
            'comments' => Comment::where('book' , $id)->get()
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
