@php
$categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach($categories as $category)
            @if(session()->get('language')=='english')
            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{ $category->category_icon }}" aria-hidden="true"></i>{{ $category->category_name_en }}</a>
                @else
            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{ $category->category_icon }}" aria-hidden="true"></i>{{ $category->category_name_ur }}</a>
                @endif
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            <!-- //$subcategories data  -->
                            @php
                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en','ASC')->get();
                            @endphp
                            @foreach($subcategories as $subcategory)
                            <div class="col-sm-12 col-md-3">
                                
                                    @if(session()->get('language')=='english')
                                    {{-- <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}"> --}}
                                        <h2 class="title">{{$subcategory->subcategory_name_en}}</h2>
                                    {{-- </a> --}}
                                    @else
                                {{-- <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}"> --}}
                                    <h2 class="title">{{$subcategory->subcategory_name_ur}}</h2>
                                {{-- </a> --}}
                                @endif
                                <!-- //$Subsubcategories data  -->
                                @php
                                $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
                                @endphp
                                @foreach($subsubcategories as $subsubcategory)
                                <ul class="links list-unstyled">
                                    @if(session()->get('language')=='english')
                                    <li><a href="{{ url('sub-subcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en) }}">{{ $subsubcategory->subsubcategory_name_en }}</a></li>
                                    @else
                                    <li><a href="{{ url('sub-subcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en) }}">{{ $subsubcategory->subsubcategory_name_ur }}</a></li>
                                    @endif
                                </ul>
                                @endforeach
                                <!-- EndSubSubCategory  -->
                            </div>
                            @endforeach
                            <!-- End SubCategory  -->
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            @endforeach
            <!-- End Category Foreach  -->
            <!-- /.menu-item -->
        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>