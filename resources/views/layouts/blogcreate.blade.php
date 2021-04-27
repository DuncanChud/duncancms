<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{-- {{ $slot }} --}}
                @yield('title')<br/>
                @yield('content')
            </main>
        </div>
        <!-- Include the Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <!-- Initialize Quill editor -->
        <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        var form = document.getElementById("create-post"); // get form by ID

            form.onsubmit = function() { // onsubmit do this first
                var name = document.querySelector('input[name=body]'); // set name input var
                name.value = JSON.stringify(quill.getContents()); // populate name input with quill data
                return true; // submit form
            }
        </script>
    </body>
</html>
