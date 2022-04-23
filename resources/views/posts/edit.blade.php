@extends('layouts.app')

@section('title')index @endsection

@section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{  route('posts.update',['post'=>$post->id]) }}" >
            @method('PUT')
              {{-- {{method_field('PUT') }} --}}
            @csrf
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
              
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $post->description }}</textarea>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post creator</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                <option value={{ $user->id }}>{{ $user->name }}</option>
                @endforeach
            </select>
            </div>
            <button class="btn btn-success">edit</button>
        </form>
@endsection
