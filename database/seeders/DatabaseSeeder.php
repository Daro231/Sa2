<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create test user
        User::create([
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Test User',
            'phone_number' => '0123456789',
            'address' => '123 Test Street',
            'zip_code' => '12345'
        ]);

        // Create sample products
        $products = [
            [
                'name' => 'Aga Blue Classic',
                'description' => 'Cuervo y Sobrinos launches its latest masterpiece: the Chronograph Aga Blue Classic — a timepiece that captures the romance of vintage road trips, the feel of worn leather seats and the soul of classic automotive craftsmanship.',
                'price' => 4200.00,
                'stock' => 5,
                'category' => 'Watches'
            ],
            [
                'name' => 'Heritage',
                'description' => 'Classic heritage watch with timeless design and modern precision.',
                'price' => 4900.00,
                'stock' => 3,
                'category' => 'Watches'
            ],
            [
                'name' => 'Iphone 13',
                'description' => 'Latest iPhone with advanced camera system and A15 Bionic chip.',
                'price' => 999.00,
                'stock' => 10,
                'category' => 'Electronics'
            ],
            [
                'name' => 'Iphone 13 Heritage',
                'description' => 'Special edition iPhone 13 with heritage design.',
                'price' => 1099.00,
                'stock' => 2,
                'category' => 'Electronics'
            ],
            [
                'name' => 'Iphone 17 Pro',
                'description' => 'Next-generation iPhone with revolutionary features.',
                'price' => 1299.00,
                'stock' => 1,
                'category' => 'Electronics'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}