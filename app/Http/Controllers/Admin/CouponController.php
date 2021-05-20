<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateCouponForm;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'desc')->get();

        return view('backend.coupons.index', compact('coupons'));
    }

    public function couponStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('coupons')->where('id', $request->id)
                ->update(['status' => 'active']);
        }
        else {
            DB::table('coupons')->where('id', $request->id)
                ->update(['status' => 'inactive']);
        }
        return response()->json([
            'message' => 'The coupon was successfully updated',
            'status' => true
        ]);
    }

    public function create()
    {
        return view('backend.coupons.create');
    }

    public function store(ValidateCouponForm $request)
    {
        $data   =  $request->all();
        $status =  Coupon::create($data);

        if ($status) {
            return redirect()->route('coupons.index')
                ->with('success', 'New coupon has been created successfully');
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Coupon $coupon)
    {
        if ($coupon) {
            return view('backend.coupons.edit', compact('coupon'));
        }
        else {
            return redirect()->route('coupons.index')
                ->with('error', 'Coupon was not found');
        }
    }

    public function update(ValidateCouponForm $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $data = $request->all();

        $status = $coupon->fill($data)->save();

        if ($status) {
            return redirect()->route('coupons.index')
                ->with('success', 'Coupon has been updated successfully');
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        $coupon = Coupon::find($id);

        if ($coupon) {
            $status = $coupon->delete();

            if ($status) {
                return redirect()->route('coupons.index')
                    ->with('success', 'Coupon was successfully deleted');
            }
            else {
                return back()->with('error', 'Something went wrong');
            }
        }
        return back()->with('error', 'Data is not found');
    }
}
