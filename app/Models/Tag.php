<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function sluggable (): MorphOne
    {
        return $this->MorphOne(
            Slug::class,
            'entity',
            'entity_type',
            'entity_id'
        );
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'tag_products',
            'tag_id',
            'product_id'
        );
    }
}
