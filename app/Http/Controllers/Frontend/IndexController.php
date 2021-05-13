<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $banners = Banner::where([
            'status'     => 'active',
            'condition'  => 'banner'
        ])
            ->orderBy('id', 'DESC')
            ->limit('5')
            ->get();

        $categories = Category::orderBy('id', 'DESC')
            ->get();

        $products = Product::where([
            'status'     => 'active',
            'condition'  => 'new'
        ])
            ->orderBy('id', 'DESC')
            ->limit('4')
            ->get();

        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        return view('frontend.home',
            compact('banners','categories', 'brands', 'products'));
    }
}
