<div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl border border-gray-100">
    <div class="p-6">
        <!-- Product Name with Str::limit filter -->
        <h3 class="text-xl font-semibold text-green-800 mb-2 hover:text-green-600 transition-colors">
            <a href="{{ route('products.show', $product->id) }}">
                {{ Str::limit($product->name, 40) }}
            </a>
        </h3>
        
        <!-- Description with conditional display -->
        @unless(empty($product->description))
            <p class="text-gray-600 mb-4 text-sm">
                {{ Str::limit($product->description, 80) }}
            </p>
        @endunless

        <div class="flex justify-between items-center mb-4">
            <!-- Price with number_format filter -->
            <span class="text-2xl font-bold text-green-700">${{ number_format($product->price, 2) }}</span>
            
            <!-- Stock status with conditional classes -->
            <span class="px-3 py-1 text-xs rounded-full {{ $product->in_stock ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $product->in_stock ? 'In Stock' : 'Out of Stock' }}
            </span>
        </div>
        
        <!-- Category with relationship -->
        <p class="text-sm text-gray-500 mb-4">
            Category: <span class="text-green-600">{{ $product->category->name }}</span>
        </p>
        
        <!-- Buttons with conditional disabling -->
        <div class="space-y-2">
            <a href="{{ route('products.show', $product->id) }}" 
               class="block text-center bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition-colors">
                View Details
            </a>
            
            <button class="w-full bg-green-600 text-white py-2 px-4 rounded transition-colors {{ !$product->in_stock ? 'opacity-50 cursor-not-allowed' : 'hover:bg-green-700' }}"
                    {{ !$product->in_stock ? 'disabled' : '' }}>
                {{ $product->in_stock ? 'Add to Cart' : 'Out of Stock' }}
            </button>
        </div>
    </div>
</div>