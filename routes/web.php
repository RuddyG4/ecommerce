<?php

use App\Http\Controllers\StoreController;
use App\Models\Order;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return redirect('/store');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware('admin')->group(function () {
        
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');
        Route::resource('/users', App\Http\Controllers\UserController::class);
        Route::resource('/roles', App\Http\Controllers\Users\RoleController::class);
        Route::resource('/products', App\Http\Controllers\Products\ProductController::class);
        Route::resource('/orders', App\Http\Controllers\OrderController::class);
        Route::resource('/branches', App\Http\Controllers\Business\BranchController::class);
        Route::resource('/inventory', App\Http\Controllers\Business\InventoryController::class);
    });
 });
    


Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/cart', [StoreController::class, 'cart'])->name('store.cart');
Route::get('/store/checkout', [StoreController::class, 'checkout'])->name('store.checkout');
Route::get('/store/catalogue', [StoreController::class, 'catalogue'])->name('store.catalogue');
Route::get('/store/wishlist', [StoreController::class, 'wishlist'])->name('store.wishlist');

Route::get('/email', function () {
    $order = Order::find(1);
    return view('emails.orders.order-updated', compact('order'));
});