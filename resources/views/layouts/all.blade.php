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
                <main class="flex flex-wrap flex-row max-w-5xl bg-white border border-gray-300 justify-items-start my-0 mx-auto">
                    {{-- {{ $slot }} --}}
                   

                    <div id="body" class="border flex-grow flex-1 h-full w-auto ">
   
                        @yield('content')
                    </div>
                    
                    
                </main>
            </div> <!-- main wrapper -->
        </div>
    </body>
</html>
