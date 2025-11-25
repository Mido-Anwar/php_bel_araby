<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::select('id', 'title', 'body')->get();
        $authUserPosts = Auth::user()->posts;

        if (Auth::user()->hasRole('super-admin')) {
            $visiblePosts = $posts;
        } else {
            $visiblePosts = $authUserPosts;
        }


        return view('blog.post.index')->with('posts', $visiblePosts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.post.post-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $validated = $request->validated();
        $post = Post::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'user_id' => Auth::id(),
        ]);
        if ($request->hasFile('featured_image')) {
            $post->addMediaFromRequest('featured_image')
                ->toMediaCollection('featured_image'); // <- مهم التطابق هنا
        }
        return redirect()->route('posts.index')->with('success-store-post', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('blog.post.post-edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        $post->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'user_id' => Auth::id(),
        ]);

        if ($request->boolean('remove_image')) {
            $post->clearMediaCollection('featured'); // يحذف الصورة
        }

        if ($request->hasFile('featured_image')) {
            $post->addMediaFromRequest('featured_image')
                ->toMediaCollection('featured'); // سيستبدل القديمة
        }
        return redirect()->route('posts.index')->with('success-update-post', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->clearMediaCollection('featured');
        $post->delete();
        return redirect()->route('posts.index')->with('success-delete-post', 'Post deleted successfully.');
    }
}
