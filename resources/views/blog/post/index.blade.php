<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }}
        </h2>
        <p class="mt-2 text-sm  dark:text-gray-400 max-w-2xl">
            All blog posts management.
        </p>
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
            @if (session('success-stored-post'))
                <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                    {{ session('success-stored-post') }}
                </div>
            @endif
        </x-dashboard-container>
    </div>
</x-app-layout>
