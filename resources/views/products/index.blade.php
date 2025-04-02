@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Products List</h1>

        @if (session('warning'))
            <div class="mb-4 p-4 bg-yellow-500 text-white font-semibold rounded-lg shadow-md">
                {{ session('warning') }}
            </div>
        @endif

        <!-- Add Product Button -->
        <div class="mb-4">
            <a href="{{ route('products.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Add Product</a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-500 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Stock</th>
                        <th class="border border-gray-300 px-4 py-2">Low Stock Threshold</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">{{ $product->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form action="{{ route('products.updateStock', $product->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $product->quantity }}" min="0" required class="border border-gray-300 px-2 py-1">
                                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Update</button>
                                </form>
                                <!-- Low Stock Warning -->
                                @if($product->quantity <= $product->low_stock_threshold)
                                    <span class="text-red-500 font-bold">Low Stock!</span>
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $product->low_stock_threshold }}</td>
                            <td class="border border-gray-300 px-4 py-2 flex gap-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">No products available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
