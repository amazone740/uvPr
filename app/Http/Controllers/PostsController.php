<?php
namespace App\Http\Controllers;
use App\model\Post;

class PostsController extends Controller{
    
    public function index(Request $req){
        $data = Post::simplePaginate($req->has('limit')? $req->limit : 15);
        return response()->json($data);
        

    }
}