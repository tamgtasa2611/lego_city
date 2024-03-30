<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\CheckLoginAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\AgeController as AdminAgeController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\CheckLoginCustomer;

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

//CUSTOMER ROUTES========================================================================
Route::get('/', function () {
    return view('customers.home');
})->name('customer.home');

Route::get('/home', function () {
    return view('customers.home');
})->name('customer.home');

Route::get('/category', [CategoryController::class, 'index'])->name('customer.category');

Route::get('/product', [ProductController::class, 'index'])->name('customer.product');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('customer.product.detail');

Route::get('/contact', function () {
    return view('customers.contact');
})->name('customer.contact');

Route::get('/about', function () {
    return view('customers.about');
})->name('customer.about');

//check login
Route::middleware(CheckLoginCustomer::class)->group(function () {
    Route::get('/profile', [CustomerController::class, 'editProfile'])->name('customer.profile');
    Route::put('/profile', [CustomerController::class, 'updateProfile'])->name('customer.profileUpdate');

    Route::get('/orders_history', [CustomerController::class, 'showOrderHistory'])->name('customer.orderHistory');
    Route::get('/order_detail/{order}', [CustomerController::class, 'orderDetail'])->name('customer.orderDetail');
    Route::get('/cancel_order/{order}', [OrderController::class, 'cancelOrder'])->name('customer.cancelOrder');

    Route::get('/change_password', [CustomerController::class, 'editPassword'])->name('customer.pwdEdit');
    Route::put('/change_password', [CustomerController::class, 'updatePassword'])->name('customer.pwdUpdate');

    Route::get('/cart', [ProductController::class, 'cart'])->name('customer.products.cart');
    Route::get('/addToCart/{id}', [ProductController::class, 'addToCart'])->name('customer.products.addToCart');
    Route::get('/addToCartAjax/{id}', [ProductController::class, 'addToCartAjax'])->name('customer.products.addToCartAjax');
    Route::get('/updateCartQuantity/{id}', [ProductController::class, 'updateCartQuantity'])->name('customer.products.updateCartQuantity');
    Route::get('/deleteFromCart/{id}', [ProductController::class, 'deleteFromCart'])->name('customer.products.deleteFromCart');
    Route::get('/deleteAllFromCart', [ProductController::class, 'deleteAllFromCart'])->name('customer.products.deleteAllFromCart');

    Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'checkoutProcess'])->name('checkoutProcess');
});

Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
Route::post('/register', [CustomerController::class, 'registerProcess'])->name('customer.registerProcess');

Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
Route::post('/login', [CustomerController::class, 'loginProcess'])->name('customer.loginProcess');

Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
Route::get('/forgot_password', [CustomerController::class, 'forgotPassword'])->name('customer.forgotPassword');


//    LOGIN
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'loginProcess'])->name('admin.loginProcess');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware([CheckLoginAdmin::class])->group(function () {
//ADMIN
    Route::get('/admin/customer', [CustomerController::class, 'show'])->name('admin/customer');
    Route::get('/create', [CustomerController::class, 'create'])->name('customer/create');
    Route::post('/create', [CustomerController::class, 'store'])->name('customer/store');
//show edit form
    Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('customer/edit');
    Route::put('/{customer}/edit', [CustomerController::class, 'update'])->name('customer/update');
    Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customer/destroy');
//PRODUCTS
    Route::get('/products', [ProductController::class, 'indexAdmins'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{products}', [ProductController::class, 'destroy'])->name('products.destroy');
//CUSTOMER ROUTES========================================================================


    Route::get('admin', [AdminProductController::class, 'index'])->name('admin.home');


//ADMIN ROUTES=======================================================================
//PRODUCTS
    Route::prefix('admin/dashboard')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');
    });
// -------- End Dashboard manager ----------

// -------- Start Customer manager ----------
//show home customer manager
    Route::prefix('admin/customer')->group(function () {
        Route::get('/', [CustomerController::class, 'show'])->name('admin.customers');

//show create form
        Route::get('/create', [CustomerController::class, 'create'])->name('admin.customers.create');
        Route::post('/create', [CustomerController::class, 'store'])->name('admin.customers.store');
//show edit form
        Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
        Route::put('/{customer}/edit', [CustomerController::class, 'update'])->name('admin.customers.update');
        Route::delete('/delete', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');
//show edit status form
        Route::get('/admin/{customer}/status', [CustomerController::class, 'editStatus'])->name('admin.customers.editStatus');
        Route::put('/admin/{customer}/status', [CustomerController::class, 'updateStatus'])->name('admin.customers.status');
    });
// -------- End Customer manager ----------

//BRAND
    Route::prefix('admin/brand')->group(function () {
        //Route read
        Route::get('/', [AdminBrandController::class, 'index'])->name('admin.brands');
        //Route hiển thị form thêm brand
        Route::get('/create', [AdminBrandController::class, 'create'])->name('admin.brands.create');
        //Route thêm dữ liệu lên db
        Route::post('/create', [AdminBrandController::class, 'store'])->name('admin.brands.store');
        //Route hiển thị form sửa
        Route::get('/{brand}/edit', [AdminBrandController::class, 'edit'])->name('admin.brands.edit');
        //Route update dữ liệu trên db
        Route::put('/{brand}/edit', [AdminBrandController::class, 'update'])->name('admin.brands.update');
        //Route để xóa
        Route::delete('/delete', [AdminBrandController::class, 'destroy'])->name('admin.brands.destroy');
    });
//END BRAND

//CATEGORY
    Route::prefix('admin/category')->group(function () {
        //Route read
        Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.categories');
        //Route hiển thị form thêm brand
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
        //Route thêm dữ liệu lên db
        Route::post('/create', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
        //Route hiển thị form sửa
        Route::get('/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
        //Route update dữ liệu trên db
        Route::put('/{category}/edit', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
        //Route để xóa
        Route::delete('/delete', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });
//END CATEGORY

//AGE
    Route::prefix('admin/age')->group(function () {
        //Route read
        Route::get('/', [AdminAgeController::class, 'index'])->name('admin.ages');
        //Route hiển thị form thêm brand
        Route::get('/create', [AdminAgeController::class, 'create'])->name('admin.ages.create');
        //Route thêm dữ liệu lên db
        Route::post('/create', [AdminAgeController::class, 'store'])->name('admin.ages.store');
        //Route hiển thị form sửa
        Route::get('/{age}/edit', [AdminAgeController::class, 'edit'])->name('admin.ages.edit');
        //Route update dữ liệu trên db
        Route::put('/{age}/edit', [AdminAgeController::class, 'update'])->name('admin.ages.update');
        //Route để xóa
        Route::delete('/delete', [AdminAgeController::class, 'destroy'])->name('admin.ages.destroy');
    });
//END AGE

//PRODUCT
    Route::prefix('admin/product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('admin.products');
        Route::get('/detail/{product}', [AdminProductController::class, 'show'])->name('admin.products.detail');
        Route::get('/create', [AdminProductController::class, 'create'])->name('admin.products.create');
        Route::post('/create', [AdminProductController::class, 'store'])->name('admin.products.store');
        Route::get('/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/{product}/edit', [AdminProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/delete', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
    });
//END PRODUCT

//ORDER
    Route::prefix('admin/order')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('admin.orders');
        Route::get('/detail/{product}', [AdminOrderController::class, 'show'])->name('admin.orders.detail');
        Route::get('/create', [AdminOrderController::class, 'create'])->name('admin.orders.create');
        Route::post('/create', [AdminOrderController::class, 'store'])->name('admin.orders.store');
        Route::get('/{product}/edit', [AdminOrderController::class, 'edit'])->name('admin.orders.edit');
        Route::put('/{product}/edit', [AdminOrderController::class, 'update'])->name('admin.orders.update');
        Route::delete('/delete', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');
    });
//END ORDER
//ADMIN ROUTES=======================================================================
});
