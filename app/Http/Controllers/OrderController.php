<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::all();

        return view('admin.orders.index', $data);
    }

    public function confirmOrder($id)
    {
        // Find the order
        $order = Order::find($id);

        $order->status = 'CONFIRMED';
        $order->save();

        // Session message
        session()->flash('msg','Order has been confirmed');

        // Redirect the page
        return redirect('admin/orders');
    }

    public function processOrder($id)
    {
        // Find the order
        $order = Order::find($id);

        // Update the Order
        $order->update([
            'status' => 'PROCESSED',
        ]);

        // Session message
        session()->flash('msg','Order has been proceed');

        // Redirect the page
        return redirect('admin/orders');
    }

    public function sendOrder($id)
    {
        // Find the order
        $order = Order::find($id);

        // Update the Order
        $order->update([
            'status' => 'SENDING',
        ]);

        // Session message
        session()->flash('msg','Order has been send');

        // Redirect the page
        return redirect('admin/orders');
    }
}
