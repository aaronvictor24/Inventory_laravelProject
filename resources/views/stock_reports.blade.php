@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Stock Reports</h1>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Date</th>
                    <th class="border border-gray-300 px-4 py-2">Product</th>
                    <th class="border border-gray-300 px-4 py-2">Previous Stock</th>
                    <th class="border border-gray-300 px-4 py-2">Updated Stock</th>
                    <th class="border border-gray-300 px-4 py-2">Change</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stockReports as $report)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2">{{ $report->created_at->format('Y-m-d H:i:s') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $report->product->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $report->previous_stock }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $report->updated_stock }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $report->change > 0 ? '+' . $report->change : $report->change }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No stock reports available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6">
            <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Back to Dashboard</a>
        </div>
    </div>
@endsection
