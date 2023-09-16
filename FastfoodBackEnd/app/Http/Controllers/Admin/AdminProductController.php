<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData['products'] = Product::all();
        $viewData['category'] = Category::all();
        return view('admin.products.index')->with('viewData', $viewData);
    }
}
