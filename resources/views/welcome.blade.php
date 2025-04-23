<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Inventory</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        body {
            background-image: url('/img/bg.jpg');
            /* Adjust path as needed */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-900 dark:text-gray-100">
    <div class="min-h-screen flex  justify-center px-6 py-12 bg-gray-800/40">
        <!-- Outer box container -->
        <div
            class="w-full max-w-7xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg shadow-xl rounded-xl p-8 border border-gray-200 dark:border-gray-700">
            <header class="flex justify-between items-center pb-6 border-b border-gray-300 dark:border-gray-600">
                <!-- Highlighted Title with Border Box -->
                <h1
                    class="text-3xl font-semibold text-gray-800 dark:text-gray-200 px-6 py-4 border-radius-30px border-4 border-indigo-600 dark:border-indigo-400 rounded-lg shadow-md">
                    ALERT Inventory System
                </h1>
                @if (Route::has('login'))
                    <nav class="flex space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-6 py-2 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-6 py-2 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition">Log
                                in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-6 py-2 bg-gray-600 text-white rounded-lg shadow-md hover:bg-gray-700 transition">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>
            <main class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card: Products -->
                <div
                    class="p-8 bg-indigo-100/80 dark:bg-indigo-700/80 rounded-lg shadow-lg transition transform hover:scale-105 hover:shadow-xl">
                    <h2 class="text-xl font-semibold text-indigo-900 dark:text-indigo-100">Products</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Manage your product inventory easily and
                        efficiently.</p>
                </div>
                <!-- Card: Stock Levels -->
                <div
                    class="p-8 bg-green-100/80 dark:bg-green-700/80 rounded-lg shadow-lg transition transform hover:scale-105 hover:shadow-xl">
                    <h2 class="text-xl font-semibold text-green-900 dark:text-green-100">Stock Levels</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Keep track of stock levels and receive timely
                        alerts for low stocks.</p>
                </div>
                <!-- Card: Orders -->
                <div
                    class="p-8 bg-yellow-100/80 dark:bg-yellow-700/80 rounded-lg shadow-lg transition transform hover:scale-105 hover:shadow-xl">
                    <h2 class="text-xl font-semibold text-yellow-900 dark:text-yellow-100">Orders</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Monitor and manage customer orders and fulfillment.
                    </p>
                </div>

                <div
                    class="p-8 bg-yellow-100/80 dark:bg-yellow-700/80 rounded-lg shadow-lg transition transform hover:scale-105 hover:shadow-xl">
                    <h2 class="text-xl font-semibold text-yellow-900 dark:text-yellow-100">Stocks Report</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Monitor and manage customer orders and fulfillment.
                    </p>
                </div>

                <!-- Card: Stock Levels -->
                <div
                    class="p-8 bg-green-100/80 dark:bg-gray-700/80 rounded-lg shadow-lg transition transform hover:scale-105 hover:shadow-xl">
                    <h2 class="text-xl font-semibold text-green-900 dark:text-green-100">Real-Time Update</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Keep track of stock levels and receive timely
                        alerts for low stocks.</p>
                </div>

                <div
                    class="p-8 bg-indigo-100/80 dark:bg-indigo-700/80 rounded-lg shadow-lg transition transform hover:scale-105 hover:shadow-xl">
                    <h2 class="text-xl font-semibold text-indigo-900 dark:text-indigo-100">Dashboard</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Manage your product inventory easily and
                        efficiently.</p>


                </div>
            </main>
        </div>
    </div>
</body>

</html>
