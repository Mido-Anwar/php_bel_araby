<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::select('id','title','image')->where('is_published', true)->get();
        return view('blog.main',['posts' => $posts]);
    }
    public function show(Post $post){
        return view('blog.show-post',['post' => $post]);
    }
}
