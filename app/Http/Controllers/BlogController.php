<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    /**
     * Display a listing of the published blog posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
     $posts = Cache::remember('posts.all', 3600, function () {
            return Post::with('image')->latest()->get();
        });        return view('blog.main', ['posts' => $posts]);
    }
    /**
     * Display the specified blog post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('blog.show-post', ['post' => $post]);
    }
}
