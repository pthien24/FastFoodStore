<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {

    //     $product = Product::all();
    //     if ($product->count() > 0) {
    //         $data =[
    //         'status' => 200,
    //         'data' => $product,
    //         ];
    //         return response()->json($data, 200);
    //     } else {
    //         return response()->json([
    //         'status' => 404,
    //         'message' => 'No Records Found',
    //         ], 404);
    //     }
    // }

    // app/Http/Controllers/ProductController.php
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');
        $searchTerm = $request->input('search_term');
        $perPage = $request->input('per_page', 3); // Số sản phẩm mỗi trang, mặc định là 10

        $query = Product::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($searchTerm) {
            $query->where('name', 'like', "%$searchTerm%");
        }

        $products = $query->paginate($perPage);

        return response()->json($products);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'price' => 'required',
            'description' => 'required|string|max:191',
            'image' => 'image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->messages()], 422);
        } else {
            $product = new Product();
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')-> put($imageName, file_get_contents($request->file('image')->getRealPath()));
                $product->image = $imageName;
            }
            $product->category_id = $request->input('category_id');
        }
        if ($product->save()) {
            return response()->json(['status' => 500, 'message' => 'successfully'], 500);
        } else {
            return response()->json(['status' => 500, 'message' => 'Something went wrong'], 500);
        }
    }
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json(['status' => 200, 'data' => $product], 200);
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
