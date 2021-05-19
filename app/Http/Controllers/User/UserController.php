<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userDashboard()
    {
        $user = Auth::user();

        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        return view('frontend.user.dashboard',
            compact('brands', 'user'));
    }

    public function userOrder()
    {
        $user = Auth::user();

        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        return view('frontend.user.order',
            compact('brands', 'user'));
    }

    public function userAddress()
    {
        $user = Auth::user();

        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        return view('frontend.user.address',
            compact('brands', 'user'));
    }

    public function userAccount()
    {
        $user = Auth::user();

        $brands = Brand::orderBy('id', 'DESC')
            ->get();

        return view('frontend.user.account',
            compact('brands', 'user'));
    }

    public function updateAccount(Request $request, $id)
    {
        $hashPassword = Auth::user()->password;

        if ($request->oldPassword == null && $request->newPassword == null) {
            User::where('id', $id)->update([
                'full_name'    =>    $request->full_name,
                'username'     =>    $request->username,
                'email'        =>    $request->email,
                'phone'        =>    $request->phone
            ]);

            return back()->with('success', 'Account was successfully updated');
        }
        else {
            if (Hash::check($request->oldPassword, $hashPassword)) {
                if (!Hash::check($request->newPassword, $hashPassword)) {
                    User::where('id', $id)->update([
                        'full_name'    =>    $request->full_name,
                        'username'     =>    $request->username,
                        'email'        =>    $request->email,
                        'phone'        =>    $request->phone,
                        'password'     =>    Hash::make($request->newPassword)
                    ]);

                    return back()->with('success', 'Account was successfully updated');
                }
                else {
                    return back()->with('error', 'New password can not be the same as the old password');
                }
            }
            else {
                return back()->with('error', 'Old password does not match');
            }
        }
    }
}
