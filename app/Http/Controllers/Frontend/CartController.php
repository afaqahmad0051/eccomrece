<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == null) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success' => 'Product Added to Cart']);
        }else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success' => 'Product Added to Cart']);
        }
    }

    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ]);
    }

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json([
            'success' => 'Product Removed from Cart'
        ]);
    }

    public function AddToWishList(Request $request, $product_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json([
                    'success' => 'Product added to Wishlist'
                ]);
            } else {
                return response()->json([
                    'error' => 'Product already in Wishlist'
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Please Login to Add Product in Wishlist'
            ]);
        }
        
    }

    public function CouponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
            ]);
            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ));
        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }

    public function CouponCalculation()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => Session()->get('coupon')['coupon_name'],
                'coupon_discount' => Session()->get('coupon')['coupon_discount'],
                'discount_amount' => Session()->get('coupon')['discount_amount'],
                'total_amount' => Session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    }

    public function CouponRemove()
    {
        Session::forget('coupon');
        return response()->json([
            'success' => 'Coupon Removed'
        ]);
    }

    public function CheckoutCreate()
    {
        if (Auth::check()) {
            if (Cart::total()>0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                $divisions = ShippingDivision::with('country_cities')->get();
                // dd($divisions->toArray());
                return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','divisions'));
            }
            else{
                $notification = array(
                    'message' => 'Add atleast one product to cart',
                    'alert-type' => 'warning'
                );
                return redirect()->to('/')->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'Please login to checkout',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }
    }

    public function CheckoutStore(Request $request)
    {
        // dd($request->toArray());
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $district_id = ShippingDistrict::where('id', $request->district_id)->first();
        // dump($district_id->division_id);
        $division_id = ShippingDivision::where('id', $district_id->division_id)->first();
        // dump($division_id->id);
        $data['division_id'] = $division_id->id;
        $data['district_id'] = $request->district_id;
        $data['area_id'] = $request->area_id;
        $data['notes'] = $request->notes;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_name'] = $request->shipping_name;
        $cartTotal = Cart::total();
        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe',compact('data','cartTotal'));
        }elseif ($request->payment_method == 'card') {
            return 'card';
            // return view('frontend.payment.card',compact('data'));
        }else{
            return 'cash';
            // return view('frontend.payment.cash',compact('data'));
        }

    }
}