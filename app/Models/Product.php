<?php

namespace App\Models;

use App\PageStatus;
use App\ProductTypes;
use App\StockStatus;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => PageStatus::class,
        'stock_status' => StockStatus::class,
        'type' => ProductTypes::class,
    ];

    protected $fillable = [
        'parent_id',
        'title',
        'status',
        'short_description',
        'description',
        'base_price',
        'base_price_on_sale',
        'type',
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

    public function tags (): BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            'tag_products',
            'product_id',
            'tag_id'
        );
    }

    public function attributes (): BelongsToMany
    {
        return $this->belongsToMany(
            Attribute::class,
            'attribute_products',
            'product_id',
            'attribute_id'
        );
    }

    public function terms (): BelongsToMany
    {
        return $this->belongsToMany(
            Term::class,
            'term_products',
            'product_id',
            'term_id'
        );
    }

    public function variations (): HasMany
    {
        return $this->hasMany(
            Product::class,
            'parent_id',
            'id'
        )
            ->where('type', 'variation');
    }

    public function parent (): BelongsTo
    {
        return $this->belongsTo(
            Product::class,
            'parent_id',
            'id'
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

    #[Scope]
    protected function scopeSimple (Builder $query): Builder
    {
        return $query->where('type', '=', ProductTypes::Simple);
    }

    #[Scope]
    protected function scopeVariation (Builder $query): Builder
    {
        return $query->where('type', '=', ProductTypes::Variation);
    }

    #[Scope]
    protected function scopeVariable (Builder $query): Builder
    {
        return $query->where('type', '=', ProductTypes::Variable);
    }

    #[Scope]
    protected function scopeCatalog (Builder $query): Builder
    {
        return $query->whereIn('type', [ProductTypes::Simple, ProductTypes::Variation]);
    }
}
