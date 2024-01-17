<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total'
    ];

    public function CartItems()
    {
        $cartItems = CartItem::where('cart_id', $this->id)
            ->with('Product')
            ->get();

        return $cartItems;
    }

    public function CartProduct($id)
    {
        $cartItem = CartItem::where('product_id', $id)
            ->where('cart_id', $this->id)
            ->first();

        return $cartItem;
    }

    public function CartTotal()
    {
        $total = CartItem::where('cart_id', $this->id)
            ->sum('price');

        return $total;
    }

    public function TotalItems()
    {
        $total = CartItem::where('cart_id', $this->id)
            ->sum('quantity');

        return $total;
    }
}
