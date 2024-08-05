<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Post\PostHelpers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\StringHels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Laravel\Prompts\Prompt;

class AdminProductController extends Controller
{

    private $getPostDataImage;

    function __construct()
    {
        $this->getPostDataImage = new PostHelpers();
    }


    public function deteleArray(Request $request)
    {
        $delete_array =  $request->array_delete;
        Product::whereIn('id', $delete_array)->delete();
        return response()->json(["success" => 'xóa thành công']);
    }

    public function index()
    {
        $titlePass = "Sản phẩm";

        $category_products =  Category::all();
        $category_brand =  Brand::all();
        $dataList = Product::all();


        return view('backEnd/product/list', [
            'titlePass' => $titlePass,
            'dataList' => $dataList,
            'category_products' => $category_products,
            'category_brand' => $category_brand,

        ]);
    }


    public function create()
    {
        $category_products =  Category::all();
        $category_brand =  Brand::all();

        $titlePass = "Sản phẩm";
        return view('backEnd/product/create', [
            'titlePass' => $titlePass,
            'category_products' => $category_products,
            'category_brand' => $category_brand,
            // 'dataList' => $dataList,

        ]);
    }

    public function store(Request $request)
    {
       getPostDataImageAndSubImage($request, 'post', Product::class, 'image', 'sub_image', 'admin/images/product/');
        return redirect('admin/product/list');
    }


    public function show(string $id)
    {
        $titlePass = "Sản phẩm";
        $category_products =  Category::all();
        $category_brand =  Brand::all();
        $dataList = Product::find($id);
        return view('backEnd/product/edit', [
            'titlePass' => $titlePass,
            'dataList' => $dataList,
            'category_products' => $category_products,
            'category_brand' => $category_brand,

        ]);
    }


    public function update(Request $request, $id)
    {
       getPostDataImageAndSubImage($request, 'put', Product::class, 'image', 'sub_image', 'admin/images/product/', $id);
        return redirect('admin/product/list');
    }


    public function destroy(Request $request, $id)
    {
       getPostDataImageAndSubImage($request, 'delete', Product::class, 'image', 'sub_image', 'admin/images/product/', $id);
        return redirect('admin/product/list');
    }
}
