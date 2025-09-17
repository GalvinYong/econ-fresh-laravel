<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
    <select class="w-full rounded border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
        <option value="">All Categories</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }} ({{ $category->products_count ?? 0 }})
            </option>
        @endforeach
    </select>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Price Range</label>
    <select class="w-full rounded border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
        <option value="">All Prices</option>
        <option value="0-5">Under $5</option>
        <option value="5-10">$5 - $10</option>
        <option value="10-20">$10 - $20</option>
    </select>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Availability</label>
    <select class="w-full rounded border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200">
        <option value="">All Items</option>
        <option value="in_stock">In Stock</option>
        <option value="out_of_stock">Out of Stock</option>
    </select>
</div>