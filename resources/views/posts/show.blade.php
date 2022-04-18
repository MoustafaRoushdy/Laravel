@extends('layouts.app')

@section('title') 
show
 @endsection

@section('content')


<div class="card-header">
    Post info
</div>

<div class="card-body">
    <h5 class="cart-title">Title</h5>
    <p class="card-text">{{ $post->title }}</p>
    <h5 class="cart-title">Description</h5>
    <p class="card-text">{{ $post->description }}</p>


</div>

<div class="card-header">
    Post Creator info
</div>

<div class="card-body">
    <h5 class="cart-title">Name:-</h5>
    <p class="card-text">{{ $post->user->name }}</p>
    <h5 class="cart-title">Email:-</h5>
    <p class="card-text">{{ $post->user->email }}</p>
    <h5 class="cart-title">Created At:-</h5>
    <p class="card-text">{{ $post->created_at->toDayDateTimeString() }}</p>


</div>





@endsection