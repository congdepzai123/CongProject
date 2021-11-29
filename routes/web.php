<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cart; 
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
// Frontend
Route::get('/', 'HomeController@index');

Route::get('/trang-chu', 'HomeController@index');

Route::post('/tim-kiem', 'HomeController@search');

// Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{slug_category_product}', 'CategoryProduct@show_category_home');

// Thương hiệu sản phẩm trang chủ
Route::get('/thuong-hieu-san-pham/{brand_id}', 'BrandProduct@show_brand_home');

Route::get('/chi-tiet-san-pham/{product_id}', 'ProductController@details_product');

// Backend
Route::get('/admin', 'AdminController@index');

Route::get('/dashboard', 'AdminController@show_dashboard');

Route::post('/admin-dashboard', 'AdminController@dashboard');

Route::get('/logout', 'AdminController@logout');

//Login facebook
Route::get('/login-facebook','AdminController@login_facebook');

Route::get('/admin/callback','AdminController@callback_facebook');

Route::get('/login-facebook-customer','AdminController@login_facebook_customer');

Route::get('/customer/facebook/callback','AdminController@callback_facebook_customer');

//Login  google
Route::get('/login-google','AdminController@login_google');

Route::get('/google/callback','AdminController@callback_google');

//login customer by google
Route::get('/login-customer-google','AdminController@login_customer_google');

Route::get('/customer/google/callback','AdminController@callback_customer_google');
//Lien he trang 

Route::get('/lien-he','ContactController@lien_he' );

// Category product 
Route::get('/add-category-product', 'CategoryProduct@add_category_product');

Route::get('/all-category-product', 'CategoryProduct@all_category_product');

Route::post('/save-category-product', 'CategoryProduct@save_category_product');

Route::get('/edit-category-product/{category_product_id}', 'CategoryProduct@edit_category_product');

Route::get('/delete-category-product/{category_product_id}', 'CategoryProduct@delete_category_product');

Route::get('/unactive-category-product/{category_product_id}', 'CategoryProduct@unactive_category_product');

Route::get('/active-category-product/{category_product_id}', 'CategoryProduct@active_category_product');

Route::post('/update-category-product/{category_product_id}', 'CategoryProduct@update_category_product');

Route::post('/export-csv','CategoryProduct@export_csv');

Route::post('/import-csv','CategoryProduct@import_csv');

// Brand product 
Route::get('/add-brand-product', 'BrandProduct@add_brand_product');

Route::get('/all-brand-product', 'BrandProduct@all_brand_product');

Route::post('/save-brand-product', 'BrandProduct@save_brand_product');

Route::get('/edit-brand-product/{brand_product_id}', 'BrandProduct@edit_brand_product');

Route::get('/delete-brand-product/{brand_product_id}', 'BrandProduct@delete_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}', 'BrandProduct@unactive_brand_product');

Route::get('/active-brand-product/{brand_product_id}', 'BrandProduct@active_brand_product');

Route::post('/update-brand-product/{brand_product_id}', 'BrandProduct@update_brand_product');

//  product 
Route::group(['middleware' => 'auth.roles'], function () {
	Route::get('/add-product','ProductController@add_product');
	Route::get('/edit-product/{product_id}','ProductController@edit_product');
});

Route::get('users','UserController@index')->middleware('auth.roles');
Route::get('add-users','UserController@add_users')->middleware('auth.roles');
Route::get('delete-user-roles/{admin_id}','UserController@delete_user_roles')->middleware('auth.roles');
Route::post('store-users','UserController@store_users');
Route::post('assign-roles','UserController@assign_roles')->middleware('auth.roles');

Route::get('impersonate/{admin_id}','UserController@impersonate');
Route::get('impersonate-destroy','UserController@impersonate_destroy');




Route::get('/all-product', 'ProductController@all_product');

Route::post('/save-product', 'ProductController@save_product');



Route::get('/delete-product/{product_id}', 'ProductController@delete_product');

Route::get('/unactive-product/{product_id}', 'ProductController@unactive_product');

Route::get('/active-product/{product_id}', 'ProductController@active_product');

Route::post('/update-product/{product_id}', 'ProductController@update_product');

Route::post('/load-comment','ProductController@load_comment');

Route::post('/send-comment','ProductController@send_comment');

Route::get('/comment','ProductController@list_comment');

Route::post('/allow-comment','ProductController@allow_comment');

Route::post('/reply-comment','ProductController@reply_comment');

Route::post('/insert-rating','ProductController@insert_rating');

//Cart
Route::post('/save-cart', 'CartController@save_cart');

Route::get('/update-cart-quantity', 'CartController@update_cart_quantity');
Route::post('/update-cart', 'CartController@update_cart');

Route::get('/show-cart', 'CartController@show_cart');
Route::get('/gio-hang', 'CartController@gio_hang');

Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::get('/del-product/{session_id}', 'CartController@delete_product');
Route::get('/del-all-product', 'CartController@delete_all_product');

Route::post('/add-cart-ajax', 'CartController@add_cart_ajax');

//coupon
Route::post('/check-coupon', 'CartController@check_coupon');

Route::get('/unset-coupon', 'CouponController@unset_coupon');
Route::get('/insert-coupon', 'CouponController@insert_coupon');
Route::get('/list-coupon', 'CouponController@list_coupon');
Route::get('/delete-coupon/{coupon_id}', 'CouponController@delete_coupon');
Route::post('/insert-coupon-code', 'CouponController@insert_coupon_code');
//Check out
Route::get('/login-checkout', 'CheckoutController@login_checkout');

Route::get('/logout-checkout', 'CheckoutController@logout_checkout');

Route::post('/add-customer', 'CheckoutController@add_customer');

Route::post('/order-place', 'CheckoutController@order_place');

Route::post('/login-customer', 'CheckoutController@login_customer');

Route::get('/checkout', 'CheckoutController@checkout');

Route::get('/payment', 'CheckoutController@payment');

Route::post('/save-checkout-customer', 'CheckoutController@save_checkout_customer');

Route::post('/select-delivery-home', 'CheckoutController@select_delivery_home');

Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::get('/del-fee','CheckoutController@del_fee');

Route::post('/confirm-order','CheckoutController@confirm_order');

Route::get('/quen-mat-khau','CheckoutController@quen_mat_khau');
Route::post('/recover-pass','CheckoutController@recover_pass');
//order
Route::get('/view-history-order/{order_code}','OrderController@view_history_order');

Route::get('/history','OrderController@history');

Route::get('/delete-order/{order_code}','OrderController@order_code');

Route::get('/manage-order', 'OrderController@manage_order');

 Route::get('/view-order/{order_code}', 'OrderController@view_order');

 Route::get('/print-order/{checkout_code}','OrderController@print_order');
 Route::post('/update-order-qty','OrderController@update_order_qty');
 
Route::post('/update-qty','OrderController@update_qty');

Route::post('/huy-don-hang','OrderController@huy_don_hang');

//delivery
Route::get('/delivery', 'DeliveryController@delivery');

Route::post('/select-delivery', 'DeliveryController@select_delivery');

Route::post('/insert-delivery', 'DeliveryController@insert_delivery');

Route::post('/select-feeship', 'DeliveryController@select_feeship');

Route::post('/update-delivery', 'DeliveryController@update_delivery');
//banner
Route::get('/manage-slider','SliderController@manage_slider');

Route::get('/add-slider','SliderController@add_slider');

Route::get('/delete-slide/{slide_id}','SliderController@delete_slide');

Route::post('/insert-slider','SliderController@insert_slider');

Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide');

Route::get('/active-slide/{slide_id}','SliderController@active_slide');

//Authentication roles
Route::get('/register-auth','AuthController@register_auth');

Route::get('/login-auth','AuthController@login_auth');

Route::get('/logout-auth','AuthController@logout_auth');

Route::post('/register','AuthController@register');

Route::post('/login','AuthController@login');

//Usser
Route::get('users','UserController@index');

Route::get('add-users','UserController@add_users');

Route::get('delete-user-roles/{admin_id}','UserController@delete_user_roles');

//Category Post
Route::get('/add-category-post','CategoryPost@add_category_post');

Route::get('/all-category-post','CategoryPost@all_category_post');

Route::get('/edit-category-post/{category_post_id}','CategoryPost@edit_category_post');

Route::post('/save-category-post','CategoryPost@save_category_post');

Route::post('/update-category-post/{cate_id}','CategoryPost@update_category_post');

Route::get('/delete-category-post/{cate_id}','CategoryPost@delete_category_post');

//Bai viet
Route::get('/danh-muc-bai-viet/{post_slug}','PostController@danh_muc_bai_viet');

Route::get('/bai-viet/{post_slug}','PostController@bai_viet');

//posts
Route::get('/add-post','PostController@add_post');

Route::get('/all-post','PostController@all_post');

Route::get('/delete-post/{post_id}','PostController@delete_post');

Route::get('/edit-post/{post_id}','PostController@edit_post');

Route::post('/save-post','PostController@save_post');

Route::post('/update-post/{post_id}','PostController@update_post');