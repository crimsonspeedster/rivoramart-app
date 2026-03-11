<?php

namespace Database\Factories;

use App\Enums\PageStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement([PageStatus::Published, PageStatus::Draft]);

        return [
            'title' => $this->faker->sentence(),
            'content' => [],
            'status' => $status,
            'published_at' => $status === PageStatus::Published ? now() : null,
        ];
    }
}
