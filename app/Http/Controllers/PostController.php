<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $posts = Post::select('id', 'title', 'content','is_published')->get();
        $authUserPosts = Auth::user()->posts;

        if (Auth::user()->hasRole('super-admin')) {
            $visiblePosts = $posts;
        } else {
            $visiblePosts = $authUserPosts;
        }


        return view('blog.post.index')->with('posts', $visiblePosts);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('blog.post.post-create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {

        $validated = $request->validated();


        $post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);
   if ($request->hasFile('image')) {
        $file = $request->file('image');

        $path = $file->store('posts', 'public');

        $post->image()->create([
            'file_path' => $path,
            'file_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
        ]);
    }
        return redirect()->route('posts.index')->with('success-store-post', 'Post created successfully.');
    }

    /**
     * Display the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('blog.post.post-edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('posts.index')->with('success-update-post', 'Post updated successfully.');
    }

    /**
     * Publish the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publish(Post $post)
    {
        $post->update([
            'is_published' => true,
        ]);
        return redirect()->route('posts.index')->with('success-publish-post', 'Post published successfully.');
    }
    /**
     * Unpublish the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unpublish(Post $post)
    {
        $post->update([
            'is_published' => false,
        ]);
        return redirect()->route('posts.index')->with('success-unpublish-post', 'Post unpublished successfully.');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {

        $post->delete();
        return redirect()->route('posts.index')->with('success-delete-post', 'Post deleted successfully.');
    }
}
