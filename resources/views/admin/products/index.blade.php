@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Manage Products</h2>
        <a href="{{ route('products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Add New Product
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold">Name</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold">Category</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold">Price</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold">Stock</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="px-6 py-4 border-b border-gray-300">{{ $product->name }}</td>
                    <td class="px-6 py-4 border-b border-gray-300">{{ $product->category->name }}</td>
                    <td class="px-6 py-4 border-b border-gray-300">${{ number_format($product->price, 2) }}</td>
                    <td class="px-6 py-4 border-b border-gray-300">
                        <span class="px-2 py-1 text-xs rounded {{ $product->in_stock ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->in_stock ? 'In Stock' : 'Out of Stock' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 border-b border-gray-300">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 mr-3">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="button" 
                                    onclick="if(confirm('Are you sure you want to delete this product?')) { this.form.submit(); }"
                                    class="text-red-600 hover:text-red-800">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection