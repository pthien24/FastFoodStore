<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        if ($category->count() > 0) {
            $data =[
            'status' => 200,
            'category' => $category,
            ];
            return response()->json($data, 200);
        } else {
            return response()->json([
            'status' => 404,
            'message' => 'No Records Found',
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'description' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->messages()], 422);
        } else {
            $category = Category::create($request->only(['name',  'description']));
        }

        if ($category) {
            return redirect()->route('admin.category.index')->with('success', 'category created successfully');
        } else {
            return response()->json(['status' => 500, 'message' => 'Something went wrong'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = Category::find($id);
        if ($category) {
            return response()->json(['status' => 200, 'student' => $category], 200);
        } else {
            return response()->json(['status' => 404, 'message' => 'no such category found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = Category::find($id);
        if ($category) {
            return response()->json(['status' => 200, 'student' => $category], 200);
        } else {
            return response()->json(['status' => 404, 'message' => 'no such category found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'description' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->messages()], 422);
        } else {
            $category = Category::find($id);
            if ($category) {
                $category->update($request->only(['name',  'description']));
                return redirect()->route('admin.category.index')->with('success', 'category update successfully');
            } else {
                return response()->json(['status' => 404, 'message' => 'no such student found'], 404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json(['status' => 200, 'message' => 'category deleted successfully'], 200);
        } else {
            return response()->json(['status' => 404, 'message' => 'no such category found'], 404);
        }
    }
}
