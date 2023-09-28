<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData['products'] = Product::all();
        $viewData['category'] = Category::all();
        return view('admin.products.index')->with('viewData', $viewData);
    }
    public function edit($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['category'] = Category::all();
        $viewData['title']= 'Admin Page - Edit Products - fastfood Store';
        $viewData["product"] = $product;
        return view('admin.products.edit')->with('viewData', $viewData);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'price' => 'required',
            'description' => 'required|string|max:191',
            'image' => 'required',
        ]);
        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        $product->setCategory_id($request->input('category_id'));
        if ($request->hasFile('image')) {
            $imageName = $product->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put($imageName, file_get_contents($request->file('image')->getRealPath()));
            $product->setImage($imageName);
        }
        $product->save();
        return redirect()->route('admin.products.index');
    }
}
