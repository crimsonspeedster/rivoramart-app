<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Term;
use App\ProductTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $simpleProducts = Product::factory()
            ->count(5)
            ->create([
                'type' => ProductTypes::Simple,
                'parent_id' => null
            ])
            ->each(function($product) {
                $product->update([
                    'sku' => 'SKU-' . $product->id,
                ]);

                $this->attachRelations($product);
            });;

        $variableProducts = Product::factory()
            ->count(3)
            ->create([
                'type' => ProductTypes::Variable,
                'parent_id' => null
            ]);

        foreach ($variableProducts as $variable) {
            $this->attachRelations($variable);

            $variations = Product::factory()
                ->count(rand(2, 4))
                ->create([
                    'type' => ProductTypes::Variation,
                    'parent_id' => $variable->id,
                ])
                ->each(function($product) {
                    $product->update([
                        'sku' => 'SKU-' . $product->id,
                    ]);
                });;;

            foreach ($variations as $variation) {
                $variation->terms()->attach(
                    Term::inRandomOrder()->take(rand(1,2))->pluck('id')
                );
            }
        }
    }

    private function attachRelations(Product $product): void
    {
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
