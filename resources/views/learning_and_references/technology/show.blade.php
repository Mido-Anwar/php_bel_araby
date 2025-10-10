<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($technology->name) }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 max-w-2xl">
            Technology details and sections management.
        </p>
    </x-slot>
    <div class="py-12">
        <x-dashboard-container>
            <div class="my-2 flex justify-end">
                <a href="{{ route('tech.edit', $technology->name) }}" class="px-4 py-2  text-white rounded-md font-bold"
                    style="background: green;">
                    + Edit Technology
                </a>
            </div>
            <h2 class="font-bold text-gray-800 dark:text-gray-100 mb-2">
                {{ Str::upper($technology->name) }}
            </h2>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-bold text-lg">
                {{ $technology->description }}
            </p>
        </x-dashboard-container>
        <x-dashboard-container>
            <h2 class="font-bold text-gray-800 dark:text-gray-100 mb-2">
                {{ Str::upper($technology->name) }} Sections
            </h2>
            <div class="w-1/2">
                @if ($technology->sections->isEmpty())
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-bold text-lg">
                        No sections available for this technology.
                    </p>
                @endif

                @foreach ($technology->sections as $section)
                    <div class="btn-container">
                        <a href="{{ route('section.show', $section->id) }}" class="btn-show">
                            {{ $section->title }}
                        </a>
                        <form action="{{ route('section.destroy', $section->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this technology?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                X
                            </button>
                        </form>
                    </div>
                @endforeach

            </div>
        </x-dashboard-container>
        <x-dashboard-container>

            <h2 class="font-bold text-gray-800 dark:text-gray-100 mb-2">
                Add Sections To {{ Str::upper($technology->name) }}
            </h2>

            <x-hidden-form :action-url="route('section.store')" :open="false" :fields="[
                [
                    'name' => 'technology_id',
                    'type' => 'hidden',
                    'label' => '',
                    'placeholder' => 'Enter Post title',
                    'value' => $technology->id,
                ],
                [
                    'name' => 'title',
                    'type' => 'text',
                    'label' => 'Title',
                    'placeholder' => 'Enter title',
                ],
                [
                    'name' => 'content',
                    'type' => 'textarea',
                    'label' => 'content',
                    'placeholder' => 'Write an Content...',
                    'rows' => 5,
                ],
            ]">

            </x-hidden-form>
            @if (session('success-section'))
                <div class="mt-3 text-green-600">
                    {{ session('success-section') }}
                </div>
            @endif
        </x-dashboard-container>
    </div>
</x-app-layout>
