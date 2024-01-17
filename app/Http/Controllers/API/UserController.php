<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);


            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $token = JWTAuth::attempt($credentials);

            return ResponseFormatter::success([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }

    public function verifyPayment(Request $request, $id)
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

            return ResponseFormatter::success($order, 'Wait for your payment to verified by Admin');
        } else {
            return ResponseFormatter::error('No file was uploaded');
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

        return ResponseFormatter::success($order, 'Thank you for order! :)');
    }

    public function orders(Request $request)
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->with(['OrderItem.Product'])
            ->get();

        return ResponseFormatter::success(
            $orders,
            'Success get all orders'
        );
    }

    public function showOrder($id)
    {
        $order = Order::find($id);

        return ResponseFormatter::success($order, 'Data order user berhasil diambil');
    }

    function invoice($id)
    {
        $order = Order::find($id);

        return ResponseFormatter::success($order, 'Success get invoice');
    }
}
