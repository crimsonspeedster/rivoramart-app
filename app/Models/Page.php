<?php

namespace App\Models;

use App\Enums\PageStatus;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Page extends Model
{
    use HasFactory;

    protected $casts = [
        'content' => 'array',
        'status' => PageStatus::class,
        'published_at' => 'datetime',
    ];

    protected $fillable = [
        'title',
        'content',
        'status',
        'published_at',
    ];

    public function sluggable (): MorphOne
    {
        return $this->morphOne(
            Slug::class,
            'entity',
            'entity_type',
            'entity_id',
        );
    }

    #[Scope]
    protected function scopePublished (Builder $query): Builder
    {
        return $query->where('status', '=', PageStatus::Published);
    }
}
