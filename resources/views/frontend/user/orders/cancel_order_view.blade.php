@extends('frontend.home_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
                @include('frontend.common.user_sidebar')
            <!-- End Col  -->
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr style="background: #e2e2e2;">
                                <td class="col-md-1">
                                    <label for="">Order Date: </label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">Total Amount: </label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">Payment Method: </label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Invoice#: </label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Order: </label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Action: </label>
                                </td>
                            </tr>
                            @forelse ($orders as $order)
                            <tr>
                                <td class="col-md-1">
                                    <label for="">{{ $order->order_date }}</label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">${{ $order->amount }}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $order->payment_method }} </label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $order->invoice_no }}</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">
                                        <span class="badge badge-warning badge-pill" style="background: #418D89">{{ $order->status }}</span>
                                        <span class="badge badge-warning badge-pill" style="background: red">Order Cancelled</span>
                                    </label>
                                </td>
                                <td class="col-md-1">
                                    {{-- <a href="{{ url('user/order-details/'.$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View </a> --}}
                                    <a href="{{ url('user/invoice-download/'.$order->id) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> Invoice </a>
                                </td>
                            </tr>
                            @empty
                            <h2 class="text-danger">No Order Cancelled</h2>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Col  -->
        </div>
        <!-- End Row  -->
    </div>
</div>
@endsection