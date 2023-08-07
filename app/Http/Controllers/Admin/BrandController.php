<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function showBrandForm()
    {
        return view('backend.brand.add');
    }

    public function brandEdit($id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.edit', compact('brand'));
    }

     public function brandUpdate(Request $request, $id)
     {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $brand = Brand::find($id);
        $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->back()->with('success', 'brand has been updated');
     }

    public function showBrandList()
    {
        $brands = Brand::orderBY('id', 'desc')->get();
        return view('backend.brand.manage', compact('brands'));
    }
    public function brandStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        
        Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);



        return redirect()->back()->with('success', 'brand has been created');
    }

    public function brandDelete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back()->with('success', 'brand has been deleted');
    }
}
