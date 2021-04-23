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
        $parent_cats = Category::where('is_parent', 1)
            ->orderBy('title', 'ASC')
            ->get();

        return view('backend.categories.create', compact('parent_cats'));
    }

    public function store(ValidateCategoryForm $request)
    {
        $data = $request->all();
        $data['is_parent'] = $request->input('parent_id', 0);
//        $data['is_parent'] = $request->input('is_parent', 0);
        //
        if($request->is_parent == 1) {
            $data['parent_id'] = null;
        }
        if($request->is_parent == 0) {
            $data['parent_id'] = true;
        }
        //
        $status = Category::create($data);

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

    public function edit($id)
    {
        $category = Category::find($id);

        if ($category) {
            $parent_cats = Category::where('is_parent', 1)
                ->orderBy('title', 'ASC')
                ->get();

            return view('backend.categories.edit', compact('category', 'parent_cats'));
        }
        else {
            return redirect()->route('categories.index')
                ->with('error', 'Category was not found');
        }
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            $this->validate($request, [
                'title'     => 'required|string',
                'summary'   => 'string|nullable',
                'is_parent' => 'sometimes|in:1',
                'parent_id' => 'nullable|exists:categories,id',
                'status'    => 'required|in:active,inactive'
            ]);

            $data = $request->all();

//            if ($request->is_parent == 1) {
//                $data['parent_id'] = null;
//            }

            //$data['is_parent'] = $request->input('is_parent', 0);
            //
            if($request->is_parent == 1) {
                $data['parent_id'] = null;
            }
            //
            $status = $category->fill($data)->save();

            if ($status) {
                return redirect()->route('categories.index')
                    ->with('success', 'Category has been updated successfully');
            }
            else {
                return back()->with('error', 'Something went wrong');
            }
        }
        else {
            return back()->with('error', 'Category was not found');
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

    public function getChildByParentId(Request $request, $id)
    {
        $category = Category::find($request->id);

        if ($category) {
            $child_id = Category::getChildByParentId($request->id);

            if (count($child_id) <= 0) {
                return response()->json([
                    'status' => false,
                    'data'   => null,
                    'msg'    => 'Category does not have any subcategories'
                ]);
            }
            return response()->json([
                'status' => true,
                'data'   => $child_id,
                'msg'    => ''
            ]);
        }
        else {
            return response()->json([
                'status' => false,
                'data'   => null,
                'msg'    => 'Category is not found'
            ]);
        }
    }
}
