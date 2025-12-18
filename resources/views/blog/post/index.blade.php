<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Blog Posts Overview'" />
    </x-slot>
    <x-dashboard-container>
        {{-- div --}}
        
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
                            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-20 h-20">
                        </td>
                        <td class="p-3">
                            <a href="{{ route('post.edit', $post->id) }}" class="btn-edit">Edit</a>
                            {{-- delete form --}}
                            <x-delete-form :action-url="route('post.destroy', $post->id)" />
                          @if ($post->is_published)
                                <form action="{{ route('post.unpublish', $post->id) }}" method="POST" >
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn-unpublish">Unpublish</button>
                            </form>
                       @else
                                <form action="{{ route('post.publish', $post->id) }}" method="POST" >
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn-publish">Publish</button>
                            </form>
                          @endif                  
                        </td>
                    </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
        {{-- Success Message --}}
        <x-message :message="session('success-store-post')" :color="'green'" />
        <x-message :message="session('success-update-post')" :color="'blue'" />
        <x-message :message="session('success-delete-post')" :color="'red'" />
        <x-message :message="session('success-publish-post')" :color="'green'" />
    </x-dashboard-container>




</x-app-layout>