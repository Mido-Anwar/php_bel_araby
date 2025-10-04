<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
                    <p class="mb-4">{{ $post->body }}</p>
                    <a href="{{ route('posts.index',$post->id) }}" class="text-blue-500 hover:underline">Back to Posts</a>
                </div>
            </div>
               <div class="my-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-hidden-form method="POST" btnName="edit post" action-url="{{ route('post.update',$post->id) }}" :open="false"
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
