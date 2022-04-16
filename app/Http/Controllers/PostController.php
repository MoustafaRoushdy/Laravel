<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = [
            ['id'=>1, 'title'=>'laravel','posted_by'=>'Ahmed','created_at'=>'2022-4-20'],
            ['id'=>2, 'title'=>'php','posted_by'=>'Mohamed','created_at'=>'2022-3-15'],
            ['id'=>3, 'title'=>'javaScript','posted_by'=>'Ali','created_at'=>'2022-8-25']
        ];
        return view('posts.index',[
            'posts'=>$posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return 'we are in store';
    }

    public function show($postId)
    {
        return "we are in $postId";
    }

    public function edit($postId)
    {
        return view('posts.edit');
    }

    public function update()
    {
          return "<script>location.href='/posts'</script>";
    }


}
