@if ( !$fiveposts->count() )
    <p>No posts here yet</p>
    @else
    <div class="p-6">
    <p class="text-xl font-extrabold text-gray-700 mb-2">Last {{$fiveposts->count()}} posts</p>
    
    @foreach( $fiveposts as $thispost )
        <div class="list-group mb-6">
        <div class="list-group-item">
            <h3 class="text-2xl font-medium text-gray-900 title-font mb-2"><a href="{{ url('/'.$thispost->slug) }}">{{ $thispost->title }}</a></h3>
            <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
            <span class="font-semibold title-font text-gray-700">{{ $thispost->user->name}}</span>
            <span class="mt-1 text-gray-500 text-sm">{{ $thispost->created_at->format('M d,Y \a\t h:i a') }}</span>
            </div>

            {{-- <p class="text-base">{{ $thispost->user->name}} - {{ $thispost->created_at->format('M d,Y \a\t h:i a') }} </p> --}}
            <a class="text-indigo-500 inline-flex items-center mt-4" href="{{ url('/'.$thispost->slug) }}">Full post
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
            </svg>
            </a>
        </div>
        </div>
    @endforeach

    @if ( $fiveposts->count() > 2)
        <p><a class="text-xl underline font-extrabold text-blue-700 mb-2 "href="/show-all">See ALL posts...</a></p>
    @endif 
    </div>

@endif