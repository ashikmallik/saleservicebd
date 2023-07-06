<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\UnityController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[adminController::class,'dashboard'])->name('dashboard');
});


    

Route::get('/',[HomeController::class,'index']);

Route::get('/search',[HomeController::class,'search']);

Route::get('/product_deatails{id}',[HomeController::class,'show_product_deatails'])->name('fontend.productDeatails');

Route::get('/product_by_cat{id}',[HomeController::class,'product_by_cat']);

route::post('/add_cart/{id}',[HomeController::class,'addto_cart'])->name('home.add_cart');
// route::get('/show_cart/{id}',[HomeController::class,'show_cart']);
route::get('/delete_cart/{id}',[HomeController::class,'remove_cart'])->name('home.removecart');

route::get('/checkout',[HomeController::class,'checkout'])->name('home.checkout');

route::get('/success',[HomeController::class,'success']);

route::post('/cash_order',[HomeController::class,'cash_order']);



//home end 

//admin start
Route::middleware('auth')->group(function () {




Route::resource('category', CategoryController::class);
Route::get('/cat-status{category}',[CategoryController::class,'change_status']);
Route::resource('sub-category', SubcategoryController::class);
Route::get('/subcat-status{subcategory}',[SubcategoryController::class,'subchange_status']);

Route::resource('brand', BrandController::class);
Route::get('/brand-status{brand}',[BrandController::class,'brand_change_status']);

Route::resource('unity', UnityController::class);
Route::get('/unity-status{unity}',[UnityController::class,'unity_change_status']);

Route::resource('size', SizeController::class);
Route::get('/size-status{size}',[SizeController::class,'size_change_status']);

Route::resource('color', ColorController::class);
Route::get('/color-status{color}',[ColorController::class,'color_change_status']);

Route::resource('product', ProductController::class);
Route::get('/product-status{product}',[ProductController::class,'product_change_status']);
Route::get('/order',[adminController::class,'order'])->name('admin.order');
route::get('/print_pdf/{id}',[adminController::class,'print_pdf'])->name('admin.printpdf');

});

