@extends('layouts.all')
{{-- @section('title')
{{$title}}
@endsection --}}
@section('sidebar')

@endsection


@section('content')
  @if ( !$posts->count() )
  <p>No posts here yet</p>
  @else
  <div class="p-6">
    <p class="text-xl font-extrabold text-gray-700 mb-2">All {{$posts->count()}} posts</p>
    
    <section class="text-gray-600 body-font overflow-hidden">
      <div class="container px-5 py-24 mx-auto">
        <div class="-my-8 divide-y-2 divide-gray-100">

    
    @foreach( $posts as $thispost )
      <div class="py-8 flex flex-wrap md:flex-nowrap">
        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
          <span class="font-semibold title-font text-gray-700">{{ $thispost->user->name}}</span>
          <span class="mt-1 text-gray-500 text-sm">{{ $thispost->created_at->format('M d,Y \a\t h:i a') }}</span>
          <img class="my-6 w-1/3" src="{{ Storage::url($thispost->image_path)  }}" >
        </div>
        <div class="md:flex-grow">
          <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $thispost->title }}</h2>
          <p class="leading-relaxed">{!! Str::limit($thispost->body, $limit = 300, $end = ' ....') !!}</p>
          <a class="text-indigo-500 inline-flex items-center mt-4" href="{{ url('/'.$thispost->slug) }}">Full post
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"></path>
              <path d="M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>


    @endforeach
        </div>
      </div>
    </section>

  </div>

@endif
@endsection
