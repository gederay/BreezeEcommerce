<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'Sony PlayStation 5',
            'slug' => 'sony-playstation-5',
            'image' => 'placeholder.png',
            'description' => 'PlayStation 5 (disingkat PS5) merupakan konsol permainan yang dikembangkan oleh Sony Interactive Entertainment.',
            'price' => 9000000,
        ]);

        Product::create([
            'title' => 'Nitendo Switch',
            'slug' => 'nitendo-switch',
            'image' => 'placeholder.png',
            'description' => 'PlayStation 5 (disingkat PS5) merupakan konsol permainan yang dikembangkan oleh Sony Interactive Entertainment.',
            'price' => 7000000,
        ]);
    }
}
