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

        $posts = Post::select('id', 'title', 'content', 'image')->get();
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
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => $validated['image'] ?? null,
            'user_id' => Auth::id(),
        ]);

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
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image);
            }
            $post->update(['image' => $request->file('image')->store('posts', 'public')]);
        }
        return redirect()->route('posts.index')->with('success-update-post', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success-delete-post', 'Post deleted successfully.');
    }
}
