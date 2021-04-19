<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateBannerForm;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('id', 'desc')->get();

        return view('backend.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('backend.banners.create');
    }

    public function store(ValidateBannerForm $request)
    {
        Banner::create($request->all());

        return redirect()->route('banners.index')
            ->with('success', 'New banner has been created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit(Banner $banner)
    {
        return view('backend.banners.edit', compact('banner'));
    }

    public function update(ValidateBannerForm $request, Banner $banner)
    {
        $banner->photo         =   $request->photo;
        $banner->title         =   $request->title;
        $banner->description   =   $request->description;
        $banner->save();

        return redirect()->route('banners.index')
            ->with('success', 'Banner was successfully updated');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();

        return redirect()->route('banners.index')
            ->with('success', 'Banner was successfully deleted');
    }
}
