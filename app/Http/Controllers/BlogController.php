<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the published blog posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::select('id', 'title', 'image')->where('is_published', true)->get();
        return view('blog.main', ['posts' => $posts]);
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
