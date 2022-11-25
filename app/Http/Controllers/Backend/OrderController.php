<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function PendingOrders()
    {
        $orders = Order::where('status','Pending')->orderBy('id','desc')->get();
        return view('backend.orders.pending_orders',compact('orders'));
    }

    public function PendingOrderDetails($order_id)
    {
        $order = Order::with('division','district','area','user')->where('id',$order_id)->first();
        $orderitem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('backend.orders.pending_order_details',compact('order','orderitem'));
    }

    public function ConfirmedOrders()
    {
        $orders = Order::where('status','confirmed')->orderBy('id','desc')->get();
        return view('backend.orders.confirmed_orders',compact('orders'));
    }

    public function ProcessingOrders()
    {
        $orders = Order::where('status','processing')->orderBy('id','desc')->get();
        return view('backend.orders.processing_orders',compact('orders'));
    }

    public function PickedOrders()
    {
        $orders = Order::where('status','picked')->orderBy('id','desc')->get();
        return view('backend.orders.picked_orders',compact('orders'));
    }

    public function ShippedOrders()
    {
        $orders = Order::where('status','shipped')->orderBy('id','desc')->get();
        return view('backend.orders.shipped_orders',compact('orders'));
    }

    public function DeliveredOrders()
    {
        $orders = Order::where('status','delivered')->orderBy('id','desc')->get();
        return view('backend.orders.delivered_orders',compact('orders'));
    }

    public function CancelledOrders()
    {
        $orders = Order::where('status','cancelled')->orderBy('id','desc')->get();
        return view('backend.orders.cancelled_orders',compact('orders'));
    }
}
