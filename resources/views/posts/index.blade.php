@extends('layouts.app')

@section('title')create @endsection

@section('content')
<a href="{{ route('posts.create') }}" type="button" class="btn btn-success" style="margin-bottom: 20px" >create post</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Posted By</th>
      <th scope="col">created_at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->description }}</td>
      <td>{{ $post->user ? $post->user->name : "user not found" }}</td>
      <td>{{ $post->created_at->toDateString()  }}</td>
      <td>
            <a href="{{ route('posts.show',['post'=>$post->id]) }}" class="btn btn-info" style="margin-bottom: 20px" >view</a>
            <a href="{{ route('posts.edit',['post'=>$post->id]) }}" class="btn btn-secondary" style="margin-bottom: 20px" >edit</a>
           <form method="POST" action="{{ route('posts.destroy',['post'=>$post->id]) }}">
              @csrf
              @method('DELETE') 
              <button  class="btn btn-danger" style="margin-bottom: 20px" onclick="return confirm('Are you sure?')" >delete</button>
           </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection