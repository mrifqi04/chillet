<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Alert;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::all();

        return view('admin.products.index', $data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $product = Product::create($request->all());

            $file = $request->file('image');

            if ($file) {
                $fileName = $product->id . '-' .   $file->getClientOriginalName();
                $outputFile = '/public/uploads/product/' . $fileName;
                $image = '/storage/uploads/product/' . $fileName;

                Storage::disk('local')->put($outputFile, File::get($file));

                $product->image = $image;
                $product->save();
            }

            DB::commit();
            Alert::success('Success', 'Success create product');

            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();

            Alert::error('Failed', $e);
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data['product'] = Product::find($id);

        return view('admin.products.edit', $data);
    }

    public function update(Product $product, Request $request)
    {
        try {
            DB::beginTransaction();
            $product->update($request->all());

            $file = $request->file('image');

            if ($file) {
                $fileName = $product->id . '-' .   $file->getClientOriginalName();
                $outputFile = '/public/uploads/product/' . $fileName;
                $image = '/storage/uploads/product/' . $fileName;

                Storage::disk('local')->put($outputFile, File::get($file));

                $product->image = $image;
                $product->save();
            }

            DB::commit();

            Alert::success('Success', 'Success update product');

            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();

            Alert::error('Failed', $e);
            return redirect()->back();
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['status' => 'ok']);
    }
}
