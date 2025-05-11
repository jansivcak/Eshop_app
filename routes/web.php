<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProduktController;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\View;


Route::get('/', [HomeController::class, 'ReturnHome'])->name('home');



Route::get('/account', function () {
    return view('pages.account');
})->name('account');













Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');




Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');



Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
});




Route::post('/logout', [HomeController::class, 'logout'])->name('logout');



Route::get('/produkty/search', [ProductPageController::class, 'index_search'])->name('products.search');

Route::get('/produkty/skupina/{group_id?}', [ProductPageController::class, 'index_group'])->name('products.group');
Route::get('/produkty/kategoria/{category_id?}', [ProductPageController::class, 'index'])->name('products.index');
Route::get('/produkty/{product}', [ProduktController::class, 'show'])->name('products.show');
Route::post('/produkty/{product}',   [CardController::class, 'store'])->name('cart.store');


View::composer('*', function($view) {
    $cart = $view->with('cart', $cart ?? new ShoppingCart());
});

Route::get('/cart', [CardController::class, 'index'])->name('cart.show');
Route::post('/cart', [CardController::class, 'update'])->name('cart.update');
Route::delete('/cart/{item}', [CardController::class, 'destroy'])->name('cart.destroy');




Route::get('/cart/checkout', [PaymentController::class, 'showCheckout'])->name('checkout.show');
Route::post('/cart/checkout', [PaymentController::class, 'storeCheckout'])->name('checkout.store');

Route::get('/cart/payment', [CardController::class, 'showPayment'])->name('show.payment');
Route::post('/cart/payment', [PaymentController::class, 'storepayment'])->name('payment.store');


Route::get('/cart/thanks', fn() => view('pages.confirmation'))->name('show.confirmation');


Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.show.products');


Route::get('/admin/add', [AdminProductController::class, 'showADD'])->name('admin.show.add');
Route::post('/admin/add', [AdminProductController::class, 'store'])->name('products.store');
