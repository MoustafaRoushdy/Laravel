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
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post creator</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                <option value={{ $user->id }}>{{ $user->name }}</option>
                @endforeach
            </select>
            </div>
            <div>
                <label for="avatar">Choose a file</label>
                <input type="file" name="avatar">
            </div>
            
            <button class="btn btn-success">create</button>
        </form>
@endsection
