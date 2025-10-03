<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    @foreach ($posts as $post)
                                        <td class="px-4 py-4">{{ $post->id }}</td>
                                        <td class="px-4 py-4">{{ $post->title }}</td>
                                        <td class="px-4 py-4 border space-x-4">
                                            <a class="btn-edit">Edit</a>
                                            <a class="btn-delete">Delete</a>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-6 my-2 text-gray-900 dark:text-gray-100">
                        <x-hidden-form method="POST" action-url="{{ route('post.store') }}" :open="false"
                            :fields="[
                                [
                                    'name' => 'user_id',
                                    'type' => 'hidden',
                                    'label' => 'Post Title',
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
