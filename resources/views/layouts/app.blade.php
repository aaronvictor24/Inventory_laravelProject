<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">

        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background-color: #eaf6ff;">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="shadow" style="background-color:rgb(30, 66, 93);">
                    <div class="max-w-7xl mx-auto py-25 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-blue-800 font-bold text-2xl">
                            {{ $header }}
                        </h1>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                <div class="bg-blue p-6 rounded-lg shadow-md" style="background-image:rgb(227, 235, 241);">
                    @yield('content')
                </div>
            </main>
        </div>
        <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/js/notification.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    </body>
</html>