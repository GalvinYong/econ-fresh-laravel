@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-8">
            <h1 class="text-3xl font-bold text-green-800 mb-4">{{ $product->name }}</h1>
            
            <p class="text-gray-700 text-lg mb-6">{{ $product->description }}</p>
            
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-sm font-semibold text-gray-600">Price</h3>
                    <p class="text-2xl font-bold text-green-700">${{ number_format($product->price, 2) }}</p>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-gray-600">Availability</h3>
                    <span class="px-3 py-1 text-sm rounded-full {{ $product->in_stock ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $product->in_stock ? 'In Stock' : 'Out of Stock' }}
                    </span>
                </div>
            </div>
            
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-600">Category</h3>
                <p class="text-green-600">{{ $product->category->name }}</p>
            </div>
            
            <button class="bg-green-600 text-white py-3 px-6 rounded-lg hover:bg-green-700 transition-colors {{ !$product->in_stock ? 'opacity-50 cursor-not-allowed' : '' }}"
                    {{ !$product->in_stock ? 'disabled' : '' }}>
                {{ $product->in_stock ? 'Add to Cart - $' . number_format($product->price, 2) : 'Out of Stock' }}
            </button>
            
            <div class="mt-6">
                <a href="{{ route('products.catalog') }}" class="text-green-600 hover:text-green-800">
                    ← Back to Products
                </a>
            </div>
        </div>
    </div>
</div>
@endsection