<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $users = User::all();

        foreach ($products as $product) {
            $randomUsers = $users->random(rand(1, 5));

            foreach ($randomUsers as $user) {
                $review = Review::factory()->create([
                    'entity_id' => $product->id,
                    'user_id' => $user->id,
                ]);

                $oldCount = $product->comment_counts;
                $oldRating = $product->rating;

                $newCount = $oldCount + 1;

                $newRating = (($oldRating * $oldCount) + $review->rating) / $newCount;

                $product->update([
                    'comment_counts' => $newCount,
                    'rating' => round($newRating, 2),
                ]);
            }
        }
    }
}
