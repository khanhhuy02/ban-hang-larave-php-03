<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StringHels;
use App\Models\Category;

class AdminCategoryController extends Controller
{
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
        // $titlePass = "Loại";

        $data = array();
        $StringHels = new StringHels();
        $data['names'] = $request->names;
        if ($request->hasFile("icon")) {
            $file = $request->file('icon');
            $fileName = $file->getClientOriginalName();

            $file->move(public_path("admin/images/icon"), $fileName);
        }
        $data['icon'] = $fileName;
        $data['alias'] = $StringHels->generateAlias($data['names']);
        $data['location'] = $request->location;
        $data['status'] = $request->status;
        $data['classify'] = $request->classify;

        Category::create($data);
        return redirect('/admin/category/list');
    }


    public function deleteCat(Request $request, $id)
    {

        Category::where('id', $id)->delete();

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

        $data = array();
        $StringHels = new StringHels();
        $data['id'] = $request->id;
        $data['names'] = $request->names;

        if ($request->hasFile("icon")) {
            $file = $request->file('icon');
            $fileName = $file->getClientOriginalName();

            $file->move(public_path("admin/images/icon"), $fileName);
        } else {
            // $existingCat = Category::find($id);
            $existingCat = Category::where("id", $id)->first();
            $existingCat->update($data);
            $fileName = $existingCat->icon ?? "";
        }

        $data['icon'] = $fileName;
        $data['alias'] = $StringHels->generateAlias($data['names']);
        $data['location'] = $request->location;
        $data['status'] = $request->status;
        $data['classify'] = $request->classify;

        Category::where("id", $id)->update($data);
        return redirect('admin/category/list');
    }
}
