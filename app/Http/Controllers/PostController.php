<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the posts based on user role.
     *
     * @return View
     */
    public function index(): View
    {
        $title = 'ادارة المنشورات';

        $query = Post::select('id', 'title', 'user_id', 'slug', 'is_published', 'created_at')
            ->with(['image', 'user:id,name'])
            ->latest();

        $posts = $query->paginate(10);

        return view('blog.post.index', compact('posts', 'title'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return View
     */
    public function create(): View
    {
        $title = 'إضافة منشور جديد';
        return view('blog.post.post-create', compact('title'));
    }

    /**
     * Store a newly created post in storage.
     *
     * @param StorePostRequest $request
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $post = Post::create([
            'title'   => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('image')) {
            $this->handleImageUpload($request, $post);
        }

        return redirect()
            ->route('posts.index')
            ->with('success-store-post', 'Post created successfully.');
    }

    /**
     * Display the specified post (Direct Query without cache).
     *
     * @param Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        // استرجاع أحدث بيانات للمقال والعلاقات بدون كاش لضمان الدقة
        $post->load(['image', 'user:id,name']);

        return view('blog.post.post-show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param Post $post
     * @return View
     */
    public function edit(Post $post): View
    {
        $this->authorizeOwnerOrAdmin($post);
        $title = 'تعديل المنشور';
        return view('blog.post.post-edit', compact('post', 'title'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $this->authorizeOwnerOrAdmin($post);

        $validated = $request->validated();

        $post->update([
            'title'   => $validated['title'],
            'content' => $validated['content'],
        ]);

        if ($request->hasFile('image')) {
            $post->deleteAttachedImage();
            $this->handleImageUpload($request, $post);
        }

        return redirect()
            ->route('posts.index')
            ->with('success-update-post', 'Post updated successfully.');
    }

    /**
     * Publish the specified post.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function publish(Post $post): RedirectResponse
    {
        $this->authorizeOwnerOrAdmin($post);

        $post->update([
            'is_published' => true,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success-publish-post', 'Post published successfully.');
    }

    /**
     * Unpublish the specified post.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function unpublish(Post $post): RedirectResponse
    {
        $this->authorizeOwnerOrAdmin($post);

        $post->update([
            'is_published' => false,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success-unpublish-post', 'Post unpublished successfully.');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->authorizeOwnerOrAdmin($post);

        // Clean up physically attached image if present
        $post->deleteAttachedImage();
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success-delete-post', 'Post deleted successfully.');
    }

    /**
     * Helper method to handle post image upload, WebP conversion, and SEO optimization.
     *
     * @param Request $request
     * @param Post $post
     * @return void
     */
    private function handleImageUpload(Request $request, Post $post): void
    {
        $file = $request->file('image');

        $uploadData = ImageHelper::convertAndStoreToWebp(
            file: $file,
            folder: 'posts',
            seoName: $post->title,
        );

        if ($post->image) {
            Storage::disk('public')->delete($post->image->file_path);
            $post->image->forceDelete();
        }

        $post->image()->create([
            'file_path' => $uploadData['file_path'],
            'file_name' => $file->getClientOriginalName(),
            'alt_text'  => $post->title,
            'mime_type' => $uploadData['mime_type'],
            'file_size' => $uploadData['file_size'],
            'width'     => $uploadData['width'] ?? null,
            'height'    => $uploadData['height'] ?? null,
        ]);
    }

    /**
     * Helper method to check if current user is owner or super-admin.
     *
     * @param Post $post
     * @return void
     */
    private function authorizeOwnerOrAdmin(Post $post): void
    {
        $user = Auth::user();
        if ($user->id !== $post->user_id && ! $user->hasRole('super-admin')) {
            abort(403, 'Unauthorized action.');
        }
    }
}
