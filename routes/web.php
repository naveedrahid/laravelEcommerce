<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\front\FrontsController;
use App\Http\Controllers\front\ShopController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\StripeController;
use App\Http\Controllers\front\MyaccountController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes();
// Route::get('/', FrontsController::class, 'index');


 // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm']);
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm']);
Route::post('password/reset', [ResetPasswordController::class, 'reset']);
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [LoginController::class,'login']);
Route::post('logout',  [LoginController::class,'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'as'=> 'admin.','middleware' => ['auth','admin']], function () {
    // Authentication Routes...
    Route::resource('products', AdminController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('order', OrderController::class)->except([
        'destroy', 'show','create',
    ]);
    Route::get('customers',  [CustomerAccountController::class,'index'])->name('customers');
    Route::get('customer/{id}',  [CustomerAccountController::class,'edit'])->name('edit');
    Route::put('customer/{id}',  [CustomerAccountController::class,'customer_update'])->name('customer_update');
});


Auth::routes();

    Route::get('/', [FrontsController::class, 'index'])->name('front');
    Route::get('/product_detail/{id}', [FrontsController::class, 'show'])->name('product_detail');
    Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// cart route
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('cart_post')->middleware('auth');
    Route::get('/cart/{product}', [CartController::class, 'remove_product'])->name('remove.product');
    Route::patch('update-cart', [CartController::class, 'update_product'])->name('update.cart');

// Checkout

    Route::get('checkout', [CheckoutController::class, 'checkout_view'])->name('checkout');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Route::get('strip', [StripeController::class, 'stripe']);
    Route::post('strip', [StripeController::class, 'stripePost'])->name('stripe.post');

// My Account
Route::get('/myaccount', [MyaccountController::class, 'index'])->name('myaccount');
Route::get('/order/{id}', [MyaccountController::class, 'orders'])->name('order');
