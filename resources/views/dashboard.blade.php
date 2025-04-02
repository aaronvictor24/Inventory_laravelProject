@extends('layouts.app')

@section('header')
    <h2
        class="font-extrabold text-3xl text-gray-900 leading-tight text-center bg-blue-300 py-6 shadow-lg uppercase tracking-wider">
        {{ __('WELCOME TO VILLARIEZ INVENTORY SYSTEM') }}
    </h2>
@endsection

@section('content')
    <div class="p-6">
        <div class="grid grid-cols-4 gap-6">
            <!-- Total Products -->
            <div class="bg-white p-4 shadow rounded-lg">
                <p class="text-lg font-semibold text-gray-700">Total Products</p>
                <p class="text-3xl font-bold text-blue-700">9</p>
            </div>

            <!-- Low Stock -->
            <div class="bg-white p-4 shadow rounded-lg">
                <p class="text-lg font-semibold text-gray-700">Low Stock</p>
                <p class="text-3xl font-bold text-yellow-500">4</p>
            </div>

            <!-- Out of Stock -->
            <div class="bg-white p-4 shadow rounded-lg">
                <p class="text-lg font-semibold text-gray-700">Out of Stock</p>
                <p class="text-3xl font-bold text-red-500">1</p>
            </div>

            <!-- Suppliers -->
            <div class="bg-white p-4 shadow rounded-lg">
                <p class="text-lg font-semibold text-gray-700">Suppliers</p>
                <p class="text-3xl font-bold text-green-500">5</p>
            </div>
        </div>

        <!-- Value of Stock and Chart -->
        <div class="grid grid-cols-3 gap-6 mt-6">
            <div class="bg-blue-100 text-gray-900 p-6 rounded-lg shadow">
                <p class="text-lg font-semibold">Value of Stock</p>
                <p class="text-4xl font-bold">₱3,186</p>
                <p class="mt-4 font-medium">Stock Purchases</p>
                <p>Unfulfilled: <span class="font-bold">4</span></p>
                <p>Received: <span class="font-bold">1</span></p>
            </div>

            <div class="col-span-2 bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold text-gray-800">Warehouse Stock</h3>
                <canvas id="stockChart"></canvas>
            </div>
        </div>
    </div>

    <!-- ChartJS Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('stockChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['King-Cole', 'Yundt-Mertz', 'Donnelly-Spies', 'Donnelly-Spies', 'Donnelly-Spies'],
                datasets: [{
                    label: 'Sales',
                    data: [22, 25, 30, 12, 5],
                    backgroundColor: 'rgb(30, 66, 93)'
                }]
            }
        });
    </script>
@endsection
