<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Post') }}
        </h2>
        <p class="mt-2 text-sm text-gray-500 max-w-2xl">
            Detailed view of the blog post and edit .
        </p>
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
            <p class="mb-4">{{ $post->body }}</p>
            <a href="{{ route('posts.index', $post->id) }}" class="text-blue-500 hover:underline">Back to
                Posts</a>
        </x-dashboard-container>
        <x-dashboard-container>

            <x-hidden-form method="POST" btnName="edit post" action-url="{{ route('post.update', $post->id) }}"
                :open="false" :fields="[
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
                        'value' => $post->title,
                    ],
                    [
                        'name' => 'body',
                        'type' => 'textarea',
                        'label' => 'Post Body',
                        'placeholder' => 'Write an Post...',
                        'rows' => 5,
                        'value' => $post->body,
                    ],
                ]">
            </x-hidden-form>
            {{-- Success Message --}}
            @if (session('success-updated-post'))
                <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                    {{ session('success-updated-post') }}
                </div>
            @endif
        </x-dashboard-container>

    </div>
</x-app-layout>
