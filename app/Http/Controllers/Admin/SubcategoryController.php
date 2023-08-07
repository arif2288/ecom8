<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function showsubCategoryForm()
    {
        $categories = Category::all();
        return view('backend.subcategory.add', compact('categories'));
    }

    public function subcategoryEdit($id)
    {
        $categories = Category::all();
        $subcategory = Subcategory::find($id);
        return view('backend.subcategory.edit', compact('categories', 'subcategory'));
    }

     public function subcategoryUpdate(Request $request, $id)
     {
        $this->validate($request,[
            'name' => 'required',
            'category_id' => 'required'
        ]);

        $subcategory = Subcategory::find($id);
        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->back()->with('success', 'SubCategory has been updated');
     }

    public function showSubcategoryList()
    {
        $subcategories = Subcategory::with('category')->orderBY('id', 'desc')->get();
        return view('backend.subcategory.manage', compact('subcategories'));
    }
    public function subcategoryStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'category_id' => 'required'
        ]);
        
        Subcategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);



        return redirect()->back()->with('success', 'SubCategory has been created');
    }

    public function subcategoryDelete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->back()->with('success', 'SubCategory has been deleted');
    }
}
