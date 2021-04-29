@extends('layouts.blogmain')


@section('sidebar')

  
@endsection

@section('content')
    @auth
      <a class="text-gray-800 underline text-lg" href="/create-post">Add a post</a>

      <br>or</br>
      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log out') }}
        </x-dropdown-link>

        <div class="flex justify-end">
          <input type="submit" name='publish' class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Log Out"/>
        </div>

    </form>
    @endauth
@endsection