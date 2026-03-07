<?php

namespace Database\Factories;

use App\AttributeTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribute>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug(),
            'type' => $this->faker->randomElement([AttributeTypes::Text, AttributeTypes::Color]),
        ];
    }
}
