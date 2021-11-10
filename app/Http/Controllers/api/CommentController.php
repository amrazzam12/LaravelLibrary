<?php

namespace App\Http\Controllers\api;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return Comment::all();
    }

    public function show(Comment $comment){
        return $comment;
    }


    public function store(Request $request){
        $comment = new Comment;
        $comment->book = $request->book;
        $comment->user = $request->user;
        $comment->comment = $request->comment;
        $comment->save();

        return $comment;
    }

    public function update(Request $request , Comment $comment){

        $comment->book = $request->book;
        $comment->user = $request->user;
        $comment->comment = $request->comment;

        $comment->save();

        return $comment;
    }


    public function destroy(Comment $comment){
        $comment->delete();
        return Comment::all();
    }
}
