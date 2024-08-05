<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Post\PostHelpers;
use App\Http\Helpers\StringSlugs\StringSlugHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StringHels;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class AdminCategoryController extends Controller
{
    private $getPostDataImage;

    function __construct()
    {
        $this->getPostDataImage = new PostHelpers();
    }
    public function category()
    {
        $titlePass = "Loại";

        $cat = DB::table("categories")->get();

        return view("backEnd/category/list", [
            "titlePass" => $titlePass,
            "cat" => $cat,

        ]);
    }



    public function createCat(Request $request)
    {

       
        getPostDataImage($request, 'post', Category::class, 'icon', 'admin/images/icon');


        return redirect('/admin/category/list');
    }


    public function deleteCat(Request $request, $id)
    {

       
        getPostDataImage($request, 'delete', Category::class, 'icon', 'admin/images/icon');

        return redirect('admin/category/list');
    }


    public function editCat($id)
    {
        $titlePass = "Loại";
        $cat = Category::where('id', $id)->first();
        return view('backEnd/category/edit', ['cat' => $cat, "titlePass" => $titlePass,]);
    }

    public function updateCat(Request $request, $id)
    {

       
        getPostDataImage($request, 'put', Category::class, 'icon', 'admin/images/icon');
        return redirect('admin/category/list');
    }
}
