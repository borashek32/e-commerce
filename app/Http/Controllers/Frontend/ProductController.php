<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
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
            ->get();

        $banners = Banner::where([
            'status'     => 'active',
            'condition'  => 'banner'
        ])
            ->orderBy('id', 'DESC')
            ->limit('5')
            ->get();

        $categories = Category::where([
            'status'     => 'active'
        ])
            ->limit('6')
            ->orderBy('id', 'DESC')
            ->get();

        return view('frontend.products.new-products',
            compact('banners','categories', 'products'));
    }
}
