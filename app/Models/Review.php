<?php

namespace App\Models;

use App\Enums\PageStatus;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Review extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => PageStatus::class,
        'published_at' => 'datetime',
    ];

    protected $fillable = [
        'rating',
        'comment',
        'entity_type',
        'entity_id',
        'status',
        'published_at',
        'user_id',
    ];

    public function entity(): MorphTo
    {
        return $this->morphTo(
            null,
            'entity_type',
            'entity_id',
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    #[Scope]
    protected function scopePublished(Builder $query)
    {
        return $query->where('status', '=', PageStatus::Published);
    }
}
