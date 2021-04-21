<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateBannerForm;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('id', 'desc')->get();

        return view('backend.banners.index', compact('banners'));
    }

    public function bannerStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('banners')->where('id', $request->id)
                ->update(['status' => 'active']);
        }
        else {
            DB::table('banners')->where('id', $request->id)
                ->update(['status' => 'inactive']);
        }
        return response()->json([
            'message' => 'Banner was successfully updated',
            'status' => true
        ]);
    }

    public function create()
    {
        return view('backend.banners.create');
    }

    public function store(ValidateBannerForm $request)
    {
        $status = Banner::create($request->all());

        if ($status) {
            return redirect()->route('banners.index')
                ->with('success', 'New banner has been created successfully');
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Banner $banner)
    {
        if ($banner) {
            return view('backend.banners.edit', compact('banner'));
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function update(ValidateBannerForm $request, Banner $banner)
    {
        $banner->photo         =   $request->photo;
        $banner->title         =   $request->title;
        $banner->description   =   $request->description;
        $banner->status        =   $request->status;
        $banner->condition     =   $request->condition;
        $banner->save();

        return redirect()->route('banners.index')
            ->with('success', 'Banner was successfully updated');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);

        if ($banner) {
            $status = $banner->delete();

            if ($status) {
                return redirect()->route('banners.index')
                    ->with('success', 'Banner was successfully deleted');
            }
            else {
                return back()->with('error', 'Something went wrong');
            }
        }

        return back()->with('error', 'Data is not found');
    }
}
