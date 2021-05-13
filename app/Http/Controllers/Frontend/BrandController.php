<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brand($slug)
    {
        $categories = Category::orderBy('id', 'DESC')
            ->get();

        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        $brand = Brand::where('slug', $slug)->first();

        $products = Product::where([
            'status'     => 'active',
            'condition'  => 'new',
            'category_id'=> $brand->id
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

        return view('frontend.brands.brand',
            compact('brand', 'brands', 'categories', 'products', 'banners'));
    }

    public function brands()
    {
        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        return view('frontend.brands.brands',
            compact('brands'));
    }
}
