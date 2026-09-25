<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Form Card Container -->
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700/60 transition-all">

                <!-- Card Header with Gradient Accent -->
                <div
                    class="relative px-6 py-6 bg-gradient-to-r from-emerald-500/10 via-purple-500/5 to-transparent border-b border-gray-100 dark:border-gray-700/60">
                    <div class="flex items-center space-x-3 rtl:space-x-reverse">
                        <div class="p-2.5 bg-emerald-600 text-white rounded-xl shadow-md shadow-emerald-500/20">
                            <!-- Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Add New Post</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">Fill in the details below to
                                write and publish a new blog post.</p>
                        </div>
                    </div>
                </div>

                <!-- Form Body -->
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-6 sm:p-8 space-y-6">
                    @csrf

                    <!-- Field: Post Title -->
                    <div class="space-y-2">
                        <x-input-label for="title" :value="'Post Title'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <x-text-input id="title" name="title" type="text"
                            class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200 shadow-sm"
                            placeholder="e.g. Getting Started with Web Development" :value="old('title')" required
                            autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-1 text-xs" />
                    </div>

                    <!-- Field: Post Content -->
                    <div class="space-y-2">
                        <x-input-label for="content" :value="'Post Content'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <div>
                            {{-- حقل المخفي لربط البيانات مع Livewire أو الفورم العادي --}}
                            <input id="x" type="hidden" name="content" wire:model="content">

                            {{-- المحرر نفسه --}}
                            <trix-editor input="x"
                                class="min-h-[300px] p-4 rounded-xl border border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 prose dark:prose-invert max-w-full focus:outline-none"></trix-editor>
                        </div>
                        <x-input-error :messages="$errors->get('content')" class="mt-1 text-xs" />
                    </div>

                    <!-- Field: Post Image Upload with Alpine.js Preview -->
                    <div class="space-y-2">
                        <x-input-label for="image" :value="'Featured Image'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />

                        <div x-data="{
                            fileName: '',
                            previewUrl: null,
                            handleFileChange(e) {
                                const file = e.target.files[0];
                                if (file) {
                                    this.fileName = file.name;
                                    this.previewUrl = URL.createObjectURL(file);
                                } else {
                                    this.fileName = '';
                                    this.previewUrl = null;
                                }
                            }
                        }">
                            <label for="image"
                                class="group relative flex flex-col items-center justify-center w-full h-56 border-2 border-dashed border-gray-200 dark:border-gray-700/80 rounded-2xl cursor-pointer bg-gray-50/50 dark:bg-gray-900/30 hover:bg-gray-100/50 dark:hover:bg-gray-800/40 hover:border-emerald-500 dark:hover:border-emerald-500 transition-all duration-200 overflow-hidden shadow-sm">

                                <!-- Image Preview -->
                                <template x-if="previewUrl">
                                    <img :src="previewUrl" class="absolute inset-0 w-full h-full object-cover">
                                </template>

                                <!-- Default State (No image selected) -->
                                <div x-show="!previewUrl"
                                    class="flex flex-col items-center justify-center px-4 text-center">
                                    <div
                                        class="p-3 mb-3 bg-white dark:bg-gray-800 rounded-xl shadow-sm text-gray-400 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 8h16M4 8a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V8z" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <span class="text-emerald-600 dark:text-emerald-400 underline">Click to
                                            upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-400 mt-1">PNG, JPG, WEBP up to 5MB</p>
                                </div>

                                <!-- Image Overlay with File Name when selected -->
                                <div x-show="previewUrl"
                                    class="absolute bottom-0 left-0 right-0 bg-black/60 backdrop-blur-md text-white text-xs px-4 py-3 truncate flex justify-between items-center border-t border-white/10">
                                    <span x-text="fileName" class="truncate font-medium"></span>
                                    <span
                                        class="text-xs text-emerald-300 hover:text-emerald-200 font-semibold underline">Change
                                        Image</span>
                                </div>

                                <input id="image" name="image" type="file" accept="image/*" class="sr-only"
                                    @change="handleFileChange($event)">
                            </label>
                        </div>

                        <x-input-error :messages="$errors->get('image')" class="mt-1 text-xs" />
                    </div>

                    <!-- Action Buttons -->
                    <div
                        class="pt-4 flex items-center justify-end gap-3 border-t border-gray-100 dark:border-gray-700/60">
                        <a href="{{ route('posts.index') }}"
                            class="px-5 py-2.5 rounded-xl text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-all duration-200">
                            Cancel
                        </a>

                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold shadow-lg shadow-emerald-500/25 hover:shadow-emerald-500/35 active:scale-[0.98] transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Save Post</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
