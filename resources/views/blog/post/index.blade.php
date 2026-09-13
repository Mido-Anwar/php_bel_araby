<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Blog Posts Table'" />
    </x-slot>
          {{-- Success Messages --}}
        <x-message :message="session('success-store-post')" :color="'green'" />
        <x-message :message="session('success-update-post')" :color="'blue'" />
        <x-message :message="session('success-delete-post')" :color="'red'" />
        <x-message :message="session('success-publish-post')" :color="'rgb(255, 140, 0)'" />
        <x-message :message="session('success-unpublish-post')" :color="'black'" />
    <x-dashboard-container>


        <x-slot name="div">
            <x-dashboard-head :text="'Blog Posts Table'" />
            <a href="{{ route('post.create') }}" class="btn-create">create post</a>
            <x-dashboard-paragraph :text="'manage blog add & delete posts'" />
        </x-slot>

        {{-- posts table --}}
        <div class="dashboard-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Featured Image</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr class="border">
                            <td class="p-3">{{ $post->id }}</td>
                            <td class="p-3">{{ $post->title }}</td>
                            <td class="p-3">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image->file_path) }}"
                                        alt="{{ $post->title }}" style="width: 150px; object-fit: cover;">
                                @else
                                    <span class="text-gray-400">No Image</span>
                                @endif
                            </td>
                            <td class="p-3">
                                @if ($post->is_published)
                                    <form action="{{ route('post.unpublish', $post->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn-unpublish"
                                            title="Hide post from users">Hide</button>
                                    </form>
                                @else
                                    <form action="{{ route('post.publish', $post->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn-publish"
                                            title="Publish post to users">Publish</button>
                                    </form>
                                @endif
                            </td>
                            <td class="p-3">
                                <div class="small-container">
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn-edit">Edit</a>

                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" title="Delete post"
                                            onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center">No posts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Links Pagination (إذا كنت تستخدم paginate) --}}
            @if (method_exists($posts, 'links'))
                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </x-dashboard-container>
</x-app-layout>
