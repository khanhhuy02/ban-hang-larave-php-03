<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Post\PostHelpers;
use App\Models\Categoty_post;
use Illuminate\Http\Request;
use App\Http\Helpers\StringSlugs\StringSlugHelpers;
use Illuminate\Support\Facades\File;

class AdminPostCategoryController extends Controller
{
    private $getPostDataImage;

    function __construct()
    {
        $this->getPostDataImage = new PostHelpers();
    }

    public function index()
    {
        $titlePass = "Tin tức";
        $list = Categoty_post::all();


        return view("backEnd/news/postCategories/list", [
            "titlePass" => $titlePass,
            "list" => $list,
        ]);
    }

    public function create(Request $request)
    {
        getPostDataImage($request, 'post', Categoty_post::class, 'icon', 'admin/images/icon/');
        return redirect()->route('postCate.list');
    }
    public function showEditcate($id)
    {
        $titlePass = "Tin tức";
        $list = Categoty_post::where('id', $id)->first();
        return view('backEnd/news/postCategories/edit', ['list' => $list, "titlePass" => $titlePass]);
    }
    public function upEditcate(Request $request, $id)
    {

        getPostDataImage($request, 'put', Categoty_post::class, 'icon', 'admin/images/icon/', $id);
        return redirect()->route('postCate.list');
    }

    public function delete(Request $request, $id)
    {
        getPostDataImage($request, 'delete', Categoty_post::class, 'icon', 'admin/images/icon/', $id);

        return redirect()->route('postCate.list');
    }
}
