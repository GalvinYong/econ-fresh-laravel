<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')->where(function ($query) use ($request) {
                    return $query->where('category_id', $request->category_id);
                })
            ],
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0.01|max:9999.99',
            'category_id' => 'required|exists:categories,id',
            'in_stock' => 'required|boolean'
        ], [
            'name.required' => 'The product name is required.',
            'name.unique' => 'A product with this name already exists in the selected category.',
            'price.min' => 'The price must be at least $0.01.',
            'category_id.required' => 'Please select a category.',
            'in_stock.required' => 'Please select stock status.'
        ]);

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')->ignore($product->id)->where(function ($query) use ($request) {
                    return $query->where('category_id', $request->category_id);
                })
            ],
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0.01|max:9999.99',
            'category_id' => 'required|exists:categories,id',
            'in_stock' => 'required|boolean'
        ], [
            'name.unique' => 'A product with this name already exists in the selected category.',
            'price.min' => 'The price must be at least $0.01.'
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}