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

            <li class="{{ ($route == 'dashboard')?'active':'' }}">
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
            <li class="treeview {{ ($prefix == '/orders')?'active':'' }}">
                <a href="#">
                    <i data-feather='send'></i>
                    <span>Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li class="{{ ($route == 'pending-orders')?'active':'' }}"><a href="{{route('pending-orders')}}"><i class="ti-more "></i>Pending Orders </a></li>
                <li class="{{ ($route == 'confirmed-orders')?'active':'' }}"><a href="{{route('confirmed-orders')}}"><i class="ti-more "></i>Confirmed Orders </a></li>
                <li class="{{ ($route == 'processing-orders')?'active':'' }}"><a href="{{route('processing-orders')}}"><i class="ti-more "></i>Processing Orders </a></li>
                <li class="{{ ($route == 'picked-orders')?'active':'' }}"><a href="{{route('picked-orders')}}"><i class="ti-more "></i>Picked Orders </a></li>
                <li class="{{ ($route == 'shipped-orders')?'active':'' }}"><a href="{{route('shipped-orders')}}"><i class="ti-more "></i>Shipped Orders </a></li>
                <li class="{{ ($route == 'delivered-orders')?'active':'' }}"><a href="{{route('delivered-orders')}}"><i class="ti-more "></i>Delivered Orders </a></li>
                <li class="{{ ($route == 'cancelled-orders')?'active':'' }}"><a href="{{route('cancelled-orders')}}"><i class="ti-more "></i>Cancelled Orders </a></li>
                </ul>
            </li>
            <li class="header nav-small-cap">Reports</li>
            
            <li class="treeview {{ ($prefix == '/reports')?'active':'' }}">
                <a href="#">
                    <i data-feather='clipboard'></i>
                    <span>Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-reports')?'active':'' }}"><a href="{{route('all-reports')}}"><i class="ti-more "></i>All Reports</a></li>
                </ul>
            </li>
            </li>
            <li class="treeview {{ ($prefix == '/users')?'active':'' }}">
                <a href="#">
                    <i data-feather='users'></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-users')?'active':'' }}"><a href="{{route('all-users')}}"><i class="ti-more "></i>Customers</a></li>
                </ul>
            </li>
        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>