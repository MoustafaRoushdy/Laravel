<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StorePostRequest;
use App\Jobs\PruneOldPostsJob;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function index()
    {
    // PruneOldPostsJob::dispatch();

        // $posts = Post::all();
        $posts = Post::paginate(15);
        $posts->withPath('/posts');
        return view('posts.index',[
            'posts'=>$posts
        ]);
    }

    public function create()
    {
      
        return view('posts.create',[
            'users'=>User::all()
        ]);
    }

    public function store(StorePostRequest $request)//Request $request)
    {
        // $path = $request->file('avatar')->store('images');
        // $request->merge(['avatar' => $path]);
        // // dd($request->all());
        // validated = $request->validated();
        $fileInRequest = $request->file('avatar'); 
        $request->merge(['image' => $fileInRequest]);
        $post =Post::create($request->only('title', 'description', 'user_id','image')); 
        
        dd($post);

        // Post::create([

        //   'title'=>$validated['title'],
        //   'description'=>$validated['description'],
        //   'user_id'=>$validated['user_id'],
        //   'image'=>$validated['avatar']

        // ]);
        return redirect("/posts");  //it doesn't work with naming and doesn't work with route


    }

    public function show($postId)
    {
        $post = Post::find($postId);
        return view('posts.show',[
            'post'=>$post,
        ]);
    }

    public function edit($postId)
    {
        return view('posts.edit',[
            'post'=>Post::find($postId),
            'users'=>User::all()
        ]);
    }

    public function update($postId,StorePostRequest $request)
    {
        
          Post::where('id',$postId)
          ->update([
            'title'=>request()->title,
            'description'=>request()->description,
            'user_id'=>request()->user_id
          ]);
          return redirect("/posts");  //it doesn't work with naming and doesn't work with route
    }

    public function destroy($postId)
    {
        Post::where('id',$postId)->delete();
        return redirect("/posts");  //it doesn't work with naming and doesn't work with route
    }


}
