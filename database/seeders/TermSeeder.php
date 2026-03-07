<?php

namespace Database\Seeders;

use App\AttributeTypes;
use App\Models\Attribute;
use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = Attribute::all();

        foreach ($attributes as $attribute) {

            switch ($attribute->type) {
                case AttributeTypes::Text:
                    $values = ['XS', 'S', 'M', 'L', 'XL'];
                    break;

                case AttributeTypes::Color:
                    $values = [
                        ['title' => 'Red', 'value' => '#FF0000'],
                        ['title' => 'Green', 'value' => '#00FF00'],
                        ['title' => 'Blue', 'value' => '#0000FF'],
                        ['title' => 'Black', 'value' => '#000000'],
                        ['title' => 'White', 'value' => '#FFFFFF'],
                    ];
                    break;

                case AttributeTypes::Image:
                    $values = [
                        ['title' => 'Leather', 'value' => '/images/materials/leather.png'],
                        ['title' => 'Cotton', 'value' => '/images/materials/cotton.png'],
                        ['title' => 'Denim', 'value' => '/images/materials/denim.png'],
                    ];
                    break;

                default:
                    $values = [];
            }

            foreach ($values as $value) {
                if (is_array($value)) {
                    $title = $value['title'];
                    $termValue = $value['value'];
                } else {
                    $title = $value;
                    $termValue = $value;
                }

                Term::factory()->create([
                    'attribute_id' => $attribute->id,
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'value' => $termValue,
                ]);
            }
        }
    }
}
