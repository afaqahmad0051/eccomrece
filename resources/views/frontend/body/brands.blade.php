<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            @php
                $brands = App\Models\Brand::get();
            @endphp
            @foreach ($brands as $brand)
                <div class="item m-t-15"> <a href="javascript:void(0)" class="image"> <img data-echo="{{asset($brand->brand_image)}}" src="{{asset($brand->brand_image)}}" alt="{{ $brand->brand_name_en }}" style="width: 60px; height:70px;"> </a> </div>
            @endforeach
            <!--/.item-->
        </div>
        <!-- /.owl-carousel #logo-slider -->
    </div>
    <!-- /.logo-slider-inner -->
</div>