<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Mews\Purifier\Facades\Purifier;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\MarkdownConverter;

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
    public function show(Post $post): View
    {
        abort_unless($post->is_published, 404);

        $title = $post->title;
        $post->load('image:id,mediable_id,mediable_type,file_path,alt_text');

        // ✅ تحويل Markdown → HTML
        $converter = new \League\CommonMark\CommonMarkConverter([
            'html_input' => 'allow',
            'allow_unsafe_links' => false,
        ]);

        $html = $converter->convert($post->content)->getContent();

        // Meta
        $description = \Str::limit(strip_tags($html), 160);
        $ogImage = $post->image
            ? asset('storage/' . $post->image->file_path)
            : asset('images/og-default.jpg');

        return view('blog.show-post', compact(
            'post',
            'title',
            'html',
            'description',
            'ogImage'
        ));
    }

  
}
