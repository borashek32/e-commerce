<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateCategoryForm;
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

    public function store(ValidateCategoryForm $request)
    {
        $data   =  $request->all();
        $status =  Category::create($data);

        if ($status) {
            return redirect()->route('categories.index')
                ->with('success', 'New category has been created successfully');
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        if ($category) {
            return view('backend.categories.edit', compact('category'));
        }
        else {
            return redirect()->route('categories.index')
                ->with('error', 'Category was not found');
        }
    }

    public function update(ValidateCategoryForm $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->all();

        $status = $category->fill($data)->save();

        if ($status) {
            return redirect()->route('categories.index')
                ->with('success', 'Category has been updated successfully');
        }
        else {
            return back()->with('error', 'Something went wrong');
        }
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
