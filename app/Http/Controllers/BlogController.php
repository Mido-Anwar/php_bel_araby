<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $title = "المدونة";
        $page  = request()->integer("page", 1);

        $posts = Cache::remember(
            Post::CACHE_PREFIX . $page,
            Post::CACHE_TTL,
            fn() => Post::with("image:id,mediable_id,mediable_type,file_path")
                ->published()
                ->latest()
                ->paginate(Post::PER_PAGE)
        );

        return view("blog.main", ["posts" => $posts, "title" => $title]);
    }

    /**
     * Display the specified blog post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        $title = $post->title;
        $post->load("image");

        return view("blog.show-post", ["post" => $post, "title" => $title]);
    }
}
