<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_ur' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name_en.required' => 'Category English Name is required',
            'category_name_ur.required' => 'Category Urdu Name is required',
        ]);
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ur' => $request->category_name_ur,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_ur' => str_replace('', '-', $request->category_name_ur),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array(
            'message' => 'Category Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request)
    {
        $category_id = $request->id;
        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ur' => $request->category_name_ur,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_ur' => str_replace('', '-', $request->category_name_ur),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array(
            'message' => 'Category Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){
        $cat = Category::findOrFail($id);
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
