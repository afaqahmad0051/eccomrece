<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));
    }

    public function ProductStore(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_ur' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_ur' => 'required',
            'product_color_en' => 'required',
            'product_color_ur' => 'required',
            'selling_price' => 'required',
            'short_desc_en' => 'required',
            'short_desc_ur' => 'required',
            'product_thumbnail' => 'required',
        ]);

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/product/thumbnail/' . $name_gen);
        $save_url = 'upload/product/thumbnail/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ur' => $request->product_name_ur,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ur' => str_replace(' ', '-', $request->product_name_ur),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ur' => $request->product_tags_ur,
            'product_size_en' => $request->product_size_en,
            'product_size_ur' => $request->product_size_ur,
            'product_color_en' => $request->product_color_en,
            'product_color_ur' => $request->product_color_ur,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_ur' => $request->short_desc_ur,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_ur' => $request->long_desc_ur,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        //For Multiple Image Upload
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/product/multi-image/' . $make_name);
            $uploadPath = 'upload/product/multi-image/' . $make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }
        //End Multi Image Upload
        $notification = array(
            'message' => 'Product Inserted',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }

    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }

    public function ProductEdit($id){
        $multiImages = MultiImg::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $products = Product::FindOrFail($id);
        return view('backend.product.product_edit',compact('categories','brands','subcategories','subsubcategories','products','multiImages'));
    }

    public function ProductUpdate(Request $request){
        $product_id = $request->id;
            Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ur' => $request->product_name_ur,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ur' => str_replace(' ', '-', $request->product_name_ur),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ur' => $request->product_tags_ur,
            'product_size_en' => $request->product_size_en,
            'product_size_ur' => $request->product_size_ur,
            'product_color_en' => $request->product_color_en,
            'product_color_ur' => $request->product_color_ur,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_ur' => $request->short_desc_ur,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_ur' => $request->long_desc_ur,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }

    public function ProductImageUpdate(Request $request){
        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/product/multi-image/' . $name_gen);
            $uploadPath = 'upload/product/multi-image/' . $name_gen;
            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Images Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductThumbnailUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        @unlink($oldImage);
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/product/thumbnail/' . $name_gen);
        $save_url = 'upload/product/thumbnail/' . $name_gen;
        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Thumbnail Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function MultiImgDelete($id){
        $old_img = MultiImg::findOrFail($id);
        unlink($old_img->photo_name);
        $old_img = MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product Image Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Deactivated',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Activated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        $product = Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }
        $notification = array(
            'message' => 'Product Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
