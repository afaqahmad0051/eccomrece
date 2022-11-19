<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function MyOrders()
    {
        $orders = Order::where('user_id',Auth::id())->orderBy('id','desc')->get();
        return view('frontend.user.orders.order_view',compact('orders'));
    }

    public function OrderDetails($order_id)
    {
        $order = Order::where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderitem = OrderItem::where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.user.orders.order_details',compact('order','orderitem'));
    }
}
