<?php

namespace App\Services;

use App\Enums\ProductTypes;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductService
{
    public function transformProduct (Product $product) : array
    {
        $ratings = $this->getRatings($product);

        return [
            'product' => $product,
            'ratings' => $ratings,
        ];
    }

    public function getCategories(Product $product) : Collection
    {
        $baseProduct = $product->type === ProductTypes::Variation
            ? $product->parent
            : $product;

        return $baseProduct?->categories()->get() ?? collect();
    }

    public function getTags (Product $product) : Collection
    {
        $baseProduct = $product->type === ProductTypes::Variation
            ? $product->parent
            : $product;

        return $baseProduct?->tags()->get() ?? collect();
    }

    public function getReviews (Product $product) : Collection
    {
        $baseProduct = $product->type === ProductTypes::Variation
            ? $product->parent
            : $product;

        return $baseProduct?->reviews()->published()->get() ?? collect();
    }

    public function getAttributes (Product $product) : Collection
    {
        $baseProduct = $product->type === ProductTypes::Variation
            ? $product->parent
            : $product;

        return $baseProduct?->attributes()->get() ?? collect();
    }

    public function getRatings (Product $product) : Collection
    {
        $baseProduct = $product->type === ProductTypes::Variation
            ? $product->parent
            : $product;

        return  $baseProduct?->reviews()
            ->where('status', 'published')
            ->selectRaw('FLOOR(rating) as rating_int, COUNT(*) as count')
            ->groupBy('rating_int')
            ->pluck('count', 'rating_int') ?? collect();
    }

    public function getRatingDistribution (Product $product): array
    {
        $ratings = $this->getRatings($product);
        $totalReviews = $ratings->isNotEmpty() ? $ratings->sum() : 0;

        $result = [];

        foreach (range(5,1) as $star) {
            $count = $ratings[$star] ?? 0;

            $result[] = [
                'star' => $star,
                'count' => $count,
                'percent' => $totalReviews > 0
                    ? ($count / $totalReviews) * 100
                    : 0,
            ];
        }

        return $result;
    }

//    public function getVariationMatrix(Product $product): Collection
//    {
//        if ($product->type !== ProductTypes::Variation || !$product->parent) {
//            return collect();
//        }
//
//        $currentTermIds = $product->terms->pluck('id');
//
//        $variations = $product->parent
//            ->variations()
//            ->whereHas('terms', function ($query) use ($currentTermIds) {
//                $query->whereIn('terms.id', $currentTermIds);
//            })
//            ->with('terms.attribute')
//            ->get();
//
//        return $variations
//            ->flatMap(function ($variation) {
//                return $variation->terms->map(function ($term) use ($variation) {
//                    return [
//                        'attribute' => $term->attribute,
//                        'term' => $term,
//                        'product' => $variation,
//                    ];
//                });
//            })
//            ->groupBy(fn($item) => $item['attribute']->id)
//            ->map(function ($items) {
//                return [
//                    'attribute' => $items->first()['attribute'],
//                    'terms' => $items
//                        ->unique(fn($item) => $item['term']->id)
//                        ->values()
//                        ->map(fn($item) => [
//                            'term' => $item['term'],
//                            'product' => $item['product'],
//                        ])
//                ];
//            })
//            ->values();
//    }

    public function getVariationMatrix(Product $variation): Collection
    {
        if ($variation->type !== ProductTypes::Variation || !$variation->parent) {
            return collect();
        }

        $parent = $variation->parent->loadMissing('variations.terms.attribute');

        $matrix = [];

        foreach ($parent->variations as $v) {
            foreach ($v->terms as $term) {

                $attrSlug = $term->attribute->slug;

                if (!isset($matrix[$attrSlug])) {
                    $matrix[$attrSlug] = [
                        'attribute' => $term->attribute,
                        'terms' => [],
                    ];
                }

                $matrix[$attrSlug]['terms'][] = [
                    'term' => $term,
                    'product' => $v,
                ];
            }
        }

        return collect($matrix)
            ->map(function ($item) {
                $item['terms'] = collect($item['terms'])
                    ->unique(fn($x) => $x['term']->id)
                    ->values();

                return $item;
            })
            ->values();
    }
}
