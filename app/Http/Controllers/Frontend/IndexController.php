<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','desc')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id','desc')->limit(6)->get();
        $featured = Product::where('featured',1)->orderBy('id','desc')->limit(9)->get();
        $hotdeals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','desc')->limit(5)->get();
        $special = Product::where('special_offer',1)->orderBy('id','desc')->limit(5)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','desc')->limit(3)->get();
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','desc')->get();
        $skip_category_2 = Category::skip(2)->first();
        $skip_product_2 = Product::where('status',1)->where('category_id',$skip_category_2->id)->orderBy('id','desc')->get();
        $skip_brand_0 = Brand::skip(0)->first();
        $skip_product_brand_0 = Product::where('status',1)->where('brand_id',$skip_brand_0->id)->orderBy('id','desc')->limit(6)->get();
        $skip_brand_1 = Brand::skip(1)->first();
        $skip_product_brand_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','desc')->limit(6)->get();
        
        return view('frontend.index',compact('categories','sliders','products','featured','hotdeals','special','special_deals','skip_category_0','skip_product_0','skip_category_2','skip_product_2','skip_brand_0','skip_product_brand_0','skip_product_brand_1','skip_brand_1'));
    }

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function UserPassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }

    public function UserPasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }
        else{
            $notification = array(
                'message' => 'Something Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function ProductDetails($id, $slug){
        $product = Product::findOrFail($id);
        // dd($product);

        $color_en = $product->product_color_en;
        $pro_color_en = explode(',',$color_en);

        $color_ur = $product->product_color_ur;
        $pro_color_ur = explode(',',$color_ur);

        $size_en = $product->product_size_en;
        $pro_size_en = explode(',',$size_en);

        $size_ur = $product->product_size_ur;
        $pro_size_ur = explode(',',$size_ur);

        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id', $cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
        $multiImg = MultiImg::where('product_id',$id)->get();
        return view('frontend.product.product_details',compact('product','multiImg','color_en','pro_color_en','color_ur','pro_color_ur','size_en','pro_size_en','size_ur','pro_size_ur','relatedProduct'));
    }

    public function TagWiseProduct($tag){
        $products = Product::where('status',1)->where('product_tags_en',$tag)->orderBy('id','desc')->paginate(3);
        // dd($products->toArray());
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.tags.tags_view',compact('products','categories'));
    }

    public function SubCatWiseProduct($subcat_id, $slug){
        $products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','desc')->paginate(3);
        // dd($products->toArray());
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.subcategory_view',compact('products','categories'));
    }

    public function SubSubCatWiseProduct($subsubcat_id, $slug){
        $products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','desc')->paginate(5);
        // dd($products->toArray());
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.product.sub_subcategory_view',compact('products','categories'));
    }

    public function ProductViewAjax($id){
        $product = Product::with('category','brand')->findOrFail($id);
        // dd($product);

        $color = $product->product_color_en;
        $pro_color_en = explode(',',$color);

        $size = $product->product_size_en;
        $pro_size_en = explode(',',$size);

        return response()->json([
            'product' => $product,
            'color' => $pro_color_en,
            'size' => $pro_size_en,
        ]);
    }
}
