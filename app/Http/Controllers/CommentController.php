<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        
        Comment::create([
            'body'=>$request->body,
            'user_id'=>Auth::user()->id,
            'commentable_id'=>$request->post_id,
            'commentable_type'=>$request->parent,

        ]);
        return redirect("/posts/{post}");
    }
}
