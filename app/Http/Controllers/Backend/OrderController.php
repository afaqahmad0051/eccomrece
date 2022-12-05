<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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
        $orders = Order::where('status','confirm')->orderBy('id','desc')->get();
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
        $orders = Order::where('status','cancel')->orderBy('id','desc')->get();
        return view('backend.orders.cancelled_orders',compact('orders'));
    }

    public function PendingToConfirm($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'confirm'
        ]);
        $notification = array(
            'message' => 'Order Confirmed',
            'alert-type' => 'success'
        );
        return redirect()->route('pending-orders')->with($notification);
    }

    public function ConfirmToProcessing($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'processing'
        ]);
        $notification = array(
            'message' => 'Order Moved to Processing',
            'alert-type' => 'success'
        );
        return redirect()->route('confirmed-orders')->with($notification);
    }

    public function ProcessingToPicked($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'picked'
        ]);
        $notification = array(
            'message' => 'Order Picked',
            'alert-type' => 'success'
        );
        return redirect()->route('processing-orders')->with($notification);
    }

    public function PickedToShipped($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'shipped'
        ]);
        $notification = array(
            'message' => 'Order moved to shipping',
            'alert-type' => 'success'
        );
        return redirect()->route('picked-orders')->with($notification);
    }

    public function ShippedToDelivered($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'delivered'
        ]);
        $notification = array(
            'message' => 'Order moved to delivered',
            'alert-type' => 'success'
        );
        return redirect()->route('shipped-orders')->with($notification);
    }

    public function DeliveredToCancelled($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'cancel'
        ]);
        $notification = array(
            'message' => 'Order Cancelled',
            'alert-type' => 'error'
        );
        return redirect()->route('delivered-orders')->with($notification);
    }

    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division','district','area','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderitem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        $pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderitem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
        // return view('frontend.user.orders.order_invoice',compact('order','orderitem'));
    }        
    
}
