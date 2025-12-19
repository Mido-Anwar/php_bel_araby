<x-app-layout>

    <x-slot name="header">
        <x-dashboard-head :text="'Create New Blog Post'" />
    </x-slot>
        <x-slot name="div">
            <x-dashboard-head :text="'New Post Form'" />
            <x-dashboard-paragraph :text="'fill in the details to create a new blog post.'" />
        </x-slot>

   
        <x-hidden-form :action-url="route('post.store')" :open="false" :btnName="'Create Post'" :formBtnName="'Create Post'">


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
            <input type="file" name="image" class="form-control" accept="image/*">
            <x-input-error :messages="$errors->get('image')" class="mt-2" />

        </x-hidden-form>
</x-app-layout>