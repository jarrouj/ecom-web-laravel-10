<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
//     return view('home.index');
// });

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
route::get('view_category',[AdminController::class,'view_category']);
route::post('add_catagory',[AdminController::class,'add_catagory']);
route::get('delete_catagory/{id}',[AdminController::class,'delete_catagory']);
route::get('view_products',[AdminController::class,'view_products']);

route::post('add_product',[AdminController::class,'add_product']);
route::get('show_products',[AdminController::class,'show_product']);

route::get('delete_product/{id}',[AdminController::class,'delete_product']);
route::get('edit/{id}',[AdminController::class,'edit']);


route::post('update_product_confirm/{id}',[AdminController::class,'update_product']);

route::get('product_detail/{id}',[HomeController::class,'product_detail']);
route::post('add_cart/{id}',[HomeController::class,'add_cart']);

route::get('show_cart',[HomeController::class,'show_cart']);
route::get('remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('cash_order',[HomeController::class,'cash_order']);

route::get('stripe/{totalprice}',[HomeController::class,'stripe']);



Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');


route::get('order',[AdminController::class,'order']);
route::get('ordered/{id}',[AdminController::class,'ordered']);

route::get('search',[AdminController::class,'search']);

route::get('show_order',[HomeController::class,'show_order']);
route::get('cancel_order/{id}',[HomeController::class,'cancel_order']);

route::get('product_search',[HomeController::class,'product_search']);

route::get('products',[HomeController::class,'products']);
route::get('search_product',[HomeController::class,'search_product']);



