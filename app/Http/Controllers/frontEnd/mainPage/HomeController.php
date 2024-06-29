<?php

namespace App\Http\Controllers\frontEnd\mainPage;

use App\Http\Controllers\Controller;
use App\Http\Controllers\frontEnd\global\cartImplementsGolobal;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller

{
    protected $cartGolobals;

    public function __construct(cartImplementsGolobal $cartGolobals)
    {
        $this->cartGolobals = $cartGolobals;
    }

    public function index()
    {


        $titlePass = "Trang chủ";
        // $cartItems = collect(Session::get('cart', []))->where('users_id', Auth::id())->toArray();
        // $productIds = array_keys($cartItems);
        // $products = Product::whereIn('id', $productIds)->get();
        // dd($products);
        // exit;
        $cartItems = $this->cartGolobals->cartGolobal();

        // dd($cartItems['cart']);
        // exit;
        $category = Category::all();
        $listProduct = Product::limit(8)->get();
        return view("frontEnd/home/home", [
            "titlePass" => $titlePass,
            'category' => $category,
            'listProduct' => $listProduct,
            'cartItems' => $cartItems,
            // 'products' => $products,
        ]);
    }

    public function about()
    {
        $titlePass = "Giới thiệu";
        return view("frontEnd/about/about", [
            "titlePass" => $titlePass
        ]);
    }

    public function blog()
    {
        $titlePass = "Tin tức";
        return view("frontEnd/blog/blog", [
            "titlePass" => $titlePass
        ]);
    }

    public function contact()
    {
        $titlePass = "Liên hệ";
        return view("frontEnd/contact/contact", [
            "titlePass" => $titlePass
        ]);
    }



    public function detailedProducts($alias, $alias_sp)
    {
        $titlePass = "Sản phẩm chi tiết";
        $category = category::where('alias', $alias)->first();
        $listProduct = Product::where('alias_sp', $alias_sp)->first();

        // $cartItems = collect(Session::get('cart', []))->where('users_id', Auth::id())->toArray();
        // $productIds = array_keys($cartItems);
        // $products = Product::whereIn('id', $productIds)->get();
        $cartItems = $this->cartGolobals->cartGolobal();


        return view("frontEnd/shop/detailedProducts", [
            "titlePass" => $titlePass,
            'category' => $category,
            'listProduct' => $listProduct,
            'cartItems' => $cartItems,
            // 'products' => $products,
        ]);
    }
}
