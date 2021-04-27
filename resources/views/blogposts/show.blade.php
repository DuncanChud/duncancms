@extends('layouts.blogmain')


@section('content')
@if($post)
  <div>
    {!! $post->body !!}

    <img class="card-img-top" src="{{ Storage::url($post->image_path)  }}" alt="Card image cap">
  </div>    
@endif
@endsection