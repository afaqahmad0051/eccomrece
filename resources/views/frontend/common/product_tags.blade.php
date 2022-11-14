@php
$tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
$tags_ur = App\Models\Product::groupBy('product_tags_ur')->select('product_tags_ur')->get();
@endphp
<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(session()->get('language')=='english')
            @foreach($tags_en as $tag)
            <a class="item active" href="{{ url('product/tag/'.$tag->product_tags_en) }}">{{ str_replace(',',' ', $tag->product_tags_en )}}</a>
            @endforeach
            @else
            @foreach($tags_ur as $tag)
            <a class="item active" href="{{ url('product/tag/'.$tag->product_tags_ur) }}">{{ str_replace(',',' ', $tag->product_tags_ur )}}</a>
            @endforeach
            @endif
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>