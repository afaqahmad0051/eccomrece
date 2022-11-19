@extends('frontend.home_master')
@section('content')

@section('title')
@if(session()->get('language')=='english')
Checkout
@else
چیک آؤٹ
@endif
@endsection
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
    <div class="container">
        <div class="checkout-box">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">
                                        <!-- guest-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle"> <b> Shipping Details </b></h4>
                                            <form class="register-form" action="{{ route('checkout.store') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Shipping Name: <span>*</span></label>
                                                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" name="shipping_name" value="{{ Auth::user()->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Email: <span>*</span></label>
                                                    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Email" name="shipping_email" value="{{ Auth::user()->email }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Phone: <span>*</span></label>
                                                    <input type="number" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Phone" name="shipping_phone" value="{{ Auth::user()->phone }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Postal Code: <span>*</span></label>
                                                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Postal Code" name="post_code" required>
                                                </div>

                                            </div>
                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <div class="form-group" style="text-align: left;">
                                                    <label class="info-title">City <span class="text-danger">*</span></label>
                                                    <select class="form-control erp-form-control-sm city_id" id="city_id" name="district_id">
                                                        <option value="" selected disabled>Select City</option>
                                                        @foreach($divisions as $country)
                                                        <optgroup label="{{$country->division_name}}">
                                                            @foreach($country->country_cities as $city)
                                                            <option value="{{$city->id}}">{{$city->district_name}}
                                                            </option>
                                                            @endforeach
                                                        </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="info-title">Area <span class="text-danger">*</span></label>
                                                    <select class="form-control erp-form-control-sm area_id" id="area_id" name="area_id">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="info-title">Remarks: <span>*</span></label>
                                                    <textarea class="form-control" cols="30" rows="2" name="notes"></textarea>
                                                </div>
                                            </div>
                                            <!-- already-registered-login -->
                                    </div>
                                </div>
                                <!-- panel-body  -->
                            </div><!-- row -->
                        </div>
                        <!-- checkout-step-01  -->
                    </div><!-- /.checkout-steps -->
                </div>
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        @foreach ($carts as $item)
                                        <li>
                                            <strong>Image: </strong>
                                            <img src="{{ asset($item->options->image) }}" alt="" srcset=""
                                                style="height: 50px; width: 50px;">
                                        </li>
                                        <li>
                                            <strong>Qty: </strong>
                                            {{ $item->qty }}
                                        </li>
                                        <li>
                                            <strong>Color: </strong>
                                            {{ $item->options->color }}
                                        </li>
                                        <li>
                                            <strong>Size: </strong>
                                            {{ $item->options->size }}
                                        </li>
                                        @endforeach
                                        <strong></strong>
                                        <li>
                                            @if (Session::has('coupon'))
                                            <Strong>SubTotal: </Strong>PKR: {{ $cartTotal }}
                                            <hr>
                                            <Strong>Coupon Name: </Strong>{{ Session::get('coupon')['coupon_name'] }} (
                                            {{Session::get('coupon')['coupon_discount']}} %) <br>
                                            <Strong>Coupon Discount: </Strong>PKR:
                                            {{Session::get('coupon')['discount_amount']}} <br>
                                            <Strong>Grand Total: </Strong>PKR:
                                            {{Session::get('coupon')['total_amount']}} <br>
                                            @else
                                            <Strong>SubTotal: </Strong>PKR: {{ $cartTotal }} <br>
                                            <Strong>Grand Total: </Strong>PKR: {{ $cartTotal }} <br>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Payment Method</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Stripe</label>
                                        <input type="radio" name="payment_method" value="stripe">
                                        <img src="{{ asset('frontend/assets/images/payments/2.png') }}" alt="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Card</label>
                                        <input type="radio" name="payment_method" value="card">
                                        <img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Cash</label>
                                        <input type="radio" name="payment_method" value="cash">
                                        <img src="{{ asset('frontend/assets/images/payments/1.png') }}" alt="">
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-upper checkout-page-button">Payment
                                    Setup</button>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
                </form>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">

            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <div class="item m-t-15">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item m-t-10">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->
                </div><!-- /.owl-carousel #logo-slider -->
            </div><!-- /.logo-slider-inner -->

        </div><!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection