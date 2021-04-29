<!-- Page Heading -->
<header class="flex justify-between max-w-5xl my-0 mx-auto border border-gray-500 bg-white shadow">

    <div class="justify-start mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <a class="text-gray-800 underline text-lg" href="/">Home</a>
    </div>

    @if (Auth::check())
    <div class="justify-end mx-auto py-6 px-4 sm:px-6 lg:px-8 text-right">
        <a class="text-gray-800 underline text-lg" href="/login">Logout</a>
    </div>
    @else
    <div class="justify-end mx-auto py-6 px-4 sm:px-6 lg:px-8 text-right">
        <a class="text-gray-800 underline text-lg" href="/login">Login</a>
    </div>
    @endif

</header>