<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return  PostResource::collection($posts);

    }

    public function show($postId)
    {
        $post = Post::find($postId);
        return new PostResource($post);
        return [
            'id'=>$post->id,
            'title'=>$post->title,
            'description'=>$post->description,
            'user_id'=>$post->user_id
        ];

    }

    public function store(StorePostRequest $request)
    {
        $post =Post::create($request->only('title', 'description', 'user_id','image')); 
        return new PostResource($post);

        
    }
}
