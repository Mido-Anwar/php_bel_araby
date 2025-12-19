<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'Blog Post Detail & Edit'" />

    </x-slot>

    <div class="py-12">
        {{-- Post Detail --}}
        <x-slot name="div">
            <x-dashboard-head :text="$post->title" />

            <x-dashboard-paragraph :text="$post->body" />
        </x-slot>

        <x-hidden-form :action-url="route('post.update', $post->id)" :open="false" :btnName="'Edit Post'"  :formBtnName="'Update Post'">

            <div>
                <x-input-label for="title" :value="'Post Title'" />
                <input id="title" name="title" type="text" value="{{ $post->title }}" class="mt-1 block
            w-full" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="content" :value="'Post Content'" />
                <textarea id="content" name="content" rows="5"
                    class="mt-1 block w-full border-gray-300
            focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    required>{{ old('content') }}
                {{ $post->content }}
                </textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>
            <x-input-label for="image" :value="'Post Image'" />
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-20 h-20">

            <input type="file" name="image" class="form-control" accept="image/*">

        </x-hidden-form>


    </div>
</x-app-layout>