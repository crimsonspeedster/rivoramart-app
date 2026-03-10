<?php

namespace Database\Factories;

use App\Enums\PageStatus;
use App\Enums\StockStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = PageStatus::Published;

        $manage_stock = $this->faker->boolean();
        $stock = $manage_stock ? $this->faker->numberBetween(0, 50) : null;
        $stock_status = $manage_stock && $stock === 0 ? StockStatus::OutOfStock : StockStatus::InStock;

        return [
            'title' => $this->faker->sentence(),
            'status' => $status,
            'short_description' => $this->faker->paragraph(),
            'description' => $this->faker->paragraph(3),
            'base_price' => $this->faker->randomFloat(2, 1000, 5000),
            'published_at' => $status === PageStatus::Published ? now() : null,
            'stock' => $stock,
            'stock_status' => $stock_status,
            'manage_stock' => $manage_stock,
        ];
    }
}
