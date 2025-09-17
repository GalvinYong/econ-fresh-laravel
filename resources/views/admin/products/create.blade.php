@extends('layouts.admin')

@section('title', 'Add New Product - Econ Fresh Admin')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Add New Product</h2>
        <a href="{{ route('products.index') }}" class="text-green-600 hover:text-green-800">
            ← Back to Products
        </a>
    </div>

    <!-- Form Validation Errors -->
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-md p-4 mb-6">
            <div class="flex items-center">
                <div class="text-red-600 mr-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-red-800 font-semibold">Please fix the following errors:</h3>
                    <ul class="mt-2 text-red-600 text-sm">
                        @foreach($errors->all() as $error)
                            <li class="flex items-center mt-1">
                                <span class="mr-2">•</span> {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Product Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Product Name *
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 @error('name') border-red-300 @enderror"
                       placeholder="e.g., Organic Apples"
                       required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                    Price ($) *
                </label>
                <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price') }}"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 @error('price') border-red-300 @enderror"
                       placeholder="0.00"
                       required>
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                Description
            </label>
            <textarea name="description" id="description" rows="4"
                      class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 @error('description') border-red-300 @enderror"
                      placeholder="Describe the product...">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Category -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Category *
                </label>
                <select name="category_id" id="category_id"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 @error('category_id') border-red-300 @enderror"
                        required>
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Stock Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Availability
                </label>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="radio" name="in_stock" value="1" {{ old('in_stock', '1') == '1' ? 'checked' : '' }}
                               class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                        <span class="ml-2 text-gray-700">In Stock</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="in_stock" value="0" {{ old('in_stock') == '0' ? 'checked' : '' }}
                               class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
                        <span class="ml-2 text-gray-700">Out of Stock</span>
                    </label>
                </div>
                @error('in_stock')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
            <a href="{{ route('products.index') }}" 
               class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors">
                Create Product
            </button>
        </div>
    </form>
</div>
@endsection