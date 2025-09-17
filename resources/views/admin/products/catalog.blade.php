@extends('layouts.app')

@section('title', 'Products - Econ Fresh')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Logo using local asset -->
    <div class="text-center mb-8">
        <img src="{{ asset('images/logo.png') }}" alt="Econ Fresh Logo" class="h-16 mx-auto mb-4" onerror="this.style.display='none'">
        <h1 class="text-4xl font-bold text-green-800 mb-4">Fresh Market</h1>
        <p class="text-gray-600">Loaded with custom CSS and JavaScript!</p>
    </div>

    <!-- Products with local images -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="product-card fade-in">
                <img src="{{ asset('images/product-' . $loop->iteration . '.jpg') }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-48 object-cover"
                     onerror="this.style.display='none'">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-green-800 mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-2">{{ Str::limit($product->description, 60) }}</p>
                    <p class="text-green-600 text-2xl font-bold mb-4">${{ number_format($product->price, 2) }}</p>
                    
                    <span class="stock-badge {{ $product->in_stock ? 'stock-in' : 'stock-out' }}">
                        {{ $product->in_stock ? 'In Stock' : 'Out of Stock' }}
                    </span>
                    
                    <button class="add-to-cart btn-primary mt-4 w-full" 
                            data-product-id="{{ $product->id }}"
                            {{ !$product->in_stock ? 'disabled' : '' }}>
                        {{ $product->in_stock ? 'Add to Cart' : 'Out of Stock' }}
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection