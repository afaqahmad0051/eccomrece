@extends('frontend.home_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Shipping Details</h4>
                        <span class="text-danger"><b>Order Date : {{$order->order_date}}</b></span>
                    </div><hr>
                    <div class="card-body" style="background: #E9EBEC;">
                        <table class="table">
                            <tr>
                                <th>Shipping Name: </th>
                                <th>{{$order->name}}</th>
                            </tr>
                            <tr>
                                <th>Shipping Phone: </th>
                                <th>{{$order->phone}}</th>
                            </tr>
                            <tr>
                                <th>Shipping Email: </th>
                                <th>{{$order->email}}</th>
                            </tr>
                            <tr>
                                <th>Country: </th>
                                <th>{{$order->division->division_name}}</th>
                            </tr>
                            <tr>
                                <th>City: </th>
                                <th>{{$order->district->district_name}}</th>
                            </tr>
                            <tr>
                                <th>Area: </th>
                                <th>{{$order->area->area_name}}</th>
                            </tr>
                            <tr>
                                <th>Post Code: </th>
                                <th>{{$order->post_code}}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Details</h4>
                        <span class="text-danger"><b>Invoice : {{$order->invoice_no}}</b></span>
                    </div><hr>
                    <div class="card-body" style="background: #E9EBEC;">
                        <table class="table">
                            <tr>
                                <th> Name: </th>
                                <th>{{$order->user->name}}</th>
                            </tr>
                            <tr>
                                <th> Phone: </th>
                                <th>{{$order->user->phone}}</th>
                            </tr>
                            <tr>
                                <th>Payment Type: </th>
                                <th>{{$order->payment_method}}</th>
                            </tr>
                            <tr>
                                <th>Transaction ID: </th>
                                <th>{{$order->transaction_id}}</th>
                            </tr>
                            <tr>
                                <th>Order Total: </th>
                                <th>{{$order->amount}}</th>
                            </tr>
                            <tr>
                                <th>Order: </th>
                                <th><span class="badge badge-pill badge-warning" style="background: #418DB9">{{$order->status}}</span> </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row  -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr style="background: #e2e2e2;">
                                <td class="col-md-1">
                                    <label for="">Image: </label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">Product Name: </label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">Product Code: </label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Color: </label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Size: </label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Qty: </label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Price: </label>
                                </td>
                            </tr>
                            @foreach ($orderitem as $item)
                            <tr>
                                <td class="col-md-1">
                                    <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" height="50px" width="50px" alt="{{ $item->product->product_name_en }}"></label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">{{ $item->product->product_name_en }}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $item->product->product_code }} </label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $item->color }}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $item->size }}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $item->qty }}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for=""> ${{ $item->price }} / Net Total:(${{$item->price * $item->qty}})</label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($order->status == "delivered")
                @php
                    $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',null)->first();
                @endphp
                @if ($order)
                    <form action="{{ route('return.order',$order->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="label">Order Return Reason: </label>
                            <textarea name="return_reason" class="form-control" id="" cols="30" rows="05"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Request Return</button>
                    </form><br><br>                
                @else
                    <span class="badge badge-pill badge-warning" style="background:red;">Return request sent for this product</span>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection