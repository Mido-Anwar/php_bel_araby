<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Blog Post Detail & Edit'" />

    </x-slot>

    <div class="py-12">
        <x-dashboard-contain>
            {{-- Post Detail --}}
            <x-dashboard-head :text="$post->title" />
            <x-dashboard-paragraph :text="$post->body" />
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
