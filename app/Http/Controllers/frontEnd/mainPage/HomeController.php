<?php

namespace App\Http\Controllers\frontEnd\mainPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
class HomeController extends Controller
{
    public function index()
    {


        $titlePass = "Trang chủ";

        $category = Category::all();
        $listProduct = Product::limit(8)->get();
        return view("frontEnd/home/home", [
            "titlePass" => $titlePass,
            'category' =>$category,
            'listProduct'=>$listProduct,
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



    public function detailedProducts($alias,$alias_sp)
    {
        $titlePass = "Sản phẩm chi tiết";
        $category = category::where('alias',$alias)->first();
        $listProduct = Product::where('alias_sp',$alias_sp)->first();
        
        return view("frontEnd/shop/detailedProducts", [
            "titlePass" => $titlePass,
            'category' =>$category,
            'listProduct'=>$listProduct,
        ]);
    }
}
