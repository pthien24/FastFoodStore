<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;

use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }
    public function edit($id)
    {
        $category = Category::find($id);
        if ($category) {
            $viewData["category"] = $category;
            return view('admin.category.edit')->with('viewData', $viewData);
        } else {
            return response()->json(['status' => 404, 'message' => 'no such category found'], 404);
        }
    }
    public function destroy($id)
    {
        $student = Category::find($id);
        if ($student) {
            $student->delete();
            return redirect()->route('admin.category.index')->with('success', 'category delete successfully');
        } else {
            return response()->json(['status' => 404, 'message' => 'no such category found'], 404);
        }
    }
}
