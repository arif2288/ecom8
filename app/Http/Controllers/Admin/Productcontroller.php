<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use File;

class Productcontroller extends Controller
{
    public function showProductForm()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $subcategories = Subcategory::orderBy('id', 'desc')->get();
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.product.add', compact('categories', 'subcategories', 'brands' ));
    }

    public function showProductList()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $subcategories = Subcategory::orderBy('id', 'desc')->get();
        $brands = Brand::orderBy('id', 'desc')->get();
        $products = Product::with('category', 'brand')->get();
        return view('backend.product.manage', compact('products','categories', 'subcategories', 'brands' ));
    }

    public function productStore(Request $request)
    {
        $imageName = time() . '.'. $request->image->extension();
        $request->image->move('product/', $imageName);
        $product = Product::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'qty' => $request->qty,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Product has been created');
    }

    public function productEdit($id)
    {
        $product = Product::with('category', 'brand')->find($id);
        $categories = Category::orderBy('id', 'desc')->get();
        $subcategories = Subcategory::orderBy('id', 'desc')->get();
        $brands = Brand::orderBy('id', 'desc')->get();
        return view ('backend.product.edit', compact('product', 'categories','subcategories', 'brands'));
    }

    public function productUpdate(Request $request, $id)
    {
        $product = Product::with('category', 'brand')->find($id);
        if($request->hasFile('image')){
            if(file_exists(public_path('product/'.$product->image))){
                File::delete(public_path('product/'.$product->image));
                $updateimageName = time() . '.'. $request->image->extension();
                $request->image->move('product/', $updateimageName);
                $product->image = $updateimageName;
            } else{
                $updateimageName = time() . '.'. $request->image->extension();
                $request->image->move('product/', $updateimageName);
                $product->image = $updateimageName;
            }
        }

        $product->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'qty' => $request->qty,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);

        return redirect()->back()->with('success', 'Product has been updated');
    }

    public function productDelete($id)
    {
        $product = Product::find($id);
        $product-> delete();
        return redirect()->back()->with('success', 'Product has been deleted');
    }
}
