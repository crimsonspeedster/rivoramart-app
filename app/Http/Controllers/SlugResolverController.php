<?php

namespace App\Http\Controllers;

use App\Enums\PageStatus;
use App\Enums\ProductTypes;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slug;
use App\Models\Tag;
use App\Services\ProductService;
use Illuminate\View\View;

class SlugResolverController extends Controller
{
    public function resolver (string $slug) : View
    {
        $slugModel = Slug::where('slug', $slug)->firstOrFail();
        $model = $slugModel->entity;

        switch (get_class($model)) {
            case Product::class:
                return $this->resolveProducts($model);

            case Tag::class:
            case Category::class:
                return $this->resolveCategories($model);

            default:
                abort(404);
        }
    }

    public function resolveProducts (Product $product) : View
    {
        abort_unless($product->status === PageStatus::Published, 404);
        abort_if($product->type === ProductTypes::Variable, 404);

        $productService = new ProductService();

        $ratings = $productService->getRatings($product);
        $reviews = $productService->getReviews($product);
        $ratingDistribution = $productService->getRatingDistribution($product);
        $categories = $productService->getCategories($product);
        $tags = $productService->getTags($product);
        $variationMatrix = $productService->getVariationMatrix($product);

        $totalReviews = $ratings->isNotEmpty() ? $ratings->sum() : 0;

        return view('templates.product', compact('product', 'totalReviews', 'ratings', 'ratingDistribution', 'reviews', 'categories', 'tags', 'variationMatrix', 'totalReviews'));
    }

    public function resolveCategories (Category $category) : View
    {
        return view('templates.categories', compact('category'));
    }
}
