<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class ApiCategoryController extends Controller
{

    public function index()
    {
        $Category = Category::all();
        $Product = Product::all();
        

        if ($Category->count() > 0) {

            $data = [
                'status' => 200,
                'Loại' => $Category,
                'Sản Phẩm' => $Product

            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'status' => 404,
                'message' => 'không tìm thấy'
            ];

            return response()->json($data, 404);
        };
    }


}
