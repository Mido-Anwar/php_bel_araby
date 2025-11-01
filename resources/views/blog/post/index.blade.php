<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Blog Posts Overview'" />
        <x-dashboard-paragraph :text="'manage blog posts '" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <div class="table-dashboard">
                <table class="">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th>ID</th>
                            <th>Title
                            </th>
                            <th>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="">

                        {{-- show all posts --}}
                        @foreach ($posts as $post)
                            <tr class="">

                                <td class="">{{ $post->id }}</td>
                                <td class="">{{ $post->title }}</td>
                                <td class="">
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn-edit">Edit</a>
                                    <a href="{{ route('post.destroy', $post->id) }}" class="btn-delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        {{-- show only auth user posts --}}


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
