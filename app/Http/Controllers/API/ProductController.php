<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        if ($request->name != null) {
            $products = Product::where('name', 'like', '%' . $request->name . '%')->get();
        } else {
            $products = Product::all();
        }

        return ResponseFormatter::success([
            'products' => $products
        ], 'Success get products');
    }

    public function show(Product $product)
    {
        return ResponseFormatter::success([
            'product' => $product
        ], 'Success get product');
    }
}
