<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Interfaces\PostIR;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    private $PostRepository;
    public function __construct(PostIR $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->PostRepository->all();
        return view('backend.post.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('backend.post.add', ['cats' => $cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'detail' => 'required'
        ]);


        // post Thumbnail
        if ($request->hasFile('post_thumbnail')) {
            $imageThumb = $request->file('post_thumbnail');
            $reThumbImage = time() . '.' . $imageThumb->getClientOriginalExtension();
            $dest1 = public_path('/imgs');
            $imageThumb->move($dest1, $reThumbImage);
        } else {
            $reThumbImage = 'na';
        }
        //post Full image
        if ($request->hasFile('post_image')) {
            $imageFull = $request->file('post_image');
            $reFullImage = time() . '.' . $imageFull->getClientOriginalExtension();
            $dest2 = public_path('/imgs');
            $imageFull->move($dest2, $reFullImage);
        } else {
            $reFullImage = 'na';
        }



        $post = new Post();
        $post->user_id = 0;
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->thumb = $reThumbImage;
        $post->full_img = $reFullImage;
        $post->detail = $request->detail;
        $post->tags = $request->tags;

        $post->save();
        return redirect('admin/post/create')->with('success', 'Data is Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Category::all();
        $data = Post::find($id);
        return view('backend.post.update', ['cats' => $cats, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'detail' => 'required'
        ]);

        // post Thumbnail
        if ($request->hasFile('post_thumbnail')) {
            $imageThumb = $request->file('post_thumbnail');
            $reThumbImage = time() . '.' . $imageThumb->getClientOriginalExtension();
            $dest1 = public_path('/imgs');
            $imageThumb->move($dest1, $reThumbImage);
        } else {
            $reThumbImage = $request->post_thumb;
        }
        //post Full image
        if ($request->hasFile('post_image')) {
            $imageFull = $request->file('post_image');
            $reFullImage = time() . '.' . $imageFull->getClientOriginalExtension();
            $dest2 = public_path('/imgs');
            $imageFull->move($dest2, $reFullImage);
        } else {
            $reFullImage = $request->post_image;
        }



        $post =  Post::find($id);
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->thumb = $reThumbImage;
        $post->full_img = $reFullImage;
        $post->detail = $request->detail;
        $post->tags = $request->tags;

        $post->save();
        return redirect('admin/post/' . $id . '/edit')->with('success', 'Data is Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return redirect('admin/post');
    }
}
