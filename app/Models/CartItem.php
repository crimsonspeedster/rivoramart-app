<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    public function cart (): BelongsTo
    {
        return $this->belongsTo(
            Cart::class,
            'cart_id',
            'id'
        );
    }

    public function product (): BelongsTo
    {
        return $this->belongsTo(
            Product::class,
            'product_id',
            'id'
        );
    }

    public function increaseQuantity (int $amount = 1) : void
    {
        $this->quantity += $amount;
        $this->save();
    }
}
