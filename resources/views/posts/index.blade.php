@extends('layouts.app')

@section('title')create @endsection

@section('content')
<a href="{{ route('posts.create') }}" type="button" class="btn btn-success" style="margin-bottom: 20px" >create post</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">created_at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $post['id'] }}</th>
      <td>{{ $post['title'] }}</td>
      <td>{{ $post['posted_by'] }}</td>
      <td>{{ $post['created_at'] }}</td>
      <td>
            <a href="{{ route('posts.show',['post'=>$post['id']]) }}" class="btn btn-info" style="margin-bottom: 20px" >view</a>
            <a class="btn btn-secondary" style="margin-bottom: 20px" >edit</a>
            <a class="btn btn-danger" style="margin-bottom: 20px" >delete</a>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection