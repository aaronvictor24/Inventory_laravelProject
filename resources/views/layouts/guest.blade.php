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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                background-image: url('/img/bg.jpg'); /* Adjust path as needed */
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased  to-indigo-600 min-h-screen">
        <div class="min-h-screen flex flex-col justify-center items-center py-6 sm:py-0">
            <!-- Form Container -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white/90 rounded-xl shadow-lg backdrop-blur-md">
                <!-- Form Slot -->
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
