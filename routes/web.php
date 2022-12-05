<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\WishlistController;
use App\Models\ShippingDistrict;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


//Admin All Routes
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin Logout
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
//Admin Profile
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminProfileController::class, 'AdminPasswordUpdate'])->name('admin.update.password');

//Admin Brand Routes
Route::prefix('brand')->group(function () {
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});

//Admin Category Routes
Route::prefix('category')->group(function () {
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
    
    //Admin SubCategory
    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

     //Admin Sub-SubCategory
     Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
     Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
     Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
     Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
     Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
     Route::post('/sub/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
     Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
 
});

//Admin Product Routes
Route::prefix('product')->group(function () {
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('all.product');
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store', [ProductController::class, 'ProductStore'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
    Route::post('/update', [ProductController::class, 'ProductUpdate'])->name('product.update');
    Route::post('/image/update', [ProductController::class, 'ProductImageUpdate'])->name('update.product.image');
    Route::post('/thumbnail/update', [ProductController::class, 'ProductThumbnailUpdate'])->name('update.product.thumbnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImgDelete'])->name('product.multiimg.delete');
    Route::get('/deactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
    Route::get('/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
});

//Admin Slider Routes
Route::prefix('slider')->group(function () {
    Route::get('/view', [SliderController::class, 'SliderView'])->name('all.slider');
    Route::get('/add', [SliderController::class, 'SliderAdd'])->name('add.slider');
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/deactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
});

//Admin Coupons Routes
Route::prefix('coupons')->group(function () {
    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
    // Route::get('/deactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
    // Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
});
//Admin Shipping Routes
Route::prefix('shipping')->group(function () {
    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');
    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
    Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisonUpdate'])->name('division.update');
    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');
    
    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');
    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
    Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');
    
    Route::get('/area/view', [ShippingAreaController::class, 'AreaView'])->name('manage-area');
    Route::get('/district/ajax/{division_id}', [ShippingAreaController::class, 'GetAreaByCity']);
    Route::post('/area/store', [ShippingAreaController::class, 'AreaStore'])->name('area.store');
    Route::get('/area/edit/{id}', [ShippingAreaController::class, 'AreaEdit'])->name('area.edit');
    Route::post('/area/update/{id}', [ShippingAreaController::class, 'AreaUpdate'])->name('area.update');
    Route::get('/area/delete/{id}', [ShippingAreaController::class, 'AreaDelete'])->name('area.delete');
});
//Admin Orders Routes
Route::prefix('orders')->group(function () {
    Route::get('/pending', [OrderController::class, 'PendingOrders'])->name('pending-orders');
    Route::get('/pending/details/{order_id}', [OrderController::class, 'PendingOrderDetails'])->name('pending.order.details');
    Route::get('/confirmed', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
    Route::get('/processing', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');
    Route::get('/picked', [OrderController::class, 'PickedOrders'])->name('picked-orders');
    Route::get('/shipped', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');
    Route::get('/delivered', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');
    Route::get('/cancelled', [OrderController::class, 'CancelledOrders'])->name('cancelled-orders');
    Route::get('/pending-to-confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');
    Route::get('/confirm-to-processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm-processing');
    Route::get('/processing-to-picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing-to-picked');
    Route::get('/picked-to-shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked-to-shipped');
    Route::get('/shipped-to-delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped-to-delivered');
    Route::get('/delivered-to-cancelled/{order_id}', [OrderController::class, 'DeliveredToCancelled'])->name('delivered-to-cancelled');
    Route::get('/invoice/download/{order_id}', [OrderController::class, 'InvoiceDownload'])->name('invoice.download');
});



//User All Routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'Index']);
//User Logout
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

//User Profile
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserPassword'])->name('user.password');
Route::post('/user/update/password', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.store');

//Multilanguage Routes
Route::get('/lang/english', [LanguageController::class, 'English'])->name('english.lang');
Route::get('/lang/urdu', [LanguageController::class, 'Urdu'])->name('urdu.lang');
//Tags wise products
Route::get('product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
//Subcategory Wise Products
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);
//Sub-Subcategory Wise Products
Route::get('/sub-subcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);

//Product View Modal With AJAX
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

//Add to cart store
Route::post('/cart/store/{id}', [CartController::class, 'AddToCart']);

//Minicart
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);

//Remove Minicart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
//Add to wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishList']);

Route::group(['prefix'=>'user','middleware'=>['user','auth'], 'namespace'=>'User'], function(){
    //Wishlist Page
    Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
    //Wishlist Products Page
    Route::get('/wishlist-products', [WishlistController::class, 'GetWishlistProduct']);
    //Remove Wishlist Product
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);
    //Stripe Payments
    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');
    //Cash Payment
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
    //My Orders
    Route::get('/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    
    Route::get('/order-details/{order_id}', [AllUserController::class, 'OrderDetails']);
    
    Route::get('/invoice-download/{order_id}', [AllUserController::class, 'InvoiceDownload']);
});
//Cart View Page
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
//Wishlist Products Page
Route::get('/user/cart-products', [CartPageController::class, 'GetCartProduct']);
//Remove Cart Product
Route::get('/user/cart-remove/{id}', [CartPageController::class, 'RemoveCartProduct']);
//Increment Cart Product
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
//Decrement Cart Product
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

//Coupon Apply Option
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

//Checkout
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
Route::post('/checkout/store', [CartController::class, 'CheckoutStore'])->name('checkout.store');
Route::post('/city/get-area', [ShippingAreaController::class, 'getAreasByCity'])->name('getAreasByCity');
