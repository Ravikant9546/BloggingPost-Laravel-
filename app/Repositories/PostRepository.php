<?php
namespace App\Repositories;
use App\Repositories\Interfaces\PostIR;
use App\Models\Post;
use App\Models\Category;
class PostRepository implements PostIR{
    public function all(){
        return post::orderBy('id', 'asc')->paginate(4);
        
    }

}