<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

    public function loginAuth()
    {
        return view('frontend.auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email'      =>   'email|required|exists:users,email',
            'password'   =>   'required|min:4'
        ]);

        if (Auth::attempt([
            'email'      =>   $request->email,
            'password'   =>   $request->password,
            'status'     =>   'active'
        ]))
        {
            Session::put('user', $request->email);

            if (Session::get('url.intended'))
            {
                return Redirect::to(Session::get('url.intended'));
            }
            else
            {
                return redirect()->route('home')->with('success', 'Successfully login');
            }
        }
        else
        {
            return back()->with('error', 'Invalid email or password');
        }
    }

    public function registerAuth()
    {
        return view('frontend.auth.register');
    }

    public function registerSubmit(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string',
            'email'     => 'required|email',
            'password'  => 'required|min:8|confirmed'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        if ($check)
        {
            return redirect()->route('home');
        }
        else
        {
            return back();
        }
    }

    private function create(array $data)
    {
        return User::create([
            'full_name' => $data['full_name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password'])
        ]);
    }
}
