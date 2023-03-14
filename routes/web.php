<?php

use App\Http\Controllers\HomeController;
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
//=> http://localhost:8080/pizza_shop/public/
Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'home']);

Route::get('/menu', [HomeController::class, 'menu']);

Route::get('/cart', [HomeController::class, 'cart']);

Route::get('/pizza/{id}', [HomeController::class, 'product']);

Route::post('/login', [HomeController::class, 'login'])->name('login');

Route::post('/register', [HomeController::class, 'register']);

Route::get('/logout', [HomeController::class, 'logout']);

Route::get('cart', [HomeController::class, 'cart']);

Route::get('add-to-cart/{id}', [HomeController::class, 'addToCart']);