<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Post\PostHelpers;
use App\Models\Categoty_post;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index() {
        $titlePass ="Tin tức";
        $list = Post::all();


        return view("backEnd/news/post/list", [
            "titlePass" => $titlePass,
            "list" => $list,
        ]);

    }

    public function showPostcreate() {
        $titlePass ="Tin tức";
        $ListCategotyPost = Categoty_post::all();
        
        return view("backEnd/news/post/create", [
            "titlePass" => $titlePass,
            "ListCategotyPost" => $ListCategotyPost,
        ]);

    }

    public function Postcreate(Request $request) {
        
       getPostDataImage($request,'post', Post::class, 'image', 'admin/images/post');
        return redirect()->route('post.index');
    }

    public function showPostEdit($id) {
        $titlePass ="Tin tức";
        $ListCategotyPost = Categoty_post::all();
        $ItemPost = Post::where('id', $id)->first();

        return view("backEnd/news/post/edit", [
            "titlePass" => $titlePass,
            "ListCategotyPost" => $ListCategotyPost,
            "ItemPost" => $ItemPost,
        ]);

    }
    public function PostUpdate(Request $request,$id) {
        
       getPostDataImage($request,'put', Post::class, 'image', 'admin/images/post',$id);
        return redirect()->route('post.index');
    }

    public function PostDelete(Request $request,$id) {
        
       getPostDataImage($request,'delete', Post::class, 'image', 'admin/images/post',$id);
        return redirect()->route('post.index');
    }

}
