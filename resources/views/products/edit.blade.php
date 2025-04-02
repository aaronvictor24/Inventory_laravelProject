@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Edit Product</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-500 text-white rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold text-gray-700">Product Name</label>
            <input type="text" name="name" class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" value="{{ $product->name }}" required>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-sm font-semibold text-gray-700">Quantity</label>
            <input type="number" name="quantity" class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" value="{{ $product->quantity }}" required>
        </div>

        <div class="mb-4">
            <label for="low_stock_threshold" class="block text-sm font-semibold text-gray-700">Low Stock Threshold</label>
            <input type="number" name="low_stock_threshold" class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" value="{{ $product->low_stock_threshold }}" required>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-6 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md focus:ring-2 focus:ring-green-300">Update Product</button>
            <a href="{{ route('products.index') }}" class="px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md focus:ring-2 focus:ring-gray-300">Back</a>
        </div>
    </form>
</div>
@endsection
