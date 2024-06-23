<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontEnd\mainPage\HomeController;
use App\Http\Controllers\frontEnd\shope\ShoppingController;
use App\Http\Controllers\fontEnd\UserController;

use App\Http\Controllers\backEnd\AdminUserController;
use App\Http\Controllers\backEnd\AdminCategoryController;
use App\Http\Controllers\backEnd\AdminBrandController;
use App\Http\Controllers\backEnd\AdminProductController;
use App\Http\Controllers\backEnd\AdminCouponsController;

use App\Http\Controllers\login\LoginController;
use App\Models\shop\cart;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/gioi-thieu', [HomeController::class, "about"]);
Route::get('/tin-tuc', [HomeController::class, "blog"]);
Route::get('/lien-he', [HomeController::class, "contact"]);
Route::get('san-pham/{alias}/{alias_sp}', [HomeController::class, "detailedProducts"])->name('detailed.products');

//Login user 
Route::get("/dang-nhap", [LoginController::class, "login"])->name('login.login');
Route::post("/dang-nhap", [LoginController::class, "PostLogin"])->name('PostLogin.login');
Route::post("/dang-ky", [LoginController::class, "register"])->name('register.login');

Route::get("/thoat-tai-khoan", [LoginController::class, "loginOut"])->name('loginOut.login');


Route::middleware('loginUser')->group(function () {
    Route::get("/tai-khoan", [LoginController::class, "MyAccount"])->name('myAccount.login');
    Route::post("/cap-nhat-tai-khoan", [LoginController::class, "UpdateMyAccount"])->name('UpdateMyAccount.login');
    Route::post('cap-nhat-so-luong-tang/{productId}', [ShoppingController::class, "increasePrice"])->name("increasePrice"); // tăng số lượng sản phẩm 

});

//Login admin 
Route::get("/admin/dang-nhap/admin", [LoginController::class, "loginAdmin"])->name('loginAdmin.login');
Route::post("/admin/dang-nhap/admin", [LoginController::class, "PostloginAdmin"])->name('PostloginAdmin.login');
Route::post('giam-gia-thanh-cong', [ShoppingController::class, "coupons"])->name("cartCoupons");
//của hàng 
Route::get('/cua-hang', [ShoppingController::class, "shop"]);
Route::get('/cua-hang/{alias}', [ShoppingController::class, "shop"])->name("shop-cate");
Route::get('/cua-hang/{alias}/{barnd_alias}', [ShoppingController::class, "shop"])->name("shop-cate-brand");
Route::get('/gio-hang', [ShoppingController::class, "cart"])->name('cart');
Route::post('them-vao-gio', [ShoppingController::class, "addTocart"])->name("addTocart");
Route::delete('delete-cart/{productId}', [ShoppingController::class, "deleteToCart"])->name("deleteToCart");
Route::get('thanh-toan-gio-hang', [ShoppingController::class, "cartCheckout"])->name("cartCheckout");
Route::post('thanh-toan-gio-hàng-thanh-cong', [ShoppingController::class, "cartSuccess"])->name("cartSuccess");
// mã giảm giá


Route::prefix('admin')->middleware('login')->group(function () {

    //list category
    Route::get('/category/list', [AdminCategoryController::class, "category"])->name('cat.store');
    Route::post('/category/list', [AdminCategoryController::class, "createCat"])->name('createCat');
    Route::delete('/category/list/{id}', [AdminCategoryController::class, "deleteCat"])->name('deleteCat');
    Route::get('/category/list/edit/{id}', [AdminCategoryController::class, "editCat"])->name('editCat');
    Route::put('/category/list/edit/{id}', [AdminCategoryController::class, "updateCat"])->name('updateCat');

    //list admin vs user

    Route::get('account/list',[AdminUserController::class, "index"])->name("account.list");
    Route::get('account/list',[AdminUserController::class, "store"])->name("store.list");
    Route::post('account/update/list',[AdminUserController::class, "create"])->name("createAcount");
    Route::delete('account/list/{id}',[AdminUserController::class, "destroy"])->name("deleteAccount.list");

    //list brand
    Route::resource('/brand/list', AdminBrandController::class)->names(
        [
            'store' => 'brand.store',
            'show' => 'brand.show',
            'update' => "brand.update",
            'destroy' => "brand.destroy"
        ]
    );

    //list product
    Route::resource('/product/list', AdminProductController::class)->names(
        [
            'store' => 'product.store',
            'show' => 'product.show',
            'update' => "product.update",
            'destroy' => "product.destroy"
        ]
    );
    // list coupons

});
