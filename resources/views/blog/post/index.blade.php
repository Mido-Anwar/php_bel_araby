<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Blog Posts Overview'" />
        <x-dashboard-paragraph :text="'manage blog posts '" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <div class="w-full overflow-x-auto">
                <table class="w-full border border-gray-200 dark:border-gray-700 text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">ID</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Title
                            </th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @switch(Auth::user()->role)
                            @case('super-admin')
                                {{-- show all posts --}}
                                @foreach ($posts as $post)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">

                                        <td class="px-4 py-4">{{ $post->id }}</td>
                                        <td class="px-4 py-4">{{ $post->title }}</td>
                                        <td class="px-4 py-4 border space-x-4">
                                            <a href="{{ route('post.edit', $post->id) }}" class="btn-edit">Edit</a>
                                            <a href="{{ route('post.destroy', $post->id) }}" class="btn-delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @break

                            @default
                                {{-- show only auth user posts --}}
                                @foreach ($authUserPosts as $post)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">

                                        <td class="px-4 py-4">{{ $post->id }}</td>
                                        <td class="px-4 py-4">{{ $post->title }}</td>
                                        <td class="px-4 py-4 border space-x-4">
                                            <a href="{{ route('post.edit', $post->id) }}" class="btn-edit">Edit</a>
                                            <a href="{{ route('post.destroy', $post->id) }}" class="btn-delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                        @endswitch
                    </tbody>
                </table>
            </div>

        </x-dashboard-container>
        <x-dashboard-container>
            <x-hidden-form method="POST" btnName="add post" action-url="{{ route('post.store') }}" :open="false"
                :fields="[
                    [
                        'name' => 'user_id',
                        'type' => 'hidden',
                        'label' => '',
                        'placeholder' => 'Enter Post title',
                        'value' => auth()->user()->id,
                    ],
                    [
                        'name' => 'title',
                        'type' => 'text',
                        'label' => 'Post Title',
                        'placeholder' => 'Enter Post title',
                    ],
                    [
                        'name' => 'body',
                        'type' => 'textarea',
                        'label' => 'Post Body',
                        'placeholder' => 'Write an Post...',
                        'rows' => 5,
                    ],
                ]">


            </x-hidden-form>
            {{-- Success Message --}}
            <x-message :message="session('success-store-post')" :color="'green'" />
            <x-message :message="session('success-update-post')" :color="'blue'" />
            <x-message :message="session('success-delete-post')" :color="'red'" />
        </x-dashboard-container>
    </div>
</x-app-layout>
