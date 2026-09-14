<x-master-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Grid Container -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div
                    class="group bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700/60 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">

                    <!-- Image Container -->
                    <div class="relative h-48 w-full overflow-hidden bg-gray-100 dark:bg-gray-900">
                        @if ($post->image && $post->image->url)
                            <img src="{{ $post->image->url }}" alt="{{ $post->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                        @else
                            <!-- Placeholder Icon when no image exists -->
                            <div
                                class="w-full h-full flex flex-col items-center justify-center text-gray-400 dark:text-gray-600 bg-gray-50 dark:bg-gray-800/50">
                                <svg class="w-12 h-12 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 8h16M4 8a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V8z" />
                                </svg>
                                <span class="text-xs">No Image Available</span>
                            </div>
                        @endif

                        <!-- Status Badge (Published / Not Published) -->
                        <div class="absolute top-3 right-3">
                            @if ($post->is_published)
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-500/90 text-white backdrop-blur-md shadow-sm">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white ml-1.5 animate-pulse"></span>
                                    Published
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-amber-500/90 text-white backdrop-blur-md shadow-sm">
                                    Draft
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-5 flex flex-col flex-grow justify-between space-y-4">
                        <div>
                            <h3
                                class="text-lg font-bold text-gray-900 dark:text-white line-clamp-2 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                {{ $post->title }}
                            </h3>
                        </div>

                        <!-- Card Action -->
                        <div
                            class="pt-4 border-t border-gray-100 dark:border-gray-700/60 flex items-center justify-between">
                            <a href="{{ route('blog.show', $post->id) }}"
                                class="inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 transition-colors">
                                <span>Read More</span>
                                <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</x-master-layout>
