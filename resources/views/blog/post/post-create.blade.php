<x-app-layout>


    <x-slot name="header">
        <x-dashboard-head :text="'Create New Blog Post'" />
    </x-slot>
    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'New Post Form'" />
            <x-dashboard-paragraph :text="'fill in the details to create a new blog post.'" />
        </x-slot>


        <form method="POST" class="space-y-6" action="{{ route('post.store') }}" enctype="multipart/form-data">
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
            <div>
                <x-input-label for="image" :value="'Post Image'" />

                <div x-data="{ fileName: '', previewUrl: null }" class="mt-1">
                    <label for="image"
                        class="group relative flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 hover:border-indigo-400 transition-colors duration-200 overflow-hidden">

                        <!-- معاينة الصورة -->
                        <template x-if="previewUrl">
                            <img :src="previewUrl" class="absolute inset-0 w-full h-full object-cover">
                        </template>

                        <!-- الحالة الافتراضية (لسه مفيش صورة) -->
                        <div x-show="!previewUrl" class="flex flex-col items-center justify-center px-4 text-center">
                            <svg class="w-10 h-10 mb-3 text-gray-400 group-hover:text-indigo-500 transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 8h16M4 8a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V8z" />
                            </svg>
                            <p class="text-sm text-gray-600">
                                <span class="font-semibold text-indigo-600">اضغط لرفع صورة</span> أو اسحبها هنا
                            </p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG حتى 5MB</p>
                        </div>

                        <!-- طبقة معتمة فوق المعاينة فيها اسم الملف -->
                        <div x-show="previewUrl"
                            class="absolute bottom-0 left-0 right-0 bg-black/50 text-white text-xs px-3 py-2 truncate">
                            <span x-text="fileName"></span>
                        </div>

                        <input id="image" name="image" type="file" accept="image/*" class="sr-only"
                            @change="fileName = $event.target.files[0]?.name || ''; previewUrl = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null">
                    </label>
                </div>

                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <button type="submit" class="btn-create">Create
                Post
            </button>

        </form>
    </x-dashboard-container>
</x-app-layout>
