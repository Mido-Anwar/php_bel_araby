<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Blog Posts Overview'" />
    </x-slot>
    <x-dashboard-container>
        {{-- div --}}
        {{-- Success Message --}}
        <x-message :message="session('success-store-post')" :color="'green'" />
        <x-message :message="session('success-update-post')" :color="'blue'" />
        <x-message :message="session('success-delete-post')" :color="'red'" />
        <x-message :message="session('success-publish-post')" :color="'rgb(255, 140, 0)'" />
        <x-message :message="session('success-unpublish-post')" :color="'black'" />
        <x-slot name="div">
            <x-dashboard-head :text="'Blog Posts Table'" />
            <a href="{{ route('post.create') }}" class="btn-create">create post</a>
            <x-dashboard-paragraph :text="'manage blog  add & delete posts'" />
        </x-slot>
        {{-- posts table --}}
        <div class="dashboard-table">
            <table class="">
                <thead class="">
                    <tr class="">
                        <th>ID</th>
                        <th>Title
                        </th>
                        <th>
                            Featured Image
                        </th>
                        <th>Published</th>
                        <th>Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="">

                    {{-- show all posts --}}
                    @foreach ($posts as $post)
                        <tr class="border">

                            <td class="p-3">{{ $post->id }}</td>
                            <td class="p-3">{{ $post->title }}</td>
                            <td class="p-3">
                                @if ($post->image)
                                    <img src="{{ $post->image->url }}" alt="{{ $post->title }}"
                                        style="max-width: 100%;">
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
                                        <button type="submit" onblur="alert('Post published successfully')"
                                            class="btn-publish" title="Publish post to users">Publish</button>
                                    </form>
                                @endif
                            </td>
                            <td class="p-3">
                                <a href="{{ route('post.edit', $post->id) }}" class="btn-edit">Edit</a>
                                {{-- delete form --}}
                                <x-delete-form :action-url="route('post.destroy', $post->id)" />
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </x-dashboard-container>

</x-app-layout>
