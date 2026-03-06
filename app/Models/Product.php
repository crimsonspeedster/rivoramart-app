<?php

namespace App\Models;

use App\PageStatus;
use App\StockStatus;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => PageStatus::class,
        'stock_status' => StockStatus::class,
    ];

    protected $fillable = [
        'title',
        'status',
        'short_description',
        'description',
        'price',
        'sale_price',
        'rating',
        'comment_counts',
        'published_at',
        'stock',
        'stock_status',
        'manage_stock',
    ];

    public function sluggable() : MorphOne
    {
        return $this->morphOne(
            Slug::class,
            'entity',
            'entity_type',
            'entity_id'
        );
    }

    public function categories () : BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'category_products',
            'product_id',
            'category_id'
        );
    }

    public function reviews () : MorphMany
    {
        return $this->morphMany(
            Review::class,
            'entity',
            'entity_type',
            'entity_id'
        );
    }

    #[Scope]
    protected function scopePublished (Builder $query)
    {
        return $query->where('status', '=', PageStatus::Published);
    }
}
