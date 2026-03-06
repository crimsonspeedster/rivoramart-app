<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use App\PageStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement([PageStatus::Draft, PageStatus::Published]);

        return [
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->realText(),
            'entity_type' => Product::class,
            'status' => $status,
            'published_at' => $status === PageStatus::Published ? now() : null,
        ];
    }
}
