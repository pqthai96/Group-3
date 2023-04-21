<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Frontend
//=> http://localhost:8080/pizza_shop/public/
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/home', 'home')->name('home');

    Route::get('/menu', 'menu')->name('menu');

    Route::get('/pizza/{id}', 'product')->name('product');

    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');

    Route::post('/post-email', 'post_email')->name('post_email');
    Route::get('reset-password/{token}', 'get_password')->name('get_password');
    Route::post('reset-password', 'update_password')->name('update_password');

    Route::get('/cart', 'cart')->name('cart');
    Route::any('/add-to-cart/{id}', 'addToCart')->name('addToCart');
    Route::get('/update-cart', 'updateCart')->name('updateCart');
    Route::get('/remove-cart', 'removeCart')->name('removeCart');
    Route::get('/get-discount', 'getDiscount')->name('getDiscount');
    Route::get('/checkout-accept', 'checkoutAccept')->name('checkoutAccept');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::post('/orderplace', 'orderPlace')->name('orderPlace');

    Route::get('/account', 'account')->name('account');
    Route::post('/update-account', 'updateAccount')->name('update.account');
    Route::get('/view-password', 'viewPassword')->name('view.Password');
    Route::post('/change-password','updatePassword')->name('update.Password');

    Route::get('/order', 'order')->name('order');
    Route::get('/order-cancel/{order_id}', 'cancelOrder')->name('cancelOrder');
    Route::post('/review/{product_id}', 'review')->name('review');

    Route::get('/blog', 'blog')->name('blog');
    Route::get('/single-blog/{id}', 'singleBlog');
    Route::get('/term', 'term')->name('term');
    Route::get('/faqs', 'faqs')->name('faqs');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/location', 'location')->name('location');
    Route::get('/promotion', 'promotion')->name('promotion');
    Route::get('/about', 'about')->name('about');

    Route::get('/contact', 'contact')->name('contact');
    Route::post('/save-contact','save_contact')->name('save_contact');
});


//Backend
//=> http://localhost:8080/pizza_shop/public/admin
Route::controller(AdminController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/dashboard', 'show_dashboard')->name('show_dashboard');
    Route::post('/admin-login', 'admin_login')->name('admin_login');
    Route::get('/log-out', 'logout')->name('logout');
    Route::get('/change-admin-password', 'view_admin')->name('view.admin');
    Route::post('/change-admin-password', 'change_adminPassword')->name('change.admin');

    Route::get('/all-admin', 'all_admin')->name('all_admin');
    Route::get('/add-admin', 'add_admin')->name('add_admin');
    Route::post('/save-admin', 'save_admin')->name('save_admin');
    Route::get('/edit-admin/{admin_id}', 'edit_admin')->name('edit_admin');
    Route::post('/update-admin/{admin_id}', 'update_admin')->name('update_admin');
    Route::get('/remove-admin/{admin_id}', 'remove_admin')->name('remove_admin');

    Route::get('/all-user', 'all_user')->name('all_user');
    Route::get('/edit-user/{user_id}', 'edit_user')->name('edit_user');
    Route::post('/update-user/{user_id}', 'update_user')->name('update_user');
    Route::get('/user-search', 'user_search')->name('user_search');

    Route::get('/all-pizza', 'all_pizza')->name('all_pizza');
    Route::get('/add-pizza', 'add_pizza')->name('add_pizza');
    Route::post('/save-pizza', 'save_pizza')->name('save_pizza');
    Route::get('/edit-pizza/{pizza_id}', 'edit_pizza')->name('edit_pizza');
    Route::post('/update-pizza/{pizza_id}', 'update_pizza')->name('update_pizza');
    Route::get('/remove-pizza/{pizza_id}', 'remove_pizza')->name('remove_pizza');
    Route::get('/pizza-sort', 'pizza_sort')->name('pizza_sort');

    Route::get('/all-supplement', 'all_supplement')->name('all_supplement');
    Route::get('/add-supplement', 'add_supplement')->name('add_supplement');
    Route::post('/save-supplement', 'save_supplement')->name('save_supplement');
    Route::get('/edit-supplement/{supplement_id}', 'edit_supplement')->name('edit_supplement');
    Route::post('/update-supplement/{supplement_id}', 'update_supplement')->name('update_supplement');
    Route::get('/remove-supplement/{supplement_id}', 'remove_supplement')->name('remove_supplement');

    Route::get('/all-order', 'all_order')->name('all_order');
    Route::get('/order-info/{order_id}', 'order_info')->name('order_info');
    Route::get('/update-order/{order_id}', 'update_order')->name('update_order');
    Route::get('/cancel-order/{order_id}', 'cancel_order')->name('cancel_order');
    Route::get('/order-search', 'order_search')->name('order_search');

    Route::get('/all-blog', 'all_blog')->name('all_blog');
    Route::get('/add-blog', 'add_blog')->name('add_blog');
    Route::post('/save-blog', 'save_blog')->name('save_blog');
    Route::get('/edit-blog/{BlogID}', 'edit_blog');
    Route::post('/update-blog/{BlogID}', 'update_blog')->name('update_blog');
    Route::get('/remove-blog/{BlogID}', 'remove_blog')->name('remove_blog');
    
    Route::get('/all-promotions', 'all_promotions')->name('all_promotions');
    Route::get('/add-promotions', 'add_promotions')->name('add_promotions');
    Route::post('/save-promotions', 'save_promotions')->name('save_promotions');
    Route::get('/edit-promotions/{DiscountID}', 'edit_promotions');
    Route::post('/update-promotions/{DiscountID}', 'update_promotions')->name('update_promotion');
    Route::get('/remove-promotions/{DiscountID}', 'remove_promotions')->name('remove_promotion');

    Route::get('/all-contact-pending', 'all_contact_pending')->name('all_contact_pending');
    Route::get('/all-contact-processed', 'all_contact_processed')->name('all_contact_processed');
    Route::get('/form-contact/{contact_id}', 'form_contact')->name('form_contact');
    Route::post('/reply-contact/{contact_id}', 'reply_contact')->name('reply_contact');    
    Route::get('/contact-pending-search', 'contact_pending_search')->name('contact_pending_search');
    Route::get('/contact-processed-search', 'contact_processed_search')->name('contact_processed_search');
});