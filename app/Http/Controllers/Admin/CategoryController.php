<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('backend.categories.index', compact('categories'));
    }

    public function categoryStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('categories')->where('id', $request->id)
                ->update(['status' => 'active']);
        }
        else {
            DB::table('categories')->where('id', $request->id)
                ->update(['status' => 'inactive']);
        }
        return response()->json([
            'message' => 'The category was successfully updated',
            'status' => true
        ]);
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category) {
            $status = $category->delete();

            if ($status) {
                return redirect()->route('categories.index')
                    ->with('success', 'Category was successfully deleted');
            }
            else {
                return back()->with('error', 'Something went wrong');
            }
        }

        return back()->with('error', 'Data is not found');
    }
}
