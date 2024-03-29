<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-user"></i>
                                @if(session()->get('language')=='english') My Account
                                @else اکاؤنٹ @endif</a></li>
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>@if(session()->get('language')=='english') Wishlist
                                @else پسندیدہ @endif</a></li>
                        <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>@if(session()->get('language')=='english') My Cart
                                @else کارٹ @endif</a></li>
                        <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>@if(session()->get('language')=='english') Checkout
                                @else چیک آؤٹ @endif</a></li>
                        <li>
                            @auth
                            <a href="{{route('dashboard')}}"><i class="icon fa fa-user"></i>@if(session()->get('language')=='english') Profile
                                @else پروفائل @endif</a>
                        </li>
                        @else
                        <a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login/Register</a></li>
                        @endauth
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        @if(session()->get('language')=='english')
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English</span><b class="caret"></b></a>
                            @else
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">اردو</span><b class="caret"></b></a>
                            @endif
                            <ul class="dropdown-menu">
                                @if(session()->get('language')=='urdu')
                                <li><a href="{{route('english.lang')}}">English</a></li>
                                @else
                                <li><a href="{{route('urdu.lang')}}">اردو</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{url('/')}}"> <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo"> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                                <div class="total-price-basket">
                                    <span class="lbl">cart -</span> <span class="total-price">
                                        <span class="sign">$</span>
                                        <span class="value" id="cartSubTotal"></span> 
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                {{-- Mini Cart With AJAX  --}}
                                <div id="miniCart">

                                </div>
                                {{-- End Mini Cart  --}}
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> 
                                        <span class="text">Sub Total :</span>
                                        <span class='price' id="cartSubTotal"> </span> 
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active"> <a href="{{url('/')}}" >@if(session()->get('language')=='english') Home @else ہوم @endif</a> </li>
                                <!-- //Categories Data  -->
                                @php
                                $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
                                @endphp

                                @foreach($categories as $category)
                                @if(session()->get('language')=='english')
                                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $category->category_name_en }}</a>
                                    @else
                                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $category->category_name_ur }}</a>
                                    @endif
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">
                                                    <!-- //$subcategories data  -->
                                                    @php
                                                    $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en','ASC')->get();
                                                    @endphp

                                                    @foreach($subcategories as $subcategory)
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
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
                                                        <ul class="links">
                                                            @if(session()->get('language')=='english')
                                                            <li><a href="{{ url('sub-subcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en) }}">{{$subsubcategory->subsubcategory_name_en}}</a></li>
                                                            @else
                                                            <li><a href="{{ url('sub-subcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en) }}">{{$subsubcategory->subsubcategory_name_ur}}</a></li>
                                                            @endif
                                                        </ul>
                                                        @endforeach
                                                    </div>
                                                    <!-- End SubSubCategory -->
                                                    @endforeach
                                                    <!-- End SubCategory -->
                                                    <!-- /.col -->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>