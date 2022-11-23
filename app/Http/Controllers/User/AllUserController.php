<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class AllUserController extends Controller
{
    public function MyOrders()
    {
        $orders = Order::where('user_id',Auth::id())->orderBy('id','desc')->get();
        return view('frontend.user.orders.order_view',compact('orders'));
    }

    public function OrderDetails($order_id)
    {
        $order = Order::with('division','district','area','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderitem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.user.orders.order_details',compact('order','orderitem'));
    }

    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division','district','area','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderitem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        $pdf = PDF::loadView('frontend.user.orders.order_invoice',compact('order','orderitem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
        // return view('frontend.user.orders.order_invoice',compact('order','orderitem'));
    }
}
