<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($slug)
    {
        $category = Category::with('products')
            ->where('slug', $slug)->first();

        $brands = Brand::orderBy('id', 'DESC')
            ->get();

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
            'condition'  => 'new',
            'category_id'=> $category->id
        ])
            ->orderBy('id', 'DESC')
            ->paginate(8);

        return view('frontend.categories.category',
            compact('category', 'brands', 'categories', 'banners', 'products'));
    }

    public function categories()
    {
        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        $banners = Banner::where([
            'status'     => 'active',
            'condition'  => 'banner'
        ])
            ->orderBy('id', 'DESC')
            ->limit('5')
            ->get();

        $categories = Category::orderBy('id', 'DESC')
            ->get();

        return view('frontend.categories.categories',
            compact('categories', 'brands', 'banners'));
    }
}
