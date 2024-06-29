<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\StringHels;
use Laravel\Prompts\Prompt;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


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
        // $products = DB::table("listproducts")->get();


        return view('backEnd/product/list', [
            'titlePass' => $titlePass,
            'dataList' => $dataList,
            'category_products' => $category_products,
            'category_brand' => $category_brand,

        ]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
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

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {
        $data = array();
        $data['categories_id'] = $request->categories_id;
        $data['brands_id'] = $request->brands_id;
        $data['name'] = $request->name;
        $StringHels = new StringHels();
        $data['alias_sp'] = $StringHels->generateAlias($data['name']);
        $data['price_new'] = $request->price_new;
        $data['price_old'] = $request->price_old;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path("admin/images/product"), $fileName);

            if ($request->hasFile('sub_image')) {

                $sub_files = $request->file('sub_image');
                $sub_fileNames = [];

                foreach ($sub_files as $item_sub_image) {
                    $sub_fileName = $item_sub_image->getClientOriginalName();

                    $item_sub_image->move(public_path("admin/images/product"), $sub_fileName);
                    $sub_fileNames[] = $sub_fileName;
                }

                $data['sub_image'] = implode(',', $sub_fileNames);
            }
            $data['image'] = $fileName;
        }




        $data['screen'] = $request->screen;
        $data['operating_system'] = $request->operating_system;
        $data['camera_before'] = $request->camera_before;
        $data['camera_after'] = $request->camera_after;
        $data['chip'] = $request->chip;
        $data['ram'] = $request->ram;
        $data['capacity'] = $request->capacity;
        $data['pin'] = $request->pin;
        $data['sim'] = $request->sim;
        $data['quantity'] = $request->quantity;
        $data['meeting_day'] = $request->meeting_day;
        $data['hidden'] = $request->hidden;
        $data['description'] = $request->description;

        Product::create($data);

        return redirect('admin/product/list');
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        $titlePass = "Sản phẩm";
        $category_products =  Category::all();
        $category_brand =  Brand::all();
        $dataList = Product::find($id);
        // $products = DB::table("listproducts")->get();

        return view('backEnd/product/edit', [
            'titlePass' => $titlePass,
            'dataList' => $dataList,
            'category_products' => $category_products,
            'category_brand' => $category_brand,

        ]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['categories_id'] = $request->categories_id;
        $data['brands_id'] = $request->brands_id;
        $data['name'] = $request->name;
        $StringHels = new StringHels();
        $data['alias_sp'] = $StringHels->generateAlias($data['name']);
        $data['price_new'] = $request->price_new;
        $data['price_old'] = $request->price_old;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path("admin/images/product"), $fileName);


            if ($request->hasFile('sub_image')) {

                $sub_files = $request->file('sub_image');
                $sub_fileNames = [];

                foreach ($sub_files as $item_sub_image) {
                    $sub_fileName = $item_sub_image->getClientOriginalName();

                    $item_sub_image->move(public_path("admin/images/product"), $sub_fileName);
                    $sub_fileNames[] = $sub_fileName;
                }

                $data['sub_image'] = implode(',', $sub_fileNames);
            } else {
                $existingProduct = Product::where("id", $id)->first();
                foreach ($existingProduct as $existing_subProduct) {
                    $file_subName = $existing_subProduct->sub_image ?? '';
                }
                $data['sub_image'] = implode(',', $file_subName);
            }
        } else {
            $existingProduct = Product::where("id", $id)->first();
            $fileName = $existingProduct->image ?? '';
        }
        $data['image'] = $fileName;

        $data['screen'] = $request->screen;
        $data['operating_system'] = $request->operating_system;
        $data['camera_before'] = $request->camera_before;
        $data['camera_after'] = $request->camera_after;
        $data['chip'] = $request->chip;
        $data['ram'] = $request->ram;
        $data['capacity'] = $request->capacity;
        $data['pin'] = $request->pin;
        $data['sim'] = $request->sim;
        $data['quantity'] = $request->quantity;
        $data['meeting_day'] = $request->meeting_day;
        $data['hidden'] = $request->hidden;
        $data['description'] = $request->description;


        Product::where("id", $id)->update($data);

        return redirect('admin/product/list');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */

    public function destroy($id)
    {

        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product/list');
    }
}
