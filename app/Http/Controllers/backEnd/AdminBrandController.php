<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\StringHels;

class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titlePass = "Hãng";
        $category_products = Category::all();

        $listBrand = Brand::orderBy('location', 'DESC')->get();
        return view("backEnd.brands.list", [
            'listBrand' => $listBrand,
            "titlePass" => $titlePass,
            'category_products' => $category_products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {

        $category_products = Category::all();
        return view('backEnd.brands.list', ['category_products' => $category_products]);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */

    public function store(Request $request)
    {
        $data = array();
        $StringHels = new StringHels();

        $data['names'] = $request->names;

        // // Lưu tệp tin hình ảnh vào thư mục public và lấy đường dẫn
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            // $path = $file->store('admin/images/icon'); // Thay đổi 'public/images' thành đường dẫn thư mục bạn muốn lưu trữ tệp tin hình ảnh

            // Lấy tên tệp tin
            $fileName = $file->getClientOriginalName();

            $file->move(public_path("admin/images/icon"), $fileName);
            // Lưu đường dẫn tệp tin vào cột "icon_path"

            // $data['icon'] = $path;
        }



        // if($request->has('icon'))
        // {
        //     $file= $request->icon;
        //     $ext = $request->icon->extension();
        //     $file_name = time().'-'.'dmlarave.'.$ext;
        //     $file->move(public_path('uploads'), $file_name);
        // }
        // $data['icon'] = $file_name;



        $data['icon'] = $fileName;
        $data['alias'] = $StringHels->generateAlias($data['names']);
        $data['location'] = $request->location;
        $data['categories_id'] = $request->categories_id;
        $data['status'] = $request->status;

        // dd($data );
        Brand::create($data);
        return redirect('admin/brand/list');
    }



    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        $titlePass = "Hãng";
        $category_products = Category::all();
        $brand = Brand::where('id', $id)->first();

        return view('backEnd.brands.edit', [
            'titlePass' => $titlePass,
            "category_products" => $category_products,
            "brand" => $brand
        ]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(string $id)
    {
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, string $id)
    {
        $data = array();
        $StringHels = new StringHels();
        // $data['id'] = $request->id;
        $data['names'] = $request->names;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path("admin/images/icon"), $fileName);
        } else {
            $existingBrand = Brand::where("id", $id)->first();
            $fileName = $existingBrand->icon ?? '';
        }

        $data['icon'] = $fileName;
        $data['location'] = $request->location;
        $data['alias'] = $StringHels->generateAlias($data['names']);
        $data['categories_id'] = $request->categories_id;
        Brand::where("id", $id)->update($data);

        return redirect('admin/brand/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deletedBrand =  Brand::find($id);

        $iconImage = 'admin/images/icon/' . $deletedBrand->icon;

        $deleteBrand =  $deletedBrand->delete();
        if ($deleteBrand) {
            if (file_exists($iconImage)) {
                unlink($iconImage);
            }
        }
        return redirect('admin/brand/list');
    }
}
