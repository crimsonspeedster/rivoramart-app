<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slug;
use App\PageStatus;
use Illuminate\Http\Request;
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

            case Category::class:
                return $this->resolveCategories($model);

            default:
                abort(404);
        }
    }

    public function resolveProducts (Product $product) : View
    {
        abort_unless($product->status === PageStatus::Published, 404);

        $ratings = $product->reviews()
            ->where('status', 'published')
            ->selectRaw('FLOOR(rating) as rating_int, COUNT(*) as count')
            ->groupBy('rating_int')
            ->pluck('count', 'rating_int');

        $totalReviews = $ratings->sum();

        return view('templates.product', compact('product', 'totalReviews', 'ratings'));
    }

    public function resolveCategories (Category $category) : View
    {
        return view('templates.categories', compact('category'));
    }
}
