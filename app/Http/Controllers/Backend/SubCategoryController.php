<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get ();
        $subcategories = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategories','categories'));
    }

    
    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_ur' => 'required',
        ], [
            'category_id.required' => 'Please Select Category',
            'subcategory_name_en.required' => 'SubCategory English Name is required',
            'subcategory_name_ur.required' => 'SubCategory Urdu Name is required',
        ]);
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ur' => $request->subcategory_name_ur,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_ur' => str_replace('', '-', $request->subcategory_name_ur),
        ]);
        $notification = array(
            'message' => 'SubCategory Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get ();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory','categories'));
    }

    public function SubCategoryUpdate(Request $request)
    {
        $subcategory_id = $request->id;
        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ur' => $request->subcategory_name_ur,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_ur' => str_replace('', '-', $request->subcategory_name_ur),
        ]);
        $notification = array(
            'message' => 'SubCategory Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategory Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    //Sub-Sub Category Start

    public function SubSubCategoryView()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get ();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategories','categories'));
    }
    
    public function GetSubCategory($category_id)
    {
        $subcategories = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcategories);
    }

    public function GetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }

    public function SubSubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_ur' => 'required',
        ], [
            'category_id.required' => 'Please Select Category',
            'subcategory_id.required' => 'Please Select SubCategory',
            'subsubcategory_name_en.required' => 'Sub SubCategory English Name is required',
            'subsubcategory_name_ur.required' => 'Sub SubCategory Urdu Name is required',
        ]);
        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ur' => $request->subsubcategory_name_ur,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_ur' => str_replace('', '-', $request->subsubcategory_name_ur),
        ]);
        $notification = array(
            'message' => ' Sub SubCategory Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get ();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get ();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit',compact('categories','subcategories','subsubcategories'));
    }

    public function SubSubCategoryUpdate(Request $request){
        $subsubcat_id = $request->id;
        SubSubCategory::FindOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ur' => $request->subsubcategory_name_ur,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_ur' => str_replace('', '-', $request->subsubcategory_name_ur),
        ]);
        $notification = array(
            'message' => ' Sub SubCategory Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => ' Sub SubCategory Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
