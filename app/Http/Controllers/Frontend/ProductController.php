<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function newProducts()
    {
        $products = Product::where([
            'status'     => 'active',
            'condition'  => 'new'
        ])
            ->orderBy('id', 'DESC')
            ->paginate(8);

        $banners = Banner::where([
            'status'     => 'active',
            'condition'  => 'banner'
        ])
            ->orderBy('id', 'DESC')
            ->limit('5')
            ->get();

        $categories = Category::orderBy('id', 'DESC')
            ->get();

        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        return view('frontend.products.new-products',
            compact('banners','categories', 'products', 'brands'));
    }

    public function winterProducts()
    {
        $products = Product::where([
            'status'     => 'active',
            'condition'  => 'winter'
        ])
            ->orderBy('id', 'DESC')
            ->paginate(8);

        $banners = Banner::where([
            'status'     => 'active',
            'condition'  => 'banner'
        ])
            ->orderBy('id', 'DESC')
            ->limit('5')
            ->get();

        $categories = Category::orderBy('id', 'DESC')
            ->get();

        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        return view('frontend.products.winter-products',
            compact('banners','categories', 'products', 'brands'));
    }

    public function products()
    {
        $products = Product::where([
            'status'     => 'active'
        ])
            ->orderBy('id', 'DESC')
            ->paginate(8);

        $products->withPath('/products');

        $banners = Banner::where([
            'status'     => 'active',
            'condition'  => 'banner'
        ])
            ->orderBy('id', 'DESC')
            ->limit('5')
            ->get();

        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        $categories = Category::orderBy('id', 'DESC')
            ->get();

        return view('frontend.products.products',
            compact('banners','categories', 'products', 'brands'));
    }

    public function product($slug)
    {
        $item = Product::with('relatedProducts')
            ->where('slug', $slug)->first();

        $banners = Banner::where([
            'status'     => 'active',
            'condition'  => 'banner'
        ])
            ->orderBy('id', 'DESC')
            ->limit('5')
            ->get();

        $categories = Category::orderBy('id', 'DESC')
            ->get();

        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        return view('frontend.products.product',
            compact('banners','categories', 'brands', 'item'));
    }
}
