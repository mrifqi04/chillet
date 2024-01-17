<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('home.checkout.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal' => 'required',
            'phone' => 'required',
            'payment_method' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $total = 0;

            // Insert into orders table
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'date' => Carbon::now(),
                'address' => $request->address,
                'city' => $request->city,
                'province' => $request->province,
                'postal' => $request->postal,
                'telephone' => $request->phone,
                'payment_method' => $request->payment_method,
                'information' => $request->information,
                'status' => 'PENDING'
            ]);

            // Insert into order items table
            foreach ($request->orders as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                $total += $item['price'] * $item['quantity'];

                CartItem::destroy($item['id']);
                Cart::destroy($item['cart_id']);
            }

            $order->total = $total;
            $order->save();

            DB::commit();

            return ResponseFormatter::success([
                'order' => $order
            ], 'Success create order');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
