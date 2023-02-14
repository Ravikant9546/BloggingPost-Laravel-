<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home( Request $request){
        if($request ->has('srch')){
            $srch=$request->srch;
            $posts = Post::where('title','like','%'.$srch.'%')->orderBy('id', 'desc')->paginate(6);
        }
        else{
            $posts = Post::orderBy('id', 'desc')->paginate(6);
        }
        return view('home',['posts'=>$posts]);
    }
    // Post Detail
    function detail(Request $request,$postId){
        $detail=Post::find($postId);

        return view('detail', ['detail' => $detail]);

    }
    // All Categories
    function all_category(){
        $categories=Category::orderBy('id','desc')->paginate(6);
        return view('user.category',['categories'=>$categories]);
    }
    // Posts According to Categories
     function category(Request $request,$cat_id){
        $category=Category::find($cat_id);
        $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(6);
        return view('categories',['posts'=>$posts,'category'=>$category]);
    }

}
