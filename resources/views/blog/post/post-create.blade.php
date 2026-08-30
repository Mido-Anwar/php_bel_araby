<x-app-layout>

    <x-slot name="header">
        <x-dashboard-head :text="'Create New Blog Post'" />
    </x-slot>
    <x-slot name="div">
        <x-dashboard-head :text="'New Post Form'" />
        <x-dashboard-paragraph :text="'fill in the details to create a new blog post.'" />
    </x-slot>


    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="title" :value="'Post Title'" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="content" :value="'Post Content'" />
            <textarea id="content" name="content" rows="5"
                class="mt-1 block w-full border-gray-300
                focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required></textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>
        <x-input-label for="image" :value="'Post Image'" />
       
        <input id="image" name="image" type="file" class="mt-1 block w-full" accept="image/*">
        <x-input-error :messages="$errors->get('image')" class="mt-2" />


        <button type="submit"
            style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Create
            Post</button>

    </form>

</x-app-layout>
