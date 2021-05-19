<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function billingAddress(Request $request, $id)
    {
        $user = User::where('id', $id)->update([
            'country'    =>    $request->country,
            'state'      =>    $request->state,
            'city'       =>    $request->city,
            'address'    =>    $request->address,
            'postcode'   =>    $request->postcode
        ]);

        if ($user) {
            return back()->with('success', 'Your billing address was successfully updated');
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function shippingAddress(Request $request, $id)
    {
        $user = User::where('id', $id)->update([
            'scountry'    =>    $request->scountry,
            'sstate'      =>    $request->sstate,
            'scity'       =>    $request->scity,
            'saddress'    =>    $request->saddress,
            'spostcode'   =>    $request->spostcode
        ]);

        if ($user) {
            return back()->with('success', 'Your shipping address was successfully updated');
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }
}
