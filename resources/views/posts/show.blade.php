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
<div>
    <form  method="POST" action="{{route('comments.store')}}">
    @csrf
        <h3>Add a comment</h3>
        <br>
        <textarea name="body" id="" cols="100" rows="1"></textarea>
        <button type="submit">Comment</button>
        <input type="hidden" name="post_id" value="{{ $post->id }}" >
        <input type="hidden" name="parent" value="App\Models\Post" >
    </form>
    <div class="card-body">
          
            <div>
            <img src="{{asset($post->image) }}" class="rounded float-end card-img-top" alt="...">
                
            </div>
        </div>
    @if(count($post->comments) > 0)
    @foreach($post->comments as $comment)
        <div class="card">
            <div class="card-header">
                {{$comment->user->name}}: {{$comment->body}}: {{$comment->created_at->toDateString() }}
            </div>
       
    @endforeach
    @endif

</div>





@endsection