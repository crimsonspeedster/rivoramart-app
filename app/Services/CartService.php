<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;

class CartService
{
    public function getCart (): Cart
    {
        $user_id = auth()->id();
        $token = request()->cookie('cart_token', Str::uuid()->toString());

        if ($user_id) {
            $cart = Cart::firstOrCreate(
                ['user_id' => $user_id],
                ['user_id' => $user_id, 'token' => $token]
            );
        }
        else {
            $cart = Cart::firstOrCreate([
                'user_id' => null,
                'token' => $token,
            ]);

            cookie()->queue('cart_token', $token, 60*24*7);
        }

        return $cart;
    }

    public function addItemToCart (Product $product, int $quantity = 1): Cart
    {
        $cart = $this->getCart();
        $cart->addItem($product, $quantity);
        return $cart;
    }
}
