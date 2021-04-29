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

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            <header class="max-w-5xl my-0 mx-auto border border-red-500 bg-white shadow">
                <div class="  mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <a class-"text-2xl font-extrabold text-blue-700 mb-6 p-6" href="/">Home</a>
                </div>
            </header>

            <div id="main-wrapper" class="my-0 mx-auto h-screen ">
                <!-- Page Content -->
                <main class="flex flex-wrap flex-row max-w-5xl bg-white justify-items-start items-stretch border-2 border-purple-700 my-0 mx-auto">
                    {{-- {{ $slot }} --}}
                   

                    <div id="body" class="border flex-grow flex-1 h-full border-blue-500 w-auto ">
   
                        @yield('content')
                    </div>
                    
                    
                </main>
            </div> <!-- main wrapper -->
        </div>
    </body>
</html>
