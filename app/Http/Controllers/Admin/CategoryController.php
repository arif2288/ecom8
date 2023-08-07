<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function showCategoryForm()
    {
        return view('backend.category.add');
    }

    public function categoryEdit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

     public function categoryUpdate(Request $request, $id)
     {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->back()->with('success', 'Category has been updated');
     }

    public function showCategoryList()
    {
        $categories = Category::orderBY('id', 'desc')->get();
        return view('backend.category.manage', compact('categories'));
    }
    public function categoryStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);



        return redirect()->back()->with('success', 'Category has been created');
    }

    public function categoryDelete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category has been deleted');
    }
}

