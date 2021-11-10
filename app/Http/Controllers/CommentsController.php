<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{



    public function storecomment(Request $request){
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user = auth()->id();
        $comment->book = $request->input('book');
        $comment->save();

        return redirect()->back();

    }

}
