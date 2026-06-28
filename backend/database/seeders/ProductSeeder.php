<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Signature Gold Necklace',
                'slug' => 'signature-gold-necklace',
                'description' => 'Elegant gold necklace with subtle detailing and timeless shine.',
                'price' => 249.00,
                'image_url' => 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?q=80&w=800',
                'category' => 'Necklaces',
                'stock' => 12,
            ],
            [
                'name' => 'Minimal Silver Hoop',
                'slug' => 'minimal-silver-hoop',
                'description' => 'Clean silver hoop earrings designed for everyday elegance.',
                'price' => 89.00,
                'image_url' => 'https://images.unsplash.com/photo-1512436991641-3192a8d87b5f?q=80&w=800',
                'category' => 'Earrings',
                'stock' => 20,
            ],
            [
                'name' => 'Luxe Bracelet Set',
                'slug' => 'luxe-bracelet-set',
                'description' => 'A set of stacked bracelets with mixed metal accents.',
                'price' => 139.00,
                'image_url' => 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?q=80&w=800',
                'category' => 'Bracelets',
                'stock' => 8,
            ],
            [
                'name' => 'Stone Statement Ring',
                'slug' => 'stone-statement-ring',
                'description' => 'Bold statement ring with a faceted semi-precious stone.',
                'price' => 179.00,
                'image_url' => 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?q=80&w=800',
                'category' => 'Rings',
                'stock' => 5,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['slug' => $product['slug']], $product);
        }
    }
}
