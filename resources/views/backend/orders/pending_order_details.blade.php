@extends('admin.admin_master')
@section('admin')

<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Order Details</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Order Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">     
            <div class="col-md-6 col-12">
                <div class="box box-solid box-inverse box-info">
                    <div class="box-header with-border">
                        <h4 class="box-title">Shipping Details</h4>
                    </div>

                    <div class="box-body">
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
            <div class="col-md-6 col-12">
                <div class="box box-solid box-inverse box-info">
                    <div class="box-header with-border">
                        <h4 class="box-title">Order Details</h4>
                    </div>
                    <div class="box-body">
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
                                <th>Invoice: </th>
                                <th><span class="text-danger">{{$order->invoice_no}}</span></th>
                            </tr>
                            <tr>
                                <th>Order Total: </th>
                                <th>${{$order->amount}}</th>
                            </tr>
                            <tr>
                                <th>Order: </th>
                                <th><span class="badge badge-pill badge-warning" style="background: #418DB9">{{$order->status}}</span> </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="box box-solid box-inverse box-info">
                    <div style="background: #272e48">
                        <table class="table" style="color: white;">
                            <tbody>
                                <tr>
                                    <td width="15%">
                                        <label for="">Image: </label>
                                    </td>
                                    <td width="20%">
                                        <label for="">Product Name: </label>
                                    </td>
                                    <td width="15%">
                                        <label for="">Product Code: </label>
                                    </td>
                                    <td width="10%">
                                        <label for="">Color: </label>
                                    </td>
                                    <td width="10%">
                                        <label for="">Size: </label>
                                    </td>
                                    <td width="10%">
                                        <label for="">Qty: </label>
                                    </td>
                                    <td width="10%">
                                        <label for="">Price: </label>
                                    </td>
                                    <td width="10%">
                                        <label for="">Net Total: </label>
                                    </td>
                                </tr>
                                @foreach ($orderitem as $item)
                                <tr>
                                    <td width="15%">
                                        <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" height="50px" width="50px" alt="{{ $item->product->product_name_en }}"></label>
                                    </td>
                                    <td width="20%">
                                        <label for="">{{ $item->product->product_name_en }}</label>
                                    </td>
                                    <td width="15%">
                                        <label for="">{{ $item->product->product_code }} </label>
                                    </td>
                                    <td width="10%">
                                        <label for="">{{ $item->color }}</label>
                                    </td>
                                    <td width="10%">
                                        <label for="">{{ $item->size }}</label>
                                    </td>
                                    <td width="10%">
                                        <label for="">{{ $item->qty }}</label>
                                    </td>
                                    <td width="10%">
                                        <label for=""> ${{ $item->price }}</label>
                                    </td>
                                    <td width="10%">
                                        <label for=""> ${{$item->price * $item->qty}}</label>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection