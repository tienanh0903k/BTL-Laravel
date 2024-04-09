<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\productController;
use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ordersController;
use App\Http\Controllers\purchaseordersController;
use Illuminate\Support\Facades\Route;

Route::get('/tmp', function () {
    return view('tmp');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
// ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(productController::class)->prefix('admin/products')->group(function () {
    Route::get('', 'index')->name('products')->middleware('admin');
    Route::get('create', 'create')->name('products.create');
    Route::post('store', 'store')->name('products.store');
    Route::get('show/{id}', 'show')->name('products.show');
    Route::get('edit/{id}', 'edit')->name('products.edit');
    Route::post('edit/{id}', 'update')->name('products.update');
    Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
});



Route::controller(authController::class)->prefix('auth')->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
});



Route::controller(supplierController::class)->prefix('admin/suppiler')->group(function () {
    Route::get('', 'index')->name('suppiler.index')->middleware('admin');
    Route::get('/search', 'search')->name('supplier.search');
    Route::get('/create', 'create')->name('supplier.create');

});



Route::controller(purchaseordersController::class)->prefix('admin/import-bill')->group(function () {
    Route::get('', 'index')->name('purchaseorders.index')->middleware('admin');
    Route::get('show/{id}', 'show')->name('purchaseorders.show');
    Route::get('create', 'create')->name('purchaseorders.create');
    Route::post('save-products', 'saveProducts')->name('save.products');
    Route::post('save-importbill', 'postImport')->name('importbill.create');
});



Route::get('/', [categoryController::class, 'getAll'])->name('home');
Route::get('/detail', [categoryController::class, 'detail'])->name('get.detail');

Route::resource('register', authController::class);





//------------------------USER---------------------
//CHECKOUT
Route::get('/check-out', [ordersController::class, 'viewCheckout'])->name('checkout.index');

Route::post('/checked', [ordersController::class, 'checkOut'])->name('checkout.cash');

Route::post('/checked-vnpay', [ordersController::class, 'vn_Payment'])->middleware('web')->name('checkout.vnpay');

Route::get('/return-vnpay', [ordersController::class, 'return'])->middleware('web')->name('return.vnpay');

Route::get('/logout', [authController::class, 'logout'])->name('logout.action');


//----------------------------------------- CART ----------------------------------------------------------------
Route::get('/shopping-cart', [productController::class, 'productCart'])->name('shopping.cart');
Route::get('/detail/{id}', [productController::class, 'addToCart'])->name('addbook.to.cart');
Route::post('/add-cart', [cartController::class, 'addToCart'])->middleware('login.cart')->name('add.cart');
Route::get('/cart', [cartController::class, 'index'])->name('cart.index');


//-----------------------------------------PRODUCTS---------------------------------------------------------
Route::get('/products', [categoryController::class, 'index'])->name('products.index');
