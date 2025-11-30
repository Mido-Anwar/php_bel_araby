<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Blog Post Detail & Edit'" />

    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            {{-- Post Detail --}}
            <x-slot name="div">
                <x-dashboard-head :text="$post->title" />
              
                <x-dashboard-paragraph :text="$post->body" />
            </x-slot>

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

        </x-dashboard-container>

    </div>
</x-app-layout>