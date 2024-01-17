<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::where('user_id', $request->user()->id)
            ->first();

        return ResponseFormatter::success([
            'total_item' => $cart->TotalItems(),
            'cart' => $cart,
            'cart_items' => $cart->CartItems()
        ], 'Success add to cart');
    }

    public function addCart(Product $product, Request $request)
    {
        $cart = Cart::where('user_id', $request->user()->id)
            ->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = $request->user()->id;
            $cart->save();
        }

        $cartItem = $cart->CartProduct($product->id);
        if (!$cartItem) {
            $cartItem = new CartItem();
            $cartItem->product_id = $product->id;
            $cartItem->cart_id = $cart->id;
        }

        $cartItem->quantity += $request->quantity;
        $cartItem->price = $cartItem->quantity * $product->price;
        $cartItem->save();

        $cart->total = $cart->CartTotal();
        $cart->save();

        return ResponseFormatter::success([
            'total_item' => count($cart->CartItems()),
            'cart' => $cart,
            'cart_items' => $cart->CartItems()
        ], 'Success add to cart');
    }

    public function removeCart(Product $product, Request $request)
    {
        $cart = Cart::where('user_id', $request->user()->id)
            ->first();

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        $cartItem->quantity -= $request->quantity;
        $cartItem->price = $cartItem->quantity * $product->price;
        $cartItem->save();

        $cartItem->quantity <= 0 ? $cartItem->delete() : '';

        $cart->total = $cart->CartTotal();
        $cart->save();

        return ResponseFormatter::success([
            'total_item' => count($cart->CartItems()),
            'cart' => $cart,
            'cart_items' => $cart->CartItems()
        ], 'Success add to cart');
    }
}
