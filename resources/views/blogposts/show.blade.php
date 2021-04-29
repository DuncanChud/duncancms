@extends('layouts.blogmain')


@section('sidebar')
  @include('layouts.sidebar');
  
@endsection

@section('content')
@if($post)

  	<!--Container-->
	<div class="container w-full md:max-w-3xl mx-auto pt-6 bg-white">

		<div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

			<!--Title-->
			<div class="font-sans">
						<h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{$post->title}}</h1>
						<p class="text-sm md:text-base font-normal text-gray-600">{{ $post->user->name}} - {{ $post->created_at->format('M d,Y \a\t h:i a') }}</p>
			</div>


			<!--Post Content-->


      <div class="py-6">{!! $post->body !!}</div>


			<!--/ Post Content-->

		</div>

	

		<!--Divider-->
		<hr class="border-b-2 border-gray-400 mb-8 mx-4">

    <img class="my-6" src="{{ Storage::url($post->image_path)  }}" >
	

		<!--/Next & Prev Links-->

    @auth
      <a class="text-gray-800 underline text-lg" href="/edit/{{$post->id}}">Edit this post</a>
    @endauth
	</div>
	<!--/container-->
@endif
@endsection