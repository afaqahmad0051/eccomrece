@php
$prefix = Request::route()->getprefix();
$route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Emart</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{url('admin/dashboard')}}">
                    <i data-feather='home'></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ ($prefix == '/brand')?'active':'' }}">
                <a href="#">
                    <i data-feather='briefcase'></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.brand')?'active':'' }}"><a href="{{route('all.brand')}}"><i class="ti-more "></i>All Brands </a></li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/category')?'active':'' }}">
                <a href="#">
                    <i data-feather='layers'></i>
                    <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.category')?'active':'' }}"><a href="{{route('all.category')}}"><i class="ti-more "></i>Categories </a></li>
                    <li class="{{ ($route == 'all.subcategory')?'active':'' }}"><a href="{{route('all.subcategory')}}"><i class="ti-more "></i>SubCategories </a></li>
                    <li class="{{ ($route == 'all.subsubcategory')?'active':'' }}"><a href="{{route('all.subsubcategory')}}"><i class="ti-more "></i>Sub SubCategories </a></li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/product')?'active':'' }}">
                <a href="#">
                    <i data-feather='shopping-bag'></i>
                    <span>Product</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'add.product')?'active':'' }}"><a href="{{route('add.product')}}"><i class="ti-more "></i>Add Product </a></li>
                    <li class="{{ ($route == 'all.product')?'active':'' }}"><a href="{{route('all.product')}}"><i class="ti-more "></i>Manage Products </a></li>
                </ul>
            </li>
            
            <li class="treeview {{ ($prefix == '/slider')?'active':'' }}">
                <a href="#">
                    <i data-feather='layout'></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li class="{{ ($route == 'all.slider')?'active':'' }}"><a href="{{route('all.slider')}}"><i class="ti-more "></i>Manage Slider </a></li>
                <li class="{{ ($route == 'add.slider')?'active':'' }}"><a href="{{route('add.slider')}}"><i class="ti-more "></i>Add Slider </a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}">
                <a href="#">
                    <i data-feather='tag'></i>
                    <span>Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li class="{{ ($route == 'manage-coupon')?'active':'' }}"><a href="{{route('manage-coupon')}}"><i class="ti-more "></i>Manage Coupons </a></li>
                </ul>
            </li>
            <li class="treeview {{ ($prefix == '/shipping')?'active':'' }}">
                <a href="#">
                    <i data-feather='map-pin'></i>
                    <span>Shipping Area</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li class="{{ ($route == 'manage-division')?'active':'' }}"><a href="{{route('manage-division')}}"><i class="ti-more "></i>Country </a></li>
                <li class="{{ ($route == 'manage-district')?'active':'' }}"><a href="{{route('manage-district')}}"><i class="ti-more "></i>City </a></li>
                <li class="{{ ($route == 'manage-area')?'active':'' }}"><a href="{{route('manage-area')}}"><i class="ti-more "></i>Area </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="mail"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="mailbox_inbox.html"><i class="ti-more"></i>Inbox</a></li>
                    <li><a href="mailbox_compose.html"><i class="ti-more"></i>Compose</a></li>
                    <li><a href="mailbox_read_mail.html"><i class="ti-more"></i>Read</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Pages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="profile.html"><i class="ti-more"></i>Profile</a></li>
                    <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
                    <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
                    <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
                    <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>
        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>