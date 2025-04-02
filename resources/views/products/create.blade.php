@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Add Product</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-500 text-white px-4 py-2 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="form-group">
                <label for="name" class="block font-semibold">Product Name</label>
                <input type="text" name="name" class="form-control w-full px-4 py-2 border rounded-md" required>
            </div>
            <div class="form-group">
                <label for="quantity" class="block font-semibold">Quantity</label>
                <input type="number" name="quantity" class="form-control w-full px-4 py-2 border rounded-md" required>
            </div>
            <div class="form-group">
                <label for="low_stock_threshold" class="block font-semibold">Low Stock Threshold</label>
                <input type="number" name="low_stock_threshold" class="form-control w-full px-4 py-2 border rounded-md" required>
            </div>
            <div class="flex gap-4">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded">Save Product</button>
                <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">Back</a>
            </div>
        </form>
    </div>
@endsection
