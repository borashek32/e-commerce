<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateBrandForm;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();

        return view('backend.brands.index', compact('brands'));
    }

    public function brandStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('brands')->where('id', $request->id)
                ->update(['status' => 'active']);
        }
        else {
            DB::table('brands')->where('id', $request->id)
                ->update(['status' => 'inactive']);
        }
        return response()->json([
            'message' => 'Brand was successfully updated',
            'status' => true
        ]);
    }

    public function create()
    {
        return view('backend.brands.create');
    }

    public function store(ValidateBrandForm $request)
    {
        $status = Brand::create($request->all());

        if ($status) {
            return redirect()->route('brands.index')
                ->with('success', 'New brand has been created successfully');
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Brand $brand)
    {
        if ($brand) {
            return view('backend.brands.edit', compact('brand'));
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function update(ValidateBrandForm $request, Brand $brand)
    {
        $brand->photo         =   $request->photo;
        $brand->title         =   $request->title;
        $brand->status        =   $request->status;
        $brand->save();

        return redirect()->route('brands.index')
            ->with('success', 'Brand was successfully updated');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);

        if ($brand) {
            $status = $brand->delete();

            if ($status) {
                return redirect()->route('brands.index')
                    ->with('success', 'Brand was successfully deleted');
            }
            else {
                return back()->with('error', 'Something went wrong');
            }
        }

        return back()->with('error', 'Data is not found');
    }
}
