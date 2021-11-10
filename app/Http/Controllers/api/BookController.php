<?php

namespace App\Http\Controllers\api;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
   public function index(){
       return Book::all();
   }

   public function show(Book $book){
      return $book;
   }


   public function store(Request $request){
       $book = new Book;
       $book->name = $request->name;
       $book->author = $request->author;
       $book->info = $request->info;
       $book->category_id = $request->category;
       $book->user_id = $request->user;
       $book->save();

       return $book;
   }

    public function update(Request $request , Book $book){

        $book->name = $request->name;
        $book->author = $request->author;
        $book->info = $request->info;
        $book->category_id = $request->category;
        $book->user_id = $request->user;
        $book->save();

        return $book;
    }


   public function destroy(Book $book){
       $book->delete();
       return Book::all();
   }

}
