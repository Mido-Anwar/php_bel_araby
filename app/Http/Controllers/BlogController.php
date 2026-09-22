<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Mews\Purifier\Facades\Purifier;


class BlogController extends Controller
{
    /**
     * Display a listing of the published blog posts.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $start = microtime(true);
        $title = 'المدونة';
        $page  = request()->integer('page', 1);

        $posts = Post::select('id', 'title', 'slug', 'created_at', 'is_published')
            ->with('image:id,mediable_id,mediable_type,file_path,alt_text')
            ->published()
            ->latest()
            ->paginate(Post::PER_PAGE);

        $loadTime = round((microtime(true) - $start) * 1000, 2);
        logger()->info("Blog index load: {$loadTime}ms");
        return view('blog.main', compact('posts', 'title'));
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
        $this->sanitizePostContent($post);
        return view("blog.show-post", ["post" => $post, "title" => $title]);
    }

    /**
     * تنظيف محتوى التقنية والأقسام والمفاهيم من XSS.
     *
     * @param Post $post
     * @return void
     */
    private function sanitizePostContent(Post $post): void
    {
        $post->content = Purifier::clean($post->content ?? '');
    }
}
