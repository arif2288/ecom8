<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')->get();
        return view('frontend.home.index', compact('categories', 'products'));
    }
}
