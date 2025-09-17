<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Create categories first
        $fruits = Category::create([
            'name' => 'Fruits',
            'slug' => 'fruits',
            'description' => 'Fresh fruits'
        ]);

        $vegetables = Category::create([
            'name' => 'Vegetables', 
            'slug' => 'vegetables',
            'description' => 'Fresh vegetables'
        ]);

        // Create products with category relationships
        Product::create([
            'name' => 'Fresh Apples',
            'description' => 'Sweet and crunchy red apples',
            'price' => 2.99,
            'category_id' => $fruits->id,
            'in_stock' => true,
        ]);

        Product::create([
            'name' => 'Organic Carrots',
            'description' => 'Fresh organic carrots',
            'price' => 1.99,
            'category_id' => $vegetables->id,
            'in_stock' => true,
        ]);

        Product::create([
            'name' => 'Banana Bunch',
            'description' => 'Ripe yellow bananas',
            'price' => 3.49,
            'category_id' => $fruits->id,
            'in_stock' => false,
        ]);
    }
}