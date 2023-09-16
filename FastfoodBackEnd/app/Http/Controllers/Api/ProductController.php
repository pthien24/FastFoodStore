<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        if ($product->count() > 0) {
            $data =[
            'status' => 200,
            'product' => $product,
            ];
            return response()->json($data, 200);
        } else {
            return response()->json([
            'status' => 404,
            'message' => 'No Records Found',
            ], 404);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'price' => 'required',
            'description' => 'required|string|max:191',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->messages()], 422);
        } else {
            $product = Product::create($request->only(['name', 'price', 'description', 'image', 'category_id']));
        }

        if ($product) {
            return response()->json(['status' => 500, 'message' => 'successfully'], 500);
            // return redirect()->route('admin.students.index')->with('success', 'Student created successfully');
        } else {
            return response()->json(['status' => 500, 'message' => 'Something went wrong'], 500);
        }
    }
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json(['status' => 200, 'product' => $product], 200);
        } else {
            return response()->json(['status' => 404, 'message' => 'no such product found'], 404);
        }
    }
    public function edit($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json(['status' => 200, 'student' => $student], 200);
        } else {
            return response()->json(['status' => 404, 'message' => 'no such student found'], 404);
        }
    }
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'course' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->messages()], 422);
        } else {
            $student = Student::find($id);
            if ($student) {
                $student->update($request->only(['name', 'course', 'email', 'phone']));
                return redirect()->route('admin.students.index')->with('success', 'Student update successfully');
            } else {
                return response()->json(['status' => 404, 'message' => 'no such student found'], 404);
            }
        }
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return response()->json(['status' => 200, 'message' => 'student deleted successfully'], 200);
        } else {
            return response()->json(['status' => 404, 'message' => 'no such student found'], 404);
        }
    }
}
