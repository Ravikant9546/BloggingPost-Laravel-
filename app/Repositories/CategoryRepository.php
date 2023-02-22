<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CategoryIR;
use App\Models\Category;
class CategoryRepository implements CategoryIR{
    public function all(){
       return  Category::orderBy('id', 'asc')->paginate(4);
    }
    public function store($data){
        $category = new category;
        $category->title = $data['title'];
        $category->detail = $data['detail'];
        $category->image = $data['image'];
        $category->save();


    }
    //  public function findcategory($id){
    //     return Category::find($id);
    //  }

    public function edit($id){
        return Category::find($id);

    }
    public function update($data,$id){
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->detail = $data['detail'];
        $category->image = $data['image'];
        $category->save();

    }
    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
    }
    
 
   

    
}