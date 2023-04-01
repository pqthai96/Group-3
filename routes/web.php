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

Route::get('/', [HomeController::class, 'home']);

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/menu', [HomeController::class, 'menu'])->name('menu');

Route::get('/pizza/{id}', [HomeController::class, 'product'])->name('product');

Route::post('/login', [HomeController::class, 'login'])->name('login');

Route::post('/register', [HomeController::class, 'register'])->name('register');

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/cart', [HomeController::class, 'cart'])->name('cart');

Route::any('/add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('addToCart');

Route::get('/update-cart', [HomeController::class, 'updateCart'])->name('updateCart');

Route::get('/remove-cart', [HomeController::class, 'removeCart'])->name('removeCart');

Route::get('/get-discount', [HomeController::class, 'getDiscount'])->name('getDiscount');

Route::get('/checkout-accept', [HomeController::class, 'checkoutAccept'])->name('checkoutAccept');

Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');

Route::post('/orderplace', [HomeController::class, 'orderPlace'])->name('orderPlace');

Route::get('/account', [HomeController::class, 'account'])->name('account');

Route::get('/order', [HomeController::class, 'order'])->name('order');


//Backend
//=> http://localhost:8080/pizza_shop/public/admin

Route::get('/index', [AdminController::class, 'index'])->name('index');

Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('show_dashboard');

Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/log-out', [AdminController::class, 'logout'])->name('logout');

Route::get('/add-pizza', [AdminController::class, 'add_pizza'])->name('add_pizza');

Route::get('/all-pizza', [AdminController::class, 'all_pizza'])->name('all_pizza');