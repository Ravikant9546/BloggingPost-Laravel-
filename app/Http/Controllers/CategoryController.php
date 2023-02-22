<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Interfaces\CategoryIR;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $CategoryRepository;
 public function __construct(CategoryIR $CategoryRepository)
 {
    $this->CategoryRepository = $CategoryRepository;
 }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->CategoryRepository->all();
        return view('backend.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data1 = $request ->all();
        $data=$request->validate([
            'title'=>'required'
        ]);
        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/imgs');
            $image->move($dest,$reImage);
        }
        $data1['image']= $reImage;
       $this->CategoryRepository->store($data1);
        return redirect('admin/category/create')->with('success','Data is Successfully Added');
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
        $data = $this->CategoryRepository->edit($id);
        return view('backend.category.update',['data'=>$data]);
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
        $data =$request->all();
        $request->validate([
            'title'=>'required'
        ]);

        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/imgs');
            $image->move($dest,$reImage);
        }else{
            $reImage=$request->cat_image;
        }
        $data['image'] = $reImage;
           
        $this->CategoryRepository->update($data, $id);
        return redirect('admin/category/'.$id.'/edit')->with('success','Data has been added');
    }


    function dashboard()
    {
        $data = Category::all();
        $latest = Post::orderBy('id','desc')->take(1)->get();
        return view('backend.dashboard', compact(['data', 'latest']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->CategoryRepository->destroy($id);
        return redirect('admin/category');
    }
}
