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
            @include('layouts.header') 



            <div id="main-wrapper" class="my-0 mx-auto h-screen ">
                <!-- Page Content -->
                <main class="flex flex-wrap flex-row max-w-5xl bg-white  my-0 mx-auto">

                    <div id="sidebar" class="w-full order-2 sm:order-1 sm:w-1/3 flex-grow border bg-gray-100 border-gray-300">
                        @yield('sidebar')
                    </div><!-- end sidebar -->

                
                    <div id="body" class="w-full order-1 sm:order-2 sm:w-2/3 border border-gray-300 ">
                        @yield('content')
                    </div>
                    
                    
                </main>
            </div> <!-- main wrapper -->
        </div>
    </body>
</html>
