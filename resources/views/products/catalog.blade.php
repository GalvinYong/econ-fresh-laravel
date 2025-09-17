@extends('layouts.app')

@section('title', 'Products - Econ Fresh')

@push('styles')
<style>
    .product-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .product-card:hover {
        transform: translateY(-4px);
    }
</style>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Page Header with Blade Conditional -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-green-800 mb-4">Fresh Market</h1>
        <p class="text-gray-600 text-lg">Discover our selection of fresh produce</p>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-xl font-semibold mb-4">Filter Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @include('partials.category-filter', ['categories' => $categories])
        </div>
    </div>

    <!-- Products Grid -->
    @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Nested Loop with Blade Directives -->
            @foreach($products as $product)
                @include('partials.product-card', ['product' => $product])
            @endforeach
        </div>

        <!-- Pagination Info (Demonstrating Blade Filters) -->
        <div class="bg-white rounded-lg shadow-md p-4 text-center">
            <p class="text-gray-600">
                Showing <span class="font-semibold">{{ $products->count() }}</span> 
                of <span class="font-semibold">{{ $products->total() }}</span> products
            </p>
            <p class="text-sm text-gray-500 mt-2">
                Last updated: {{ now()->format('F j, Y g:i A') }}
            </p>
        </div>
    @else
        <!-- Empty State with Blade Conditionals -->
        <div class="text-center py-12 bg-white rounded-lg shadow-md">
            <div class="text-6xl mb-4">🥬</div>
            <h2 class="text-2xl font-semibold text-gray-700 mb-2">No Products Available</h2>
            <p class="text-gray-600">Check back later for fresh produce!</p>
            
            @auth
                <a href="{{ url('/admin/products/create') }}" class="inline-block mt-4 bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Add New Product
                </a>
            @endauth
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Products page loaded successfully!');
    });
</script>
@endpush