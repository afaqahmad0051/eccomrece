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
                                <th>{{$order->name}}</th>
                            </tr>
                            <tr>
                                <th>City: </th>
                                <th>{{$order->email}}</th>
                            </tr>
                            <tr>
                                <th>Area: </th>
                                <th>Shipping Name: </th>
                            </tr>
                            <tr>
                                <th>Post Code: </th>
                                <th>Shipping Name: </th>
                            </tr>
                            <tr>
                                <th>Order Date: </th>
                                <th>Shipping Name: </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row  -->
    </div>
</div>
@endsection