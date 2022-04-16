@extends('layouts.app')

@section('title')index @endsection

@section('content')
        <form method="PUT" action="{{ route('posts.store') }}" >
            @csrf
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post creator</label>
            <select class="form-control">
                <option value="1">Ahmed</option>
                <option value="1">Mohamed</option>
            </select>
            </div>
            <button class="btn btn-success">create</button>
        </form>
@endsection
