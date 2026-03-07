<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory()->count(10)->create();

        foreach ($products as $product) {
            $product->categories()->attach(
                Category::inRandomOrder()->take(rand(1,3))->pluck('id')
            );

            $product->tags()->attach(
                Tag::inRandomOrder()->take(rand(1,3))->pluck('id')
            );

            $product->attributes()->attach(
                Attribute::inRandomOrder()->take(rand(1,3))->pluck('id')
            );
        }
    }
}
