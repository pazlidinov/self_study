<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

// Routes for products
Route::get('/', [ProductController::class, 'home_page'])->name('home_page');
Route::get('/index', [ProductController::class, 'index'])->name('index');
Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');


// Routes for filter by category and name
Route::get('/category/{id}', [ProductController::class, 'by_category'])->name('by_category');
Route::get('/filter_by_category', [ProductController::class, 'filter_by_category'])->name('filter_by_category');
Route::get('/filter_by_name', [ProductController::class, 'filter_by_name'])->name('filter_by_name');


// Routes for liked products
Route::get('/liked', [ProductController::class, 'liked_product'])->name('liked_product');
Route::get('/put_to_liked/{id}', [ProductController::class, 'put_to_liked'])->name('put_to_liked');


// Routes for products in cart of user
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::get('/put_to_cart/{id}', [ProductController::class, 'put_to_cart'])->name('put_to_cart');
Route::get('/drop_from_cart/{id}', [ProductController::class, 'drop_from_cart'])->name('drop_from_cart');


// Route to check product in cart and liked products
Route::get('/check/{id}', [ProductController::class, 'check'])->name('check');


// Route for vreating comment
Route::post('/create_comment/{id}', [CommentController::class, 'store'])->name('create_comment');


// Routes to send messages 
Route::get('/contact', [ProductController::class, 'contact'])->name('contact');
Route::post('/send_message', [MessageController::class, 'store'])->name('send_message');


// Route to order
Route::post('/create_order', [OrderController::class, 'store'])->name('create_order');
