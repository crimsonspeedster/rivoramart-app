<?php

namespace App\Http\Controllers;

use App\Enums\PageStatus;
use App\Enums\ProductTypes;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slug;
use App\Models\Tag;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Model;
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
                return $this->resolveTaxonomy($model);

            case Page::class:
                return $this->resolvePage($model);

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
        $related = $product->related()
            ->published()
            ->get()
            ->map(fn(Product $product) => $productService->transformProduct($product));

        $totalReviews = $ratings->isNotEmpty() ? $ratings->sum() : 0;

        return view('templates.product', compact('product', 'totalReviews', 'ratings', 'ratingDistribution', 'reviews', 'categories', 'tags', 'variationMatrix', 'totalReviews'));
    }

    public function resolveTaxonomy (Model $taxonomy) : View
    {
        $productService = new ProductService();

        $products = $taxonomy->products()
            ->published()
            ->get()
            ->map(fn(Product $product) => $productService->transformProduct($product));

        return view('templates.archive', compact('taxonomy', 'products'));
    }

    public function resolvePage (Page $page) : View
    {
        abort_unless($page->status === PageStatus::Published, 404);

        return view('templates.page', compact('page'));
    }
}
