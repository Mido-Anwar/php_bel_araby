<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::select('id','title','body')->get();
        return view('blog.main',['posts' => $posts]);
    }
}
