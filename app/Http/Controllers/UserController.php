<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);

        $data['user'] = $user;
        $data['orders_unsuccess'] = Order::where('user_id', $user->id)
            ->where('status', '!=', 'Success')->get();
        $data['orders_success'] = Order::where('user_id', $user->id)
            ->where('status', 'Success')->get();

        return view('home.profile.index', $data);
    }

    public function showOrder($id)
    {
        $data['order'] = Order::find($id);

        return view('home.profile.details', $data);
    }

    public function verifyOrder($id, Request $request)
    {
        $order = Order::find($id);

        if ($request->hasFile('payment')) {
            $payment = $request->payment;
            $payment->move('uploads', $payment->getClientOriginalName());
            $order->payment = $request->payment->getClientOriginalName();

            $order->update([
                'payment' => $order->payment,
                'status' => 'VERIFYING'
            ]);

            $request->session()->flash('msg', 'Wait for your payment to verified by Admin');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function successOrder($id)
    {
        // Find the order
        $order = Order::find($id);

        // Update the Order
        $order->update([
            'status' => 'SUCCESS'
        ]);

        return redirect('/user/profile');
    }
}
