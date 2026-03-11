<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $fillable = [
        'token',
        'user_id',
    ];

    public function items (): HasMany
    {
        return $this->hasMany(
            CartItem::class,
            'cart_id',
            'id'
        );
    }

    public function addItem(Product $product, int $quantity = 1): CartItem
    {
        $item = $this->items()
            ->where('product_id', '=', $product->id)
            ->first();

        if ($item) {
            $item->increaseQuantity($quantity);
            return $item;
        }

        $item = CartItem::create([
            'cart_id' => $this->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
        ]);

        $this->items->push($item);

        return $item;
    }

    public function totalQuantity(): int
    {
        return $this->items->sum('quantity');
    }

    public function uniqueItemsCount(): int
    {
        return $this->items->count();
    }
}
