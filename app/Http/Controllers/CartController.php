<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CartController extends Controller
{
    public function show () : View
    {
        return view('pages.cart');
    }

    public function add (Request $request, CartService $cartService)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'nullable|integer|min:1'
        ]);

        $product = Product::find($request->product_id);

        if (!$product->isPublished()) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        $cart = $cartService->addItemToCart($product, (int)$request->quantity);

        return response()->json([
            'success' => true,
            'cart_token' => $cart->token,
            'cart_items' => $cart->items()->get()->map(fn (CartItem $cartItem) => [
                'id' => $cartItem->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
            ])->toArray(),
            'items_total' => $cart->totalQuantity(),
            'items_unique' => $cart->uniqueItemsCount(),
        ]);
    }
}
