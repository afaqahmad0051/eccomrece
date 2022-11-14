<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
    @php
        $hotdeals = \App\Models\Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','desc')->limit(5)->get();
    @endphp
    @foreach($hotdeals as $product)
    <div class="item">
        <div class="products">
            <div class="hot-deal-wrapper">
                <div class="image"> <img src="{{asset($product->product_thumbnail)}}" alt=""> </div>
                @php
                $amount = (int)$product->selling_price - (int)$product->discount_price;
                $discount = ((int)$amount/(int)$product->selling_price)*100;
                @endphp
                @if($product->discount_price == NULL)
                <div class="sale-new-tag"><span>new</span></div>
                @else
                <div class="sale-offer-tag"><span>{{round($discount)}}%<br>off</span></div>
                @endif
                <div class="timing-wrapper">
                    <div class="box-wrapper">
                        <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                        <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                        <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                        <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                    </div>
                </div>
            </div>
            <!-- /.hot-deal-wrapper -->

            <div class="product-info text-left m-t-20">
                @if(session()->get('language')=='english')
                <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">{{$product->product_name_en}}</a></h3>
                @else
                <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">{{$product->product_name_ur}}</a></h3>
                @endif
                <div class="rating rateit-small"></div>
                @if($product->discount_price == NULL)
                <div class="product-price"> <span class="price"> PKR {{ $product->selling_price }} </span> </div>
                @else
                <div class="product-price"> <span class="price"> PKR {{ $product->discount_price }} </span> <span class="price-before-discount">PKR {{ $product->selling_price }}</span> </div>
                @endif
                <!-- /.product-price -->
            </div>
            <!-- /.product-info -->

            <div class="cart clearfix animate-effect">
                <div class="action">
                    <div class="add-cart-button btn-group">
                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </div>
                </div>
                <!-- /.action -->
            </div>
            <!-- /.cart -->
        </div>
    </div>
    @endforeach
</div>