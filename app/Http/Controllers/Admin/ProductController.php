<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateProductForm;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return view('backend.products.index', compact('products'));
    }

    public function productStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('products')->where('id', $request->id)
                ->update(['status' => 'active']);
        }
        else {
            DB::table('products')->where('id', $request->id)
                ->update(['status' => 'inactive']);
        }
        return response()->json([
            'message' => 'Product was successfully updated',
            'status' => true
        ]);
    }

    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $brands = Brand::orderBy('created_at', 'DESC')->get();
        $vendors = Vendor::orderBy('created_at', 'DESC')->get();

        return view('backend.products.create',
            compact('categories', 'brands', 'vendors'));
    }

    public function store(ValidateProductForm $request)
    {
        $status = Product::create($request->all());

        if ($status) {
            return redirect()->route('products.index')
                ->with('success', 'New product has been created successfully');
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $brands     = Brand::orderBy('created_at', 'DESC')->get();
        $vendors    = Vendor::orderBy('created_at', 'DESC')->get();

        if ($product) {
            return view('backend.products.edit',
                compact('product','categories', 'brands', 'vendors'));
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->all();

        $status = $product->fill($data)->save();

        if ($status) {
            return redirect()->route('products.index')
                ->with('success', 'Product has been updated successfully');
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $status = $product->delete();

            if ($status) {
                return redirect()->route('products.index')
                    ->with('success', 'Product was successfully deleted');
            }
            else {
                return back()->with('error', 'Something went wrong');
            }
        }

        return back()->with('error', 'Data is not found');
    }
}
