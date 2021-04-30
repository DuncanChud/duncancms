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
            @include('layouts.header') 

            <div id="main-wrapper" class="my-0 mx-auto  border  border-gray-300">
            <!-- Page Content -->
                <main class="flex flex-wrap flex-row max-w-5xl bg-white  h-screen my-0 mx-auto">
                    <div id="body" class="w-full border border-gray-300 ">
                        @yield('title')<br/>
                        @yield('content')
                    </div>
                    @yield('title')<br/>
            
                    
                </main>
            </div>
        </div>
        <!-- Include the Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <!-- Initialize Quill editor -->
        <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        
        // document.getElementById("htmlit").onclick = function() {showHTML()};
    
    /* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
        function showHTML() {

            var html = quill.root.innerHTML;
            document.getElementById("quillhtml").innerHTML = html;
        }

        var form = document.getElementById("create-post"); // get form by ID

            form.onsubmit = function() { // onsubmit do this first
                var name = document.querySelector('input[name=body]'); // lets get our hidden field
                name.value = quill.root.innerHTML;
                //name.value = JSON.stringify(quill.getContents()); // populate name input with quill data
                return true; // submit form
            }
        </script>
    </body>
</html>